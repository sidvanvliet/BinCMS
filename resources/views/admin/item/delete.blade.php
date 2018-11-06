@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('editor/editor.css') }}">
@endsection

@section('content')

    <div class="text-center">
        <i class="mdi mdi-delete-empty" id="big-delete-sign"></i>

        <h2 class="font-weight-bold">@lang('admin.holdup')</h2>
        <h5>@lang('admin.remove_perma') <b>{{ $item->item_name }}</b>?</h5>

        <br><br>

        <div>
            <form action="/admin/dashboard/action:trash={{ $item->id }}" method="POST">
                {{ @csrf_field() }}
                <input type="hidden" name="itemid" value="{{ $item->id }}">
                <input type="submit" class="btn btn-danger" value="@lang('admin.confirm')">
            </form>
        </div>

        <div class="mt-2">
            <a href="{{ Route('admin.dashboard') }}">
                @lang('admin.no_goback')
            </a>
        </div>

        <div class="clearfix"></div>
    </div>

@endsection

@section('scripts')

@endsection