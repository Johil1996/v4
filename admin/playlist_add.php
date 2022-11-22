<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Live Spot Calculator </title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head> 

<body class="app">    

<?php include'header.php' ?>

    <div class="app-wrapper">
      <div class="app-content pt-3 p-md-3 p-lg-4">

          <!-- WELCOME START -->
          <h1 class="app-page-title" style="font-weight: normal"> Add Playlist To </h1>
          


   
           <!-- CONTENT START -->
           <div class="row g-4 mb-4">
            <!--  START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >
                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/video.php'?></span>Content Details</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- FORM CALCULATE START -->
<form method="GET" action="playlist_add_data.php">

<?php

    include 'database/database.php';


    $query = "SELECT * FROM `video` WHERE id = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {

    $video_names = ($row['video_name']);
?>


         <!-- VIDEO PLAYER START -->
         <div class="row g-4 mb-4">

            <!-- START -->
            <div class="col-12 col-lg-6">

                  <!-- VIDEO PLAYER START -->
                  <div class="row g-4 mb-4" style="margin-top: 20px; margin-left:20px;">


                  <video src="<?php echo $row['video'] ?>" autoplay loop controls ></video>

<!-- VIDEO FILTER -->
<script>
document.getElementById("videoUpload")
.onchange = function(event) {
  let file = event.target.files[0];
  let blobURL = URL.createObjectURL(file);
  document.querySelector("video").src = blobURL;
}
</script>

              
              </div>
              <!-- END -->

                </div>
              <!-- END -->     






<!-- --------------------       --------------------->

          <!-- SEARCH BUTTON START -->
              <div class="col-12 col-lg-6">


                  
<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0">
            
    <thead>



       <!-- TITLE -->
       <tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" > File Name </th>

                <th class="meta">
                <input type="text" value="<?php echo $row['video'] ?>" placeholder="File Name" id="video_file_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control video_file_Save" disabled>  
                </th>

      </tr>


       <!-- TITLE -->
       <tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Video id </th>

                <th class="meta">
                <input type="text" value="<?php echo $row['id'] ?>" placeholder="Content Name" id="video_id_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control video_id_Save" disabled>  
                </th>

      </tr>


       <!-- TITLE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Title </th>

                <th class="meta">
                <input type="text" value="<?php echo $row['video_name'] ?>" placeholder="Content Name" id="video_name_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control video_name_Save" disabled>  
                </th>

      </tr>

       <!-- DURATION -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Duration </th>

                <th class="meta">
                <input type="int" value="<?php echo $row['duration'] ?>" placeholder="Duration" id="duration_Save" 
                     style="color: gray; font-size: 12px; font-weight:normal; background: none;  " class="form-control duration_Save" disabled>
                </th>

      </tr>


       <!-- SPOTS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spot </th>

                <th class="meta">
                <input type="text" value="<?php echo $row['spots'] ?>" placeholder="Spot" id="spots_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control spots_Save" disabled> 
 
                </th>

      </tr>



       <!-- SPOTS -->
       <tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spot </th>

                <th class="meta">
                <input type="text" value="<?php echo $row['spots'] ?>" placeholder="Spot" id="spots_Save1"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control spots_Save1" disabled> 
 
                </th>

      </tr>


      <!-- CONTENT END -->
      <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Category </th>
                <th class="meta">
                <input type="text"  value="<?php echo $row['category'] ?>" placeholder="Category" id="category_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control category_Save" disabled>  
                </th>

      </tr>

       <!-- NAME -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" > Uploaded By </th>

                <th class="meta">
                <input type="text" value="<?php echo $row['name'] ?>" placeholder="Name" id="name_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control name_Save" disabled>  
                </th>

       </tr>

      <!-- DATE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Date Upload </th>

                <th class="meta">
                <input type="text" name="date_time" value="<?php echo date("F d, Y - h:i A", strtotime ($row['date_time']));?>" readonly 
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control form-control-md">  
                </th>
        </tr>

       <!-- STATUS -->
       <tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Status </th>

                <th class="meta">
                <input type="text" value="Activate" placeholder="Status" id="video_status_Save"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control video_status_Save" disabled>  
                </th>

      </tr>

       <!-- STATUS -->
       <tr hidden>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Status </th>

                <th class="meta">
                <input type="text" id="video_spots_Save" value="<?php echo $row['video_spots_no_yes'];?>" placeholder="Video Spots No"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control video_spots_Save" disabled>  
                </th>

      </tr>


    </thead>

    </table>
                  
  </div>

</div>
<!-- TABLE END -->

            




             
            </div>
            <!-- END -->



              </div>
              <!-- SEARCH BUTTON END -->

          </div>
          <!-- VIDEO PLAYER START -->


</div>

<?php } ?>
















<!-- --------------------       --------------------->


        <!-- DAYS APPREARANCE START -->
          <div class="row g-4 mb-4" >


          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm">

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >
                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/tags.php'?> </span>Budget</span>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4" >

    <div class="table-responsive">

<table class="table table-borderless mb-0">

  

    <thead>


<?php

    include 'database/database.php';
    $query = "SELECT * FROM `video` WHERE id = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
?>

     

       <!-- A -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Budget </th>
                <th class="meta">
                <input type="number" name="Budget" id="Budget" class="form-control Budget" placeholder="Budget*" required
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " >  
                </th>

                <input type="hidden" placeholder="Spot Content" name="Spots" value="<?php echo $row['spots'];?>" 
                       class="form-control Spots" readonly>  

       </tr>

       <!-- B -->
       <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Price per Spot </th>
                <th class="meta">
                <input type="number"  name="Price_per_Spots" id="Price_per_Spots" value="" class="form-control Price_per_Spots" placeholder="Price*"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " >  
                </th>

        </tr>

                <input type="hidden" placeholder="Total Number of Spots" name="Total_Spots" class="form-control Total_Spots" readonly>  


<?php } ?>


       </thead>

    </table>
                  
  </div>

</div>
<!-- TABLE END -->















<!-- --------------------       --------------------->

<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4" style="margin-top: -35px">

    <div class="table-responsive">

<table class="table table-borderless mb-0">

    <thead>

      <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots  </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Frequency  </th>    
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots per Day </th>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" hidden> Price per Spot </th>  
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;" hidden> Total Amount </th>

      </tr>

    </thead>

    <tbody>
      
            <tr>
    
                <th class="meta">
                <input type="int" class="form-control A_Total_Spots" id="A_Total_Spots" disabled
                       placeholder="Spots" 
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " >  
                </th>

                <th class="meta" >
                <input type="int" class="form-control Total_Frequency_Save" id="Total_Frequency_Save" disabled  
                       placeholder="Frequency" 
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; ">  
                </th>

                <th class="meta" >
                <input type="int" class="form-control Total_Spots_Per_Day_Save" id="Total_Spots_Per_Day_Save" disabled
                       placeholder="Spots per Day" 
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; ">  
                </th>



                <th class="meta" hidden>
                <input type="int" class="form-control A_Prices_Save" id="A_Prices_Save" disabled
                       placeholder="Prices"   
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; ">  
                </th>

                <th class="meta" hidden>
                <input type="int" class="form-control A_Total_Amount" id="A_Total_Amount" disabled 
                       placeholder="Amount"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " >  
                </th>

            </tr>

    </tbody>

</table>

</div>

</div>






<!-- --------------------       --------------------->

<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4" style="margin-top: -50px">

    <div class="table-responsive">

<table class="table table-borderless mb-0">

    <thead>

      <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots per Site </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Frequency per Site </th> 
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots per Site per Day </th>


      </tr>

    </thead>

    <tbody>
      
        <tr>
    
                <th class="meta" >  
                <input type="int" class="form-control A_Total_Spots_Per_Site" id="Total_Spots_Per_Site_Save" disabled
                       placeholder="Spots per Site"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; " >  
                </th>


                <th class="meta" >
                <input type="int" class="form-control Total_Frequency_per_Site_Save" id="Total_Frequency_per_Site_Save" disabled 
                       placeholder="Frequency per Site" 
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; ">  
                </th>


                <th class="meta" >
                <input type="int" class="form-control Total_Spots_Per_Site_per_Day_Save" id="Total_Spots_Per_Site_per_Day_Save" disabled
                       placeholder="Spots per Site per Day"
                       style="color: gray; font-size: 12px; font-weight:normal; background: none; ">  
                </th>

       </tr>

    </tbody>

</table>

</div>

</div>

              </div>
              <!-- END -->

          </div>
          <!-- DAYS APPREARANCE END -->






















<!-- --------------------       --------------------->

        <!-- VIDEO PLAYER START -->
          <div class="col-12 row g-4 mb-4" style="width: 102%">


          <!-- SEARCH BUTTON START -->
          <div class="col-12 col-lg-6" style="width:30%" >

            <div class="app-card app-card-stats-table h-100 shadow-sm" >

               <div class="app-card-body p-3 p-lg-4">

                    <div class="table-responsive">

                  <div class="app-card-header p-3" style="margin-top: -10px" >
                    <div class="row justify-content-between align-items-center" >
                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/view-list.php'?></span>Category</span>                          
                        </div>
                      </div>
                    </div>
                  </div>



<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4" >

    <div class="table-responsive">

 <table class="table app-table-hover mb-0 text-left">

    <thead>


<style type="text/css">

.hidden { display: none; }

#filter { clear: left; }

</style>


<div id="filter">


 <div class="root-visual_tags flex-tags">
    <div class="lvl2-el2-visual flex-tags tags-scrollable">
        <div class="lvl3-el2-visual scrollable_tags">


<!-- TAGS LIST -->
<span  style="color: black; font-size: 13px; font-weight:normal;"> Category List </span><br>

<input id="tag_all" type="checkbox" name="tags"  value="<?php echo $row['site_category']; ?>" style=" margin-top: 20px;">
<span style=" padding: 1px 10px; color: black; font-size: 12px; font-weight:normal;">Select All</span>



                    <?php
 
                        include 'database/aircast.php';

                    $query = "SELECT DISTINCT(site_category) FROM site";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {

                    ?>

<span><br>

  <input id="tags" class="tag_list" type="checkbox" name="tags"  value="<?php echo $row['site_category']; ?>"> 
  <span style="color: black; font-size: 12px; font-weight:normal; padding: 1px 10px"><?php echo $row['site_category']; ?></span>

</span>
                    <?php }   ?> 

    </div>
  </div>
