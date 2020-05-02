@php($items = $item->$relation()->get())
@php($value_var = "text_".getLocale())
<thead class="bg-grey">
<tr>
    <th colspan="{{$items->count()}}">{{trans('app.'.$relation)}}</th>
</tr>
</thead>
<tbody>
<tr>
    @for($i = 0 ; $i < $items->count() ; $i++)
        <td colspan="1">   {{isset($items[$i]->$value_var) ? $items[$i]->$value_var : $items[$i]->name}}</td>
        @if(($i+1) % 4 == 0)
</tr>
<tr>
    @endif
    @endfor
</tr>
</tbody>