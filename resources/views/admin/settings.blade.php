@extends('layouts.admin')

@section('content')

    <div id="app">

        <h2>
            Settings
            <span id="add-new">
                @verbatim
                    {{ title }}
                @endverbatim
            </span>
        </h2>

        <div class="form-group">
            <small>Website name</small>
            <input type="text" class="form-control" v-model="title">
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script>
        new Vue({
            el: '#app',
            data: ({
                title: '{{ $settings[0]->value }}',
            })
        });
    </script>
@endsection