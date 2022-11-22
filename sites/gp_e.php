
<!-- SITE DATA -->
<?php
  
include '../database/database.php';
 
  session_start();
    
  $site = "GP Nagata - Exec";
  $active = "Activate";

  $queryStatus = "SELECT * FROM site WHERE site_name='$site'";
  $resultStatus = mysqli_query($con, $queryStatus);
  while ($row = mysqli_fetch_assoc($resultStatus)) {

  $time = time();

  $_SESSION['id'] = $row['id'];

  if (isset($_SESSION['id'])) {
    mysqli_query($con, "UPDATE site SET site_status='$time' WHERE id ='".$_SESSION['id']."'");
  } 

}

?>








<!-- INSERT DATA -->
<?php

include '../database/database.php';

if (isset($_GET['save'])) {

$site_name = $_GET['site_name'];
$video = $_GET['video'];
$video_name = $_GET['video_name'];
$duration = $_GET['duration'];
$category = $_GET['category'];
$video_status = $_GET['video_status'];
$count = $_GET['count'];
$views = $_GET['views'];
$date_published = $_GET['date_published'];
$name = $_GET['name'];
$end_start = $_GET['end_start'];

    mysqli_query($con,"INSERT INTO playlist_data ( video, video_name, duration, site_name, category, video_status, count, views, date_published, name, end_start) 
                       VALUES ( '$video', '$video_name', '$duration', '$site_name', '$category', '$video_status', '$count', '$views', '$date_published', '$name', '$end_start')");

       }

?>







<!-- UPDATE DATE PER LIMIT -->
<?php

include '../database/database.php';

if (isset($_GET['save'])) {


// HOURS //
  date_default_timezone_set('Asia/Manila');
  $hour = date('H');
  $datenow =  time();

// DAYS //
    $days=date('D');
    
    $sunday="Sun";
    $saturday="Sat";
    $friday="Fri";
    $thursday="Thu";
    $wednesday="Wed";
    $tuesday="Tue";
    $monday="Mon";

// DATE START & DATE END //
    $date=date('Y-m-d');


$site_name = $_GET['site_name'];
$video = $_GET['video'];
$video_name = $_GET['video_name'];
$duration = $_GET['duration'];
$category = $_GET['category'];
$video_status = $_GET['video_status'];
$count = $_GET['count'];
$views = $_GET['views'];
$date_published = $_GET['date_published'];
$name = $_GET['name'];

$limit = $_GET['limit'];
$id = $_GET['id'];

$in = 1;
$plays = $limit - $in;


// 8PM TO 10PM //
    if($hour >= 8 && $hour < 10) {
    $endtime = strtotime('10:00:00');
    mysqli_query($con,"UPDATE reference SET ET_limit='$plays'  WHERE id = '$id'");
}

// 10PM TO 12PM //
    else if ($hour >= 10 && $hour < 12 ) {
    $endtime = strtotime('12:00:00');
    mysqli_query($con,"UPDATE reference SET TT_limit='$plays'  WHERE id = '$id'");

}

// 12PM TO 2PM //
    else if ($hour >= 12 && $hour < 14) {
    $endtime = strtotime('14:00:00');
    mysqli_query($con,"UPDATE reference SET TTwo_limit='$plays'  WHERE id = '$id'");
}

// 2PM TO 4PM //
    else if ($hour >= 14 && $hour < 16) { 
    $endtime = strtotime('16:00:00');
    mysqli_query($con,"UPDATE reference SET TF_limit='$plays'  WHERE id = '$id'");    
}


// 4PM TO 6PM //
    else if ($hour >= 16 && $hour < 18) {
    $endtime = strtotime('18:00:00');
    mysqli_query($con,"UPDATE reference SET FS_limit='$plays'  WHERE id = '$id'");
    }

 $result = mysqli_query($con, $query);

}

?>








<!-- VIDEO PLAYER DATA AND PLAY BY HOUT AND DAYS -->
<?php

include '../database/database.php';


// HOURS //
  date_default_timezone_set('Asia/Manila');
  $hour = date('H');
  $datenow =  time();

// DAYS //
    $days=date('D');
    
    $sunday="Sun";
    $saturday="Sat";
    $friday="Fri";
    $thursday="Thu";
    $wednesday="Wed";
    $tuesday="Tue";
    $monday="Mon";

// DATE START & DATE END //
    $date=date('Y-m-d');

  $video_fil = array();


// 8PM TO 10PM //
    if($hour >= 8 && $hour < 10) {
    $endtime = strtotime('10:00:00');

    $query = mysqli_query($con, "SELECT * FROM playlist_video  WHERE site_name='$site' AND video_status='$active'
                                 ORDER BY id ASC"); 
    while($row = mysqli_fetch_assoc($query)) {

        $video_fil[] = $row['video'];
    }

    $view = "SELECT * FROM reference WHERE g_date = '$date' AND site_name = '$site' AND ET_limit > 0 AND video_status = '$active' AND
                                           video IN ( '" . implode( "', '" , $video_fil ) . "' ) ORDER BY id ASC ";
}



// 10PM TO 12PM //
    else if ($hour >= 10 && $hour < 12 ) {
    $endtime = strtotime('12:00:00');

    $query = mysqli_query($con, "SELECT * FROM playlist_video  WHERE site_name='$site' AND video_status='$active'
                                 ORDER BY id ASC"); 
    while($row = mysqli_fetch_assoc($query)) {

        $video_fil[] = $row['video'];
    }

    $view = "SELECT * FROM reference WHERE g_date='$date' AND site_name='$site' AND  TT_limit > 0 AND video_status='$active' AND
                                           video IN ( '" . implode( "', '" , $video_fil ) . "' ) ORDER BY id ASC ";
}



// 12PM TO 2PM //
    else if ($hour >= 12 && $hour < 14) {
    $endtime = strtotime('14:00:00');

    $query = mysqli_query($con, "SELECT * FROM playlist_video  WHERE site_name='$site' AND video_status='$active'
                                 ORDER BY id ASC"); 
    while($row = mysqli_fetch_assoc($query)) {

        $video_fil[] = $row['video'];
    }

    $view = "SELECT * FROM reference WHERE g_date='$date' AND site_name='$site' AND TTwo_limit > 0 AND video_status='$active' AND
                                           video IN ( '" . implode( "', '" , $video_fil ) . "' ) ORDER BY id ASC ";
}



// 2PM TO 4PM //
    else if ($hour >= 14 && $hour < 16) {
    $endtime = strtotime('16:00:00'); 

    $query = mysqli_query($con, "SELECT * FROM playlist_video  WHERE site_name = '$site' AND video_status = '$active'
                                 ORDER BY id ASC"); 
    while($row = mysqli_fetch_assoc($query)) {

        $video_fil[] = $row['video'];
    }

    $view = "SELECT * FROM reference WHERE g_date='$date' AND site_name='$site' AND TF_limit > 0 AND video_status='$active' AND
                                           video IN ( '" . implode( "', '" , $video_fil ) . "' ) ORDER BY id ASC ";    
}



// 4PM TO 6PM //
    else if ($hour >= 16 && $hour < 18) {
    $endtime = strtotime('18:00:00');

    $query = mysqli_query($con, "SELECT * FROM playlist_video  WHERE site_name='$site' AND video_status='$active'
                                 ORDER BY id ASC"); 
    while($row = mysqli_fetch_assoc($query)) {

        $video_fil[] = $row['video'];
    }

    $view = "SELECT * FROM reference WHERE g_date='$date' AND site_name='$site' AND FS_limit > 0 AND video_status='$active' AND
                                           video IN ( '" . implode( "', '" , $video_fil ) . "' ) ORDER BY id ASC ";
}



 $result = mysqli_query($con, $view);



// VIDEO //
  $content = array();
  foreach ($result as $data) {
      $video = $data['video'];
      array_push($content, $video,);
      $array = array($content);
    }
  $video = json_encode($content);

  $A = end($content);
  $AA = json_encode($A);


// DURATION //
  $length = array();
  foreach ($result as $data) {
      $duration = $data['duration'];
      array_push($length, $duration,);
      $array = array($length);
    }
  $duration = json_encode($length);

  $B = end($length);
  $BB = json_encode($B);


// TITLE //
  $jojo = array();
  foreach ($result as $data) {
      $video_name = $data['video_name'];
      array_push($jojo, $video_name,);
      $array = array($jojo);
    }
  $video_name = json_encode($jojo);

  $C = end($jojo);
  $CC = json_encode($C);


// SITE NAME //
  $site = array();
  foreach ($result as $data) {
      $site_name = $data['site_name'];
      array_push($site, $site_name,);
      $array = array($site);
    }
  $site_name = json_encode($site);

  $D = end($site);
  $DD = json_encode($D);


// VIDEO STATUS //
  $cate = array();
  foreach ($result as $data) {
      $category = $data['category'];
      array_push($cate, $category,);
      $array = array($cate);
    }
  $category = json_encode($cate);

  $E = end($cate);
  $EE = json_encode($E);


// CATEGORY //
  $active = array();
  foreach ($result as $data) {
      $video_status = $data['video_status'];
      array_push($active, $video_status,);
      $array = array($active);
    }
  $video_status = json_encode($active);

  $F = end($active);
  $FF = json_encode($F);


//SPOTS limit
  $spots = array();
  foreach ($result as $data) {
    if ($hour >= 8 && $hour < 10){
      $count = $data['ET_limit'];
  }
  else if ($hour >= 10 && $hour < 12){
      $count = $data['TT_limit'];
  }
  else if ($hour >= 12 && $hour < 14){
      $count = $data['TTwo_limit'];
  }
  else if ($hour >= 14 && $hour < 16){
      $count = $data['TF_limit'];
  }
  else if ($hour >= 16 && $hour < 18){
      $count = $data['FS_limit'];
  }
      array_push($spots, $count,);
      $array = array($spots);
  }

  $count = json_encode($spots);

  $G = end($spots);
  $GG = json_encode($G);


// DATE published //
  $date_time = array();
  foreach ($result as $data) {
      $date = $data['date_published'];
      array_push($date_time, $date,);
      $array = array($date_time);
    }
  $date = json_encode($date_time);

  $time = end($date_time);
  $time_date = json_encode($time);


// NAME //
  $name = array();
  foreach ($result as $data) {
      $namejojo = $data['name'];
      array_push($name, $namejojo,);
      $array = array($name);
    }
  $namejojo = json_encode($name);

  $name_jojo = end($name);
  $jojo = json_encode($name_jojo);


// NAME //
  $id = array();
  foreach ($result as $data) {
      $id_jojo_id = $data['id'];
      array_push($id, $id_jojo_id,);
      $array = array($id);
    }
  $id_jojo_id = json_encode($id);

  $id_jojo = end($id);
  $jojoid = json_encode($id_jojo);


// SPOTS //
  $spotscount = array();
  foreach ($result as $data) {
      $countspot = $data['count'];
      array_push($spotscount, $countspot,);
      $array = array($spotscount);
    }
  $countspot = json_encode($spotscount);

  $Z = end($spotscount);
  $ZZ = json_encode($Z);

// END DATE //
  $end_date = array();
  foreach ($result as $data) {
      $datenow = $data['end_start'];
      array_push($end_date, $datenow,);
      $array = array($end_date);
    }
  $datenow = json_encode($end_date);

  $M = end($end_date);
  $MM = json_encode($M);


?>





<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script> 

</head>

<style type="text/css">
* {
  padding: 0;
  margin: 0;
}

body {
  background-position: center center;
  background-size: auto;
  position: absolute;
  overflow-x: hidden;
  overflow-y: hidden;
  width: 100%;
  height: 100vh;
}

.player-container {
  width: 100%;
  height: 100vh;
  position: relative;
  background: white;
  overflow: hidden;

}
</style>

<body>


<video src="<?=$A;?>" id="video" type="video/mp4" class="player-container" autoplay muted ></video>

<br>
<br>

<label> Last Content </label>

<!-- FORM DATA AND SAVE -->
<form id="myFormA" method="GET" >

<input type="text" name="id"  value="<?=$id_jojo;?>">

<input type="text" name="video"  value="<?=$A;?>">

<input type="text" name="video_name"  value="<?=$C;?>">
<input type="int"  name="duration" id="duration_a" value="<?=$B;?>">
<input type="text" name="site_name"  value="<?=$D;?>">
<input type="text" name="category"  value="<?=$E;?>">
<input type="text" name="video_status"  value="<?=$F;?>">

<input type="int"  name="limit"  value="<?=$G;?>">

<input type="int"  name="date_published"  value="<?=$time;?>">
<input type="int"  name="name"  value="<?=$name_jojo;?>">

<input type="int" name="count" value="<?=$Z;?>">
<input type="int" name="end_start" value="<?=$M;?>">

<input type="int" name="views" value="1">

<input type="submit" name="save" id="A">

</form>

<!-- TIME CLICK -->
<div id='Label'> </div>

<br>
<br>

<label> Previews Content </label>

<!-- FORM DATA AND SAVE -->
<form id="myFormB" method="GET" >

    <input type="text" name="id" id="id_jojo_id" value="id">

    <input type="text" name="video" id="video1" value="Content">

    <input type="text" name="video_name" id="jojo" value="Title">
    <input type="int"  name="duration" id="length" value="Duration">
    <input type="text" name="site_name" id="site" value="Site">
    <input type="text" name="category" id="cate" value="Category">
    <input type="text" name="video_status" id="active" value="Status">

    <input type="int"  name="limit"  id="count" value="count">

    <input type="int"  name="date_published" id="date" value="date_time">
    <input type="int"  name="name" id="namejojo" value="name">

    <input type="int" name="count" id="countspot" value="spot">
    <input type="int" name="end_start" id="datenow" value="date">

    <input type="int" name="views" value="1">
    <input type="submit" name="save" id="B">

</form>

<!-- TIME CLICK -->
<div id='Label1'> </div>



<!-- VIDEO PLAYER -->
<script type="text/javascript">

// VIDEO //    
var database_videos = <?php echo $video;?>; 

// INFO //
var database_sites = <?php echo $site_name;?>;
var database_jojos = <?php echo $video_name;?>; 
var database_lengths = <?php echo $duration;?>;
var database_categorys = <?php echo $category;?>;
var database_video_status = <?php echo $video_status;?>;
var database_count = <?php echo $count;?>;
var database_date_time = <?php echo $date;?>;
var database_name = <?php echo $namejojo;?>;
var database_id = <?php echo $id_jojo_id;?>;
var database_spot = <?php echo $countspot;?>;
var database_date = <?php echo $datenow;?>;

//last content
var id_jojo = <?php echo $jojoid;?>;
console.log(id_jojo);

//last content
var A = <?php echo $AA;?>;
console.log(A);


//last duration
var B = <?php echo $BB;?>;
console.log(B);


//last duration
var C = <?php echo $CC;?>;
console.log(C);


//last duration
var D = <?php echo $DD;?>;
console.log(D);


//last duration
var E = <?php echo $EE;?>;
console.log(E);


//last duration
var F = <?php echo $FF;?>;
console.log(F);


//last duration
var G = <?php echo $GG;?>;
console.log(G);

//last content
var Z = <?php echo $ZZ;?>;
console.log(Z);

//last content
var M = <?php echo $MM;?>;
console.log(M);

//last duration
var time = <?php echo $time_date;?>;
console.log(time);

//last duration
var name_jojo = <?php echo $jojo;?>;
console.log(name_jojo);

// VIDEO //
var id_jojo_id = document.getElementById('id_jojo_id');
var video = document.getElementById('video');

// INFO //
var site = document.getElementById('site');
var video1 = document.getElementById('video1');
var jojo = document.getElementById('jojo');
var length = document.getElementById('length');
var cate = document.getElementById('cate');
var active = document.getElementById('active');
var count = document.getElementById('count');
var date = document.getElementById('date');
var namejojo = document.getElementById('namejojo');
var countspot = document.getElementById('countspot');
var datenow = document.getElementById('datenow');

// PLAY //
var content = -1;

  video.addEventListener('ended', function(e) {
  content = (++content) % database_videos.length;
  site.value = database_sites[content];
  video1.value = database_videos[content];
  jojo.value = database_jojos[content];
  cate.value = database_categorys[content];
  active.value = database_video_status[content];
  count.value = database_count[content];
  date.value = database_date_time[content];
  namejojo.value = database_name[content];
  id_jojo_id.value = database_id[content];
  countspot.value = database_spot[content];
  datenow.value = database_date[content];

  video.src = database_videos[content];
  video.play(); 

  //current video name
  var one = database_videos[content];
  
  //last in the list video name
  var end = A;

  if(one == end) {
  window.location.reload(true); 

  }

  else {

  }


// SAVE FORM WITHOUT RELOAD BUTTON B //
var time = length.value = database_lengths[content];
interval = window.setInterval(function() {
    time--;
    document.getElementById('Label1').textContent = "" + time + " seconds"
    if (time == 0) {
        // stop timer
        clearInterval(interval);
        // click
        document.getElementById('B').click();            
    }
}, 1000)

});


// SAVE FORM WITHOUT RELOAD BUTTON A //
var timea = (document.getElementById("duration_a").value);
intervala = window.setInterval(function() {
    timea--;
    document.getElementById('Label').textContent = "" + timea + " seconds"
    if (timea == 0) {
        // stop timer
        clearInterval(intervala);
        // click
        document.getElementById('A').click();            
    }
}, 1000)

</script>





<!-- SAVE FORM WITHOUT RELOAD-->
   <script>
     $(function() {
       $('#myFormA').ajaxForm(function() {
       });
     });
   </script>

<!-- SAVE FORM WITHOUT RELOAD-->
   <script>
     $(function() {
       $('#myFormB').ajaxForm(function() {
       });
     });
   </script>

<br>
<br>


<label> Site On / Off </label>
      <!-- SITE DATA -->
      <form method="GET" >

        <input type="text" id="title" value="GP Nagata - Exec" readonly>
        <input type="text" id="time_on"  value="<?php date_default_timezone_set('Asia/Manila');echo date('y-m-d-h:i:s'); ?>" readonly>        
        <input type="text" id="blog_id" readonly>
        
      </form>

<script>
   $(document).ready(function(){
  function AutoSave(){
    _autosave = setInterval(function(){
      var title = $('#title').val();
      var time_on = $('#time_on').val();
      var blog_id = $('#blog_id').val();
   
        if(title != "" && time_on != "" ){
          $.ajax({
          url: 'js/time-on.php',
          type: 'POST',
          data: {title: title, time_on: time_on, blog_id: blog_id},
          success: function(data){
            if(data != ""){
              $('#blog_id').val(data);
            }
          
          }
        
        });
      
      }
    
    }, 250);
  
  }AutoSave();

});
</script>

<script>
$(document).ready(function(){
  var _autosave;
  $(window).on("beforeunload", function() { 
    clearInterval(_autosave);
    var title = $('#title').val();
    var blog_id = $('#blog_id').val();
 
      if(title != ""){
        $.ajax({
        url: 'js/time-off.php',
        type: 'POST',
        data: {title: title, blog_id: blog_id},
        success: function(){
          $('#title').val('');
          $('#blog_id').val('');
          AutoSave();
        }
      
      });
    
    }

  });
 
});
</script>

<script>
  $(window).on("beforeunload", function() { 
    $.ajax({
        type: 'POST',
        url: 'js/gp_e.php'
    });
});
</script>

</body>
</html>

