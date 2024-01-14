<?php
    
    function addshoes(){
        include "connection.php";
        if(isset($_POST['save'])){
            $productId=$_POST['product_id'];
            $productName=$_POST['name'];
            $description=$_POST['description'];
            $category=$_POST['category'];
            $price=$_POST['price'];
            $img1=saveshoeimg($_FILES["photo1"],$productId,1);
            $img2=saveshoeimg($_FILES["photo2"],$productId,2);
            
            /* echo $productId.'<br>'.$productName.'<br>'.$description.'<br>'.$category.'<br>'.$price; */
            /* include "connection.php"; */
            $sql_insert="INSERT INTO products Values ('$productId','$productName','$description','$category','$price','$img1','$img2')";

            /* echo $productId.'<br>'. $productName.'<br>'.$color.'<br>'.$ram.'<br>'.$warranty.'<br>'.$price; */
            if($result=mysqli_query($con,$sql_insert))
                echo '<script>alert("Data Inserted Successfully");</script>';
            else
            echo '<script>alert("Sorry, Data not added."'.mysqli_error($con).');</script>';
                /* echo 'Sorry, Data not added'.mysqli_error($con); */
            
            mysqli_close($con);
        }
    }

    function saveshoeimg($files,$productid,$imagenumber){
        $file=$files;

        $fileName=$file['name'];
        $fileTmpName=$file['tmp_name'];

        $fileExt = explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));

        $allowed = array('jpg','jpeg','png');

        if(in_array($fileActualExt,$allowed)){
            $fileNameNew = $productid."_".$imagenumber.".".$fileActualExt;
            $fileDestination = 'assets/images/shoes/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            return $fileDestination;
        }
    }

    function shop(){
        include "connection.php";
        $result=mysqli_query($con,"SELECT * FROM products");
 
        while($data=mysqli_fetch_array($result))
        {
            
            $imgmain=$data['photo1'];

            echo '<div class="product-view">
                    <div class="product-container">
                    <img src="'.$imgmain.'" alt="noimg" class="product-img">
                    <h2 class="product-name">'.$data['name'].'</h3>
                    <h3 class="product-price">Rs.'.$data['price'].'</h2>
                    <a>add to cart</a>
                    </div>
                </div>';
        }
                     
    }

    function manageshoe(){
        include "connection.php";
        $result=mysqli_query($con,"SELECT * FROM products");

        echo    '<table border=1>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Delete</th>
                    </tr>';
 
        while($data=mysqli_fetch_array($result))
        {
            echo    '<tr>
                        <td>'.$data['product_id'].'</td>
                        <td>'.$data['name'].'</td>
                        <td><a href="mshoes.php?delete='.$data['product_id'].'">Delete</a> </td>
                    </tr>';
        }
        echo '</table>';

        if((isset($_GET['delete'])==true)&&(isset($_GET['delete'])<>null))
        {
            $product_id=$_GET['delete'];
            $result=mysqli_query($con,"SELECT * FROM products WHERE product_id=$product_id");
            $data=mysqli_fetch_array($result);
            
            $img1path=$data['photo1'];
            $img2path=$data['photo2'];

            $filepath1 = $img1path;
            $filepath2 = $img2path;
            
            if (file_exists($filepath1) && file_exists($filepath2)) {
                unlink($filepath1);
                unlink($filepath2);
            }

            $sql_delete="DELETE FROM products WHERE product_id='$product_id'";
            $result=mysqli_query($con,$sql_delete);

            if($result){
                echo '<script>alert("A record is delelted successfully!");</script>';
                header("location:mshoes.php");
            }
            else
                echo '<div id="book_search">Data is not Deleted!'.mysqli_error($con).'</div>';
        }
    }

    
?>