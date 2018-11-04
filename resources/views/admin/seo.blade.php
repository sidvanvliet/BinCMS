@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css">
@endsection

@section('content')

    <div id="app">

        <h2 class="font-weight-bold">
            Search Engine Optimization
        </h2>

        <form action="{{ Route('admin.updateSEO') }}" method="POST">

            {{ @csrf_field() }}

            <div class="form-group mt-4">
                <b>Website description</b>
                <input type="text" name="seo_description" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('seo_description') }}">
            </div>

            <div class="form-group mt-4">
                <b>Website keywords</b> <small>Seperated using a comma</small>
                <input type="text" name="seo_keywords" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('seo_keywords') }}">
            </div>

            <div class="form-group mt-4">
                <b>Website language</b> <small>Using the country code (ex: <u>ru</u>, <u>nl</u> or <u>en</u>)</small>
                <input type="text" name="seo_language" class="form-control" value="{{ \App\Helpers\SettingHelper::setting('seo_language') }}">
            </div>

            <button class="btn btn-dark mt-4">
                <i class="mdi mdi-content-save-settings-outline"></i> Save SEO settings
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