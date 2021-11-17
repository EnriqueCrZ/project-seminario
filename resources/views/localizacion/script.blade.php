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
        @foreach($activities as $activity)

        const svgMarker = {
            path: "M10.453 14.016l6.563-6.609-1.406-1.406-5.156 5.203-2.063-2.109-1.406 1.406zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z",
            fillColor: "{{$colors[$activity->id_activity]}}",
            fillOpacity: 0.6,
            strokeWeight: 0,
            rotation: 0,
            scale: 2,
            anchor: new google.maps.Point(15, 30),
        };

        const markerOrigin{{$loop->iteration}} = new google.maps.Marker({
            position: {lat: {{$activity->origin_latitude}}, lng: {{$activity->origin_longitude}}},
            map,
            title: "{{$activity->description}} - {{$activity->origin_name}}",
            icon: svgMarker
        });
        const markerDestiny{{$loop->iteration}} = new google.maps.Marker({
            position: {lat: {{$activity->destiny_latitude}}, lng: {{$activity->destiny_longitude}}},
            map,
            title: "{{$activity->description}} - {{$activity->destiny_name}}",
            icon: svgMarker
        });

        const polyline{{$loop->iteration}} = [
            {lat:{{$activity->origin_latitude}}, lng: {{$activity->origin_longitude}} },
            {lat:{{$activity->destiny_latitude}}, lng: {{$activity->destiny_longitude}} }
        ]

        const route{{$loop->iteration}} = new google.maps.Polyline({
            path: polyline{{$loop->iteration}},
            geodesic: true,
            strokeColor: "{{$colors[$activity->id_activity]}}",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        })

        route{{$loop->iteration}}.setMap(map);

        markerOrigin{{$loop->iteration}}.addListener("click",() => {
            infoWindow.close();
            infoWindow.setContent(markerOrigin{{$loop->iteration}}.getTitle());
            infoWindow.open(markerOrigin{{$loop->iteration}}.getMap(), markerOrigin{{$loop->iteration}});
        });
        markerDestiny{{$loop->iteration}}.addListener("click",() => {
            infoWindow.close();
            infoWindow.setContent(markerDestiny{{$loop->iteration}}.getTitle());
            infoWindow.open(markerDestiny{{$loop->iteration}}.getMap(), markerDestiny{{$loop->iteration}});
        });
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
