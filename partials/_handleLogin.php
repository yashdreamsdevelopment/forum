<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        require '_db_connect.php';
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        //check for the credentials in db
        $sql = "SELECT * FROM `users` WHERE user_username = '$username'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        // echo $numRows;
        if ($numRows == 1) {
            $row = mysqli_fetch_assoc($result);
            // echo var_dump($row);
            $hash = $row['user_password'];
            // echo $hash;

            if (password_verify($password, $hash)) {
                // echo "password verified from db";
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['sno'] = $row['sno.'];

                header("Location: /forum/");
                // echo $_SERVER['REQUEST_URI'];
            }else{
                $error = "check your password again";
                $signupsuccess = "false";
                header("Location: /forum/index.php?signupsuccess=$signupsuccess& error=$error");
            }
        }

    }

?>