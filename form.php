<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["document"]["name"]);
$allowedExts = array("pdf","PDF");
$extension = explode(".", $_FILES["document"]["name"]);

if(isset($_POST["submit"]))
{
    if ($_FILES["document"]["error"] == 0)
    {
        if (($_FILES["document"]["type"] == "application/pdf")&& in_array($extension[1], $allowedExts))
        {
          if ($_FILES["document"]["error"] > 0)
          {
             echo "Error Code: " . $_FILES["document"]["error"] ;
          }
          else
          {
            move_uploaded_file($_FILES["document"]["tmp_name"], $target_file);
            print("Thank you. Your file is uploaded.");
          }
        }
        else
        {
            echo "Only pdf file can be uploaded";
        }

    }
    else
    {
        echo "Please! select a file";
    }
   
}
    
?>
<a href="index.php"> <h1>Go back</h1></a>