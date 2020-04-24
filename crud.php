<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/custom.js" type="text/javascript"></script>
</head>
<body>

<div class="container">
<div class="row  " style="height: 265px; overflow-y: scroll;">
  <div class="col-sm-4"></div>
  <div class="col-sm-4 " >
  <table class="table table-hover table-bordered table-striped">
    <thead>
      
      <tr>
        <th >SCP_ID</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody> 
     <form method="post" action="modify.php">                 
     <?php 
              
              
              require 'db.php';
              $result = mysqli_query($mysqli,"SELECT SCP_ID FROM SCP_LIST");             
              $SCP_IDS = mysqli_fetch_all($result);
              foreach ($SCP_IDS as $key => $value) {
                $str1= sprintf('
                  <tr>
                  <td>
                  <button type="text" name="SCP_ID"   class="modify SCP_ID btn btn-secondary btn-sm" disabled>%s</button></td>
                  <td >
                  <button  type="button" name="edit"   value="%s" class="modify btn btn-sm btn-info" >View & Edit</button>
                  <button type="submit"  name="delete"  value="%s" class="modify delete btn btn-sm btn-danger">
                  Delete</button></td>
                  </tr>',implode(", ", $value),implode(", ", $value),implode(", ", $value));

                echo $str1;
              }
        
              
              if(isset($_SESSION['msg'])){
                echo "<div   class='text-success  text-md-left'>";
                echo $_SESSION['msg'];
                echo "</div>";
                unset($_SESSION['msg']);
              }
              session_destroy();
        ?>      
       
              
      </form>        
    </tbody>
  </table>
</div>
</div>
<form method="post" action="modify.php">
<div class="row " id="editDataTable">
  <div class="col-sm-12 " >
  <table class="table table-hover table-bordered table-striped">
    <thead>
      <tr>
        <td class="text-center"><a id="create" name="create" value="" class=" btn btn-sm btn-info">Add New Entry</a></td>
      <td colspan="2" >
        <input  id="save" type="hidden" name="save" value="Save All Boxes Data" class=" form-control btn btn-sm btn-info">
        <input  id="update" type="hidden" name="update" value="Update All Boxes Data" class=" form-control btn btn-sm btn-info">
      </td>
      <td></td>
      </tr>
      <tr>
        <th >1: SCP_ID (Numeric)</th>
        <th >2: Special Containment Procedures</th>
        <th >3: Description</th>
        <th >4: Reference</th>
         
      </tr>
      
    </thead>
    <tbody>
      
      <tr>
        <td><input  type="text" name="SCP_ID"  id="01" class="form-control" rows="10" cols="30" placeholder="Max 3 digit Number" disabled></td>
        <td><textarea placeholder="Enter text here" type="text" name="SCP"  id="02" class="form-control" rows="10" cols="30" disabled></textarea></td>
        <td><textarea placeholder="Enter text here" type="text" name="Description" id="03" class="form-control" rows="10" cols="30" disabled ></textarea></td>
        <td><textarea placeholder="Enter text here" type="text" name="Reference" id="04" class="form-control" rows="10" cols="30" disabled></textarea></td>
       
        
        </tr>
       
    </tbody>


    <thead>
      
      <tr>
       <th >5: Addendum</th>
        <th >6: Chronological History</th>
        <th >7: Space Time Anomalies</th>
        <th >8: Additional Notes</th>       
       
      </tr>
      </thead>
    <tbody>

      <tr>
       <td><textarea type="text" placeholder="Enter text here" name="Addendum" id="05" class="form-control" rows="10" cols="30" disabled></textarea></td>
            
       <td><textarea type="text" placeholder="Enter text here" name="History" id="06" class="form-control" rows="10" cols="30" disabled></textarea></td>
        <td><textarea type="text" placeholder="Enter text here" name="space" id="07" class="form-control" rows="10" cols="30" disabled></textarea></td>
        <td><textarea type="text" placeholder="Enter text here" name="Additional" id="08" class="form-control" rows="10" cols="30" disabled></textarea></td>

       
      </tr>
   
     </form>    
      </tbody>






  </table>

  <table class="table table-hover table-bordered table-striped">
    <tr>
    <th>1: Select Image</th>
    <th>2: Enter SCP_ID</th>
    <th>3: Action</th>
    </tr>
    
    <tr>

      <td>
       

      <form  id="data" method="post"  enctype='multipart/form-data'>
      <input type='file' name='file' />              
      </td>
      
      <td><input  type="text" name="SCP_ID"   class="form-control" placeholder="Max 3 digit Number" ></td>
      <td>
        <input type='submit' class="btn btn-info" value='upload' name='_upload'>
        </form>
      </td>
    </tr>
  </table>
</div>
</div>

</div>






</body>
</html>
