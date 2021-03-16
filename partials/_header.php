<?php
session_start();
require '_db_connect.php';


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/forum">iDiscuss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/forum">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        $sql ="SELECT * FROM `categories`";
                        $result = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['category_id'];
                            echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$id.'">'.$row["category_name"].'</a></li>';
                            
                        }
                        

                    echo '</ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Administration</a>
                </li>
                </ul>';
                echo '<form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
                
                </form>';
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<p class="text-light my-0 mx-2">Welcome: '.$_SESSION['username'].'</p>
                            <div class="mx-2">
                                <a href="partials/_handleLogout.php" class="btn btn-outline-success">Logout</a>
                            </div>';
                }
                if (!isset($_SESSION['loggedin'])) {
                    echo '<div class="mx-2">
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                        </div>';
                }
                echo '
            </div>
        </div>
    </nav>';

    require './partials/_loginModal.php';
    require './partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
        echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>Success!</strong> you can now login
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
        $error = $_GET['error'];
        echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>warning!</strong> '.$error.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    

?>