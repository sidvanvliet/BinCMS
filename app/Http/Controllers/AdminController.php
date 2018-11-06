<?php

namespace App\Http\Controllers;

use App\Media;
use App\Portfolio;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function seo()
    {
        return view('admin.seo');
    }

    public function changeLanguage($lang)
    {
        $allowed = ['nl', 'en'];
        if(in_array($lang, $allowed))
        {
            $user = User::find(\Auth::user()->id);
            $user->language = $lang;
            $user->save();
        }
        return back();
    }

    public function updateSeo(Request $request)
    {
        $setting = Setting::where('setting', 'seo_keywords')->first();
        $setting->value = $request['seo_keywords'];
        $setting->save();

        $setting = Setting::where('setting', 'seo_language')->first();
        $setting->value = $request['seo_language'];
        $setting->save();

        $setting = Setting::where('setting', 'seo_description')->first();
        $setting->value = $request['seo_description'];
        $setting->save();

        Session::flash('title', 'All done!');
        Session::flash('message', 'Your SEO settings have been saved.');
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/dashboard');
    }

    public function updateSettings(Request $request)
    {
    //    Why the fuck is this not working...?
    //
    //    $settings = ['name', 'bgcolour', 'paginate'];
    //    foreach($settings as $setting)
    //    {
    //        $setting = Setting::where('setting', $setting)->get()[0];
    //        $setting->value = $request[$setting];
    //        $setting->save();
    //    }

        $setting = Setting::where('setting', 'name')->first();
        $setting->value = $request['name'];
        $setting->save();

        if($request['bgcolour'] != null)
        {
            $setting = Setting::where('setting', 'bgcolour')->first();
            $setting->value = $request['bgcolour'];
            $setting->save();
        }

        $setting = Setting::where('setting', 'paginate')->first();
        $setting->value = $request['paginate'];
        $setting->save();

        $setting = Setting::where('setting', 'subtitle')->first();
        $setting->value = $request['subtitle'];
        $setting->save();

        Session::flash('title', 'All done!');
        Session::flash('message', 'Settings saved.');
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/dashboard');
    }

    public function confirmTrash($id)
    {
        return view('admin.item.delete')->with('item', Portfolio::findOrFail($id));
    }

    public function trash(Request $req)
    {
        $item = Portfolio::findOrFail($req['itemid']);
        $item->deleted_at = date("Y-m-d H:i:s");
        $item->save();

        Session::flash('message', 'Successfully deleted a portfolio item.');
        Session::flash('alert-class', 'alert-info');

        return redirect('/admin/dashboard');
    }

    public function modify($postid)
    {
        $post = Portfolio::where('id', $postid)->get();

        return view('admin.item.update')->with('post', $post[0]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
        ]);

        $item = Portfolio::where('id', '=', (int)$request['pid'])->first();

        $item->item_name        = $request['name'];
        $item->item_description = $request['content'];
        if(isset($request->{'on-off-switch'}))
        {
            $item->item_is_public = 0;
        } else {
            $item->item_is_public = 1;
        }

        $item->save();

        Session::flash('message', 'Successfully updated ' . $request['name']);
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/dashboard');
    }

    public function new()
    {
        return view('admin.item.create');
    }

    public function styling()
    {
        $styling = \DB::table('settings')->where('setting', 'styling')->first();
        return view('admin.styling')->with('styling', $styling->value);
    }

    public function stylingUpdate(Request $req)
    {

        \DB::table('settings')->where('setting', 'styling')
            ->update([
                'value' => $req->styling
            ]);

        return redirect('/admin/styling');

    }

    public function post_new(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|max:255',
            'content' => 'required',
        ]);

        $item = new Portfolio();

        $item->item_name        = $req['name'];
        $item->item_description = $req['content'];
        if($item->{'on-off-switch'})
        {
            $item->item_is_public = 0;
        } else {
            $item->item_is_public = 1;
        }

        $item->save();

        $file = $req->file('image');

        if(count($file) > 0)
        {
            $filename = hash('sha1', $item->id) . "." . $file->getClientOriginalExtension();
            $destinationPath = 'content';
            $anonyFileName = $filename;
            $file->move($destinationPath, $anonyFileName);

            $media = new Media;
            $media->item_id = $item->id;
            $media->filename = $filename;
            $media->save();
        }

        Session::flash('message', 'Successfully created your new portfolio item.');
        Session::flash('alert-class', 'alert-success');

        return redirect('/admin/dashboard');

    }

    public function ajaxReqItems(Request $request)
    {
        $animate = true;
        if($request->has('no-animation')){
            $animate = false;
        }
        return view('admin.ajax.portfolio-items')->with('items', Portfolio::adminListItems())->with('animate', $animate);
    }

    public function inlineUpdate(Request $request)
    {
        dd($request);
    }

}
