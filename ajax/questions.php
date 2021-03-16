<?php

require '../partials/_db_connect.php';

echo '<div class="overflow-auto" style="height:85vh;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">question</th>
                <th scope="col">description</th>
                <th scope="col">catergory</th>
                <th scope="col">user</th>
                <th scope="col">posted on</th>
            </tr>
        </thead>
    <tbody>';

    $sql1 = "SELECT * FROM `thread`";
    $result1 = mysqli_query($conn, $sql1);
    $numRowsquest = mysqli_num_rows($result1);

    if ($numRowsquest > 0) {
        $i = 0;
        while($rowQuest = mysqli_fetch_assoc($result1)){
            $sql2 = "SELECT category_name FROM `categories` WHERE `category_id` = '$rowQuest[thread_cat_id]' ";
            $result2 = mysqli_query($conn, $sql2);
            $rowCat = mysqli_fetch_assoc($result2);
            // echo var_dump($rowCat["category_name"]);
            $sql3 = "SELECT user_username FROM `users` WHERE `sno.` = '$rowQuest[thread_user_id]' ";
            $result3 = mysqli_query($conn, $sql3);
            $rowUser = mysqli_fetch_assoc($result3);
            // echo var_dump($rowUser);
            $i++;
            echo '<tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$rowQuest["thread_title"].'</td>
                    <td>'.$rowQuest["thread_desc"].'</td>
                    <td>'.$rowCat["category_name"].'</td>
                    <td>'.$rowUser['user_username'].'</td>
                    <td>'.$rowQuest["timestamp"].'</td>
                </tr>';
        }
        echo '  </tbody>
            </table>';
    }else{
        echo '<h1>NO QUESTION FOUND</h1>
                </tbody>
            </table>
        </div>';
    }


    
?>