</div>


<!-- SELECT ALL TAGS LIST -->
<script type="text/javascript">
  $(document).ready(function(){
  
  $('#tag_all').click(function(){
      $('.tag_list').prop('checked', true);
      
      if(!$(this).prop("checked")) {
          $('.tag_list').prop('checked', false);
      }
  });
  
  $('.tag_list').change(function() {
      if(!$(this).prop("checked")) {
          //alert('uncheck', $(this).prop("checked"));
          $('#tag_all').prop('checked', false);
      } else {
         if ($('.tag_list:checked').length === $('.tag_list').length) {
             $('#tag_all').prop('checked', true);
         }
      }
  });

});
</script>

<!-- CSS SITE STROLLBAR -->
<style type="text/css">

.flex-tags {
  display: flex;
  flex-direction: column;
}

.flex-tags > :not(.scrollable_tags):not(.tags-scrollable) {
  flex-shrink: 0;
}

.flex-tags > .scrollable_tags, .tags-scrollable {
  flex-grow: 1;
}

.tags-scrollable {
  overflow: hidden;
}

.scrollable_tags {
  overflow: auto;
}

.root-visual_tags {
  width: 100%;
  height: 25vh;
}

.scrollable_tags::-webkit-scrollbar
{
   width: 10px;
}

.scrollable_tags::-webkit-scrollbar-thumb
{
   height: 80px;
   background: #006600;
   border: 8px solid transparent;
}

.scrollable_tags::-webkit-scrollbar-thumb:active
{
    background: #003349;
}

</style>

<br>

 <div class="root-visual_location flex-location">
    <div class="lvl2-el2-visual flex-location location-scrollable">
        <div class="lvl3-el2-visual scrollable_location">


<!-- CITY LIST -->
<span style="color: black; font-size: 13px; font-weight:normal;"> City List</span><br>

<input id="city_all" type="checkbox" name="location" style=" margin-top: 20px;">
<span style=" padding: 1px 10px; color: black; font-size: 12px; font-weight:normal;">Select All</span></th>


                    <?php

                        include 'database/aircast.php';

                    $query = "
                    SELECT DISTINCT(site_location) FROM site";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {

                    ?>

<span><br>

  <input id="city" class="city_list" type="checkbox" name="location" value="<?php echo $row['site_location']; ?>"> 
  <span style="color: black; font-size: 12px; font-weight:normal; padding: 1px 10px"><?php echo $row['site_location']; ?></span>

</span>
                    <?php } ?> 

    </div>
  </div>
</div>

<!-- SELECT ALL CITY -->
<script type="text/javascript">
  $(document).ready(function(){
  
  $('#city_all').click(function(){
      $('.city_list').prop('checked', true);
      
      if(!$(this).prop("checked")) {
          $('.city_list').prop('checked', false);
      }
  });
  
  $('.city_list').change(function() {
      if(!$(this).prop("checked")) {
          $('#city_all').prop('checked', false);
      } else {
         if ($('.city_list:checked').length === $('.form-check-input').length) {
             $('#city_all').prop('checked', true);
         }
      }
  });

});
</script>

<!-- CSS SITE STROLLBAR -->
<style type="text/css">

.flex-location {
  display: flex;
  flex-direction: column;
}

.flex-location > :not(.scrollable_location):not(.location-scrollable) {
  flex-shrink: 0;
}

.flex-location > .scrollable_location, .location-scrollable {
  flex-grow: 1;
}

.location-scrollable {
  overflow: hidden;
}

.scrollable_location {
  overflow: auto;
}

.root-visual_location {
  width: 100%;
  height: 60vh;
}

.scrollable_location::-webkit-scrollbar
{
   width: 10px;
}

.scrollable_location::-webkit-scrollbar-thumb
{
   height: 80px;
   background: #006600;
   border: 8px solid transparent;
}

.scrollable_location::-webkit-scrollbar-thumb:active
{
    background: #003349;
}

</style>



</div><!-- FILTER -->

</thead>

</table>


        </div>

     </div>

  </div>

</div>
<!-- TABLE END -->


                </div><!-- SEARCH BUTTON START -->
              </div><!-- SEARCH BUTTON START -->












<!-- --------------------       --------------------->

              <div class="col-12 col-lg-6" style="width:70%;">

                <div class="app-card app-card-stats-table h-100 shadow-sm">
      
                  <div class="app-card-body p-3 p-lg-4">

                    <div class="table-responsive">

                  <div class="app-card-header p-3"  style="margin-top: -10px">
                    <div class="row justify-content-between align-items-center" >
                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/list.php'?> </span>Site List</span>  
                        </div>
                      </div>
                    </div>
                  </div>

<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4" >

    <div class="table-responsive">
 
  <div class="root-visual flex-container">
    <div class="lvl2-el2-visual flex-container non-scrollable">
        <div class="lvl3-el2-visual scrollable">

 <table class="table app-table-hover mb-0 text-left">

    <thead style="background: whitesmoke;">

      <tr>      
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Site </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Category </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Tags </th>
      </tr>
 
    </thead>
    

    <?php

      $vid = array();
      $date=date('Y-m-d');

      include 'database/database.php';

      $q = mysqli_query($con,"SELECT * FROM playlist_video WHERE video_name = '$video_names' AND  video_status= 'Activate' AND play_start <= '$date' AND end_start >= '$date'");
      while($row = mysqli_fetch_assoc($q)) {
        
        $vid[] = $row['site_name'];

      }

      $query = mysqli_query($con, "SELECT * FROM site WHERE site_name NOT IN ( '" . implode( "', '" , $vid ) . "' ) ORDER BY id ASC");
      while($row = mysqli_fetch_array($query)){ 

     ?>

<tr data-tags="<?= $row['site_category'];?>" data-location="<?= $row['site_location'];?>" class="content" style="border-top: 2px dotted white;">

            <td style='color: black; font-size: 12px; font-weight:normal;'> 
            <input type="checkbox" multiple name="site_name[]" id="site_name_Save" value="<?= $row['site_name'];?>" class="site_list" onclick="updateCount()">
            <span style="margin-left: 10px"> <?= $row['site_name'];?> </span>
            </td>

            <td style='color: black; font-size: 12px; font-weight:normal;'> <?= $row['site_category'];?> </td>
            <td style='color: black; font-size: 12px; font-weight:normal;'> <?= $row['site_tags'];?> </td>

</tr>      

    <?php } ?> 

</tbody>

</table>


    </div>
  </div>
</div>


    </div>
</div>



<span style="color: black; font-size: 12px; font-weight:normal; margin-top: 3px; margin-left: 30px"> Number of Site Selected </span>

<input type="int" id="site_count_Save" value="" class="form-control site_count_Save" disabled  placeholder="No selection" 
       style="color: black; font-size: 12px; font-weight:normal; background: none; margin-top: 5px; width: 30%; margin-left: 30px; ">






                    </div>

                  </div>

                </div>

              </div>

          </div>
          <!-- VIDEO PLAYER START -->


<!-- CATEGORY -->
<script type="text/javascript">
  var filterContentForm = function (content, form) {
  var filter = function () {
    var checkBoxGroups = {},
      radioGroups = {};
    var addRadioGroup = function (name) {
      radioGroups[name] = {
        el: $("input[name=" + name + "]:checked")
      };
      var n = radioGroups[name];
      n.el.each(function () {
        n.range = $(this).val().split("-");
        n.from = Number(n.range[0]);
        n.to = Number(n.range[1]);
      });
    };



    $("#filter input[type=radio]").each(function () {
      addRadioGroup($(this).attr("name"));
    });
    var addCheckBoxGroup = function (name) {
      checkBoxGroups[name] = {
        el: $("input[name=" + name + "]:checked"),
        ch: []
      };
      var n = checkBoxGroups[name];
      n.el.each(function () {
        n.ch.push($(this).val());
      });
    };



    $("#filter input[type=checkbox]").each(function () {
      addCheckBoxGroup($(this).attr("name"));
    });


    var contents = $(content),
      all = 0;
    contents.removeClass("hidden").each(function () {
      var $this = $(this),
        price = $this.data("price");
      for (var c in radioGroups) {
        var n = radioGroups[c],
          d = Number($this.data(c));
        if (d < n.from || d > n.to) {
          $this.addClass("hidden");
          all++;
          return;
        }
      }
      var show = 0,
        i;
      for (var c in checkBoxGroups) {
        var n = checkBoxGroups[c],
          d = $this.data(c);
        for (i = 0; i < n.ch.length; i++) {
          if (d === n.ch[i]) {
            show++;
            break;
          }
        }
      }
      var l = Object.keys(checkBoxGroups).length;
      if (show < l) {
        $this.addClass("hidden");
        all++;
      }
    });
    if (all > contents.length - 1) contents.removeClass("hidden");
  };
  $(form + " input").change(filter);
  filter();
};
filterContentForm(".content", "#filter");

</script>

<!-- COUNT SITE BY CHECK -->
<script type="text/javascript">
// CHECK //    
    window.updateCount = function() {
    var site_selected = $(".site_list:checked").length;
    document.getElementById("site_count_Save").value = site_selected;
};

// CLEAR ALL //
$("#tag_all").click(function() {
  var tag_all = $('input#site_count_Save');
  tag_all.val("0");
});

// CLEAR COUNT //
$("input[class=tag_list]").click(function() {
  var tag_selected_all = $('input#site_count_Save');
  tag_selected_all.val("0");
});

// CLEAR CHECK //
$("#tag_all").click(function() {
  var tag_all_check = $('input#site_name_Save');
  tag_all_check.prop('checked', false);
});

// CLEAR CHECK ALL //
$("input[class=tag_list]").click(function() {
  var tag_selected_all_check = $('input#site_name_Save');
  tag_selected_all_check.prop('checked', false);
});







// CLEAR ALL //
$("#city_all").click(function() {
  var city_all = $('input#site_count_Save');
  city_all.val("0");
});

// CLEAR COUNT //
$("input[class=city_list]").click(function() {
  var city_selected_all = $('input#site_count_Save');
  city_selected_all.val("0");
});

