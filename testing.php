<?php
    require_once 'ServerRequest/vendor/autoload.php';
    $google_places = new joshtronic\GooglePlaces('AIzaSyCmNbUXHobJ2CToGgoRuMl7GB54e1G1W1Q');
    $response = array();
    $current_lat = 3.1466;
    $current_lng =  101.6958;
    $google_places->location = array($current_lat, $current_lng);
    $google_places->radius   = 1000;
    $google_places->types    = 'restaurant'; // Requires keyword, name or types
    $results                 = $google_places->nearbySearch();
    $place = $results['results'];
    
    for($x =0 ; $x<sizeof($place);$x++) {
        $foodDetail = array();
        $lat = $place[$x]['geometry']['location']['lat'];
        $lng = $place[$x]['geometry']['location']['lng'];
        $distance = distanceCalculation($current_lat,$current_lng,$lat,$lng);
        array_push($response,array(
            'name' => $place[$x]['name'],
            'distance'=>$distance,
            'detail'=> array(
                'name'=>'apple',
                'cal' => 2,
            ),
        ));
    }
    echo json_encode($response);
    
    function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long) {
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
        $distance = $degrees * 69.05482;
        return round($distance, 2);
    }
    function distance($lat1, $lon1, $lat2, $lon2) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        
        return $miles;
    }
   
    
   
?>