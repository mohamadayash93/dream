@php($items =  $data[$relation])
@php($model_items = $item->$relation()->get() )
@php($value_var = "name_".getLocale())
@php($attributes = getHasRelationAttributes($route , $relation))
@if(!$model_items->isEmpty())
    <thead class="bg-grey">
    <tr>
        <th colspan="{{count($attributes)+2}}">{{trans('app.'.$relation)}}</th>
    </tr>
    <tr>
        <td>#</td>
        @foreach($attributes as $attribute => $type)
            <th colspan="1">{{ trans('attributes.'.$attribute) }}</th>
        @endforeach
        <td class="text-center">
            <a href="javascript:void(0);" class="list-icons-item" onclick="addItem()">
                <i class="icon-database-add"></i>
            </a>
        </td>
    </tr>
    </thead>
    <tbody id="has-body">
    @for($i = 0 ; $i < $model_items->count() ; $i++)
        @php($modelItem = $model_items[$i]["pivot"] != null ? $model_items[$i]["pivot"] : $model_items[$i])
        <tr>
            <td class="counter" data-counter="{{$i+1}}">{{ $i+1 }}</td>
            @foreach($attributes as $attribute => $type)
                <td colspan="1">
                    @switch($type)
                        @case("identity")
                        <a href="{{route($relation.'.show',$model_items[$i]->id)}}">{{$model_items[$i]->id}}</a>
                        @break
                        @case("file")
                        @if(isImage($model_items[$i]->path))
                            <a href="#" class="list-icons-item btn-view" data-toggle="modal"
                               data-trigger="hover" data-path="{{$model_items[$i]->path}}"
                               data-target="#view-file-modal">
                                <i class="icon-eye"></i>
                            </a>
                            @include('inputs.text', ["type" => "file","item" => $modelItem, 'array' => true, 'name' => $relation . '_'])
                        @endif
                        @break
                        @case("select")
                        @include('inputs.select', ["item" => $modelItem, 'array' => true, 'name' => $relation . '_'])
                        @break
                        @case("options")
                        @if($attribute == "attachments_names")
                            @php($value_var = "text_".getLocale())
                            <select name="{{$attribute}}[]"
                                    class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}">
                                <option selected disabled>{{trans('app.select message' , [$attribute])}}</option>

                                @foreach(getSelectOptions($route , $attribute) as $option)
                                    <option {{$model_items[$i]->name == $option->code ? 'selected' : ''}}
                                            value="{{$option->code}}">
                                        {{isset($option->$value_var) ? $option->$value_var : $option->name}}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        @break
                        @case("textarea")
                        @include('inputs.textarea', ["item" => $modelItem, 'array' => true, 'name' => $relation . '_'])
                        @break
                        @case("location")
                        @include('inputs.location', ["item" => $modelItem, 'array' => true, 'name' => $relation . '_'])
                        @break
                        @default
                        @include('inputs.text', ["item" => $modelItem, 'array' => true, 'name' => $relation . '_'])
                        @break
                    @endswitch
                </td>
            @endforeach
            <td colspan="1" class="text-center">
                <a data-id="{{$model_items[$i]["id"]}}" class="list-icons-item btn-delete btn-delete-item"
                   data-modal="{{$relation}}"
                   data-name="{{$item->name}}"
                   data-popup="tooltip"
                   title="{{trans('app.delete')}}" data-toggle="modal" data-trigger="hover"
                   data-target="#delete-modal">
                    <i class="icon-database-remove"></i>
                </a>
            </td>
        </tr>
    @endfor
    </tbody>

    @include('modals.view-file-modal')
@endif
@push('script')
    <script>
        function addItem() {
            let table = $('#has-body');
            if (table.find('select').data("select2"))
                table.find('select').select2("destroy");
            let cloned = table.children().last().clone();
            cloned.find('input,select,textarea').val('');
            let cval = cloned.children('.counter').data('counter') + 1;
            cloned.children('.counter').attr('data-counter', cval);
            cloned.children('.counter').html(cval);
            cloned.show();
            table.append(cloned);
            table.find('.select2').select2({
                allowClear: true,
                dir: "ltr",
                language: {
                    noResults: function () {
                        return "لا توجد خيارات";
                    }
                }
            });
        }

        $(document).on('click', '.btn-delete-item', function (e) {
            $(this).parent().parent().remove();

            if ($(this).data('modal') === 'attachments' && "{{$route}}" === "clients") {
                $.ajax({
                    type: 'get',
                    url: '{{ url('deleteAttachment')}}' + '/' + $(this).data('id'),
                    data: {
                        'client_id': "{{$item['id']}}"
                    },
                    success: function (data) {
                    }
                });
            }

        });

        $(document).on('click', '.btn-view', function () {
            let canvas = $("#image-canvas");
            let src = '{{asset("storage/")}}' + '/' + $(this).data('path');
            canvas.attr('src', src);
        });
    </script>
@endpush