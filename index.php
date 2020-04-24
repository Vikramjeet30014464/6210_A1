<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Special Containment Procedures</title> 
    <style type="text/css">
      .bg-custom{
        background-color: black;
        opacity: 80%;
        color: white;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="js/custom.js" type="text/javascript"></script>
    

  </head>
  <body class="bg-custom">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Special Containment Procedures</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              SCP List
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               
              <?php 
              require 'db.php';
              $result = mysqli_query($mysqli,"SELECT SCP_ID FROM SCP_LIST");             
              $SCP_IDS = mysqli_fetch_all($result);
              foreach ($SCP_IDS as $key => $value) {               
                 $str= sprintf("<a class='dropdown-item' href='index.php?SCP_ID=%s'>SCP-%s</a>",implode(", ", $value),implode(", ", $value));

                 echo $str;
              }

              ?>
              
          </li>
          
        </ul>
        
         <a class="btn-sm btn-primary" href="crud.php" role="button">Admin</a>
      </div>
    </nav>

    <div class="container">
      <div ><img id="SCPimage" src="" class="img-fluid animated bounce rounded mx-auto d-block" alt="Responsive image"></div>
      
      

     

       <?php
        require 'db.php';
        ini_set("display_errors", "on");

        //get full url
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url_components = parse_url($url);

        
        //redrict to scpid2 default 
        if (!$url_components['query']) {
          //header("location: index.php?SCP_ID=2");
          echo("<script>location.href = 'index.php?SCP_ID=2';</script>");
        }
        parse_str($url_components['query'], $params);

        //now get parameter from url
        $SCP_ID = $params['SCP_ID'];
        $_SESSION['scpid'] = $SCP_ID;

        
        //build query for getting Special Containment Procedures with specif url
        $result = mysqli_query($mysqli,"SELECT * FROM SCP_LIST WHERE SCP_ID=$SCP_ID");             
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
                
          if($row["Special_Containment_Procedure"]){
          echo '<h3 >Special Containment Procedures (SCP-',$SCP_ID,'):</h3>';
          echo '<p class="text-justify" >';
          echo $row["Special_Containment_Procedure"];
          echo '</p>';
          }

          if($row["Description"]){          
          echo '<h3>Description:</h3>';
          echo '<p class="text-justify" >';
          echo $row["Description"];
          echo '</p>';
          }

          if($row["Reference"]){
            echo '<h3>Reference:</h3>';
            echo '<p class="text-justify" >';
            echo $row["Reference"];
            echo '</p>';
          }
          if($row["Addendum"]){
            echo '<h3>Addendum:</h3>';
            echo '<p class="text-justify" >';
            echo $row["Addendum"];
            echo '</p>';
          }

          if($row["Chronological_History"]){
            echo '<h3>Chronological History:</h3>';
            echo '<p class="text-justify" >';
            echo $row["Chronological_History"];
            echo '</p>';
          }

          if($row["Space_Time_Anomalies"]){
            echo '<h3>Space Time Anomalies:</h3>';
            echo '<p class="text-justify" >';
            echo $row["Space_Time_Anomalies"];
            echo '</p>';
          }

          if($row["Additional_Notes"]){
            echo '<h3>Additional Notes:</h3>';
            echo '<p class="text-justify" >';
            echo $row["Additional_Notes"];
            echo '</p>';
          }
        }

        ?>
        </div>   

        
        <div >
          <?php
          require 'db.php';
          $scp_id = $_SESSION['scpid'];
          $sql = "select name from images where id= $scp_id";
          $result = mysqli_query($mysqli,$sql);
          
          if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_array($result);
          $image = $row['name'];
          $image_src = "images/".$image;
          echo  "<img  hidden id='hid' src='".$image_src."'>";
          }
          
          ?>
            
          </div>
   








   





    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <small> &copy; Vikramjeet StudentID: 30014464 @toiohomai</small>
    </div>
  </footer>
  </body>

</html>