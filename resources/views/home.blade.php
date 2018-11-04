@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="font-weight-bold">{{ \App\Helpers\SettingHelper::setting('name') }}</h1>
    <p>{{ \App\Helpers\SettingHelper::setting('subtitle') }}</p>

    <div class="row mt-5">

        @if(count($items) != 0)
            @foreach($items as $item)
                <div class="col-lg-4 col-sm-6 item-wrap">
                    <div class="card h-100 item">
                        <a href="{{ url('/post-' . $item->id) }}"><img class="card-img-top" src="{{ \App\Helpers\Image::getImage($item->id) }}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="{{ url('/post-' . $item->id) }}">{{ $item->item_name }}</a>
                            </h4>
                            <p class="card-text">{{ substr($item->item_description, 0, 220) }}<?php if(strlen($item->item_description) > 219) { echo "..."; } ?></p>
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

    {{ $items->links() }}

</div>
@endsection
