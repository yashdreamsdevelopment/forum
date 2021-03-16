<?php
    

    require '../partials/_db_connect.php';
    echo '<table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Regestered on</th>
            </tr>
            </thead>
            <tbody>';

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
    $numRow = mysqli_num_rows($result);
    if ($numRow > 0) {
        $i = 0;
        while($row = mysqli_fetch_assoc($result)){
            $i++;
            echo '<tr>
                    <th scope="row">'.$i.'</th>
                    <td>'.$row["user_username"].'</td>
                    <td>'.$row["user_password"].'</td>
                    <td>'.$row["timestamp"].'</td>
                </tr>';
             
        }
        echo '  </tbody>
            </table>';
    }else{
        echo '<h1>NO USERS SIGNED UP</h1>
                </tbody>
            </table>';
    }
    
?>

    
    
  