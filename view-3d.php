<?php
// connect to the database
require 'assets/php/connect.php';

// get reservation details
$date = $_GET["date"];
$start_time = $_GET["start_time"];
$end_time = $_GET["end_time"];

    // format date in words
    $date_time = new DateTime($date);
    $date_in_words = $date_time->format('F j, Y');

// Set the timezone to the Philippines
date_default_timezone_set('Asia/Manila');

// Get the current date and time in the Philippines
$currentDateTime = date('Y-m-d H:i');

// Compare the selected date and start time with the current date and time
$selectedDateTime = $date . ' ' . $start_time;
$currentDateTime = date('Y-m-d H:i');

// Fetch start_hour and end_hour from the settings table
// E-library hours
// E-library hours
// E-library hours
// E-library hours
// $settingsSql = "SELECT start_hour, end_hour FROM settings WHERE settings_id = 1"; // Assuming settings_id is 1, modify as needed
// $settingsResult = mysqli_query($conn, $settingsSql);

// if ($settingsResult && mysqli_num_rows($settingsResult) > 0) {
//     $settingsRow = mysqli_fetch_assoc($settingsResult);
//     $dbStartHour = $settingsRow['start_hour'];
//     $dbEndHour = $settingsRow['end_hour'];

//     // Compare with the provided start and end times
//     if ($start_time < $dbStartHour || $end_time > $dbEndHour) {
//         echo '<div class="d-flex justify-content-center align-items-center vh-100" data-aos="fade">
//             <div class="text-center">
//                 <i class="bi bi-exclamation-circle-fill text-danger display-1"></i>
//                 <h5 class="mt-3">Invalid Time Selection</h5>
//                 <p>Please reserve a time from E-library hours. '. date('g:i A' , strtotime($dbStartHour)) .' to '. date('g:i A', strtotime($dbEndHour)) .' </p>
//             </div>
//         </div>';
//         exit(); // Exit early if the times are invalid
//     }
// }
// end E-library hours
// end E-library hours
// end E-library hours
// end E-library hours
// end E-library hours

// Compare the selected date and start time with the current date and time
if (($date == date('Y-m-d')) && ($end_time <= date('H:i', strtotime($currentDateTime)))) {
    // Display the error message with alert()
    echo '<div class="d-flex justify-content-center align-items-center vh-100" data-aos="fade">
        <div class="text-center">
            <i class="bi bi-exclamation-circle-fill text-danger display-1"></i>
            <h5 class="mt-3">Invalid Time Selection</h5>
            <p>Please select another date and time.</p>
        </div>
    </div>';
}


 else {
    // continue with the rest of the code to display the 3D view card and available seats



    // retrieve all seats
    $sql = "SELECT * FROM seat";
    $result = mysqli_query($conn, $sql);

    // retrieve reservations for the specified date and time
    $reservationSql = "SELECT seat_id FROM reservation WHERE date = '$date' AND start_time <= '$end_time' AND end_time >= '$start_time' AND isDone = 0" ;
    $reservationResult = mysqli_query($conn, $reservationSql);
    $reservedSeats = array();

    // collect the reserved seat IDs
    while ($row = mysqli_fetch_assoc($reservationResult)) {
        $reservedSeats[] = $row['seat_id'];
    }

    $st = date('h:i A', strtotime($start_time));
    $et = date('h:i A', strtotime($end_time));

    // display the 3D view card and available seats
    echo '<div id="view-3d"class="card view-3d">
        <div class="card-header">
        <h5> Available Seats </h5><p class="text-muted">'.$date_in_words.' | '.$st.' - '.$et.' </p>
        </div>
        <div class="card-body m-0 p-0">
            <div><model-viewer src="models/6thFloorV2.glb" 
            camera-controls  
            exposure="0.8"
            camera-orbit="0deg 45deg 2m" 
            ar 
            ar-modes="webxr scene-viewer quick-look" 
            shadow-intensity="1" 
            environment-image="models/spruit_sunrise_1k_HDR.hdr">';

    while ($row = mysqli_fetch_assoc($result)) {
        $seat_number = $row['seat_number'];
        $seat_id = $row['seat_id'];
        $surface_data = $row['data_surface'];
        

      // ... Your existing code ...
    if (in_array($seat_id, $reservedSeats)) {
        // Fetch the user who reserved this seat
        $reserved_user_query = "SELECT u.user_id 
                                FROM reservation r
                                JOIN users u ON r.user_id = u.user_id
                                WHERE r.seat_id = $seat_id AND r.isDone = 0";
        $reserved_user_result = mysqli_query($conn, $reserved_user_query);

        if ($reserved_user_result && mysqli_num_rows($reserved_user_result) > 0) {
            $user_row = mysqli_fetch_assoc($reserved_user_result);
            $reserved_user = $user_row['user_id'];

            echo "<button class='btn btn-dark btn-sm Hotspot' 
            style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;' 
            slot='hotspot-$seat_id' data-surface='$surface_data' 
            data-visibility-attribute='visible' 
            disabled><div class='HotspotAnnotation'>S$seat_number<br>Reserved by: $reserved_user</div></button>";
        } else {
            echo "<button class='btn btn-dark btn-sm Hotspot' 
            style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;' 
            slot='hotspot-$seat_id' data-surface='$surface_data' 
            data-visibility-attribute='visible' 
            disabled><div class='HotspotAnnotation'>S$seat_number<br>Error fetching user</div></button>";
        }
    }  else {
        // seat is available, display enabled button
        echo "<button class='btn btn-success btn-sm Hotspot'
        style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'  
        id='seat-$seat_id' 
        slot='hotspot-$seat_id' 
        data-surface='$surface_data' 
        data-visibility-attribute='visible' 
        onclick='reserveSeat($seat_id)'><div class='HotspotAnnotation'>S$seat_number</div></button>";
    }

        
        
        
        
        
        
        
       




    }

    // close the 3D view card and other HTML tags
    echo '</model-viewer></div></div></div>';

    // close the database connection
    mysqli_close($conn);
}
?>

