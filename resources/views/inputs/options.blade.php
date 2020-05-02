@php(!isset($array) ? $array = false : false)
@php(!isset($name) ? $name = '' : false)
@php($value_var = "text_".getLocale())
<select name="{{$name}}{{$attribute}}{{$array ? '[]' : ''}}"
        class="select2 form-control{{$array == false && $errors->has($attribute) ? ' is-invalid' : '' }}">
    <option selected disabled>{{trans('app.select message' , [$attribute])}}</option>

    @foreach(getSelectOptions($route , $attribute) as $option)

        @if($action == "create")
            <option {{$array == false && old($attribute) == $option->code || (isset($params["type"]) && $params["type"]  == $option->code) ? 'selected' : ''}}
                    value="{{$option->code}}">
                {{isset($option->$value_var) ? $option->$value_var : $option->name}}
            </option>
        @elseif($action == "edit")
            <option {{isset($item) && $item->$attribute == $option->code ? 'selected' : ''}}
                    value="{{$option->code}}">
                {{isset($option->$value_var) ? $option->$value_var : $option->name}}
            </option>
        @endif
    @endforeach
</select>

@push('script')
    <script>
        $('.select2').select2({
            allowClear: true,
            dir: "rtl",
            language: {
                noResults: function () {
                    return "لا توجد خيارات";
                }
            }
        });
    </script>
@endpush