// CLEAR CHECK //
$("#city_all").click(function() {
  var city_all_check = $('input#site_name_Save');
  city_all_check.prop('checked', false);
});

// CLEAR CHECK ALL //
$("input[class=city_list]").click(function() {
  var city_selected_all_check = $('input#site_name_Save');
  city_selected_all_check.prop('checked', false);
});


</script>

<!-- CSS SITE STROLLBAR -->
<style type="text/css">

.flex-container {
  display: flex;
  flex-direction: column;
}

.flex-container > :not(.scrollable):not(.non-scrollable) {
  flex-shrink: 0;
}

.flex-container > .scrollable, .non-scrollable {
  flex-grow: 1;
}

.non-scrollable {
  overflow: hidden;
}

.scrollable {
  overflow: auto;
}

.root-visual {
  width: 100%;
  height:80vh;
}

.scrollable::-webkit-scrollbar
{
   width: 10px;
}

.scrollable::-webkit-scrollbar-thumb
{
   height: 80px;
   background: #006600;
   border: 8px solid transparent;
}

.scrollable::-webkit-scrollbar-thumb:active
{
    background: #003349;
}

</style>

















<!-- --------------------       --------------------->

        <!-- DATE RANGES  START -->
          <div class="row g-4 mb-4">

          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >
                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/calendar.php'?> </span>Date Ranges</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">
                  
<table class="table table-borderless mb-0">
            
    <thead>

      <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> From Date  </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> To Date </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal; width: 15%;"> Campaign Duration </th>                
      </tr>


    </thead>

    <tbody>
      
           <tr> 

            <!-- START DATE -->
            <td class="cell">
                <input type="date"  name="start" id="start_date_Save" placeholder="Date" required  
                     style="color: gray; font-size: 12px; font-weight:normal;" class="form-control start_date_Save" >  
            </td>

            <!-- END DATE -->
            <td class="cell">
                <input type="date"  name="end" id="end_date_Save"  placeholder="Date" required 
                 style="color: gray; font-size: 12px; font-weight:normal; " class="form-control end_date_Save" >  
            </td>


            <!-- NUMBER OF DAYS -->
            <td class="cell">
                <input type="text" name="date_count_Save" id="date_count_Save" placeholder="Duration" disabled  
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control date_count_Save"> 
            </td>

            </tr>

    </tbody>

</table>

  </div>

</div>
<!-- TABLE END -->
                  
              </div>
              <!-- END -->

          </div>
          <!-- DATE RANGES END -->

<!-- START DATE DISABLED -->
<script type="text/javascript">

$(document).ready(function() {
  $('#start_date_Save').attr('disabled', true);

  $('.site_list').change(function() {
    $('#start_date_Save').attr('disabled', !this.checked);
  });
});

</script>


<!-- END DATE DISABLED -->
<script type="text/javascript">

$(document).ready(function() {
  $('#end_date_Save').attr('disabled', true);

  $('.site_list').change(function() {
    $('#end_date_Save').attr('disabled', !this.checked);
  });
});

</script>

<!-- DATE FILTER -->
<script type="text/javascript">

// How do I restrict past dates in html5 input type Date // form date
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
       day = '0' + day.toString();
    var minDate= year + '-' + month + '-' + day;
    $('#start_date_Save').attr('min', minDate);
});

// How do I restrict past dates in html5 input type Date // to date
$(function(){
    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
       day = '0' + day.toString();
    var minDate= year + '-' + month + '-' + day;
    $('#end_date_Save').attr('min', minDate);
});

</script>

<!-- DATE COUNT DAYS -->
<script type="text/javascript">

// COUNT DIFF DAYS //     
 $(document).ready(function () {
   $('#start_date_Save').change(function () {
     if($('#end_date_Save').val()!='')
     {
      setup();
    }
  })
   
  $('#end_date_Save').change(function () {
    if($('#start_date_Save').val()!='')
    {
      setup();
    }
  })
});

 // COUNT DAYS EXAMPLE - MONDAY TO FRIDAY //
  const setup = () => {

  var firstDate = $('#start_date_Save').val();
  var secondDate = $('#end_date_Save').val();

  const between2date = (firstDate, secondDate) => {

    firstDate = new Date(firstDate);
    secondDate = new Date(secondDate);
    
    var timeDifference = Math.floor(secondDate.getTime() - firstDate.getTime()) + 1;
    var millisecondsInADay = (1000 * 3600 * 24);
    var differenceOfDays = Math.ceil(timeDifference / millisecondsInADay);
    return differenceOfDays;
    
  }
  
  var result = between2date(firstDate, secondDate); +  $("#date_count_Save").val(result);  

}

// CLEAR //
$("#end_date_Save").click(function() {
  var date_count_Save = $('input#date_count_Save');
  date_count_Save.val("0");
});

</script>

<!-- NAKALIMUTAN KO -->
<script type="text/javascript">

// FILTIRING //

// START DATE //    
var date = new Date();
var day = ("0" + date.getDate()).slice(-2);
var month = ("0" + (date.getMonth() + 1)).slice(-2);
var today = date.getFullYear() + "-" + (month) + "-" + (day);
$('#start_date_Save').val(today);

// END DATE //
var date = new Date();
var day = ("0" + date.getDate()).slice(-2);
var month = ("0" + (date.getMonth() + 1)).slice(-2);
var today = date.getFullYear() + "-" + (month) + "-" + (day);
$('#end_date_Save').val(today);

</script>















<!-- --------------------       --------------------->

        <!-- DAYS START -->
          <div class="row g-4 mb-4">             

          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >
                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/calendar-check.php'?> </span>Days</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0">                    

    <thead>

      <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Monday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Tueday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Wednesday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Thursday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Friday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Saturday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Sunday </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal; width: 15%;"> Days Appearance  </th>

      </tr>

    </thead>

    <tbody>
      
<tr>


<!-- MONDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="monday_Save" name="monday_Save" class="form-control monday_Save" style="color: gray; font-size: 12px; font-weight:normal;"  disabled >
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Mon"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="monday_count" class="form-control monday_count" style="color: gray; font-size: 12px; font-weight:normal" hidden>
  <option value="0">No</option>
  <option value="<?php echo $mon1;?>" id="monday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="monday" value="" placeholder="Days" class="form-control monday" readonly
       style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>



<!-- THUSDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="tuesday_Save" name="tuesday_Save" class="form-control tuesday_Save" style="color: gray; font-size: 12px; font-weight:normal" disabled>
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Tue"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="tuesday_count" class="form-control tuesday_count" style="color: gray; font-size: 12px; font-weight:normal"  hidden>
  <option value="0">No</option>
  <option value="<?php echo $tue1;?>" id="tuesday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="tuesday" value="" placeholder="Days" class="form-control tuesday" readonly
      style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>



<!-- WENESDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="wednesday_Save" name="wednesday_Save" class="form-control wednesday_Save" style="color: gray; font-size: 12px; font-weight:normal" disabled >
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Wed"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="wednesday_count" class="form-control wednesday_count" style="color: gray; font-size: 12px; font-weight:normal"  hidden>
  <option value="0">No</option>
  <option value="<?php echo $wed1;?>" id="wednesday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="wednesday" value="" placeholder="Days" class="form-control wednesday" readonly
       style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>


<!-- THURSDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="thursday_Save" name="thursday_Save" class="form-control thursday_Save" style="color: gray; font-size: 12px; font-weight:normal" disabled >
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Thu"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="thursday_count" class="form-control thursday_count" style="color: gray; font-size: 12px; font-weight:normal"  hidden>
  <option value="0">No</option>
  <option value="<?php echo $thu1;?>" id="thursday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="thursday" value="" placeholder="Days" class="form-control thursday" readonly
       style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>



<!-- FRIDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="friday_Save" name="friday_Save" class="form-control friday_Save" style="color: gray; font-size: 12px; font-weight:normal;"  disabled >
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Fri"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="friday_count" class="form-control friday_count" style="color: gray; font-size: 12px; font-weight:normal"  hidden>
  <option value="0">No</option>
  <option value="<?php echo $fri1;?>" id="friday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="friday" value="" placeholder="Days" class="form-control friday" readonly
       style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>



<!-- SATURDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="saturday_Save" name="saturday_Save" class="form-control saturday_Save" style="color: gray; font-size: 12px; font-weight:normal"  disabled >
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Sat"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="saturday_count" class="form-control saturday_count" style="color: gray; font-size: 12px; font-weight:normal"  hidden >
  <option value="0">No</option>
  <option value="<?php echo $sat1;?>" id="saturday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="saturday" value="" placeholder="Days" class="form-control saturday" readonly
       style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>



<!-- SUNDAY -->
<td class="cell">

<!-- YES / NO  -->
<select id="sunday_Save" name="sunday_Save" class="form-control sunday_Save" style="color: gray; font-size: 12px; font-weight:normal"  disabled >
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="Sun"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="sunday_count" class="form-control sunday_count" style="color: gray; font-size: 12px; font-weight:normal"  hidden>
  <option value="0">No</option>
  <option value="<?php echo $sun1;?>" id="sunday_date_Save"> Yes </option>
</select>

<!-- INPUT NUMBER OF DAYS -->
<input type="text" id="sunday" value="" placeholder="Days" class="form-control sunday" readonly 
      style="color: gray; font-size: 12px; font-weight:normal; margin-top: 10px;">

</td>

<!-- NUMBER OF DAYS -->
<td class="cell">

     <input type="text" name="date_diff_Save" id="date_diff_Save" placeholder="Appearance" disabled  
            style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control date_diff_Save"> 
</td>

</tr>



    </tbody>

    </table>
                  
  </div>

</div>
<!-- TABLE END -->
                  
              </div>
              <!-- END -->

          </div>
          <!-- DAYS END -->
          <!-- DAYS APPREARANCE END -->


<!-- COUNT DAYS BY DAYS -->
<script type="text/javascript">

function parseDate(input) {
  var parts = input.split('-');
  // new Date(year, month [, day [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts[0], parts[1]-1, parts[2]); // Note: months are 0-based
}

