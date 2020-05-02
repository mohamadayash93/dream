<textarea class="form-control{{ $errors->has($attribute) ? ' is-invalid' : '' }}"
          name="{{$attribute}}{{isset($array) ? '[]' : ''}}"
          autofocus>{{ isset($item) ? $item->$attribute : old($attribute)}}
</textarea>

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('textarea[name={{$attribute}}]'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush