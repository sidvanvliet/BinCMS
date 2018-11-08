@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
@endsection

@section('content')

    <div>
        <h2 class="font-weight-bold">
            @lang('admin.website_settings')
        </h2>

        <form action="{{ Route('admin.updateSettings') }}" method="POST">

            {{ @csrf_field() }}

            <div class="form-group mt-4">
                <b>@lang('admin.website_name')</b>
                <input type="text" id="title" name="name" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('name') }}">
            </div>

            <div class="form-group mt-4">
                <b>@lang('admin.subtitle')</b>
                <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('subtitle') }}">
            </div>

            <div class="form-group mt-4">
                <b>@lang('admin.background_colour')<br></b>
                <input type='text' id="cpicker" name="bgcolour">
            </div>

            <div class="form-group mt-4">
                <b>@lang('admin.pagination')</b> <small>@lang('admin.zero_for_infinite')</small><br>
                <input type="number" min="0" class="form-control" step="1" style="text-align:center;width:60px;" name="paginate" value="{{ \App\Helpers\SettingHelper::setting('paginate') }}">
            </div>

            <div class="form-group mt-4">
                <b>@lang('admin.show_only_image')</b><br>
                <div class="toggle-group">
                    <input type="checkbox" name="show-only-image" id="on-off-switch" tabindex="1" {{ \App\Helpers\SettingHelper::setting('show_only_image') == "on" ? "checked" : ""}}>
                    <label for="on-off-switch">
                        @lang('admin.enabled')
                    </label>
                    <div class="onoffswitch pull-right" aria-hidden="true">
                        <div class="onoffswitch-label">
                            <div class="onoffswitch-inner"></div>
                            <div class="onoffswitch-switch"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4">
                <b>@lang('admin.layout')</b><br>
                <input type="number" min="1" max="12" class="form-control" step="1" style="text-align:center;width:60px;" name="layout" value="{{ (int)\App\Helpers\SettingHelper::setting('layout') }}">
            </div>

            <button class="btn btn-dark mt-3">
                <i class="mdi mdi-content-save-settings-outline"></i> @lang('admin.save')
            </button>

        </form>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#cpicker").spectrum({
                color: "{!! \App\Helpers\SettingHelper::setting('bgcolour') !!}",
                preferredFormat: "hex",
                showInput: true,
                showInitial: true
            });

            setInterval(function(){
                $('#preview').css('background-color', $("#cpicker").spectrum('get').toHexString());
                $('#preview-title').text($('#title').val()).html();
                $('#preview-subtitle').text($('#subtitle').val()).html();
            }, 1);
        });

    </script>
@endsection