<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
require '../partials/_db_connect.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $catName = $_POST['catName'];
    $catDesc = $_POST['catDesc'];

    if (isset($catName) && isset($catDesc)) {
        $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `created`) VALUES ('$catName', '$catDesc', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
           $push = "true";
        }else{
            $push = "false";
        }
        header("Location: ../adminpanel.php?admin=1&push=$push");
    }
}


echo '<div class="row">';

$sql = "SELECT * FROM `categories`";
$result = mysqli_query($conn, $sql);
$numRows = mysqli_num_rows($result);

while($row = mysqli_fetch_assoc($result)){
    echo '<div class="col-sm-4 ">
            <div class="card d-flex flex-row p-2 shadow rounded mb-2" style="width: 25rem; height: 12rem;">
                <i class="fa fa-user-circle-o fa-5x m-auto p-2" aria-hidden="true"></i>
                <div class="card-body">
                    <h5 class="card-title"> '.$row['category_name'].'</h5>
                    
                    <p class="card-text fs-6">'.substr($row['category_description'], 0, 20).'...</p>
                    <p class="card-text fs-6">Created on: '.$row['created'].'</p>
                </div>
            </div>
        </div>';
                
}
echo '</div>';
echo '<p>
        <a class="btn btn-success" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Add a new category
        </a> 
    </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
            <form action="'.$_SERVER['REQUEST_URI'].'" method="POST" >
                <div class="mb-3">
                    <label for="catName" class="form-label">Category Name:</label>
                    <input type="text" class="form-control" id="catName" required placeholder="category name" name="catName">
                </div>
                <div class="mb-3">
                    <label for="catDesc" class="form-label">Category Description:</label>
                    <textarea class="form-control" id="catDesc" required placeholder="category description" name="catDesc" rows="3"></textarea>
                </div>
                    
                <button type="submit" class="btn btn-success">Push</button>
            </form>
            </div>
        </div>';

?>