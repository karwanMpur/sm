<?php
 $connect = mysqli_connect("localhost", "root", "", "bag");
 if(isset($_POST["query"]))
 {
      $output = '';
      $query = "SELECT * FROM cust WHERE id LIKE '%".$_POST["query"]."%' ORDER BY  id DESC ";
      $result = mysqli_query($connect, $query);
      $output = '<tr class="list-unstyled">';
      if(mysqli_num_rows($result) > 0)
      {
           while($row = mysqli_fetch_array($result))
           {
             $na=$row["name"];
             $in=$row["insta"];
             $fa=$row["facebook"];
             $ci=$row["city"];
             $p1=$row["phone1"];
             $p2=$row["phone2"];
                $output .= '<tr class="list-unstyled"><th>'.$row["id"].'</th>';
                  $output .= '<th>'.$row["name"].'</th>';
                    $output .= '<th>'.$row["insta"].'</th>';
                      $output .= '<th>'.$row["facebook"].'</th>';
                        $output .= '<th>'.$row["city"].'</th>';
                          $output .= '<th>'.$row["phone1"].'</th>';
                            $output .= '<th>'.$row["phone2"].'</th></tr>';

           }



      }
      else
      {
           $output .= '<th>Country Not Found</th>';
      }
      $output .= '</tr>';
      echo $output;

 }

 ?>
