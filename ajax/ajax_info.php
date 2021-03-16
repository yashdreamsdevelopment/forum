<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
require "../partials/_db_connect.php";

$sql1 = "SELECT * FROM `admin`";
$result1 = mysqli_query($conn, $sql1);
$admins = mysqli_num_rows($result1);

$sql2 = "SELECT * FROM `users`";
$result2 = mysqli_query($conn, $sql2);
$users = mysqli_num_rows($result2);

$sql3 = "SELECT * FROM `categories`";
$result3 = mysqli_query($conn, $sql3);
$categories = mysqli_num_rows($result3);

$sql4 = "SELECT * FROM `thread`";
$result4 = mysqli_query($conn, $sql4);
$questions = mysqli_num_rows($result4);

$sql5 = "SELECT * FROM `comments`";
$result5 = mysqli_query($conn, $sql5);
$comments = mysqli_num_rows($result5);

echo '
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 ">
            <div class="card d-flex flex-row p-2 shadow rounded" style="width: 18rem; height: 11rem;">
                <i class="fa fa-user-circle-o fa-5x m-auto p-2" aria-hidden="true"></i>
                <div class="card-body">
                    <h5 class="card-title">Admins:</h5>
                    <p class="card-text fs-2">'.$admins.'</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card d-flex flex-row p-2 shadow rounded" style="width: 18rem; height: 11rem;">
                <i class="fa fa-users fa-5x m-auto p-2" aria-hidden="true"></i>
                <div class="card-body">
                    <h5 class="card-title">Users:</h5>
                    <p class="card-text fs-2">'.$users.'</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card d-flex flex-row p-2 shadow rounded" style="width: 18rem; height: 11rem;">
                <i class="fa fa-book fa-5x m-auto p-2" aria-hidden="true"></i>
                <div class="card-body">
                    <h5 class="card-title">Categories:</h5>
                    <p class="card-text fs-2">'.$categories.'</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 3rem;">
    <div class="row">
        <div class="col-8">
            <h2>charts comming soon...</h2>
        </div>

        <div class="col-4">
            <div class="col">
                <div class="col">
                    <div class="card d-flex flex-row p-2 shadow rounded" style="width: 18rem;">
                        <i class="fa fa-question fa-5x m-auto p-2" aria-hidden="true"></i>
                        <div class="card-body">
                            <h5 class="card-title">Questions:</h5>
                            <p class="card-text fs-2">'.$questions.'</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card d-flex flex-row p-2 shadow rounded" style="width: 18rem;">
                        <i class="fa fa-comments fa-5x m-auto p-2" aria-hidden="true"></i>
                        <div class="card-body">
                            <h5 class="card-title">comments:</h5>
                            <p class="card-text fs-2">'.$comments.'</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';

?>

