<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />

  <title>iDiscuss - Coding Forum | admin</title>
</head>
<style>
  .dash {
    /* border: 2px solid green; */
    width: 100%;
    height: 84vh;
  }

  #aside {
    /* border: 2px solid red; */
    margin: 0px;
    width: 15%;
    height: auto;
    padding: 10px;
    background-color: rgba(138, 141, 138, 0.247);
    border-radius: 9px;
    box-shadow: -5px 6px 10px 0px grey;
  }

  .aside_head {
    /* border: 2px solid red; */
    padding: 2px
  }

  #aside ul {
    /* border: 2px solid red; */
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
    padding: 0px;
  }

  #aside ul li {
    list-style: none;
    /* border: 1px solid green; */
    margin: 10px 0px 10px 0px;
    padding: 3px;
    width: 100%;

  }

  #aside ul li a {
    text-decoration: none;
    color: black;
    font-size: 1.5rem;
  }

  .tab {
    border-left: 4px solid green;
  }

  #box {
    width: 100%;
    height: auto;
    /* border: 2px solid red; */
    margin-left: 10px;
    padding: 5px;
  }
</style>

<body>
  <?php require './partials/_adminHeader.php'?>
  <?php require './partials/_db_connect.php'?>
  <?php 
      if (!isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] != true && $_SESSION['admin'] != true) {
        header("location: ./admin.php");
      }
    ?>

  <div class="container-fluid dash d-flex justify-content-start">
    <aside id="aside">
      <h2 class="aside_head">DASHBOARD</h2>
      <hr>
      <ul>
        <li onclick="loadOverview()" class=" btns tab"><a href="#">Overview</a></li>
        <li onclick="loadUsers()" class="btns"><a href="#">Users</a></li>
        <li onclick="loadAdmins()" class="btns"><a href="#">Admins</a></li>
        <li onclick="loadCategories()" class="btns"><a href="#">Category</a></li>
        <li onclick="loadQuestions()" class="btns"><a href="#">Question</a></li>
        <li onclick="loadComments()" class="btns"><a href="#">Comment</a></li>
      </ul>
    </aside>

    <div id="box">

    </div>


  </div>


  <!-- <?php require './partials/_footer.php'?> -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".btns").on("click", function () {
        $(this).siblings().removeClass('tab');
        $(this).addClass('tab')
      })
    })

    var btns = document.getElementsByClassName("btns");
    console.log("btns lenght", btns.length);


    for (var i = 0; i < btns.length; i++) {

      btns[i].addEventListener("click", function () {

        var current = document.getElementsByClassName("tab");

        if (current.length > 0) {
          current[0].className = current[0].className.replace("tab", "");
        }

        this.className = "tab";
      });
    }


  </script>
  <script src="./ajax/index.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>