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
$delay = 0;
?>
@if(count($items) != 0)
    @foreach($items as $item)
        <?php $count++; $delay += 50; ?>
        <div class="adm-portfolio-item" {!! $animate == true ? 'data-aos="fade" data-aos-delay="' . $delay . '"' : "" !!}>
            <div class="inner-item">

                <span class="item-name">
                    <span class="item-name-count">{{ returnNumber($count) }}</span> {{ $item->item_name }}
                </span>

                <span class="put-right">

                        <small class="item-views col-sm-12">
                            {!! $item->item_is_public == 0 ? "<i class='mdi mdi-incognito'></i> Private item &nbsp;|&nbsp; " : "" !!}
                            <b>{{ number_format($item->homepage_views) }}</b> @lang('admin.times_shown'), <b>{{ number_format($item->item_views) }}</b> @lang('admin.views')
                        </small>

                        <a href="{{ Route('item.modify', ['id' => $item->id]) }}"><button type="button" class="btn btn-primary btn-sm"><i class="mdi mdi-android-studio"></i> @lang('admin.modify')</button></a>
                        <a href="{{ Route('item.trash', ['id' => $item->id]) }}"><button type="button" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i> @lang('admin.trash')</button></a>

                    </span>
                <div class="clearfix"></div>
            </div>
        </div>
    @endforeach
@else
    <br>
    <h4>@lang('admin.no_items')</h4>
    @lang('admin.add_firstitem', [
        'link'      => '<a href="{{ Route("items.new") }}">',
        'endlink'   => '</a>'
    ])
    <br><br>
@endif