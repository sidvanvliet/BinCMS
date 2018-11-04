@extends('layouts.admin')

@section('content')

    @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('title') }}</strong> {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="float-right" style="margin-top:10px;">
        <a href="{{ Route('item.new') }}">
            <button class="btn btn-dark btn-sm"><i class="mdi mdi-comment-plus-outline"></i> New post</button>
        </a>
    </div>

    <h2 class="font-weight-bold">
        Portfolio items
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
                    $('#portfolio-items').load('/admin/dashboard/data:items?no-animation');
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