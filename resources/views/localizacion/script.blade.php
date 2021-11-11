<script type="text/javascript">
    let map;
    @if(isset($locations))

    let infoWindow;

    function initMap(){
        infoWindow = new google.maps.InfoWindow();
        map = new google.maps.Map(document.getElementById('map'),{
            center: { lat: 15.696703, lng: -88.585480},
            zoom: 18,
        });
        @foreach($locations as $location)
        const marker{{$loop->iteration}} = new google.maps.Marker({
            position: {lat: {{$location['latitude']}}, lng: {{$location['longitude']}}},
            map,
            title: "{{$location['location']}}"
        });

        marker{{$loop->iteration}}.addListener("click",() => {
            infoWindow.close();
            infoWindow.setContent(marker{{$loop->iteration}}.getTitle());
            infoWindow.open(marker{{$loop->iteration}}.getMap(), marker{{$loop->iteration}});
        })
        @endforeach

    }
    @elseif(isset($allowMapsAPI))

    let marker = false;

    function initMap(){
        map = new google.maps.Map(document.getElementById('mapPicker'),{
            center: { lat: 15.696703, lng: -88.585480},
            zoom: 18,
        });

        google.maps.event.addListener(map, 'click', function(event){
            let clickedLocation = event.latLng;
            if(marker === false){
                marker = new google.maps.Marker({
                    position: clickedLocation,
                    map: map,
                    draggable: true,
                });

                google.maps.event.addListener(marker, 'dragend',function(event){
                    markerLocation();
                });
            }else{
                marker.setPosition(clickedLocation);
            }

            markerLocation();
        });
    }

    function markerLocation(){
        let currentLocation = marker.getPosition();

        $('#latitude').val(currentLocation.lat());
        $('#longitude').val(currentLocation.lng());
    }
    @endif
</script>
