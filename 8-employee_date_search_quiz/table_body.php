


<!-- Show data in table body  -->
<?php 
    // Check records found or not
    if(mysqli_num_rows($employeesRecords) > 0){
        while($empRecord = mysqli_fetch_assoc($employeesRecords)){
            $id = $empRecord['id'];
            $empName = $empRecord['emp_name'];
            $date_of_join = $empRecord['date_of_join'];
            $gender = $empRecord['gender'];
            $email = $empRecord['email'];
            $image_name = $empRecord['image_name'];

            echo "<tr>";
            echo "<td>". $empName ."</td>";
            echo "<td><img width='70' height='70' src='images/". $image_name ."'/></td>";
            echo "<td>". $date_of_join ."</td>";
            echo "<td>". $gender ."</td>";
            echo "<td>". $email ."</td>";
            echo "<td><a class='btn btn-info' href='index.php?edit&page=".$page."&id=".$id."'>Edit</a>"
                    . "<a class='btn btn-danger' href='index.php?delete&page=".$page."&id=".$id."'>Delete</a></td>";
            echo "</tr>";

        }
    }else{
        echo "<tr>";
        echo "<td colspan='6'><b>No record found.</b></td>";
        echo "</tr>";
    }
    ?>
</table>
</div>