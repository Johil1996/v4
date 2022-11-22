<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Content </title>

</head> 

<body class="app">  

<?php include 'header.php'; ?> 	

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">




				    <div class="col-auto">
				    <h1 class="app-page-title"  style="font-weight: normal;">Content

                        <a data-bs-toggle="modal" data-bs-target="#modal1" >
                           <button  type="submit" name="search"  class="btn btn-primary"  
                           style="font-size: 13px;   background: #006600; font-weight: normal; color: white; ">
                           <?php include 'icon/upload.php'?> Upload </button>
                        </a>
                    </h1>
				    </div>

<?php

    if (isset($_POST['search'])) {
        include 'database/database.php';
        
        $Name = $fetch['name'];
        $client = "Client";       
        $vid = $_POST['vid'];

 if ($vid == "vid") {
                $query = "SELECT * FROM video WHERE category='$vid' and name='$Name' and category='Client' ORDER BY id desc ";

                $approved = jojo1($query);
            } else {
                $query = "SELECT * FROM video WHERE category='$vid' and name='$Name' and category='Client' ORDER BY id desc";
                $approved = jojo1($query);
                
            }
    
        }   else {

        $Name = $fetch['name'];
        $client = "Client";   

        $query = "SELECT * FROM video WHERE name='$Name' and category='Client' ORDER BY id desc";
        $approved = jojo1($query);

    }

    function jojo1($query) {
        include 'database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }


?>

<div class="row g-4" >

    <?php while ($row = mysqli_fetch_assoc($approved)) { ?>
  
		<div class="col-6 col-md-4 col-xl-3 col-xxl-2" id="example">

			<div class="app-card app-card-doc shadow-sm  h-100">
				    	
						    <div class="app-card-thumb-holder p-3">
							    <div class="app-card-thumb">

	                                <video class="thumb-image" autoplay muted style="box-shadow: none; margin-top: 2%;">
         								<source src="<?php echo $row['video']; ?>" type=video/mp4>
 									</video> 

	                            </div>
						    </div>

<div class="app-card-body p-3 has-card-actions"> 
							    
	<h4 class="app-doc-title truncate mb-0"><a href="#file-link"><?php echo $row['video_name'];?></a></h4>
							    
		<div class="app-doc-meta">
								   
			<ul class="list-unstyled mb-0">
								    
									    
				<li> <span style="color: black; font-size: 12px; font-weight:normal;">Duration : 
				     </span style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['duration'];?> Secs
				</li>

                <li> <span style="color: black; font-size: 12px; font-weight:normal;">Spot : 
                     </span style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['spots'];?> Spots
                </li>

				<li> <span style="color: black; font-size: 12px; font-weight:normal;">Date Upload : 
				     </span style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("M d, Y", strtotime ($row['date_time']));?>
				</li>

           </ul>

        </div>
							





<div class="app-card-actions">

	<div class="dropdown">

		<div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false"><?php include 'icon/three_dot.php'?></div>

			<ul class="dropdown-menu">


             <!-- VIEW PLAYLIST -->                              
            <li> <a class="dropdown-item" href='playlist_add.php?id=<?php echo $row['id'];?>'>
                 <span style="color: ;"><i class='fa fa-plus'></i></span><span style="font-family: sans-serif; margin-left:5%;">Add to Playlist</span>
                 </a>
            </li>   
                                      
             <!-- VIEW DETAILS -->                              
            <li> <a class="dropdown-item" href='content_view.php?id=<?php echo $row['id'];?>'>
                 <span style="color: ;"><?php include 'icon/view.php'?></span><span style="font-family: sans-serif;">View Details</span>
                 </a>
            </li>  

	        <!-- EDIT CONTENT  -->                              
			<li> <a class="dropdown-item" href="content_edit.php?id=<?php echo $row['id'];?>" >
				 <span style="color: ;"><?php include 'icon/edit.php'?></span><span style="font-family: sans-serif;">Edit</span> 
			    </a>
			</li>  


<form method='POST' action='content_delete.php?id=<?php echo $row['id']; ?>'>

	       	<!-- DELETE CONTENT -->
			<li> <a class="dropdown-item" href='delete/content_delete.php?id=<?php echo $row['id']; ?>' onclick='return checkdelete()'>
				 <span style="color: ;"><?php include 'icon/delete.php'?></span><span style="font-family: sans-serif;">Delete</span>
			     </a>
			</li>

<input type='hidden' name='video_name' value='<?php echo $row['video_name']; ?>'>

</form>

<script>
    function checkdelete() {
      return confirm ('Are you sure you want to Delete this Content');
    }
</script>
					
		    </ul>

		</div>

	</div>	

</div>

         </div>
	
    </div>

<?php } ?>

</div>






















<!-- Modal 2-->
<div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" 
     aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-xl" >
    <div class="modal-content" style="border-radius: none;">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


<!-- FORM START -->
<form  enctype="multipart/form-data" method="POST" action="upload.php"> 

<!-- HEADER -->
<div class="modal-header">

<h5 class="modal-title" id="staticBackdropLabel"> Upload Content </h5>

<!-- UPLOAD FILES -->
<div style="margin-left: 77%">
<button type="button" id="buttonid" class="btn btn-primary"
        style="font-size: 12px; background: #006600; font-weight: normal; color: white; "> SELECT FILE </button>
<input type="file" name="video" id="video" class="form-control video" hidden> 
</div>


<!-- EXIT -->
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     
<script type="text/javascript">
document.getElementById('buttonid').addEventListener('click', openDialog);

function openDialog() {
  document.getElementById('video').click();
}
</script>

</div>


<!-- DROPDOWN -->
 <div class="root-visual_menu flex-menu">
    <div class="lvl2-el2-visual flex-menu menu-scrollable">
        <div class="lvl3-el2-visual scrollable_menu">


      <div class="modal-body">

      <?php
         $select = mysqli_query($con, "SELECT * FROM account WHERE id = '$user_type'");
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         }
      ?>     

                
