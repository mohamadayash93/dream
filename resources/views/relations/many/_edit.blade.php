@php($items =  $data[$relation])
@php($model_items = $item->$relation()->get() )
@php($value_var = "text_".getLocale())
<thead class="bg-grey">
<tr>
    <th colspan="{{$items->count()}}">{{trans('app.'.$relation)}}</th>
</tr>
</thead>
<tbody>
<tr>
    @for($i = 0 ; $i < $items->count() ; $i++)
        <td colspan="1">
            <div class="form-check form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="{{$relation}}[]"
                           value="{{$items[$i]->id}}"
                            {{$model_items->contains($items[$i]) ? 'checked' : ''}}>
                    {{isset($items[$i]->$value_var) ? $items[$i]->$value_var : $items[$i]->name}}
                </label>
            </div>
        </td>
        @if(($i+1) % 4 == 0)
</tr>
<tr>
    @endif
    @endfor
</tr>
</tbody>