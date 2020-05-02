<!-- Iconified modal -->
<div id="view-file-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-eye mr-2"></i> &nbsp;{{trans('app.view')}}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body img-responsive">
                <img class="text-center" src="" id="image-canvas" width="100%">
            </div>
        </div>
    </div>
</div>
<!-- /iconified modal -->

@push('script')
    <script>
        $(document).on('click', '.btn-view', function () {
            let canvas = $("#image-canvas");
            let src = '{{asset("storage/")}}' + '/' + $(this).data('path');
            canvas.attr('src', src);
        });
    </script>
@endpush