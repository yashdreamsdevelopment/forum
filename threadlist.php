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
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `categories` WHERE category_id =$id";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }


    ?>

    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        $showAlert = false;
        if ($method=="POST") {
            //insert thread into database
            $thread_title = $_POST['title'];
            $thread_desc = $_POST['desc'];

            $thread_title = str_replace(">", "&gt;", $thread_title);
            $thread_title = str_replace("<", "&lt;", $thread_title);
            $thread_desc = str_replace(">", "&gt;",$thread_desc);
            $thread_desc = str_replace("<", "&lt;",$thread_desc);
            

            $thread_cat_id = $id;
            $thread_user_id = $_SESSION['sno'];

            
            if (isset($thread_title) && isset($thread_desc) && isset($thread_cat_id)) {
                $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$thread_title', '$thread_desc', '$thread_cat_id', '$thread_user_id', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                $showAlert = true;
                if ($showAlert) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success! </strong> Your thread successfully added, wait till someone answers it.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }
            
        }
    ?>

    <!-- category container starts here -->
    <div class="container my-3">
        <div class="jumbotron border border-light bg-light text-dark p-2">
            <h1 class="display-4">Welcome to
                <?php echo $catname; ?> Forum
            </h1>
            <p class="lead">
                <?php echo $catdesc;?>
            </p>
            <hr class="my-4">
            <p>This is a peer to peer forum for sharing knowledge with each other.</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    
    <!-- restricting users to start discussion if they are not logged in -->
    <?php
    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">
                <h1 class="py-2">Start a Discussion:</h1>
                <form action="'.$_SERVER["REQUEST_URI"].'" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" required aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Keep your title short and crisp as possible.</div>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Elloborate Your Concern</label>
                        <textarea class="form-control" id="desc" name="desc" required rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary my-2">Submit</button>
                </form>
            </div>';
    }else{
        echo"<div class='container'>
              <h1 class='py2'>Start a Discussion:</h1>
                <div class='jumbotron border border-light bg-light text-dark p-2'>
                    <p class='lead'>loggin to start a disscussion</p>
                </div>
            </div>";
                    
    }
    

    ?>


    <div class="container">
        <h1 class="py-2">Browse Questions:</h1>

        <?php
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `thread` WHERE thread_cat_id = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $title = $row['thread_title'];
                $desc = $row['thread_desc'];
                $id = $row['thread_id'];
                $thread_time = $row['timestamp'];
                $thread_user_id = $row['thread_user_id'];
                // echo $thread_user_id;
                $sql2 = "SELECT user_username FROM `users` WHERE `sno.` = '$thread_user_id' ";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                // echo var_dump($row2);
                
                // <p class="font-weight-normal fs-5 my-0">'.$row2['user_username'].' at '.$thread_time.'</p>
                echo'<div class="media d-flex p-2 my-0">
                        <img class="mr-3 p-1" src="img/default_img.png" width="54px" height="54px" alt="Generic placeholder image">
                        <div class="media-body p-1">
                            <blockquote class="blockquote">
                                <h5 class="mt-0"><a class="text-dark" href="thread.php?thread_id='.$id.'">'.$title.'</a></h5>
                                <p class="mb-3">'.$desc.'</p>
                                <footer class="blockquote-footer"><cite title="Source Title">'.$row2['user_username']. '@'.$thread_time.'</cite></footer>
                            </blockquote>
                            
                            
                        </div>
                    </div>
                    
                    '
                    ;
            }
            // echo var_dump($noResult);
            if($noResult){
                echo '<div class="jumbotron jumbotron-fluid border border-light bg-light p-2">
                        <p class="display-4">No Threads Found</p>
                        <p class="lead">
                            <b>Be the first person to ask the question.</b>
                        </p>
                    </div>';
            }
            //form will come here to ask a question
            
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