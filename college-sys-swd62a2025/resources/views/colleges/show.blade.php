@extends('layouts.main')
@section('content')
    <?php
        $location = $collegeById->address;
        $apiKey = "AIzaSyCyNWO2sFmxLTCJ7nB6BvDN--IYOem2HT0";

        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($location) . "&key=" . $apiKey;
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data['status'] == "OK") {
            $latitude = $data['results'][0]['geometry']['location']['lat'];
            $longitude = $data['results'][0]['geometry']['location']['lng'];
        } else {
            $latitude = 0;
            $longitude = 0;
            $error_message = "Geocode was not successful: " . $data['status'];
        }
    ?>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyNWO2sFmxLTCJ7nB6BvDN--IYOem2HT0" async defer></script>

    <script>
        function initMap() {
            // Set up the map using PHP variables for lat and lng
            var location = { 
                lat: <?php echo $latitude; ?>, 
                lng: <?php echo $longitude; ?> };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: location
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: "<?php echo $location; ?>"
            });
        }

        window.addEventListener('load', function () {
            initMap();
        })
    </script>
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">College Management</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('colleges.index') }}">
                            <i class="fa-solid fa-building-columns"></i>
                            <span class="px-2">All colleges</span>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="fa-solid fa-chevron-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $collegeById->name }}</a>
                    </li>
                </ul>
            </div>
            <div class="page-category">
                <h5>{{ $collegeById->name }}</h5>
                <p><strong>Address: </strong>{{ $collegeById->address }}</p>
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
        </div>
    </div>
@endsection