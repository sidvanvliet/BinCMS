@extends('layouts.admin')

@section('content')

    <div id="app">

        <h2 class="font-weight-bold">
            Insights
        </h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Country / IP</th>
                    <th scope="col">Visited</th>
                </tr>
            </thead>
            <tbody>
                @foreach($visits as $visit)
                    <tr>
                        <th scope="row">
                            <img src="{{ asset('png/flags/unk.png') }}" class="flagimg" id="record-{{ $visit->id }}" data-itemid="{{ $visit->id }}" data-ip="{{ $visit->ipaddr }}">
                            {{ $visit->ipaddr }}
                        </th>
                        <td>{{ $visit->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <span id="gather"><img src="{{ asset('gif/loader.gif') }}"> Loading country flags..</span><br>

        {{ $visits->links() }}

    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            let itemcount = $('.flagimg').length;
            let itemscount = 0;
            setInterval(function(){
                if(itemscount == itemcount)
                {
                    $('#gather').empty();
                }
            }, 100);
            $('.flagimg').each(function(){
                let ip = $(this).data('ip');
                let itemid = $(this).data('itemid');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/insights:getflag',
                    data: {
                        ipaddr: $(this).data('ip')
                    },
                    type: 'post',
                    success: function(output)
                    {
                        itemscount++;
                        if(output != "")
                        {
                            $('#record-' + itemid).attr('src', '{{ asset('png/flags/') }}/' + output + '.png');
                        } else {
                            $('#record-' + itemid).attr('src', '{{ asset('png/flags/') }}/' + 'unk' + '.png');
                        }
                    }
                });
            });
        });
    </script>
@endsection