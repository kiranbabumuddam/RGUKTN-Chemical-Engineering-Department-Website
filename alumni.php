<?php
error_reporting(0);
session_start();
include_once('db.php');
if(!isset($_SESSION['chem_user']))
{
    header('location:login');
}
?>
<?php include("variables.php"); ?>
<?php include("header.php"); ?>
<style>
#mydata {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#mydata td, #mydata thead {
    border: 1px solid #ddd;
    padding: 8px;
}

#mydata tr:nth-child(even){background-color: #f2f2f2;}

#mydata tr:hover {background-color: #ddd;}

#mydata thead {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color:white;
    color: white;
}
</style>
<?php include("db.php");
 $today_date=date("j m Y");
$q=mysqli_query($con,"SELECT * FROM chemical.alumni   order by id ");
?>

    <script type="text/javascript" src="assets/plugins/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
  <script src="assets/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" href="assets/dataTables.bootstrap.min.css"> 
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"> 
    <div class="panel panel-primary table-responsive"" style="margin-right: 5%;margin-left: 5%;">
    <div class="container" style="background:"> 
<table id="mydata" class="table table-striped table-bordered table-hover table-boxed" cellspacing="0" width="100%">
<thead >
         <tr class="text-center">
         <td class="theading" width="5%"><font color="grey">S.no</font></td>
         <td class="theading" width="50%"><font color="grey">Batch</font></td>
          <td class="theading" width="20%"><font color="grey">Full name</font></td>
          <td class="theading" width="20%"><font color="grey">Current Status</font></td>
         <td class="theading" width="20%"><font color="grey">org</font></td>
        <td class="theading" width="20%"><font color="grey">location</font></td>
        
         </tr>
         </thead>
         <tbody>
         <?php
         while($row = mysqli_fetch_array($q,MYSQLI_BOTH))
         {
         ?>
         <tr class="text-center">
         <td><b><span class="" style="color:Tomato"><?php echo $row["id"] ?></span></b></td>
         <td><span class="badge badge-primary" ><?php echo $row["batch"] ?></span></td>
         <td><span class="" style="color:DodgerBlue"><?php echo $row["fullname"]; ?></span></td>
         <td><span class="badge badge-warning" ><?php echo $row["currentstatus"]; ?></span></td>
         <td><span class="badge badge-success" "><?php echo $row["org"]; ?></span></td>
         <td><span class="" style="color: MediumSeaGreen"><?php echo $row["location"]; ?></span></td>
         
         </tr>
         <?php
         }
         ?>
         </tbody>
      </table>

     <br>

</div>
</div>



<?php include("footer1.php"); ?>

     <script type="text/Javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <script type="text/Javascript" src="assets/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
    $('#mydata').DataTable( {
        "pagingType": "full_numbers"
    } );
} );
</script>   
