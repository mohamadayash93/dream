@php($items = $item->$relation()->get())
<thead class="bg-grey">
<tr>
    <th colspan="{{$items->count()}}">{{trans('app.'.$relation)}}</th>
    <th colspan="1">{{trans('app.operations')}}</th>
</tr>
</thead>
<tbody>
<tr>
    @for($i = 0 ; $i < $items->count() ; $i++)
        <td colspan="1">{{$items[$i]->path}}</td>
        <td colspan="1">
            <a href="#" class="list-icons-item btn-view" data-toggle="modal"
               data-trigger="hover" data-path="{{$items[$i]->path}}" data-target="#view-file-modal">
                <i class="icon-eye"></i>
            </a>
        </td>
        @if(($i+1) % 4 == 0)
</tr>
<tr>
    @endif
    @endfor
</tr>
</tbody>

<!-- Iconified modal -->
<div id="view-file-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-eye mr-2"></i> &nbsp;{{trans('app.view')}}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <img style="width: 500px;" class="text-center" src="{{asset('storage/')}}" id="image-canvas">
            </div>
        </div>
    </div>
</div>
<!-- /iconified modal -->


@push('script')
    <script>
        $(document).on('click', '.btn-view', function () {
            let canvas = $("#image-canvas");
            let src = canvas.attr('src');
            src += '/' + $(this).data('path');
            canvas.attr('src', src);
        });
    </script>
@endpush