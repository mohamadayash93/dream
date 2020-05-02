@php($items = $item->$relation()->get())
@php($attributes = getHasRelationAttributes($route , $relation))
<thead class="bg-grey">
<tr>
    <th colspan="{{count($attributes)}}">{{trans('app.'.$relation)}}</th>
</tr>
<tr>
    @foreach($attributes as $attribute => $type)
        @if($type == "identity")
            <th colspan="1">#</th>
        @else
            <th colspan="1">{{trans('attributes.'.$attribute)}}</th>
        @endif
    @endforeach
</tr>
</thead>
<tbody>
@for($i = 0 ; $i < $items->count() ; $i++)
    <tr>
        @foreach($attributes as $attribute => $type)
            @if($type == "identity")
                <td colspan="1"><a href="{{route($relation.'.show',$items[$i]->id)}}">{{$items[$i]->id}}</a></td>
            @else
                <td colspan="1">{!! getItemAttributeValue($route , $items[$i] , $attribute) !!}</td>
            @endif
        @endforeach
    </tr>
@endfor
</tbody>