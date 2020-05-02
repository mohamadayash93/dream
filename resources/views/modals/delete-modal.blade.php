<!-- Iconified modal -->
<div id="delete-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-database-remove mr-2"></i> &nbsp;{{trans('app.delete')}}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="alert alert-danger alert-dismissible alert-styled-left border-top-0 border-bottom-0 border-right-0"
                     id="delete-modal-message">
                </div>

                <h6 class="font-weight-semibold"><i class="icon-warning mr-2"></i>{{trans('app.warning')}}</h6>
                <p id="warning-modal-message"></p>

                <hr>
                <form id="delete-form" method="post">
                    <div class="alert-div"></div>
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" id="delete-modal-id">
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i
                            class="icon-cross2 font-size-base mr-1"></i> {{trans('app.close')}}</button>
                <button type="submit" form="delete-form" class="btn bg-danger"><i
                            class="icon-database-remove font-size-base mr-1"></i> {{trans('app.delete')}}</button>
            </div>
        </div>
    </div>
</div>
<!-- /iconified modal -->


@push('script')
    <script>
        $('.btn-delete').on('click', function () {
            let id = $(this).data('id');
            let modal = $(this).data('modal');
            let action = "{{url('/'.getLocale().'/admin')}}";

            action += '/' + modal + '/' + id;

            $("#delete-form").attr('action', action);
            $('#delete-modal-id').val(id);

            $('#delete-modal-message').html(Lang.get('app.delete message'));
            $('#warning-modal-message').html(Lang.get('app.warning message'));
        });
    </script>
@endpush