// COUNT DIFF DAYS //     
 $(document).ready(function () {
   $('#start_date_Save').change(function () {
     if($('#end_date_Save').val()!='')
     {
      days();
    }
  })

  $('#end_date_Save').change(function () {
    if($('#start_date_Save').val()!='')
    {
      days();
    }
  })
});

  const days = () => {
    
  var date1 = $('#start_date_Save').val();
  var date2 = $('#end_date_Save').val();

// days //
function getCountOf( date1, date2, dayToSearch ) {

    var dateObj1 = new Date(date1);
    var dateObj2 = new Date(date2);
    var count = 0;
    var week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var dayIndex = week.indexOf( dayToSearch );

    while ( dateObj1.getTime() <= dateObj2.getTime() )
    {
       if (dateObj1.getDay() == dayIndex )
       {
          count++
       }
       dateObj1.setDate(dateObj1.getDate() + 1);
    }
    return count;
}

var monday = "Mon";
var tuesday = "Tue";
var wednesday = "Wed";
var thursday = "Thu";
var friday = "Fri";
var saturday = "Sat";
var sunday = "Sun";


// MONDAY //
var mon = getCountOf( date1, date2, monday );

if (mon > "1") {
var mon2 = `${mon} Days`;
$('#monday').empty().val(mon2);

} else {
var mon2 = `${mon} Day`;
$('#monday').empty().val(mon2);

}

var mon1 = getCountOf( date1, date2, monday );
$("#monday_date_Save").empty().val(mon1);

// DAYS //
  $("#monday_Save").on("input", function() {
  $("#monday_count").val("");
  if ($(this).val().length >= 0) {
    $("#monday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#monday_count").val(mon1);
  }
});

// FILTER //
if (mon == "0") {
document.getElementById("monday_Save").disabled = true;
} else {
document.getElementById("monday_Save").disabled = false; 
}



// TUESDAY //
var tue = getCountOf( date1, date2, tuesday ); 

if (tue > "1") {
var tue2 = `${tue} Days`;
$('#tuesday').empty().val(tue2);

} else {
var tue2 = `${tue} Day`;
$('#tuesday').empty().val(tue2);

}

var tue1 = getCountOf( date1, date2, tuesday ); 
$("#tuesday_date_Save").empty().val(tue1);

// DAYS //
$("#tuesday_Save").on("input", function() {
  $("#tuesday_count").val("");
  if ($(this).val().length >= 0) {
    $("#tuesday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#tuesday_count").val(tue);
  }
});

// FILTER //
if (tue == "0") {
document.getElementById("tuesday_Save").disabled = true;
} else {
document.getElementById("tuesday_Save").disabled = false; 
}



// WEDNESDAY //
var wed = getCountOf( date1, date2, wednesday ); 

if (wed > "1") {
var wed2 = `${wed} Days`;
$('#wednesday').empty().val(wed2)

} else {
var wed2 = `${wed} Day`;
$('#wednesday').empty().val(wed2)

}

var wed1 = getCountOf( date1, date2, wednesday ); 
$("#wednesday_date_Save").empty().val(wed1);

// DAYS //
$("#wednesday_Save").on("input", function() {
  $("#wednesday_count").val("");
  if ($(this).val().length >= 0) {
    $("#wednesday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#wednesday_count").val(wed);
  }
});

// FILTER //
if (wed == "0") {
document.getElementById("wednesday_Save").disabled = true;
} else {
document.getElementById("wednesday_Save").disabled = false; 
}



// THURSDAY //
var thu = getCountOf( date1, date2, thursday );

if (thu > "1") {
var thu2 = `${thu} Days`;
$('#thursday').empty().val(thu2);

} else {
var thu2 = `${thu} Day`;
$('#thursday').empty().val(thu2);

}

var thu1 = getCountOf( date1, date2, thursday ); 
$("#thursday_date_Save").empty().val(thu1);

// DAYS //
$("#thursday_Save").on("input", function() {
  $("#thursday_count").val("");
  if ($(this).val().length >= 0) {
    $("#thursday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#thursday_count").val(thu);
  }
});

// FILTER //
if (thu == "0") {
document.getElementById("thursday_Save").disabled = true;
} else {
document.getElementById("thursday_Save").disabled = false; 
}



// FRIDAY //
var fri = getCountOf( date1, date2, friday );

if (fri > "1") {
var fri2 = `${fri} Days`;
$('#friday').empty().val(fri2);

} else {
var fri2 = `${fri} Day`;
$('#friday').empty().val(fri2);

}

var fri1 = getCountOf( date1, date2, friday );
$("#friday_date_Save").empty().val(fri1);

// DAYS //
$("#friday_Save").on("input", function() {
  $("#friday_count").val("");
  if ($(this).val().length >= 0) {
    $("#friday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#friday_count").val(fri);
  }
});

// FILTER //
if (fri == "0") {
document.getElementById("friday_Save").disabled = true;
} else {
document.getElementById("friday_Save").disabled = false; 
}



// SATURDAY //
var sat = getCountOf( date1, date2, saturday ); 

if (sat > "1") {
var sat2 = `${sat} Days`;
$('#saturday').empty().val(sat2);

} else {
var sat2 = `${sat} Day`;
$('#saturday').empty().val(sat2);

}

var sat1 = getCountOf( date1, date2, saturday ); 
$("#saturday_date_Save").empty().val(sat1);

// DAYS //
$("#saturday_Save").on("input", function() {
  $("#saturday_count").val("");
  if ($(this).val().length >= 0) {
    $("#saturday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#saturday_count").val(sat);
  }
});

// FILTER //
if (sat == "0") {
document.getElementById("saturday_Save").disabled = true;
} else {
document.getElementById("saturday_Save").disabled = false; 
}



// SUNDAY //
var sun = getCountOf( date1, date2, sunday )

if (sun > "1") {
var sun2 = `${sun} Days`;
$('#sunday').empty().val(sun2);

} else {
var sun2 = `${sun} Day`;
$('#sunday').empty().val(sun2);

}

var sun1 = getCountOf( date1, date2, sunday ) 
$("#sunday_date_Save").empty().val(sun1);

// DAYS //
$("#sunday_Save").on("input", function() {
  $("#sunday_count").val("");
  if ($(this).val().length >= 0) {
    $("#sunday_count").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#sunday_count").val(sun);
  }
});

// FILTER //
if (sun == "0") {
document.getElementById("sunday_Save").disabled = true;
} else {
document.getElementById("sunday_Save").disabled = false; 
}



}
</script>

 <!-- DAYS FILTER  -->
<script type="text/javascript">

$('.form-control').change('input', function() {

// INPUT //
  var mon3 = $('.monday_Save').val();
  var tue3 = $('.tuesday_Save').val();
  var wed3 = $('.wednesday_Save').val();
  var thu3 = $('.thursday_Save').val();
  var fri3 = $('.friday_Save').val();
  var sat3 = $('.saturday_Save').val();
  var sun3 = $('.sunday_Save').val();

// FILTER //
if (mon3 > "0") {
document.getElementById("monday").style.background = "none";
document.getElementById("monday").disabled = true;
} else {
document.getElementById("monday").style.background = "whitesmoke";
document.getElementById("monday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var monday = $('input#monday');
      monday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var monday1 = $('select#monday_count');
      monday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var monday3 = $('select#monday_Save');
      monday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var monday = $('input#monday');
      monday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var monday1 = $('select#monday_count');
      monday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var monday3 = $('select#monday_Save');
      monday3.val("0");
});







// FILTER //
if (tue3 > "0") {
document.getElementById("tuesday").style.background = "none";
document.getElementById("tuesday").disabled = true;
} else {
document.getElementById("tuesday").style.background = "whitesmoke";
document.getElementById("tuesday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var tuesday = $('input#tuesday');
      tuesday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var tuesday1 = $('select#tuesday_count');
      tuesday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var tuesday3 = $('select#tuesday_Save');
      tuesday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var tuesday = $('input#tuesday');
      tuesday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var tuesday1 = $('select#tuesday_count');
      tuesday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var tuesday3 = $('select#tuesday_Save');
      tuesday3.val("0");
});






// FILTER //
if (wed3 > "0") {
document.getElementById("wednesday").style.background = "none";
document.getElementById("wednesday").disabled = true;
} else {
document.getElementById("wednesday").style.background = "whitesmoke";
document.getElementById("wednesday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var wednesday = $('input#wednesday');
      wednesday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var wednesday1 = $('select#wednesday_count');
      wednesday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var wednesday3 = $('select#wednesday_Save');
      wednesday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var wednesday = $('input#wednesday');
      wednesday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var wednesday1 = $('select#wednesday_count');
      wednesday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var wednesday3 = $('select#wednesday_Save');
      wednesday3.val("0");
});





// FILTER //
if (thu3 > "0") {
document.getElementById("thursday").style.background = "none";
document.getElementById("thursday").disabled = true;
} else {
document.getElementById("thursday").style.background = "whitesmoke";
document.getElementById("thursday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var thursday = $('input#thursday');
      thursday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var thursday1 = $('select#thursday_count');
      thursday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var thursday3 = $('select#thursday_Save');
      thursday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var thursday = $('input#thursday');
      thursday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var thursday1 = $('select#thursday_count');
      thursday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var thursday3 = $('select#thursday_Save');
      thursday3.val("0");
});






// FILTER //
if (fri3 > "0") {
document.getElementById("friday").style.background = "none";
document.getElementById("friday").disabled = true;
} else {
document.getElementById("friday").style.background = "whitesmoke";
document.getElementById("friday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var friday = $('input#friday');
      friday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var friday1 = $('select#friday_count');
      friday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var friday3 = $('select#friday_Save');
  friday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var friday = $('input#friday');
      friday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var friday1 = $('select#friday_count');
      friday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var friday3 = $('select#friday_Save');
  friday3.val("0");
});







// FILTER //
if (sat3 > "0") {
document.getElementById("saturday").style.background = "none";
document.getElementById("saturday").disabled = true;
} else {
document.getElementById("saturday").style.background = "whitesmoke";
document.getElementById("saturday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var saturday = $('input#saturday');
      saturday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var saturday1 = $('select#saturday_count');
      saturday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var saturday3 = $('select#saturday_Save');
      saturday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var saturday = $('input#saturday');
      saturday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var saturday1 = $('select#saturday_count');
      saturday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var saturday3 = $('select#saturday_Save');
      saturday3.val("0");
});




// FILTER //
if (sun3 > "0") {
document.getElementById("sunday").style.background = "none";
document.getElementById("sunday").disabled = true;
} else {
document.getElementById("sunday").style.background = "whitesmoke";
document.getElementById("sunday").disabled = true;
}

// CLEAR //
$("#end_date_Save").click(function() {
  var sunday = $('input#sunday');
      sunday.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var sunday1 = $('select#sunday_count');
      sunday1.val("0");
});

// CLEAR //
$("#end_date_Save").click(function() {
  var sunday3 = $('select#sunday_Save');
      sunday3.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var sunday = $('input#sunday');
      sunday.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var sunday1 = $('select#sunday_count');
      sunday1.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var sunday3 = $('select#sunday_Save');
      sunday3.val("0");
});


});


