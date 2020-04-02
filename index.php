<?php
    include 'connect.php';
    $conn = OpenCon();
    session_start();
    
    
    if(isset($_POST['submit'])){
 
      $name = $_FILES['file']['name'];
      $subtext = $_POST['text'];
      $target_dir = "upload/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
      // Select file type
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
      // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png","gif");

      // echo $imageFileType;
    
      // Check extension
      if( in_array($imageFileType,$extensions_arr) ){


          $sql = "INSERT INTO cmsefftry (title, fileupload, subtext)
          VALUES ('John', '$name', '$subtext')";

          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        
         // Upload file
         move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
    
      }

      // header("Location:index.php");
     
    }
    // include 'prepared.php';
?>


<!DOCTYPE html>
<html>
  <head>
  <title>Effenaar CMS</title>
    <link href="style/style.css" rel="stylesheet" type="text/css" />
  </head>
    <body>
    <h1>CMS Effenaar</h1>

    <form method="post" action="" enctype='multipart/form-data'>
    
      <input type='file' name='file' />
      <input type='text' name='text' />
      <input type="submit" name="submit">
    </form>

    <?php
        $sql = "SELECT ID, title, fileupload, subtext FROM cmsefftry";
        $result = $conn->query($sql);
        
        

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "ID: " . $row["ID"]. " - Name: " . $row["title"]. " - Subtext: " . $row["subtext"]. "<br>";

                $image = $row['fileupload'];
                // $image_src = "./upload/".$image;
                if (!empty($image)) {
                echo '<img src="upload/'.$image.'" width="360" height="150">';
                }
            }
        } else {
            echo "0 results";
        }

      ?>

        
    </body>
</html>

<?php 
CloseCon($conn);
session_destroy();
?>