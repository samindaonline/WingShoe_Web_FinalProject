<!DOCTYPE html>
<html>
    <head>
        <title>image upload</title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="file">
            <input type="submit" value="submit" name="submit">
        </form>
        <?php
            if(isset($_POST['submit'])){
                $file=$_FILES['file'];
                print_r($file);

                $fileName=$file['name'];
                $fileTmpName=$file['tmp_name'];
                $fileSize=$file['size'];
                $fileError=$file['error'];
                $fileType=$file['type'];

                echo $fileName;

                $fileExt = explode('.',$fileName);
                $fileActualExt=strtolower(end($fileExt));

                $allowed = array('jpg','jpeg','png');
                
                $imgName;

                if(in_array($fileActualExt,$allowed)){
                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'assets/images/shoes/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    $imgName=$fileNameNew;
                }

                $folderPath = "assets/images/shoes/";
                $imageName = $imgName; // Replace with the actual image name

                // Construct the full path to the image
                $filePath = $folderPath . $imageName;

                // Check if the file exists before attempting to delete
                if (file_exists($filePath)) {
                    // Attempt to delete the file
                    if (unlink($filePath)) {
                        echo "Image '$imageName' deleted successfully.";
                    } else {
                        echo "Error: Unable to delete the image.";
                    }
                } else {
                    echo "Error: Image '$imageName' not found.";
                }
            }
        ?>
    </body>
</html>