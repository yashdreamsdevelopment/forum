<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php

require '../partials/_db_connect.php';

echo '<div class="row">';

$sql = "SELECT * FROM `admin`";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)){
    echo '<div class="col-sm-4 ">
            <div class="card d-flex flex-row p-2 shadow rounded" style="width: 25rem; height: 12rem;">
                <i class="fa fa-user-circle-o fa-5x m-auto p-2" aria-hidden="true"></i>
                <div class="card-body">
                    <h5 class="card-title">Admin: '.$row['username'].'</h5>
                    <p class="card-text fs-6">Email</p>
                    <p class="card-text fs-6">'.substr($row['password'], 0, 20).'...</p>
                    <p class="card-text fs-6">Regestered on: '.$row['date'].'</p>
                </div>
            </div>
        </div>';
                
}
echo '</div>';

?>