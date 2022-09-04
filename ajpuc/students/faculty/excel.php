<?php 

$servername1 = "localhost";
$username1 = "kvgenggco_admin";
$password1 = "Geleyageleya";  

extract($_REQUEST); 
session_start();
 if(isset($_SESSION["branch1"])){
          $branch=$_SESSION["branch1"];
      }


$con = new mysqli($servername1, $username1, $password1, $branch);

 $output='';
      $output .= ' 
      <table>
        <tr>
            <th> USN </th>
            <th>Name</th>
            <th>SEM </th> 
            <th>student Phone</th>
            <th>Parent Phone</th>
            <th>Email ID</th>
        </tr> ';      
                                $i=1;
                                $sql = "SELECT * from students where sem<9 order by usn asc,sem desc";
                                $result = $con->query($sql);
                              if(mysqli_num_rows($result) > 0)
                              {
                                while($row = $result->fetch_assoc())
                                { 
                                $output .= '  
                                <tr>
                                    <td>'.$row["USN"].'</td>
                                    <td>' . $row["Name"] . '</td>
                                    <td>'.$row["sem"].'</td> 
                                    <td>'.$row["studnum"].'</td>
                                    <td>'.$row["parnum"].'</td>  
                                      <td>'.$row["email"].'</td> 
                                </tr> 
                        ';  $i++; }
                             }  
                          $output .= '</table>';
                        $branch11=$branch." Studentlist.xls";
                            header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
                            header("Content-Disposition: attachment; filename=$branch11");
			              echo $output;
   ?>