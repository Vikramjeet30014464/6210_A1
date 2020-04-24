 <?php
  
 
                include("db.php");

                if(isset($_POST['SCP_ID'])){
                 
                  $name = $_FILES['file']['name'];
                  $target_dir = "images/";
                  $target_file = $target_dir . basename($_FILES["file"]["name"]);
                  $SCP_ID   = mysqli_real_escape_string($mysqli,$_POST['SCP_ID']);
                  // Select file type
                  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                  // Valid file extensions
                  $extensions_arr = array("jpg","jpeg","png","gif");

                  // Check extension
                  if( in_array($imageFileType,$extensions_arr) ){
                    
                     // Insert record
                     $query = "INSERT INTO images(id,name) VALUES ('$SCP_ID','$name') ";
                     //mysqli_query($mysqli,$query);
                     if (mysqli_query($mysqli, $query)) {     
                          echo  "SCP_ID [".$SCP_ID."] image upload Success";
                          //header('location: crud.php');
                      } else {
                          echo "Error saving image for SCP_ID [".$SCP_ID."].". mysqli_error($mysqli);
                          
                          //header('location: crud.php');
                      }
                                      
                     // Upload file
                     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                     //header('location: crud.php');

                  }
                 
                }
                ?>