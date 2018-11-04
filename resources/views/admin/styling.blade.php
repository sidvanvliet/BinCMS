@extends('layouts.admin')

@section('styling')

@endsection

@section('content')

    <div id="app">

        <h2>
            Custom styling
            <span id="add-new">
                This stylesheet overwrites all others
            </span>
        </h2>

        <form action="{{ url('/admin/styling') }}" method="POST">
            <div class="form-group">

                {{ @csrf_field() }}

                <textarea class="form-control" name="styling" id="editor" cols="30" rows="20">{{ $styling }}</textarea>

                <br><input type="submit" value="Save" class="btn btn-success btn-sm">
            </div>
        </form>

    </div>

@endsection

@section('scripts')

@endsection