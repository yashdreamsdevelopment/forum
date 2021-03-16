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

<body>
    <?php require './partials/_header.php' ?>
    <?php require './partials/_db_connect.php' ?>
    <?php
        $id = $_GET['thread_id'];
        $sql = "SELECT * FROM `thread` WHERE thread_id =$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $thread_title = $row['thread_title'];
            $thread_desc = $row['thread_desc'];
            $thread_user_id = $row['thread_user_id'];

            // Query the users table to find out the name of OP
            $sql = "SELECT user_username FROM `users` WHERE `sno.` = '$thread_user_id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            $posted_by = $row['user_username'];
        }


    ?>

    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        $showAlert = false;
        if ($method=="POST") {
            //insert into comment database
            $comment = $_POST['comment'];
            $comment = str_replace(">", "&gt;", $comment);
            $comment = str_replace("<", "&lt;", $comment);
            
            $comment_by = $_POST['sno'];
            // echo $comment_by;
            // $thread_user_id;
            if (isset($comment)) {
                $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$comment_by', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
                if ($showAlert) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success! </strong> Your comment successfully added!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
            
        }
    ?>

    <div class="container my-3">
        <div class="jumbotron border border-light bg-light text-dark p-2">
            <h1 class="display-4">
                <?php echo $thread_title; ?>
            </h1>
            <p class="lead">
                <?php echo $thread_desc;?>
            </p>
            <hr class="my-4">

            <p>Posted by :<b> <?php echo $posted_by ?></b></p>

        </div>
    </div>
    <?php

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo'<div class="container">
                <h1 class="py-2">Post a Comment:</h1>
                <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
                    <div class="mb-3">
                        <label for="comment">Type your comment: </label>
                        <textarea class="form-control" id="comment" name="comment" placeholder="enter your response for the above thread" required rows="3"></textarea>
                        <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Post Comment</button>
                </form>
            </div>';
    }else{
        echo"<div class='container'>
              <h1 class='py2'>Post a Comment:</h1>
                <div class='jumbotron border border-light bg-light text-dark p-2'>
                    <p class='lead'>Your must be logged in to post a comment.</p>
                </div>
            </div>";
    }
    
    ?>
    



    <div class="container" id="ques">
        <h1 class="py-2">Discussion:</h1>

        <?php
            $id = $_GET['thread_id'];
            // echo $id;
            $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;

            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $id = $row['comment_id'];
                $content = $row['comment_content'];
                $comment_by = $row['comment_by'];
                
                $sql2 = "SELECT user_username FROM `users` WHERE `sno.`='$comment_by'";
                $result2 =mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                echo'<div class="media d-flex p-2 my-3">
                        <img class="mr-3 p-1" src="img/default_img.png" width="54px" height="54px" alt="Generic placeholder image">
                        <div class="media-body p-1">
                            <h5 class="mt-0"><a class="text-dark text-decoration-none">'.$row2['user_username'].'</a></h5>
                            '.$content.'
                        </div>
                    </div>';
            }

            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid border border-light bg-light p-2">
                        <p class="display-4">No Comments Found</p>
                        <p class="lead">
                            <b>Be the first person to comment.</b>
                        </p>
                    </div>';
            }
        ?>
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
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>

</html>