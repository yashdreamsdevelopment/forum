<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>iDiscuss - Coding Forum</title>
</head>
<style>
    body {
        background-color: rgba(174, 177, 180, 0.342);
    }

    .container {
        width: 100%;
        height: 84vh;
        display: grid;
        place-content: center;
        align-items: center;
    }

    .form_box {
        /* border: 2px solid red; */
        background-color: rgba(203, 220, 180, 0.486);
        border-radius: 12px;
        padding: 8px;
        width: 22rem;
        height: 19rem;
    }

    .form_box h2 {
        text-align: center;
    }

    .form_box form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
</style>

<body>
    <?php require './partials/_adminheader.php' ?>
    <?php require './partials/_db_connect.php' ?>
    <?php
        // session_start();
        session_unset();
        session_destroy();

        //check if admin already logged in or not
        // if ((!isset($_SESSION['$adminloggedin']) && $_SESSION['$adminloggedin'] != true) && !isset($_SESSION['adminuername']) ) {
        //     echo "hello";
        //     header("Location: ./adminpanel.php?admin=true");
        // }else{
        //     echo "no session set";
        //     header("Location: admin.php");
        // }
        // echo $_SESSION['adminusername'];
    ?>
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == 'POST') {
            $adminUsername = $_POST['adminUsername'];
            $adminPassword = $_POST['adminPassword'];

            $sql = "SELECT * FROM `admin` WHERE username = '$adminUsername'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            // echo $numRows;
            if ($numRows == 1) {
                $row = mysqli_fetch_assoc($result);
                // echo var_dump($row);
                $hash = $row['password'];
                // echo $hash;

                if (password_verify($adminPassword, $hash)) {
                    // echo "password verified from db";
                    session_start();
                    $_SESSION['adminloggedin'] = true;
                    $_SESSION['admin'] = true;
                    $_SESSION['adminusername'] = $adminUsername;
                    $_SESSION['sno'] = $row['sno.'];

                    header('Location: /forum/adminpanel.php?admin='.$_SESSION["admin"].'');
                    
                }else{
                    $error = "check your password again";
                    $signupsuccess = "false";
                    header("Location: /forum/admin.php?signupsuccess=$signupsuccess& error=$error");
                }
            }else{
                    $error = "No user found";
                    $signupsuccess = "false";
                    header("Location: /forum/admin.php?signupsuccess=$signupsuccess& error=$error");
            }
        }
    ?>


    <div class="container">
        <div class="form_box shadow rounded">
            <h2>Admin Login</h2>
            <hr>
            <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="POST">
                <div class="mb-3">
                    <label for="adminUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="adminUsername" placeholder="admin Username"
                        name="adminUsername">

                </div>
                <div class="mb-3">
                    <label for="adminPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="adminPassword" required name="adminPassword"
                        placeholder="admin Password">
                </div>

                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
    </div>

    

    







    <?php require './partials/_footer.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>