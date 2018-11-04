@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('editor/editor.css') }}">
@endsection

@section('content')

    <h2>
        Modify <i>{{ $post->item_name }}</i>
    </h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-group">

        <form action="{{ Route('item.update') }}" method="POST" enctype="multipart/form-data">

            {{ @csrf_field() }}

            <input type="hidden" name="pid" value="{{ $post->id }}">

            <br>

            <input type="text" name="name" class="form-control" value="{{ $post->item_name }}" placeholder="Give this portfolio item a name.." required>

            <div style="background-color:#fff;">
                <textarea name="content" id="item-content" cols="30" rows="10" class="form-control" required>{{ $post->item_description }}</textarea>
            </div>

            <br><br>

            <div class="float-left">
                <input type="submit" class="btn btn-primary" value="Save modified post">
            </div>

            <div class="float-left" id="checkbox-new-item">
                <div class="toggle-group">
                    <input type="checkbox" name="on-off-switch" id="on-off-switch" tabindex="1">
                    <label for="on-off-switch">
                        Make this item private
                    </label>
                    <div class="onoffswitch pull-right" aria-hidden="true">
                        <div class="onoffswitch-label">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('editor/editor.js') }}"></script>
    <script>
        $(document).ready( function() {
            // $("#item-content").Editor();
        });
    </script>
@endsection