@php($attributes = getHasRelationAttributes($route , $relation))
<thead class="bg-grey">
<tr>
    <th colspan="{{count($attributes) + 1}}">{{trans('app.'.$relation)}}</th>
</tr>

</thead>
<tbody id="body">
<tr>
    <td>#</td>
    @foreach($attributes as $attribute  => $type)
        <td colspan="1">{{trans('attributes.'.$attribute)}}</td>
    @endforeach
    <td class="text-center">
        <a href="#" class="list-icons-item btn-add-item">
            <i class="icon-database-add"></i>
        </a>
    </td>
</tr>
<tr>
    <td class="counter" data-counter="1">1</td>
    @foreach($attributes as $attribute => $type)
        <td class="form-group form-group-feedback">

            @switch($type)
                @case("select")
                @include('inputs.select', ["array" => true])
                @break
                @case("options")
                @include('inputs.options' , ["array" => true])
                @break
                @case("textarea")
                @include('inputs.textarea', ["array" => true])
                @break
                @default
                @include('inputs.text', ["array" => true])
                @break
            @endswitch

            @if ($errors->has($attribute))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first($attribute) }}</strong>
                </span>
            @endif
        </td>
    @endforeach
    <td class="text-center">
        <a href="#" class="list-icons-item btn-delete-item">
            <i class="icon-database-remove"></i>
        </a>
    </td>
</tr>
</tbody>

@push('script')
    <script>
        $(document).on('click', '.btn-add-item', function (e) {
            e.preventDefault();
            let table = $('#body');
            let cloned = table.children().last().clone();
            let cval = cloned.children('.counter').data('counter') + 1;
            cloned.children('.counter').attr('data-counter', cval);
            cloned.children('.counter').html(cval);
            table.append(cloned);
        });

        $(document).on('click', '.btn-delete-item', function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    </script>
@endpush