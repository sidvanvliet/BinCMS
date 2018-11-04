<?php
$count = 0;
function returnNumber($int)
{
    if($int < 10)
    {
        return "0" . $int;
    } else {
        return $int;
    }
}
?>
@if(count($items) != 0)
    @foreach($items as $item)
        <?php $count++; ?>
        <div class="adm-portfolio-item">
            <div class="inner-item">

                <span class="item-name">
                    <span class="item-name-count">{{ returnNumber($count) }}</span> {{ $item->item_name }}
                </span>

                <span class="put-right">

                        <small class="item-views col-sm-12">
                            {!! $item->item_is_public == 0 ? "Private item |  " : "" !!}
                            <b>{{ number_format($item->homepage_views) }}</b> times shown, <b>{{ number_format($item->item_views) }}</b> views
                        </small>

                        <a href="{{ Route('item.modify', ['id' => $item->id]) }}"><button type="button" class="btn btn-primary btn-sm"><i class="mdi mdi-android-studio"></i> Modify</button></a>
                        <a href="{{ Route('item.trash', ['id' => $item->id]) }}"><button type="button" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i> Trash</button></a>

                    </span>
                <div class="clearfix"></div>
            </div>
        </div>
    @endforeach
@else
    <br>
    <h4>You don't have any portfolio items yet.</h4>
    <a href="{{ Route('item.new') }}">Click here</a> to add your first portfolio item.
    <br><br>
@endif