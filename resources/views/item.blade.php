@extends('layouts.app')

@section('title')
    {{--{{ strlen($item->item_name) > 8 ? substr($item->item_name, 0, 8) . ".." : $item->item_name }} ---}}
    {{ $item->item_name }} |
@endsection

@section('content')
    <div class="container">

        <a href="{{ Route('home') }}">Return to the homepage</a><br><br>

        <div class="">
            <div id="banner" style="background-image:url('{{ \App\Helpers\Image::getImage($item->id) }}')"></div>
        </div>

        <div class="mt-5">
            <h1 class="font-weight-bold">&#8220;{{ $item->item_name }}&#8221;</h1>
            <small class="font-weight-bold">Posted {{ $item->created_at->diffForHumans() }}</small>

            <p class="mt-3">
                {{ $item->item_description }}
            </p>
        </div>

    </div>
@endsection
