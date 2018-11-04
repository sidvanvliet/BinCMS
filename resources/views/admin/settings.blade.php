@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
@endsection

@section('content')

    <div id="app">

        <h2 class="font-weight-bold">
            Website Settings
        </h2>

        <form action="{{ Route('admin.updateSettings') }}" method="POST">

            {{ @csrf_field() }}

            <div class="form-group mt-4">
                <b>Website name</b>
                <input type="text" name="name" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('name') }}">
            </div>

            <div class="form-group mt-4">
                <b>Subtitle</b> <small>displayed underneath your website title</small>
                <input type="text" name="subtitle" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('subtitle') }}">
            </div>

            <div class="form-group mt-4">
                <b>Background colour<br></b>
                <input type='text' id="cpicker" name="bgcolour">
            </div>

            <div class="form-group mt-4">
                <b>How many items do you want to show per page?</b> <small>put this to 0 if you do not want to limit the amount of items.</small><br>
                <input type="number" min="0" class="form-control" step="1" style="text-align:center;width:60px;" name="paginate" value="{{ \App\Helpers\SettingHelper::setting('paginate') }}">
            </div>

            <button class="btn btn-dark mt-4">
                <i class="mdi mdi-content-save-settings-outline"></i> Save settings
            </button>
        </form>

    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
    <script>
        $("#cpicker").spectrum({
            color: "{!! \App\Helpers\SettingHelper::setting('bgcolour') !!}",
            preferredFormat: "hex",
            showInput: true,
            showInitial: true
        });
    </script>
@endsection