@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('editor/editor.css') }}">
@endsection

@section('content')

    <h2>Confirm your action</h2>
    <h5>You are about to permanently delete <b>{{ $item->item_name }}</b> ({{ $item->item_views }} views)</h5>

    <br><br>

    <div class="float-left">
        <form action="/admin/dashboard/action:trash={{ $item->id }}" method="POST">
            {{ @csrf_field() }}
            <input type="hidden" name="itemid" value="{{ $item->id }}">
            <input type="submit" class="btn btn-danger" value="I know, continue">
        </form>
    </div>

    <div class="float-left">
        <a href="{{ Route('admin.dashboard') }}">
            <button class="btn btn-light">Cancel</button>
        </a>
    </div>

    <div class="clearfix"></div>

@endsection

@section('scripts')

@endsection