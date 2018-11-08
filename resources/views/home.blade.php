@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="font-weight-bold">{{ \App\Helpers\SettingHelper::setting('name') }}</h1>
    <p>{{ \App\Helpers\SettingHelper::setting('subtitle') }}</p>

    <div class="row mt-5" style="margin-left:-15px;">

        @if(count($items) != 0)
            @foreach($items as $item)
                <div class="col-lg-6 col-sm-6 item-wrap">
                    @auth
                        @if(\App\Helpers\SettingHelper::setting('admin_shortcuts') == "on")
                            <a href="{{ Route('item.modify', ['id' => $item->id]) }}" title="Edit post">
                                <i class="edit mdi mdi-pen"></i>
                            </a>
                        @endif
                    @endauth
                    <div class="card h-100 item">
                        <a href="{{ url('/post-' . $item->id) }}"><img class="card-img-top" src="{{ \App\Helpers\Image::getImage($item->id) }}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ url('/post-' . $item->id) }}">{{ $item->item_name }}</a>
                            </h4>
                            <p class="card-text">{{ substr($item->item_description, 0, 120) }}<?php if(strlen($item->item_description) > 219) { echo "..."; } ?></p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div id="no-items">
                No portfolio item(s) found.
            </div>
        @endif

    </div>

    <br>{{ $items->links() }}

</div>
@endsection
