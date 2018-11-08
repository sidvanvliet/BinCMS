@extends('layouts.admin')

@section('content')

    <div id="app">

        <h2 class="font-weight-bold">
            Insights <small><img id="gather" src="{{ asset('gif/loader.gif') }}"></small>
        </h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Country / IP</th>
                    <th scope="col">Country</th>
                    <th scope="col">Region/Province</th>
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
                        <td id="country-{{ $visit->id }}">—</td>
                        <td id="region-{{ $visit->id }}">—</td>
                        <td title="{{ $visit->created_at }}">{{ $visit->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>

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
                    $('#gather').hide();
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
                        if(output != "##")
                        {
                            output = output.split('#');

                            $('#record-' + itemid).attr('src', '{{ asset('png/flags/') }}/' + output[0] + '.png');
                            $('#country-' + itemid).html(output[1]);
                            $('#region-' + itemid).html(output[2]);
                        } else {
                            output = output.split('#');

                            $('#record-' + itemid).attr('src', '{{ asset('png/flags/') }}/cross.png');
                            $('#record-' + itemid).css('opacity', '0.3');
                            $('#country-' + itemid).html('—');
                            $('#region-' + itemid).html('—');
                        }
                    }
                });
            });
        });
    </script>
@endsection