</script>


 <!-- COUNT DAYS INPUT -->
<script type="text/javascript">

$('.form-control').change('input', function() {

// INPUT //
  var mon = $('.monday_count').val();
  var tue = $('.tuesday_count').val();
  var wed = $('.wednesday_count').val();
  var thu = $('.thursday_count').val();
  var fri = $('.friday_count').val();
  var sat = $('.saturday_count').val();
  var sun = $('.sunday_count').val();


// COUNT //
  var Totaldays = Math.floor(mon) + Math.floor(tue) + Math.floor(wed) + Math.floor(thu) + Math.floor(fri) + Math.floor(sat) + Math.floor(sun);

// OUTPUT //
  $('.date_diff_Save').empty().val(Totaldays); 

// CLEAR //
$("#end_date_Save").click(function() {
  var date_diff_Save = $('input#date_diff_Save');
      date_diff_Save.val("0");
});

});

</script>
































<!-- --------------------       --------------------->

        <!-- HOUSR START -->
          <div class="row g-4 mb-4">

          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="color: black; font-size: 13px; font-weight:normal;">
                          <span class="nav-icon" style="padding: 3px 5px"><?php include 'icon/clock.php'?> </span>Time Aired Per Day</span> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0">
            
    <thead>

      <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 8:00 AM - 10:00 AM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 10:00 AM - 12:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 12:00 PM - 2:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 2:00 PM - 4:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> 4:00 PM - 6:00 PM </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal; width: 15%;" hidden> Time Aired Per Day </th>

      </tr>

    </thead>

    <tbody>
    
 <tr>



<!-- 8:00 AM - 10:00 AM -->
<td class="cell">

<!-- YES / NO  -->
<select id="eigth_to_ten_Save" style="color: gray; font-size: 12px; font-weight:normal;" class="form-control eigth_to_ten_Save" disabled>
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="810"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="A_Save" class="form-control A_Save" style="color: gray; font-size: 12px; font-weight:normal" hidden>
  <option value="0" disabled selected > None </option>   
  <option value="">No</option>
  <option value="" id="AA_Save"> Yes </option>
</select>

</td>


<!-- 10:00 AM - 12:00 PM -->
<td class="cell">

<!-- YES / NO  -->
<select id="ten_to_twelve_Save" style="color: gray; font-size: 12px; font-weight:normal;" class="form-control ten_to_twelve_Save" disabled>
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="1012"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="B_Save" class="form-control B_Save" style="color: gray; font-size: 12px; font-weight:normal" hidden>
  <option value="0" disabled selected > None </option>    
  <option value="">No</option>
  <option value="0" id="BB_Save"> Yes </option>
</select>

</td>


<!-- 12:00 PM - 2:00 PM -->
<td class="cell">

<!-- YES / NO  -->
<select id="twelve_to_two_Save" style="color: gray; font-size: 12px; font-weight:normal;" class="form-control twelve_to_two_Save" disabled>
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="122"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="C_Save" class="form-control C_Save" style="color: gray; font-size: 12px; font-weight:normal" hidden>
  <option value="0" disabled selected > None </option>   
  <option value="">No</option>
  <option value="0" id="CC_Save"> Yes </option>
</select>

</td>


<!-- 2:00 PM - 4:00 PM  -->
<td class="cell">

<!-- YES / NO  -->
<select id="two_to_four_Save" style="color: gray; font-size: 12px; font-weight:normal;" class="form-control two_to_four_Save" disabled>
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="24"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="D_Save" class="form-control D_Save" style="color: gray; font-size: 12px; font-weight:normal" hidden>
  <option value="0" disabled selected > None </option>   
  <option value="">No</option>
  <option value="0" id="DD_Save"> Yes </option>
</select>

</td>


<!-- 4:00 PM - 6:00 PM -->
<td class="cell">

<!-- YES / NO  -->
<select id="four_to_six_Save" style="color: gray; font-size: 12px; font-weight:normal;" class="form-control four_to_six_Save" disabled>
  <option value="0" disabled selected > None </option>
  <option value="">No</option>
  <option value="46"> Yes </option>
</select>

<!-- YES / NO  -->
<select id="E_Save" class="form-control E_Save" style="color: gray; font-size: 12px; font-weight:normal" hidden>
  <option value="0" disabled selected > None </option>  
  <option value="">No</option>
  <option value="0" id="EE_Save"> Yes </option>
</select>

</td>
 

<!-- TIME AIRED PER DAYS COUNT -->
<td class="cell" hidden>

<input type="int" id="time" name="time" class="form-control time" placeholder="Time Aired" readonly disabled
       style="color: black; font-size: 13px; font-weight:normal; background: none;" >

</td>



</tr>

    </tbody>

</table>
 





<div class="app-card-footer mt-auto" style="float: right; padding: 10px 10px;">
  <button  type="submit" name="save" class="btn app-btn-primary" value="Save" 
  style="font-size: 12px; font-family: sans-serif; background: #006600; font-weight: normal; color: white;"> Save </button>
</div>

  </div>

</div>
<!-- TABLE END -->

                     
              </div>
              <!-- END -->

          </div>
          <!-- HOURS END -->




<!-- COUNT BUDGET AND SPOTS -->
<script type="text/javascript">

$('.form-control').change('input', function() {

// INPUT //
  var Budget = $('.Budget').val();                        // Amount
  var Price_per_Spots = $('.Price_per_Spots').val();      // Prices
  var Content_Spot = $('.Spots').val();                   // Content Spot
  var Days = $('.date_diff_Save').val();                  // Days

// COMPUTE //
  var Amount = Math.ceil(Budget / Price_per_Spots);             // Budget Divide to Prices
  var Total_spots = Math.ceil(Amount / Content_Spot);           // Amount Divide to Content Spot

  var Total_Frequency = Math.ceil(Total_spots / Content_Spot);  // Total Spots Divede to Content Spot
  var Total_Spots_Per_Day = Math.ceil(Total_Frequency / Days);  // Total Frequency Divede to Content Spot


// OUTPUT //
  $('.Total_Spots').empty().val(Total_spots);                      // Total Spots
  $('.Total_Frequency_Save').empty().val(Total_Frequency);         // Total Loops
  $('.Total_Spots_Per_Day_Save').empty().val(Total_Spots_Per_Day); // Total Loops per day

});

</script>





<!-- COUNT AND FILTER HOURS -->
<script type="text/javascript">

$('.form-control').change('input', function() {

// INPUT //
  var Amount = $('.Budget').val();                   // Amount
  var Price_per_Spots = $('.Price_per_Spots').val(); // Prices
  var Content_Spot = $('.Spots').val();              // Content Spot
  var Sites = $('.site_count_Save').val();           // Total Sites
  var Days = $('.date_diff_Save').val();             // Number Of Days
  var Total_Spots = $('.Total_Spots').val();         // Total Spots


// COMPUTE //
  var Total_Spots_Per_Site = Math.ceil(Total_Spots / Sites);                      // Total Spots Divide to Total Sites
  var Total_Frequency_per_Site = Math.ceil(Total_Spots_Per_Site / Content_Spot);  // Total Frequency per Site Divide to Content Spot
  var Total_Spots_Per_Site_Per_Day = Math.ceil(Total_Frequency_per_Site / Days);  // Total Spots Per Site per Day Divide to Number Of Days

   
// OUTPUT //
  $('.A_Total_Amount').empty().val(Amount);
  $('.A_Total_Spots').empty().val(Total_Spots);
  $('.A_Prices_Save').empty().val(Price_per_Spots);

  $('.A_Total_Spots_Per_Site').empty().val(Total_Spots_Per_Site);
  $('.Total_Frequency_per_Site_Save').empty().val(Total_Frequency_per_Site);  
  $('.Total_Spots_Per_Site_per_Day_Save').empty().val(Total_Spots_Per_Site_Per_Day);

  $('.A_Total_spots_Cal').empty().val(Total_Spots);
  $('.A_Total_prices_Cal').empty().val(Amount);


// COMPUTE //
 var Time_Aired = Math.ceil(Total_Frequency_per_Site / 5); 
 $('.Frequency_A').empty().val(Time_Aired);


// OUTPUT //

 // 8:00 AM - 10:00 AM //
  $('#AA_Save').empty().val(Time_Aired);

  $("#eigth_to_ten_Save").on("input", function() {
  $("#A_Save").val("");
  if ($(this).val().length >= 0) {
    $("#A_Save").val("0");
  }
  if ($(this).val().length >= 1) {
   $("#A_Save").val(Time_Aired);
  }
 });


$('#A_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var A_Save = $('select#A_Save');
      A_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var A_Save = $('select#A_Save');
      A_Save.val("0");
});


// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#A_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#A_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#A_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#A_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#A_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#A_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#A_Save');
      sunday_Save.val("0");
});




$('#eigth_to_ten_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var eigth_to_ten_Save = $('select#eigth_to_ten_Save');
      eigth_to_ten_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var eigth_to_ten_Save = $('select#eigth_to_ten_Save');
      eigth_to_ten_Save.val("0");
});


// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#eigth_to_ten_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#eigth_to_ten_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#eigth_to_ten_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#eigth_to_ten_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#eigth_to_ten_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#eigth_to_ten_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#eigth_to_ten_Save');
      sunday_Save.val("0");
});


$('#time').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var time = $('input#time');
      time.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var time = $('select#time');
      time.val("0");
});

// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('input#time');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('input#time');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('input#time');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('input#time');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('input#time');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('input#time');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('input#time');
      sunday_Save.val("0");
});











