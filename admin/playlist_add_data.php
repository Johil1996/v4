<?php

include 'database/database.php';

if(isset($_GET['save'])) {

$video = $_GET['video'];
$video_name = $_GET['video_name'];
$video_status = $_GET['video_status'];
$duration = $_GET['duration'];
$category = $_GET['category'];
$videojojo_id = $_GET['videojojo_id'];

$video_spots_no_yes = $_GET['video_spots_no_yes'];

$spots = $_GET['spots'];

$count = $_GET['count'];


$play_start = $_GET['play_start'];
$end_start = $_GET['end_start'];
$days_appearance = $_GET['days_appearance'];
$campaign_duration = $_GET['campaign_duration'];

$number_of_sites = $_GET['number_of_sites'];
$name = $_GET['name'];
$active = $_GET['active'];



// SPOTS //
$total_spots = $_GET['total_spots'];
$total_frequency = $_GET['total_frequency'];
$total_spots_per_day = $_GET['total_spots_per_day'];

// SPOTS PER SITE //
$total_spots_per_site = $_GET['total_spots_per_site'];
$total_frequency_per_site = $_GET['total_frequency_per_site'];
$total_spots_per_site_per_day = $_GET['total_spots_per_site_per_day'];

// SPOTS PRICES //
$total_price = $_GET['total_price'];
$prices = $_GET['prices'];

$jojo = $_GET['jojo']; // loops

$eigth_to_ten = $_GET['eigth_to_ten'];
$ten_to_twelve = $_GET['ten_to_twelve'];
$twelve_to_two = $_GET['twelve_to_two'];
$two_to_four = $_GET['two_to_four'];
$four_to_six = $_GET['four_to_six'];

$monday = $_GET['monday'];
$tuesday = $_GET['tuesday'];
$wednesday = $_GET['wednesday'];
$thursday = $_GET['thursday'];
$friday = $_GET['friday'];
$saturday = $_GET['saturday'];
$sunday = $_GET['sunday'];

$video_spots_no_yes = $_GET['video_spots_no_yes'];

$AA = $_GET['AA'];
$BB = $_GET['BB'];
$CC = $_GET['CC'];
$DD = $_GET['DD'];
$EE = $_GET['EE'];

$sites = [];
$sites = $_GET['site_name'];

foreach($sites as $site_name) {

mysqli_query($con, "INSERT INTO `playlist_video`(video, video_name, video_status, duration, site_name, category,   
                                                 eigth_to_ten, ten_to_twelve, twelve_to_two, two_to_four, four_to_six, 
                                                 monday, tuesday, wednesday, thursday, friday, saturday, sunday,
                                                 AA, BB, CC, DD, EE, 
                                                 play_start, end_start,
                                                 days_appearance, number_of_sites, prices, total_spots_per_site,
                                                 total_spots, total_price, spots, jojo, name, campaign_duration, active, total_frequency, total_frequency_per_site,
                                                 total_spots_per_day, total_spots_per_site_per_day, count, video_spots_no_yes, videojojo_id)

VALUES ('$video', '$video_name', '$video_status', '$duration', '$site_name', '$category',  
'$eigth_to_ten', '$ten_to_twelve', '$twelve_to_two', '$two_to_four', '$four_to_six', 
'$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday',
'$AA', '$BB', '$CC', '$DD', '$EE',
'$play_start', '$end_start',
'$days_appearance', '$number_of_sites', '$prices', '$total_spots_per_site',
'$total_spots', '$total_price', '$spots', '$jojo', '$name', '$campaign_duration', '$active', '$total_frequency', '$total_frequency_per_site',
'$total_spots_per_day', '$total_spots_per_site_per_day', '$count', '$video_spots_no_yes', '$videojojo_id')");

              } 


        }

?>






<?php

$ETadd = 0;
$TTadd = 0;
$TTwoadd = 0;
$TFadd = 0;
$FSadd = 0;

$spot_remaining = 0;
$spots_totals = 0;

$content_spots = $spots;
$total_spots1 = $total_frequency;

// date duration
$begin = new DateTime( $play_start );
$end = new DateTime( $end_start );
$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end->modify( '+1 day' ));



//if monday 
foreach ($sites as $site_name) {

         $spot_remaining += $spot_remaining;

foreach ($period as $dt) {

         $date1 = $dt->format('l');
         $date2 = substr($date1, 0, 3);




//table monday
if ($date2 == $monday) {
    $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

   ( $spot_remainings = $ETenter + 
                        $TTenter + 
                        $TTwoenter + 
                        $TFenter + 
                        $FSenter ) ;

    $total_spots1 = $total_spots1 - $spot_remainings ;

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");


    
    }
                  }









//table tuesday
else if ($date2 == $tuesday) {
             $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

   ( $spot_remainings = $ETenter + 
                        $TTenter + 
                        $TTwoenter + 
                        $TFenter + 
                        $FSenter ) ;

    $total_spots1 = $total_spots1 - $spot_remainings ;

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");

    
    }
                  }








//table wednesday
else if ($date2 == $wednesday) {
             $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

   ( $spot_remainings = $ETenter + 
                        $TTenter + 
                        $TTwoenter + 
                        $TFenter + 
                        $FSenter ) ;

    $total_spots1 = $total_spots1 - $spot_remainings ;

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");


    
    }
                  }







//table thursday                 
else if ($date2 == $thursday) {
         $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

   ( $spot_remainings = $ETenter + 
                        $TTenter + 
                        $TTwoenter + 
                        $TFenter + 
                        $FSenter ) ;

    $total_spots1 = $total_spots1 - $spot_remainings ;

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");


    
    }
                  }