<div class="tab-content" id="orders-table-tab-content">

    <div class="row g-4 mb-4">

                       <!--  START -->
                        <div class="app-card app-card-stats-table h-100 shadow-sm" >

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


        <div class="row g-4 mb-4">

            <div class="col-12 col-lg-6"  >

                <div class="row g-4 mb-4">

                    <video class="meta" src="" autoplay loop controls  id="audio" style="margin-left: 5%; margin-top: 10%"></video>

                </div>

             </div>


<!-- TABLE START -->
<div class="col-12 col-lg-6">

    <div class="app-card-body p-3 p-lg-4">

         <div class="table-responsive">

<table class="table table-borderless mb-0">

            <!-- TABLE START -->
            <tr hidden>
                <th class="meta">
                <input type="text" name="name" value="<?php echo $fetch['name'];?>" readonly
                       style="color: gray; font-size: 12px; font-weight:normal; background:none;" 
                       class="form-control" > 
                </th>
            </tr>     


            <!-- TITLE -->
            <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Title </th>
                <th class="meta">
                <input type="text" name="video_name" placeholder="Content Name *" 
                       style="color: gray; font-size: 12px; font-weight:normal; " class="form-control video_name" required>  
                </th>
            </tr>

            <!-- DURATION -->
            <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Duration </th>
                <th class="meta">
                <input type="int" name="duration" placeholder="Seconds" id="duration" readonly
                       style="color: gray; font-size: 12px; font-weight:normal; background:none;" class="form-control duration" >  
                </th>
            </tr>                 

            <!-- SPOTS -->
            <tr >
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Spot </th>
                <th class="meta">
                <input type="text" name="spots" value="" placeholder="Spots" id="spots" readonly 
                       style="color: gray; font-size: 12px; font-weight:normal; background:none;" 
                       class="form-control spots" > 
                </th>
            </tr>

            <!-- CATEGORY -->                    
            <tr hidden>
                <th>
                <input type="text" name="category" value="Client" id="category" readonly 
                       style="color: gray; font-size: 12px; font-weight:normal; background:none;" 
                       class="form-control category" > 
                </th>
            </tr>  

            <!-- SPOTS -->                    
            <tr hidden>
                <th>
                <input type="text" name="video_spots_no_yes" value="No"  readonly 
                       style="color: gray; font-size: 12px; font-weight:normal; background:none;" 
                       class="form-control " > 
                </th>
            </tr>            

            <!-- VIDEO STATUS -->
            <tr hidden>
                <th class="meta">
                <input type="text" name="video_status" value="Activate" readonly
                       style="color: gray; font-size: 12px; font-weight:normal; background:none;" 
                       class="form-control" > 
                </th>
            </tr>   

</table>

                <span id="status" style="font-size: 10px; margin-left: 20px; "></span>
                 
                <div class="form-group">
                    <div class="progress" id="progressDiv" style="display:none; background: none;">
                        <progress id="progressBar" value="0" max="100" style="width:100%; height: 1.2rem;"></progress>                      
                    </div>
                </div>

                <p id="uploaded_progress" hidden></p>
                    
        </div>

    </div>