// 10:00 AM - 12:00 PM //
 $('#BB_Save').empty().val(Time_Aired);

  $("#ten_to_twelve_Save").on("input", function() {
  $("#B_Save").val("");
  if ($(this).val().length >= 0) {
    $("#B_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#B_Save").val(Time_Aired);
  }
});

$('#B_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var B_Save = $('select#B_Save');
      B_Save.val("0");
});


// CLEAR //
$("#start_date_Save").click(function() {
  var B_Save = $('select#B_Save');
      B_Save.val("0");
});



// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#B_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#B_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#B_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#B_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#B_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#B_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#B_Save');
      sunday_Save.val("0");
});




$('#ten_to_twelve_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var ten_to_twelve_Save = $('select#ten_to_twelve_Save');
      ten_to_twelve_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var ten_to_twelve_Save = $('select#ten_to_twelve_Save');
      ten_to_twelve_Save.val("0");
});



// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#ten_to_twelve_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#ten_to_twelve_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#ten_to_twelve_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#ten_to_twelve_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#ten_to_twelve_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#ten_to_twelve_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#ten_to_twelve_Save');
      sunday_Save.val("0");
});


$('#time').val();



// CLEAR //
$("#end_date_Save").click(function() {
  var time = $('input#time');
      time.val("0");
});


// CLEAR //
$("#start_date_Save").click(function() {
  var time = $('select#time');
      time.val("0");
});


// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('input#time');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('input#time');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('input#time');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('input#time');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('input#time');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('input#time');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('input#time');
      sunday_Save.val("0");
});













// 12:00 PM - 2:00 PM //
 $('#CC_Save').empty().val(Time_Aired);

  $("#twelve_to_two_Save").on("input", function() {
  $("#C_Save").val("");
  if ($(this).val().length >= 0) {
    $("#C_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#C_Save").val(Time_Aired);
  }
});


$('#C_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var C_Save = $('select#C_Save');
      C_Save.val("0");
});


// CLEAR //
$("#start_date_Save").click(function() {
  var C_Save = $('select#C_Save');
      C_Save.val("0");
});



// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#C_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#C_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#C_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#C_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#C_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#C_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#C_Save');
      sunday_Save.val("0");
});




$('#twelve_to_two_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var twelve_to_two_Save = $('select#twelve_to_two_Save');
      twelve_to_two_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var twelve_to_two_Save = $('select#twelve_to_two_Save');
      twelve_to_two_Save.val("0");
});

// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#twelve_to_two_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#twelve_to_two_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#twelve_to_two_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#twelve_to_two_Save');
  thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#twelve_to_two_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#twelve_to_two_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#twelve_to_two_Save');
      sunday_Save.val("0");
});


$('#time').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var time = $('input#time');
      time.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var time = $('select#time');
      time.val("0");
});


// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('input#time');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('input#time');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('input#time');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('input#time');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('input#time');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('input#time');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('input#time');
      sunday_Save.val("0");
});














// 2:00 PM - 4:00 PM //
 $('#DD_Save').empty().val(Time_Aired);

  $("#two_to_four_Save").on("input", function() {
  $("#D_Save").val("");
  if ($(this).val().length >= 0) {
    $("#D_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#D_Save").val(Time_Aired);
  }
});

$('#D_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var D_Save = $('select#D_Save');
      D_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var D_Save = $('select#D_Save');
      D_Save.val("0");
});



// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#D_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#D_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#D_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#D_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#D_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#D_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#D_Save');
      sunday_Save.val("0");
});




$('#two_to_four_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var two_to_four_Save = $('select#two_to_four_Save');
      two_to_four_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var two_to_four_Save = $('select#two_to_four_Save');
      two_to_four_Save.val("0");
});



// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#two_to_four_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#two_to_four_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#two_to_four_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#two_to_four_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#two_to_four_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#two_to_four_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#two_to_four_Save');
      sunday_Save.val("0");
});


$('#time').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var time = $('input#time');
      time.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var time = $('select#time');
      time.val("0");
});


// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('input#time');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('input#time');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('input#time');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('input#time');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('input#time');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('input#time');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('input#time');
      sunday_Save.val("0");
});










// 4:00 PM - 6:00 PM //
 $('#EE_Save').empty().val(Time_Aired);

  $("#four_to_six_Save").on("input", function() {
  $("#E_Save").val("");
  if ($(this).val().length >= 0) {
    $("#E_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#E_Save").val(Time_Aired);
  }
});


$('#E_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var E_Save = $('select#E_Save');
      E_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var E_Save = $('select#E_Save');
      E_Save.val("0");
});


// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#E_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#E_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#E_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#E_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#E_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#E_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#E_Save');
      sunday_Save.val("0");
});




$('#four_to_six_Save').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var four_to_six_Save = $('select#four_to_six_Save');
      four_to_six_Save.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var four_to_six_Save = $('select#four_to_six_Save');
      four_to_six_Save.val("0");
});

// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('select#four_to_six_Save');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('select#four_to_six_Save');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('select#four_to_six_Save');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('select#four_to_six_Save');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('select#four_to_six_Save');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('select#four_to_six_Save');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('select#two_to_four_Save');
      sunday_Save.val("0");
});

$('#time').val();

// CLEAR //
$("#end_date_Save").click(function() {
  var time = $('input#time');
      time.val("0");
});

// CLEAR //
$("#start_date_Save").click(function() {
  var time = $('select#time');
      time.val("0");
});




// CLEAR //
$("#monday_Save").click(function() {
  var monday_Save = $('input#time');
      monday_Save.val("0");
});

// CLEAR //
$("#tuesday_Save").click(function() {
  var tuesday_Save = $('input#time');
      tuesday_Save.val("0");
});

// CLEAR //
$("#wednesday_Save").click(function() {
  var wednesday_Save = $('input#time');
      wednesday_Save.val("0");
});

// CLEAR //
$("#thursday_Save").click(function() {
  var thursday_Save = $('input#time');
      thursday_Save.val("0");
});

// CLEAR //
$("#friday_Save").click(function() {
  var friday_Save = $('input#time');
      friday_Save.val("0");
});

// CLEAR //
$("#saturday_Save").click(function() {
  var saturday_Save = $('input#time');
      saturday_Save.val("0");
});

// CLEAR //
$("#sunday_Save").click(function() {
  var sunday_Save = $('input#time');
      sunday_Save.val("0");
});




// DISABLED //
var monday_Save = $('#monday_Save').val();
var tuesday_Save = $('#tuesday_Save').val();
var wednesday_Save = $('#wednesday_Save').val();
var thursday_Save = $('#thursday_Save').val();
var friday_Save = $('#friday_Save').val();
var saturday_Save = $('#saturday_Save').val();
var sunday_Save = $('#sunday_Save').val();

// HOURS DISABLE //
if (monday_Save == "Mon" || tuesday_Save == "Tue" || 
    wednesday_Save == "Wed" || thursday_Save == "Thu" || 
    friday_Save == "Fri" || saturday_Save == "Sat" || 
    sunday_Save == "Sun") {
document.getElementById("A_Save").disabled = false;
document.getElementById("B_Save").disabled = false;
document.getElementById("C_Save").disabled = false;
document.getElementById("D_Save").disabled = false;
document.getElementById("E_Save").disabled = false;


document.getElementById("eigth_to_ten_Save").disabled = false;
document.getElementById("ten_to_twelve_Save").disabled = false;
document.getElementById("twelve_to_two_Save").disabled = false;
document.getElementById("two_to_four_Save").disabled = false;
document.getElementById("four_to_six_Save").disabled = false;

} else {

document.getElementById("A_Save").disabled = true;
document.getElementById("B_Save").disabled = true;
document.getElementById("C_Save").disabled = true;
document.getElementById("D_Save").disabled = true;
document.getElementById("E_Save").disabled = true;

document.getElementById("eigth_to_ten_Save").disabled = true;
document.getElementById("ten_to_twelve_Save").disabled = true;
document.getElementById("twelve_to_two_Save").disabled = true;
document.getElementById("two_to_four_Save").disabled = true;
document.getElementById("four_to_six_Save").disabled = true;
} 

});

</script>

<!-- COUNT TIME AIRED -->
<script type="text/javascript">

$('.form-control').change('input', function() {

// INPUT //
  var mon1 = $('.A_Save').val();
  var tue1 = $('.B_Save').val();
  var wed1 = $('.C_Save').val();
  var thu1 = $('.D_Save').val();
  var fri1 = $('.E_Save').val();


// COUNT //
  var Totaldays = Math.floor(mon1) + Math.floor(tue1) + Math.floor(wed1) + Math.floor(thu1) + Math.floor(fri1);

// OUTPUT //
  $('.time').empty().val(Totaldays); 

// CLEAR //
$("#end_date_Save").click(function() {
  var time = $('input#time');
      time.val("0");
});

});

</script>















































<!-- --------INPUT FORM SAVE START  -------------->
                    
           <!-- CONTENT START -->
           <div class="row g-4 mb-4" hidden >

            <!--  START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="font-weight: normal; color: black; font-size:13px">  </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->



        <!-- VIDEO PLAYER START -->
          <div class="row g-4 mb-4">

                  
