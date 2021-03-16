<?php
    $showError = false;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo "server method is post";
        require '_db_connect.php';
        $username = $_POST['signupUsername'];
        $password = $_POST['signupPassword'];
        $cpassword = $_POST['signupCpassword'];

        //check whether this username exists
        $existsSql = "SELECT * FROM `users` WHERE user_username = '$username' ";
        $result = mysqli_query($conn, $existsSql);

        $numRows = mysqli_num_rows($result);
        echo $numRows;
        if ($numRows > 0) {
            // echo "username already exists";
            $showError = "username already exists, Try something unique";
            
        }else{
            if ($password == $cpassword) {
                echo "pass and cpass matches";
                $hash = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users` (`user_username`, `user_password`, `timestamp`) VALUES ('$username', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                echo $result;
                if ($result) {
                    // echo "user success";
                    $showAlert = true;
                    header("location: /forum/index.php?signupsuccess=true");
                    exit();
                }
            }else{
                // echo "pass donot match";
                $showError = "Passwords do not match";
               
            }
        }
        
        header("location: /forum/index.php?signupsuccess=false&error=$showError");
    }
?>