<?php

    $loginstatus="";

    function loginform(){
        require "connection.php";

        if(isset($_POST['login'])){
            $username=$_POST['username'];
            $password=$_POST['password'];

            $sql_fetch="SELECT * FROM user WHERE userName='$username' AND password='$password'";
            $result=mysqli_query($con,$sql_fetch); 

            while($row=mysqli_fetch_assoc($result)){
                echo '<div id="login_result">'."Username: ".$row['userName'];
            }
            echo 'adfa';

            if(mysqli_num_rows($result)>0){
                session_start();
                $_SESSION['user']=$username;
                header('location:index.php');
            }else{
                echo '<div id="login_result" style="color:red;">'."Incorrect username or password!".'</div>';
            }
        }
    }

    function logged(){
        echo    '<div class="accicon"><img src="assets/icon/user.png" alt="user"></div>
                <div class="accname"><a href="login.php">Login/Register</a></div>';


            session_start();
            if(!empty($_SESSION['user'])){
                echo 'Welcome '.$_SESSION['user'];

                /* <a href="home.php?id=logout">Logout</a> */

                if(isset($_GET['id'])and $_GET['id']=="logout"){
                    $_SESSION['user']="";
                    header("location:index.php");
                }

    }}

?>