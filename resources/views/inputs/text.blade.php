<input class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}"
       type="{{$type}}" name="{{$attribute}}{{isset($array) ? '[]' : ''}}"
       value="{{isset($item) ? $item->$attribute : old($attribute)}}" autofocus>