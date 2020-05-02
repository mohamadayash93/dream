@php(!isset($array) ? $array = false : false)
@php(!isset($name) ? $name = '' : false)
<div class="form-group form-group-feedback form-group-feedback-right">
    <input id="path-holder" class="form-control {{$array == false && $errors->has($attribute) ? ' border-danger' : '' }}
            form-control-lg" type="text" name="{{$name}}{{$attribute}}{{$array ? '[]' : ''}}"
           value="{{$array == false ? (isset($item) ? $item->$attribute : old($attribute) ) : ''}}" readonly>
    <div id="path-icon-div" class="form-control-feedback form-control-feedback-lg">
        <a href="#" class="list-icons-item btn-upload" data-toggle="modal" data-trigger="hover"
           data-target="#upload-image-modal"><i class="icon-upload"></i></a>
    </div>
</div>
@if($array == false && $errors->has($attribute))
    <span class="form-text text-danger">
    <strong>{{ $errors->first($attribute) }}</strong>
</span>
@endif

<!-- Iconified modal -->
<div id="upload-image-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-upload mr-2"></i> &nbsp;{{trans('app.upload')}}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <input type="file" id="image-input" data-fouc>
            </div>
        </div>
    </div>
</div>
<!-- /iconified modal -->


@push('script')
    <script src="{{asset('global_assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script src="{{asset('global_assets/js/demo_pages/uploader_bootstrap.js')}}"></script>
    <script>
        let image_input = $('#image-input');
        image_input.fileinput({
            browseLabel: Lang.get('app.choose file'),
            uploadLabel: Lang.get('app.upload'),
            removeLabel: Lang.get('app.delete'),
            dropZoneTitle: Lang.get('app.drop'),
            uploadUrl: '{{route('files.single')}}',
            uploadAsync: false,
            maxFileCount: 1,
            initialPreview: [],
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            fileActionSettings: {
                zoomIcon: '<i class="icon-zoomin3"></i>',
                zoomClass: '',
                indicatorSuccess: '<i class="icon-checkmark3 file-icon-large text-success"></i>',
                indicatorError: '<i class="icon-cross2 text-danger"></i>',
                indicatorLoading: '<i class="icon-spinner2 spinner text-muted"></i>',
            },
            layoutTemplates: {
                icon: '<i class="icon-file-check"></i>',
                modal: modalTemplate
            },
            initialCaption: Lang.get('app.No file selected'),
            previewZoomButtonClasses: previewZoomButtonClasses,
            previewZoomButtonIcons: previewZoomButtonIcons,
            uploadExtraData: {
                model: '{{$route}}'
            }
        });
        image_input.on('filebatchuploadsuccess', function (event, data, previewId, index) {
            let response = data.response;
            let path = response.path;
            $('#path-holder').val(path);
            $('#path-icon-div').html('<i class="icon-file-check"></i>');
            setTimeout(function () {
                $('#image-input').fileinput('clear');
                $('#upload-image-modal').modal('hide');
            }, 1000);
        });
    </script>
@endpush