<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0" >
            
    <thead>




       <!-- VIDEO FILE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> File Name </th>

                <th class="meta">
                <input type="text" name="video" value="" placeholder="File Name" id="video_file_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;   " class="form-control video_file_Cal" readonly>  
                </th>

      </tr>

       <!-- TITLE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> id </th>

                <th class="meta">
                <input type="text" name="videojojo_id" value="" placeholder="Content Name" id="video_id_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control video_id_Cal" readonly>  
                </th>

      </tr>

       <!-- TITLE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> title </th>

                <th class="meta">
                <input type="text" name="video_name" value="" placeholder="Content Name" id="video_name_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control video_name_Cal" readonly>  
                </th>

      </tr>

       <!-- DURATION -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Duration </th>

                <th class="meta">
                <input type="text" name="duration" value="" placeholder="Duration" id="duration_Cal" 
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control duration_Cal" readonly> 
                     <span style="font-size: 10px; color:gray; font-weight: normal;"> NOTE : Convert to Seconds</span>  
 
                </th>

      </tr>


       <!-- SPOTS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spots </th>

                <th class="meta">
                <input type="text" name="spots" value="" placeholder="Status" id="spots_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control spots_Cal" readonly> 
                     <span style="font-size: 10px; color:gray; font-weight: normal;"> NOTE : 1 Spots per 15 secs</span>  
 
                </th>

      </tr>


       <!-- SPOTS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spots </th>

                <th class="meta">
                <input type="text" name="count" value="" placeholder="spots" id="spots_Cal1"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control spots_Cal1" readonly> 
                     <span style="font-size: 10px; color:gray; font-weight: normal;"> NOTE : 1 Spots per 15 secs</span>  
 
                </th>

      </tr>


      <!-- CONTENT END -->
      <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Categoty </th>
                <th class="meta">
                <input type="text" name="category" value="" placeholder="Category" id="category_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control category_Cal" readonly>  
                </th>

      </tr>

       <!-- STATUS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Status </th>

                <th class="meta">
                <input type="text" name="video_status" value="" placeholder="Status" id="video_status_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control video_status_Cal" readonly>  
                </th>

      </tr>

       <!-- NAME -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Name </th>

                <th class="meta">
                <input type="text" name="name" value="" placeholder="Name" id="name_Cal"
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control name_Cal" readonly>  
                </th>

      </tr>



       <!-- STATUS -->
       <tr >
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Video Spots </th>

                <th class="meta">
                <input type="text" name="video_spots_no_yes" id="video_spots_Cal" value="" placeholder="Video Spots No"
                     style="color: gray; font-size: 12px; font-weight:normal; background: none; " class="form-control video_spots_Cal" readonly>  
                </th>

      </tr>





    </thead>

    </table>

                        
  </div>

</div>
<!-- TABLE END -->

            
             
            </div>
            <!-- END -->


              </div>
              <!-- SEARCH BUTTON END -->

          </div>
          <!-- VIDEO PLAYER START -->


<!--------------------             ------------------------>

        <!-- SITES -->
          <div class="row g-4 mb-4" hidden>


          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="font-weight: normal; color: black; font-size:13px"> Sites</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0" >
            
    <thead>

      <!-- NUMBER OF SITE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Number Of Site </th>

                <th class="meta">
                <input type="int" name="number_of_sites"    id="number_of_sites_Cal" placeholder="Number Of Site" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control number_of_sites_Cal" >  
                </th>

      </tr>

    </thead>
      

    </table>
                  
  </div>

</div>
<!-- TABLE END -->

                 
              </div>
              <!-- END -->

          </div>
          <!-- DATE RANGES END -->



<!--------------------             ------------------------>


        <!-- DATE RANGES START -->
          <div class="row g-4 mb-4" hidden>


          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="font-weight: normal; color: black; font-size:13px"> Date Ranges</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0" >
            
    <thead>


      <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Start Date  </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> End Date </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal; width: 15%"> Campaign Duration </th>
      </tr>


    </thead>

    <tbody>
      
           <tr>

            <!-- START -->
            <td class="cell">
                <input type="text" name="play_start" id="start_date_Cal" placeholder="Date" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;   " class="form-control start_date_Cal" >  
            </td>


            <!-- END -->
            <td class="cell">
                <input type="text" name="end_start"    id="end_date_Cal" placeholder="Date" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control end_date_Cal" > 
            </td>


            <!-- NUMBER OF DAYS -->
            <td class="meta">
                <input type="text" name="campaign_duration" id="date_count_Cal" placeholder="Campaign Duration" readonly 
                     style="color: gray; font-size: 13px; font-weight:normal; " class="form-control date_count_Cal" >  
            </td>

           </tr>

    </table>
                  
  </div>

</div>
<!-- TABLE END -->

                 
              </div>
              <!-- END -->

          </div>
          <!-- DATE RANGES END -->


<!-- --------------------       --------------------->

        <!-- DAYS START -->
          <div class="row g-4 mb-4" hidden>            

          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="font-weight: normal; color: black; font-size:13px"> Days </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0" >
            
    <thead>

      <tr>

                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Mon</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Tue</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Wed</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Thu</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Fri</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Sat</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Sun</th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Days Appearance </th>

      </tr>


    </thead>

    <tbody>
      
           <tr>

            <!-- MONDAY -->
            <td class="cell">
                  <input type="int" name="monday"    id="monday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control monday_Cal" >  

                   <input type="int"   id="monday_date_Cal" readonly class="form-control monday_date_Cal" placeholder="Days"
                   style="color: gray; font-size: 13px; font-weight:normal;"> 
            </td>

            <!-- THUSDAY -->
            <td class="cell">
                     <input type="int" name="tuesday"    id="tuesday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control tuesday_Cal" >

               <input type="text"  id="tuesday_date_Cal"  readonly class="form-control tuesday_date_Cal" placeholder="Days"
               style="color: gray; font-size: 13px; font-weight:normal;"> 
            </td>

            <!-- WENESDAY -->
            <td class="cell">
                    <input type="int" name="wednesday"    id="wednesday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control wednesday_Cal" >

               <input type="text"   id="wednesday_date_Cal" readonly  class="form-control wednesday_date_Cal" placeholder="Days"
               style="color: gray; font-size: 13px; font-weight:normal;">     
            </td>

            <!-- THURSDAY -->
            <td class="cell">
               <input type="int" name="thursday"    id="thursday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control thursday_Cal" > 

               <input type="text"  id="thursday_date_Cal" readonly class="form-control thursday_date_Cal" placeholder="Days"
               style="color: gray; font-size: 13px; font-weight:normal;">             
            </td>

            <!-- FRIDAY -->
            <td class="cell">
                <input type="int" name="friday"    id="friday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;" class="form-control friday_Cal" >  

               <input type="text"   id="friday_date_Cal" readonly class="form-control friday_date_Cal" placeholder="Days"
               style="color: gray; font-size: 13px; font-weight:normal;">  
            </td>

            <!-- SATURDAY -->
            <td class="cell">
                <input type="int" name="saturday"    id="saturday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control saturday_Cal" > 

               <input type="text"   id="saturday_date_Cal" readonly class="form-control saturday_date_Cal" placeholder="Days"
               style="color: gray; font-size: 13px; font-weight:normal;"> 
            </td>

            <!-- SUNDAY -->
            <td class="cell">
                <input type="int" name="sunday"    id="sunday_Cal" placeholder="None" readonly
                     style="color: gray; font-size: 13px; font-weight:normal;  " class="form-control sunday_Cal" > 

                 <input type="int"  id="sunday_date_Cal" readonly class="form-control sunday_date_Cal" placeholder="Days"
                 style="color: gray; font-size: 13px; font-weight:normal:"> 
            </td>

            <!-- Days Appearance  -->
            <td class="cell">
                 <input type="int" name="days_appearance" id="date_diff_Cal" readonly class="form-control date_diff_Cal" placeholder="Days Appearance "
                 style="color: gray; font-size: 13px; font-weight:normal:"> 
            </td>

           </tr>


    </tbody>

    </table>
                  
  </div>

</div>
<!-- TABLE END -->

                          
              </div>
              <!-- END -->


          </div>
          <!-- DAYS END -->


<!-- ---------------      -------------------------->

        <!-- HOUSR START -->
          <div class="row g-4 mb-4" hidden>

          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span style="font-weight: normal; color: black; font-size:13px" > Times Aired Per Day </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0" >
            
    <thead>

      <tr>

                <th class="meta" style="color: black; font-size: 10px; font-weight:normal;"> 8:00 AM - 10:00 AM </th>
                <th class="meta" style="color: black; font-size: 10px; font-weight:normal;"> 10:00 AM - 12:00 PM </th>
                <th class="meta" style="color: black; font-size: 10px; font-weight:normal;"> 12:00 PM - 2:00 PM </th>
                <th class="meta" style="color: black; font-size: 10px; font-weight:normal;"> 2:00 PM - 4:00 PM </th>
                <th class="meta" style="color: black; font-size: 10px; font-weight:normal;"> 4:00 PM - 6:00 PM </th>

      </tr>


    </thead>

    <tbody>
      
           <tr>

            <!-- 8:00 AM - 10:00 AM -->
            <td class="cell">
                       <input type="int" name="eigth_to_ten" id="eigth_to_ten_Cal" readonly hidden>  
                       <input type="int" name="AA" id="A_Cal" readonly  
                       style="color: gray; font-size: 13px; font-weight:normal;" placeholder="Times Aired"
                        class="form-control eigth_to_ten_Cal" > 
            </td>

            <!-- 10:00 AM - 12:00 PM -->
            <td class="cell">
                     <input type="int" name="ten_to_twelve" id="ten_to_twelve_Cal" readonly hidden>  
                     <input type="int" name="BB" id="B_Cal" readonly 
                      style="color: gray; font-size: 13px; font-weight:normal; " placeholder="Times Aired"  
                      class="form-control ten_to_twelve_Cal" >  
            </td>

            <!-- 12:00 PM - 2:00 PM -->
            <td class="cell">
                    <input type="int" name="twelve_to_two" id="twelve_to_two_Cal" readonly hidden>  
                    <input type="int" name="CC" id="C_Cal" readonly 
                     style="color: gray; font-size: 13px; font-weight:normal;" placeholder="Times Aired"  
                     class="form-control twelve_to_two_Cal" >    
            </td>

            <!-- 2:00 PM - 4:00 PM -->
            <td class="cell">
                     <input type="int" name="two_to_four" id="two_to_four_Cal" readonly hidden>  
                     <input type="int" name="DD" id="D_Cal" readonly 
                      style="color: gray; font-size: 13px; font-weight:normal;" placeholder="Times Aired"  
                      class="form-control two_to_four_Cal" >             
            </td>

            <!-- 4:00 PM - 6:00 PM -->
            <td class="cell">
                     <input type="int" name="four_to_six" id="four_to_six_Cal" readonly hidden>  
                     <input type="int" name="EE" id="E_Cal" readonly 
                      style="color: gray; font-size: 13px; font-weight:normal;" placeholder="Times Aired"  
                      class="form-control four_to_six_Cal" >  
            </td>



           </tr>


    </tbody>

    </table>
                


  </div>

</div>
<!-- TABLE END -->


                              
              </div>
              <!-- END -->


          </div>
          <!-- HOURS END -->


