@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div id="banner" style="background-image:url('{{ \App\Helpers\Image::getImage($item->id) }}')"></div>
        </div>

        <div class="mt-5">
            <h1>&#8220;{{ $item->item_name }}&#8221;</h1>
            <p>
                {{ $item->item_description }}
            </p>
        </div>

    </div>
@endsection
