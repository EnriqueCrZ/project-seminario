<script type="text/javascript">

    let map;
    const infoWindow = new google.maps.InfoWindow();

    function initMap(){
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
</script>