<!-- -----------------      ------------------------>

        <!-- TOTAL START -->
          <div class="row g-4 mb-4" hidden>


          <!-- START -->
                <div class="app-card app-card-stats-table h-100 shadow-sm" >

                  <!-- TITLE START -->
                  <div class="app-card-header p-3" >
                    <div class="row justify-content-between align-items-center" >

                      <div class="col-auto">
                        <div class="card-header-action">
                          <span> Total  </span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- TITLE END -->


<!-- TABLE START -->
<div class="app-card-body p-3 p-lg-4">

    <div class="table-responsive">

<table class="table table-borderless mb-0">
            
    <thead>

       <!-- TOTAL SPOTS -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots </th>
                <th class="meta">
                <input type="int" name="total_spots" id="A_Total_spots_Cal" class="form-control A_Total_spots_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: whitesmoke;">  
                </th>

       </tr>

       <!-- TOTAL SPOTS PER SITE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots </th>
                <th class="meta">
                <input type="int" name="total_spots_per_site" id="Total_Spots_Per_Site_Cal" class="form-control Total_Spots_Per_Site_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: whitesmoke;">  
                </th>

       </tr>






       <!-- TOTAL Frequency -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Frequency </th>
                <th class="meta">
                <input type="int" name="total_frequency" id="Total_Frequency_Cal" class="form-control Total_Frequency_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: none;">  
                </th>

       </tr>

       <!-- TOTAL Frequency PER SIYE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Frequency per Site </th>
                <th class="meta">
                <input type="int" name="total_frequency_per_site" id="Total_Frequency_per_Site_Cal" class="form-control Total_Frequency_per_Site_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: none;">  
                </th>

       </tr>







       <!-- TOTAL SPOTS PER DAY  -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots per Day </th>
                <th class="meta">
                <input type="int" name="total_spots_per_day" id="Total_Spots_Per_Day_Cal" class="form-control Total_Spots_Per_Day_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: none;">  
                </th>

       </tr>

       <!-- TOTAL SPOTS PER SITE PER DAY -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Total Spots per Site per Day  </th>
                <th class="meta">
                <input type="int" name="total_spots_per_site_per_day" id="Total_Spots_Per_Site_per_Day_Cal" class="form-control Total_Spots_Per_Site_per_Day_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: none;">  
                </th>

       </tr>








       <!-- TOTAL PRICES -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Amount </th>
                <th class="meta">
                <input type="int" name="total_price" id="A_Total_prices_Cal" class="form-control A_Total_prices_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: whitesmoke;">  
                </th>

       </tr>

       <!-- Price per Spot  -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Price per Spot </th>
                <th class="meta">
                <input type="int" name="prices" id="A_Prices_Cal" class="form-control A_Prices_Cal" readonly
                       style="color: gray; font-size: 13px; font-weight:normal; background: whitesmoke; " >  
                </th>

       </tr>     











       <!-- Views loops -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Views </th>
                <th class="meta">
                <input type="int" name="jojo" value="1" id="jojo" class="form-control jojo" readonly
                     style="color: gray; font-size: 13px; font-weight:normal; background: none; ">  
                </th>

       </tr>

       <!-- ACTIVE -->
       <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Active </th>
                <th class="meta">
                <input type="int" name="active" value="1" id="active" class="form-control active" readonly
                     style="color: gray; font-size: 13px; font-weight:normal; background: none;">  
                </th>

        </tr>


    </thead>

    </table>
                  
  
  </div>

</div>
<!-- TABLE END -->

                  
              </div>
              <!-- END -->

          </div>
          <!-- TOTAL END -->



</form>
<!-- FORM SAVE END -->




      </div><!--//app-content-->      
    </div><!--//app-wrapper-->              














<!-- CALCULATE --> 
<script>

$('.form-control').change('input', function() {


// CONTENT DETAILS // 
  var video_file_Save = $('#video_file_Save').val();
  var video_name_Save = $('#video_name_Save').val();
  var duration_Save = $('#duration_Save').val();
  var category_Save = $('#category_Save').val();
  var video_status_Save = $('#video_status_Save').val();
  
  var video_spots_Save = $('#video_spots_Save').val();



  var video_id_Save = $('#video_id_Save').val();



  var spots_Save = $('#spots_Save').val();
  var spots_Save1 = $('#spots_Save1').val();



  var name_Save = $('#name_Save').val();







// SPOTS //
  var Total_Frequency_Save = $('#Total_Frequency_Save').val();
  var Total_Spots_Per_Day_Save = $('#Total_Spots_Per_Day_Save').val();

// SPOTS PER SITE //
  var Total_Spots_Per_Site_Save = $('#Total_Spots_Per_Site_Save').val();
  var Total_Frequency_per_Site_Save = $('#Total_Frequency_per_Site_Save').val();
  var Total_Spots_Per_Site_per_Day_Save = $('#Total_Spots_Per_Site_per_Day_Save').val();






  var A_Prices_Save = $('#A_Prices_Save').val();

// SITES COUNT DETAILS // 
  var site_count_Save = $('#site_count_Save').val();

// DATE RANGES DETAILS // 
  var start_date_Save = $('#start_date_Save').val();
  var end_date_Save = $('#end_date_Save').val();

// DATE DIFF DETAILS // 
  var date_diff_Save = $('#date_diff_Save').val();

// DATE  // 
  var date_count_Save = $('#date_count_Save').val();

// DAYS DETAILS // 
  var monday_Save = $('#monday_Save').val();
  var tuesday_Save = $('#tuesday_Save').val();
  var wednesday_Save = $('#wednesday_Save').val();
  var thursday_Save = $('#thursday_Save').val();
  var friday_Save = $('#friday_Save').val();
  var saturday_Save = $('#saturday_Save').val();
  var sunday_Save = $('#sunday_Save').val();

// DAYS APPERANCES DETAILS // 
  var monday_date_Save = $('#monday_date_Save').val();
  var tuesday_date_Save = $('#tuesday_date_Save').val();
  var wednesday_date_Save = $('#wednesday_date_Save').val();
  var thursday_date_Save = $('#thursday_date_Save').val();
  var friday_date_Save = $('#friday_date_Save').val();
  var saturday_date_Save = $('#saturday_date_Save').val();
  var sunday_date_Save = $('#sunday_date_Save').val();


// HOURS DETAILS // 
  var eigth_to_ten_Save = $('#eigth_to_ten_Save').val();
  var ten_to_twelve_Save = $('#ten_to_twelve_Save').val();
  var twelve_to_two_Save = $('#twelve_to_two_Save').val();
  var two_to_four_Save = $('#two_to_four_Save').val();
  var four_to_six_Save = $('#four_to_six_Save').val();

// TIME AIRED DETAILS // 
  var A_Save = $('#A_Save').val();
  var B_Save = $('#B_Save').val();
  var C_Save = $('#C_Save').val();
  var D_Save = $('#D_Save').val();
  var E_Save = $('#E_Save').val();




// CONTENT DETAILS // 
  $('#video_file_Cal').empty().val(video_file_Save);
  $('#video_name_Cal').empty().val(video_name_Save);
  $('#duration_Cal').empty().val(duration_Save);
  $('#category_Cal').empty().val(category_Save);
  $('#video_status_Cal').empty().val(video_status_Save);


  $('#video_id_Cal').empty().val(video_id_Save);


  $('#spots_Cal').empty().val(spots_Save);

  $('#video_spots_Cal').empty().val(video_spots_Save);


  $('#spots_Cal1').empty().val(spots_Save1);



  $('#name_Cal').empty().val(name_Save);




// SPOTS //
  $('#Total_Frequency_Cal').empty().val(Total_Frequency_Save);
  $('#Total_Spots_Per_Day_Cal').empty().val(Total_Spots_Per_Day_Save);


// SPOTS PER SITE //
  $('#Total_Spots_Per_Site_Cal').empty().val(Total_Spots_Per_Site_Save);
  $('#Total_Frequency_per_Site_Cal').empty().val(Total_Frequency_per_Site_Save);
  $('#Total_Spots_Per_Site_per_Day_Cal').empty().val(Total_Spots_Per_Site_per_Day_Save);



















  $('#A_Prices_Cal').empty().val(A_Prices_Save);

// SITES COUNT DETAILS // 
  $('#number_of_sites_Cal').empty().val(site_count_Save);

// DATE RANGES DETAILS // 
  $('#start_date_Cal').empty().val(start_date_Save);
  $('#end_date_Cal').empty().val(end_date_Save);

// DATE DIFF DETAILS // 
  $('#date_diff_Cal').empty().val(date_diff_Save);

// DATE COUNT // 
  $('#date_count_Cal').empty().val(date_count_Save);

// DAYS DETAILS // 
  $('#monday_Cal').empty().val(monday_Save);
  $('#tuesday_Cal').empty().val(tuesday_Save);
  $('#wednesday_Cal').empty().val(wednesday_Save);
  $('#thursday_Cal').empty().val(thursday_Save);
  $('#friday_Cal').empty().val(friday_Save);
  $('#saturday_Cal').empty().val(saturday_Save);
  $('#sunday_Cal').empty().val(sunday_Save);

// DAYS APPERANCES DETAILS // 
  $('#monday_date_Cal').empty().val(monday_date_Save);
  $('#tuesday_date_Cal').empty().val(tuesday_date_Save);
  $('#wednesday_date_Cal').empty().val(wednesday_date_Save);
  $('#thursday_date_Cal').empty().val(thursday_date_Save);
  $('#friday_date_Cal').empty().val(friday_date_Save);
  $('#saturday_date_Cal').empty().val(saturday_date_Save);
  $('#sunday_date_Cal').empty().val(sunday_date_Save);

// HOURS DETAILS // 
  $('#eigth_to_ten_Cal').empty().val(eigth_to_ten_Save);
  $('#ten_to_twelve_Cal').empty().val(ten_to_twelve_Save);
  $('#twelve_to_two_Cal').empty().val(twelve_to_two_Save);
  $('#two_to_four_Cal').empty().val(two_to_four_Save);
  $('#four_to_six_Cal').empty().val(four_to_six_Save);

// TIME AIRED DETAILS // 
  $('#A_Cal').empty().val(A_Save);
  $('#B_Cal').empty().val(B_Save);
  $('#C_Cal').empty().val(C_Save);
  $('#D_Cal').empty().val(D_Save);
  $('#E_Cal').empty().val(E_Save);
});

</script>

</body>
</html> 

