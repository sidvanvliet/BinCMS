@extends('layouts.admin')

@section('content')

    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <h2>
        Portfolio items
        <a href="{{ Route('item.new') }}" id="add-new">
            Add new item
        </a>
    </h2>

    <div id="portfolio-items"></div>

    <div class="toggle-group"><br>
        <input type="checkbox" name="on-off-switch" id="on-off-switch" tabindex="1">
        <label for="on-off-switch">
            Live data
        </label>
        <div class="onoffswitch pull-right" aria-hidden="true">
            <div class="onoffswitch-label">
                <div class="onoffswitch-inner"></div>
                <div class="onoffswitch-switch"></div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
        $(document).ready(function(){

            $('#portfolio-items').load('/admin/dashboard/data:items');

            setInterval(function(){
                if($("#on-off-switch").is(':checked') == true)
                {
                    $('#portfolio-items').load('/admin/dashboard/data:items');
                }
            }, 1000);

            $('#on-off-switch').change(function(){
                if($("#on-off-switch").is(':checked') == true)
                {
                    $.cookie('livedata', true);
                } else {
                    $.cookie('livedata', false);
                }
            });

            if($.cookie('livedata'))
            {
                if($.cookie('livedata') == 'true')
                {
                    $('#on-off-switch').prop('checked', true);
                }
            }

        });
    </script>
@endsection