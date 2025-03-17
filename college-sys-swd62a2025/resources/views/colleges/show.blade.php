@extends('layouts.main')
@section('content')
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
                <h5><strong>{{ $collegeById->name }}</strong></h5>
                <p><strong>Address: </strong>{{ $collegeById->address }}</p>

                <?php
                    $location = $collegeById->address;
                    $apiKey = "AIzaSyCyNWO2sFmxLTCJ7nB6BvDN--IYOem2HT0";

                    $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($location) . "&key=" . $apiKey;
                    $response = file_get_contents($url);
                    $data = json_decode($response, true);

                    if ($data['status'] == "OK") {
                        $latitude = $data['results'][0]['geometry']['location']['lat'];
                        $longitude = $data['results'][0]['geometry']['location']['lng'];
                    ?>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyNWO2sFmxLTCJ7nB6BvDN--IYOem2HT0" async
                        defer></script>

                    <script>
                        function initMap() {
                            var location = {
                                lat: <?php echo $latitude; ?>,
                                lng: <?php echo $longitude; ?>
                            };

                            var map = new google.maps.Map(document.getElementById('college_map'), {
                                zoom: 18,
                                center: location
                            });

                            var marker = new google.maps.Marker({
                                position: location,
                                map: map,
                                title: "<?php    echo $location; ?>"
                            });
                        }

                        window.addEventListener('load', function () {
                            initMap();
                        })
                    </script>

                    <div id="college_map"></div>
                <?php
                    } else {
                        $error_message = "Geocode was not successful: " . $data['status'];
                ?>
                    <div>{{ $error_message }}</div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
@endsection