//table thursday                 
else if ($date2 == $thursday) {
         $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

  ($spot_remainings = $ETenter + 
                       $TTenter + 
                       $TTwoenter + 
                       $TFenter + 
                       $FSenter);

  ($total_spots1 = $total_spots1 - 
                    $spot_remainings);

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");

    
    }
                  }









//table friday                 
else if ($date2 == $friday){
         $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 


  ($spot_remainings = $ETenter + 
                       $TTenter + 
                       $TTwoenter + 
                       $TFenter + 
                       $FSenter);

  ($total_spots1 = $total_spots1 - 
                    $spot_remainings);


    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");


    
    }
                  }









//table saturday                 
else if ($date2 == $saturday) {
         $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

   ( $spot_remainings = $ETenter + 
                        $TTenter + 
                        $TTwoenter + 
                        $TFenter + 
                        $FSenter ) ;

    $total_spots1 = $total_spots1 - $spot_remainings ;

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");

    
    }
                  }








//table sunday                 
else if ($date2 == $sunday) {
         $g = $dt->format("y-m-d");

    //GETTING THE MAX VALUE OF SPOTS PER TIME SLOT
    $query_run = mysqli_query($con,"SELECT max(gg),max(TTspots) as TT, 
                                           max(ETspots) as ET,
                                           max(TTwospots) as TTwo, 
                                           max(TFspots) as TF, 
                                           max(FSspots) as FS, g_date 

                                           FROM reference WHERE g_date = '$g' AND site_name = '$site_name'");

    while ($row=mysqli_fetch_assoc($query_run)) {

    $ETspot_remaining = 0;
    $TTspot_remaining = 0;
    $TTwospot_remaining = 0;
    $TFspot_remaining = 0;
    $FSspot_remaining = 0;

    $AA2 = (int)$AA;   //($AA * 3); //spots per day
    $BB2 = (int)$BB;   //($BB * 3); //spots per day
    $CC2 = (int)$CC;   //($CC * 3); //spots per day
    $DD2 = (int)$DD;   //($DD * 3); //spots per day
    $EE2 = (int)$EE;   //($EE * 3); //spots per day

    //add the max spots + SPOTS from input
    $ETadd = $row['ET'] + $AA2;
    $TTadd = $row['TT'] + $BB2;
    $TTwoadd = $row['TTwo'] + $CC2;
    $TFadd = $row['TF'] + $DD2;
    $FSadd = $row['FS'] + $EE2;

    //CHECK IF THE SPOT OF TIMESLOT IS GREATER THAT 480 then minus till it equals to 480
    while ( $ETadd > 480 ) {
          ( $ETadd -= 1 );
          ( $ETspot_remaining += 1 );
    }

    while ( $TTadd > 480 ) {
          ( $TTadd -= 1);
          ( $TTspot_remaining += 1 );
    }

    while ( $TTwoadd > 480 ) {
          ( $TTwoadd -= 1 );
          ( $TTwospot_remaining += 1 );
    }

    while ( $TFadd > 480 ) {
          ( $TFadd -= 1 );
          ( $TFspot_remaining += 1 );
    }

    while ( $FSadd > 480 ) {
          ( $FSadd -= 1 );
          ( $FSspot_remaining += 1 );
    }

    //GET THE CURRENT SPOT OF SPECIFIC TIME SLOT then minus it on input timeslot spot
    $ETenter = $AA2 - $ETspot_remaining;
    $TTenter = $BB2 - $TTspot_remaining;
    $TTwoenter = $CC2 - $TTwospot_remaining;
    $TFenter = $DD2 - $TFspot_remaining;
    $FSenter = $EE2 - $FSspot_remaining;

    // equals zero if negative value
    if ( $ETenter > 0 ) {
    }

    else {
        $ETenter = 0;
    }



    if ( $TTenter > 0 ) {
    }

    else {
        $TTenter = 0;
    } 



    if ( $TTwoenter > 0 ) {
    }

    else {
        $TTwoenter = 0;
    } 



    if ( $TFenter > 0 ) {
    }

    else {
        $TFenter = 0;
    }



    if ( $FSenter > 0 ) {
    }

    else {
        $FSenter = 0;
    } 

   ( $spot_remainings = $ETenter + 
                        $TTenter + 
                        $TTwoenter + 
                        $TFenter + 
                        $FSenter ) ;

    $total_spots1 = $total_spots1 - $spot_remainings ;

    //insert into reference table
    mysqli_query($con, "INSERT INTO `reference`(site_name, video, video_name, duration, category, video_status, jojo, name, 
                                                play_start, end_start, days_appearance, 
                                                total_spots, total_price, total_spots_per_site,
                                                ETspots, TTspots, TTwospots, TFspots ,FSspots, 
                                                ET_limit, TT_limit, TTwo_limit, TF_limit, FS_limit, 
                                                g_date, count, total_frequency, prices, total_frequency_per_site,
                                                total_spots_per_day, total_spots_per_site_per_day, number_of_sites, video_spots_no_yes, videojojo_id)

                        VALUES ('$site_name','$video', '$video_name', '$duration', '$category', '$video_status', '$jojo', '$name',
                                '$play_start','$end_start', '$days_appearance',
                                '$total_spots', '$total_price', '$total_spots_per_site',
                                '$ETadd', '$TTadd', '$TTwoadd', '$TFadd', '$FSadd', 
                                '$ETenter', '$TTenter', '$TTwoenter', '$TFenter', '$FSenter', '$g', 
                                '$count', '$total_frequency', '$prices', '$total_frequency_per_site',
                                '$total_spots_per_day', '$total_spots_per_site_per_day', '$number_of_sites', '$video_spots_no_yes', '$videojojo_id')");

    
    }
                  }




   }


                   echo "<script>alert('Successfull upload Content')</script>";
                   echo "<script>window.location = 'content.php'</script>";  




}

?>



