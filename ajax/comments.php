<?php

require '../partials/_db_connect.php';

echo '<div class="overflow-auto" style="height:85vh;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">comment</th>
                <th scope="col">comment by</th>
                <th scope="col">posted on</th>
            </tr>
        </thead>
    <tbody>';

    $sql1 = "SELECT * FROM `comments`";
    $result1 = mysqli_query($conn, $sql1);
    $numRowscomm = mysqli_num_rows($result1);

    if ($numRowscomm > 0) {
        $i = 0;
        while($rowComm = mysqli_fetch_assoc($result1)){
            $sql2 = "SELECT user_username FROM `users` WHERE `sno.` = '$rowComm[comment_by]' ";
            $result2 = mysqli_query($conn, $sql2);
            $rowUser = mysqli_fetch_assoc($result2);
            // echo var_dump($rowUser);
            $i++;
            echo '<tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$rowComm["comment_content"].'</td>
                    <td>'.$rowUser["user_username"].'</td>
                    <td>'.$rowComm["comment_time"].'</td>
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