<!-- VIDEO PLAYER SEARCH -->

<?php

    if (isset($_POST['search'])) {
        include 'database/database.php';

        $site = $_POST['site'];
        $startdate = $_POST['txtStartdate'];
        $enddate = $_POST['txtEnddate'];

    if ($startdate == "" || $enddate == "") {
        } else {
          
            if ($site == "site") {
                $query = "SELECT * FROM site_on_off WHERE site_name='$site' AND time_on BETWEEN '$startdate' AND '$enddate' order by id desc";

                $searchResult = filtertable($query);
            } else {
                $query = "SELECT * FROM site_on_off WHERE site_name='$site' AND time_on BETWEEN '$startdate' AND '$enddate' order by id desc";

                $searchResult = filtertable($query);
            }
    
        }     

    } else {

        $query = "SELECT * FROM site_on_off WHERE site_name = '".$_REQUEST['id']."' order by id desc";
        $searchResult = filtertable($query);
    }

    function filtertable($query) {
        include 'database/database.php';

        $filterResults = mysqli_query($con, $query);
        return $filterResults;
    }

?>

<!-- VIDEO PLAYER SEARCH END -->


<!DOCTYPE html>
<html lang="en"> 
<head>

    <title> Aircast | Site ON / OFF </title>


</head> 

<body class="app">      

<?php include'header.php' ?>

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">

<div class="col-auto">
  

<?php

    include 'database/database.php';
    $id = "SELECT * FROM site WHERE site_name ='".$_REQUEST['id']."'";
    $idResults = mysqli_query($con, $id);

    while ($rowid = mysqli_fetch_assoc($idResults)) {
       $site = $rowid['site_name'];
    }
    
    $query = mysqli_query ($con,"SELECT * FROM site WHERE site_name = '$site'");
    $row = mysqli_fetch_array ($query);

?>

                <!-- WELCOME START -->
                <h1 class="app-page-title" style="font-weight: normal;">Time On / Off | 
                    <span style="font-size: 15px; color: gray"><?php echo $row['site_name']; ?> </span></h1>
    <?php
  
?>


 </div>



                <!-- TABLE START -->
                <div class="tab-content" id="orders-table-tab-content">


                    <!-- TABLE ACTIVE START -->
                    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">

                        <div class="app-card app-card-stats-table h-100 shadow-sm">
            
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="table-responsive">

<form method="POST">

      <select type="text" name="site" readonly hidden>
 
    <?php

    include 'database/database.php';
    $query = "SELECT * FROM site WHERE site_name = '".$_REQUEST['id']."'";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
    
    ?>
        <option value="<?php echo $row['site_name']; ?>"> <?php echo $row['site_name']; ?> </option>

    <?php }  ?> 

      </select>

<table class="table table-borderless mb-0">
                        
        <thead>

            <tr>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> Form Date  </th>
                <th class="meta" style="color: black; font-size: 13px; font-weight:normal;"> To Date </th>
            </tr>

        </thead>

        <tbody>
            
           <tr>


            <!-- START -->
            <td class="cell">
                <input type="date" value="<?=$startdate?>" name="txtStartdate" required placeholder="Date" 
                       style="color: gray; font-size: 13px; font-weight:normal; background: none;  " class="form-control form-control-md" >  
            </td>

            <!-- END -->
            <td class="cell">
                <input type="date" value="<?=$enddate?>" name="txtEnddate" requiredplaceholder="Date" 
                       style="color: gray; font-size: 13px; font-weight:normal; background: none; " class="form-control form-control-md" > 
            </td>

            <!-- FILTER -->
            <td class="cell">
                <button  type="submit" name="search" class="btn btn-primary"  
                        style="font-size: 13px; font-family: sans-serif; background: #000099; font-weight: normal; color: white;"> Filter </button>
                            
            </td>     

           </tr>


       </tbody>

    </table>

</form> 

                                   <table id="table1" class="table app-table-hover mb-0 text-left">
                                        <thead >
                                            <tr>
                                                <th class="cell" style="font-weight: normal; text-align: center;" colspan="2"> Site</th>
                                                <th class="cell" style="font-weight:normal;"> Time ON </th>
                                                <th class="cell" style="font-weight:normal;"> Time OFF </th>
                                                <th class="cell" style="font-weight:normal;"> Time Active </th>
                                            </tr>
                                        </thead>
                                   <tbody>


<?php while ($row = mysqli_fetch_assoc($searchResult)) {?>

                <tr>

                <td></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo $row['site_name'];?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("F d, Y h:s: A", strtotime ($row['time_on']));?></td>
                <td class="cell" style="color: black; font-size: 12px; font-weight:normal;"><?php echo date("F d, Y h:s: A", strtotime ($row['time_off']));?></td>

                <?php

               $start = ($row['time_status']);
               $end = ($row['time_status_end']);
    
                $dateDiff    = $end - $start;
                $fullDays    = floor($dateDiff/(60*60*24));
                $fullHours   = floor(($dateDiff-($fullDays*60*60*24))/(60*60));
                $fullMinutes = floor(($dateDiff-($fullDays*60*60*24)-($fullHours*60*60))/60);
                $fullSeconds = floor(($dateDiff-($fullDays*60*60*24)-($fullHours*60*60)-($fullMinutes*3600))/60);



                if ($start > $end) {
                 echo "<td> <h3 style='font-size: 13px; color:black; font-weight: normal'> Active </h3> </td>";

                    }  else if ($fullDays) {

                 echo "<td> <h3 style='font-size: 13px; color:black; font-weight: normal'>
                  $fullDays days - $fullHours hrs active </h3> </td>";

                    } else if ($fullHours) {

                 echo "<td> <h3 style='font-size: 13px; color:black; font-weight: normal'>
                 $fullHours hrs - $fullMinutes mins active </h3> </td>";

                    } else if ($fullMinutes){

                 echo "<td> <h3 style='font-size: 13px; color:black; font-weight: normal'>
                 $fullMinutes mins - $fullSeconds Secs active </h3> </td>";

                    } else {

                 echo "<td> <h3 style='font-size: 13px; color:black; font-weight: normal'>
                 $fullSeconds Secs active </h3> </td>";

                    }

                    ?>

                </tr>

<?php  } ?>

        </tbody>

    </table>


                                </div>
                               
                            </div>  

                             <div class="app-card-footer mt-auto" style="float: right; padding: 20px 30px;">
                                    <button  type="button" onclick="tableToExcel('table1', 'W3C Example Table')" class="btn app-btn-secondary"
                                     style="font-size: 13px; font-family: sans-serif; background: green; color: white;"> Download EXL</button>
                            </div>

                        </div>

                    </div>
                    <!-- TABLE ACTIVE END -->

                </div>
                <!-- TABLE END -->
                

        </div><!--//app-content-->      
    </div><!--//app-wrapper-->                      

    <script>

    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);

    </script>



<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
</script>

</body>
</html> 

