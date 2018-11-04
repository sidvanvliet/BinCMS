@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('editor/editor.css') }}">
@endsection

@section('content')

    <div class="text-center">
        <i class="mdi mdi-delete-empty" id="big-delete-sign"></i>

        <h2 class="font-weight-bold">Hold up!</h2>
        <h5>Are you sure you want to permanently delete <b>{{ $item->item_name }}</b> with {{ number_format($item->item_views) }} views</h5>

        <br><br>

        <div>
            <form action="/admin/dashboard/action:trash={{ $item->id }}" method="POST">
                {{ @csrf_field() }}
                <input type="hidden" name="itemid" value="{{ $item->id }}">
                <input type="submit" class="btn btn-danger" value="I know, continue">
            </form>
        </div>

        <div class="mt-2">
            <a href="{{ Route('admin.dashboard') }}">
                No, take me back.
            </a>
        </div>

        <div class="clearfix"></div>
    </div>

@endsection

@section('scripts')

@endsection