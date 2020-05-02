<div class="form-group form-group-feedback form-group-feedback-right">
    <input id="location-holder" class="form-control {{ $errors->has($attribute) ? ' border-danger' : '' }}  form-control-lg" type="text"
           name="{{$attribute}}{{isset($array) ? '[]' : ''}}"
           value="{{isset($item) ? $item->$attribute : old($attribute)}}" readonly>
    <div id="location-icon-div" class="form-control-feedback form-control-feedback-lg">
        <a href="#" class="list-icons-item btn-upload" data-toggle="modal" data-trigger="hover"
           data-target="#select-location-modal"><i class="icon-location3"></i></a>
    </div>
</div>
@if($errors->has($attribute))
    <span class="form-text text-danger">
    <strong>{{ $errors->first($attribute) }}</strong>
</span>
@endif

<!-- Iconified modal -->
<div id="select-location-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="icon-upload mr-2"></i> &nbsp;{{trans('app.upload')}}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="map" style="height: 500px;"></div>
            </div>
            <div class="modal-footer">
                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i
                                class="icon-cross2 font-size-base mr-1"></i> {{trans('app.close')}}</button>
                    <button type="submit" class="btn bg-primary btn-save"><i
                                class="icon-paperplane font-size-base mr-1"></i> {{trans('app.save')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /iconified modal -->

@push('script')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAOblI34thlfCg3vS6Y1Li8g0yTbfhDQI&callback=initMap"
            type="text/javascript"></script>
    <script>
        //Set up some of our variables.
        var map; //Will contain map object.
        var marker = false; ////Has the user plotted their location marker?

        //Function called to initialize / create the map.
        //This is called when the page has loaded.
        function initMap() {

            //The center location of our map.
            var centerOfMap = new google.maps.LatLng(21.54238, 39.19797);

            //Map options.
            var options = {
                center: centerOfMap, //Set center.
                zoom: 12, //The zoom value.
                lang: 'ar'
            };

            //Create the map object.
            map = new google.maps.Map(document.getElementById('map'), options);

            //Listen for any clicks on the map.
            google.maps.event.addListener(map, 'click', function (event) {
                //Get the location that the user clicked.
                var clickedLocation = event.latLng;
                //If the marker hasn't been added.
                if (marker === false) {
                    //Create the marker.
                    marker = new google.maps.Marker({
                        position: clickedLocation,
                        map: map,
                        draggable: true //make it draggable
                    });
                    //Listen for drag events!
                    google.maps.event.addListener(marker, 'dragend', function (event) {
                        markerLocation();
                    });
                } else {
                    //Marker has already been added, so just change its location.
                    marker.setPosition(clickedLocation);
                }
                //Get the marker's location.
                markerLocation();
            });
        }

        //This function will get the marker's current location and then add the lat/long
        //values to our textfields so that we can save the location.
        function markerLocation() {
            //Get location.
            var currentLocation = marker.getPosition();
            //Add lat and lng values to a field that we can save.
            // document.getElementById('lat').value = currentLocation.lat(); //latitude
            // document.getElementById('lng').value = currentLocation.lng(); //longitude
        }

        $(document).on('click', '.btn-save', function (e) {
            e.preventDefault();
            var currentLocation = marker.getPosition();
            $('#location-holder').val(currentLocation);
            $('#location-icon-div').html('<i class="icon-file-check"></i>');
            $('#select-location-modal').modal('hide');
        });

    </script>
@endpush