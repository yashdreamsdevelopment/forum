<?php
session_start();
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/forum">iDiscuss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/forum">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Administration</a>
                    </li>
                </ul>';
                if ((isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true) && (isset($_SESSION['admin']) && $_SESSION['admin'] == true)) {
                    echo '<p class="text-light my-0 mx-2">Admin: '.$_SESSION['adminusername'].'</p>
                            <div class="mx-2">
                                <a href="partials/_adminLogout.php" class="btn btn-outline-success">Logout</a>
                            </div>';
                }else{
                    echo NULL;
                }
                echo '
            </div>
        </div>
    </nav>';

    if (isset($_GET['push']) && $_GET['push'] == "true") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success! </strong> a new category added successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
    if (isset($_GET['push']) && $_GET['push'] == "false") {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Warning! </strong> Try again some error occured!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }



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