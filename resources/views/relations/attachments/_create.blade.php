<thead class="bg-grey">
<tr>
    <th colspan="2">{{trans('app.attachments')}}</th>
    <th class="text-center">
        <a href="#" class="list-icons-item btn-add-item">
            {{trans('app.operations')}}
        </a>
    </th>
</tr>

</thead>
<tbody class="body">
<tr>
    <td>#</td>
    <td colspan="1">{{trans('attributes.file')}}</td>
    <td class="text-center">
        <a href="javascript:void(0);" class="list-icons-item" onclick="addItem($(this))">
            <i class="icon-database-add"></i>
        </a>
    </td>
</tr>
<tr class="items-row">
    <td class="counter" data-counter="1">1</td>
    <td class="form-group form-group-feedback">
        <input class="form-control-uniform" type="file" name="images[]" autofocus data-fouc>
    </td>
    <td class="text-center">
        <a href="#" class="list-icons-item btn-delete-item">
            <i class="icon-database-remove"></i>
        </a>
    </td>
</tr>
</tbody>

@push('script')
    <script src="{{asset('global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script>

        $('.form-control-uniform').uniform({
            fileButtonHtml: Lang.get('app.choose file'),
            filesButtonHtml: Lang.get('app.choose file'),
            fileDefaultHtml: Lang.get('app.No file selected')
        });


        function addItem(btn) {
            console.log('clicked');
            let table = btn.closest('.body');
            if (table.find('select').data("select2"))
                table.find('select').select2("destroy");
            let cloned = table.children('.items-row').last().clone();
            console.log(cloned);
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
            e.preventDefault();
            $(this).parent().parent().remove();
        });
    </script>
@endpush