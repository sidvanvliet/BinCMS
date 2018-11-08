@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('editor/editor.css') }}">
@endsection

@section('content')

    <h2 class="font-weight-bold">
        {{ $post->item_name }}
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
            <input type="hidden" name="change_img" id="change_img" value="0">

            <br>

            @if(\App\Helpers\Image::getImage($post->id) != null)
                <div class="upd-img" style="background-image:url('{{ \App\Helpers\Image::getImage($post->id) }}')">
                    <div class="upd-img-edit">
                        <i class="mdi mdi-close-circle-outline"></i>
                    </div>
                </div>
            @endif

            <div id="image-wrap">
                <input type="file" name="image" id="image">
                <i id="cancel-newimg" class="mdi mdi-close-circle-outline"></i>
            </div>

            <br>

            <input type="text" name="name" class="form-control" value="{{ $post->item_name }}" placeholder="Give this portfolio item a name.." required>

            <div style="background-color:#fff;">
                <textarea name="content" id="item-content" cols="30" rows="10" class="form-control" required>{{ $post->item_description }}</textarea>
            </div>

            <br><br>

            <div class="float-left">
                <input type="submit" class="btn btn-primary" value="@lang('admin.save_modified')">
            </div>

            <div class="float-left" id="checkbox-new-item">
                <div class="toggle-group">
                    <input type="checkbox" name="on-off-switch" id="on-off-switch" tabindex="1">
                    <label for="on-off-switch">
                        @lang('admin.make_item_private')
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
            $(document).on('click', '.upd-img', function(){
                $('#image-wrap').css('display', 'block');
                $('.upd-img').css('display', 'none');
                $('#change_img').val(1);
            });
            $(document).on('click', '#cancel-newimg', function(){
                $('#image-wrap').css('display', 'none');
                $('.upd-img').css('display', 'block');
                $('#change_img').val(0);
            });
            // $("#item-content").Editor();
        });
    </script>
@endsection