</div>
 

<!-- SPOTS -->
<script>

var f_duration = 0;

document.getElementById('audio').addEventListener('canplaythrough', function(e) {

  f_duration = Math.round(e.currentTarget.duration);

   var total = Math.ceil(f_duration / 15);

   document.getElementById('spots').value = total;
   document.getElementById('count').value = total;

  URL.revokeObjectURL(obUrl);

});

var obUrl;

document.getElementById('video').addEventListener('change', function(e){
  var file = e.currentTarget.files[0];

  if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg|mkv)$/i)) {

    obUrl = URL.createObjectURL(file);

    document.getElementById('audio').setAttribute('src', obUrl);
  }

});
</script>

<!-- DURATION -->
<script>

var f_duration =0;  
document.getElementById('audio').addEventListener('canplaythrough', function(e) {

  f_duration = Math.round(e.currentTarget.duration);

  document.getElementById('duration').value = f_duration;

  URL.revokeObjectURL(obUrl);

});

var obUrl;

document.getElementById('video').addEventListener('change', function(e) {

  var file = e.currentTarget.files[0];

  if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg|mkv)$/i)) {

    obUrl = URL.createObjectURL(file);

    document.getElementById('audio').setAttribute('src', obUrl);

  }

});

</script>

 <!-- CLEAR INPUT -->
<script type="text/javascript">

$('.form-control').change('input', function() {

// CLEAR //
$("#video").click(function() {
  var dura = $('input#duration');
      dura.val("0");
});

// CLEAR //
$("#video").click(function() {
  var spot = $('input#spots');
      spot.val("0");
});

});
</script>

<!-- FILTER -->
<script>
document.getElementById("video")
.onchange = function(event) {
  let file = event.target.files[0];
  let blobURL = URL.createObjectURL(file);
  document.querySelector("video").src = blobURL;
}
</script>

<!-- UPLOAD BY MB -->
<script>
    function _(abc) {
    return document.getElementById(abc);
}
function uploadFile() {
    document.getElementById('progressDiv').style.display='block';
    var file = _("video").files[0];
    var formdata = new FormData();
    formdata.append("video", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "upload.php");
    ajax.send(formdata);
}
function progressHandler(event) {
    var loaded = new Number((event.loaded / 1048576));//Make loaded a "number" and divide bytes to get Megabytes
    var total = new Number((event.total / 1048576));//Make total file size a "number" and divide bytes to get Megabytes
    _("uploaded_progress").innerHTML = "Uploaded " + loaded.toPrecision(5) + " Megabytes of " + total.toPrecision(5);//String output
    var percent = (event.loaded / event.total) * 100;//Get percentage of upload progress
    _("progressBar").value = Math.round(percent);//Round value to solid
    _("status").innerHTML = Math.round(percent) + "% uploaded";//String output
}
function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;//Build and show response text
    _("progressBar").value = 0;//Set progress bar to 0
    document.getElementById('progressDiv').style.display = 'none';//Hide progress bar
}
function errorHandler(event) {
    _("status").innerHTML = "Upload Failed";//Switch status to upload failed
}
function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";//Switch status to aborted
}
</script>



                </div>

             </div>

        </div>

    </div>




<!-- CSS SITE STROLLBAR -->
<style type="text/css">

.flex-menu {
  display: flex;
  flex-direction: column;
}

.flex-menu > :not(.scrollable_menu):not(.menu-scrollable) {
  flex-shrink: 0;
}

.flex-menu > .scrollable_menu, .menu-scrollable {
  flex-grow: 0;
}

.menu-scrollable {
  overflow: hidden;
}

.scrollable_menu {
  overflow: auto;
}

.root-visual_menu {
  width: 100%;
  height: 65vh;
}

.scrollable_menu::-webkit-scrollbar
{
   width: 10px;
   height: 0px;

}

.scrollable_menu::-webkit-scrollbar-thumb
{
   background: #006600;
}

.scrollable_menu::-webkit-scrollbar-thumb:active
{
    background: #003349;
}

</style>



</div>

   </div>
  </div>
</div>



      <div class="modal-footer">

        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal"
                style="background: gray ; font-weight: normal;"> Close </button>

                        <button  type="submit" name="save" class="btn btn-primary"  
                                 style="font-size: 12px; background: #006600; font-weight: normal; color: white;" 
                                 onclick="uploadFile()" > Upload </button>
      </div>

</form>



    </div>
  </div>
</div>

</body>
</html> 

