<?php

include_once 'gpConfig.php';
include_once 'User.php';
include_once 'UserSign.php';


if(isset($_SESSION['id']))
{
  //echo "OK";
}
else
{
  echo "Not OK";
}

$user = new User();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>File Storage</title>
  <link rel="shortcut icon" href="images.png" type="image/png">

  <!-- Style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  <link rel="stylesheet" type="text/css" href="style7771.css" />
  <link rel="stylesheet" type="text/css" href="main3.css">
  <link rel="stylesheet" type="text/css" href="about3.css" />
  <style>
    table {
    border: 1px solid #333;
    }

    table td {
    border: 1px solid #333;
    }
    table th {
    border: 1px solid #333;
    }
  </style>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<body>

  <div >
    <nav>
      <div >
        <a href="index3.html" class="brand-logo">
          <img src="images.png" alt="OnePlus">
        </a>
        <div class = "space">
        <ul >
          <li class="tab1"><a href="index3.html">About</a></li>
          <li class="tab1"><a href="upload3.php">Upload Files</a></li>
          <li class="tab1"><a href="sign.php">Sign In</a></li>
        </ul>
      </div>
      </div>
    </nav>
  </div>
  <div class="bdy">
    <div class="jumb">
      <div class="jumb-title font-aw" class="a1">FILE STORAGE DRIVE</div>
      </div>
    </div>

    <div><h5 dir="rtl"><a href="logout.php">&nbsp;&nbsp;&nbsp;Logout</a></h5></div>

    <div>  
      <?php

        
          echo "<h4>Number of Users</h4>";
          $sql = "SELECT * FROM `users` ";
          $result = $user->db->query($sql);
          if($result->num_rows > 0)
          { 
            $i=1;
            echo "<table border='1px' >" ;
            echo "<th>SR.NO</th>";
            echo "<th>Google ID</th>";
            echo "<th>First Name</th>";
            echo "<th>Second Name</th>";
            while($row = $result->fetch_assoc())
            {
              $google_ID = $row['oauth_uid'];
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              echo "<tr>";
              echo "<td>$i </td>";
              echo "<td>$google_ID</td>";
              echo "<td>$first_name</td>";
              echo "<td>$last_name</td>";
              echo "</tr>";
              $i++;
            }
            echo "</table>";
          }
      ?>
    </div>
    <div>  
      <?php

          echo "<h4>Users with Files Stored</h4>";
          $sql = "SELECT `users`.`first_name`,`users`.`last_name`,`files_stored`.`size` FROM `files_stored` INNER JOIN `users` ON `users`.`oauth_uid`=`files_stored`.`google_id` ";
          $result = $user->db->query($sql);
          if($result->num_rows > 0)
          { 
            $i=1;
            echo "<table border='1px' >" ;
            echo "<th>SR.NO</th>";
            echo "<th>First Name</th>";
            echo "<th>Second Name</th>";
            echo "<th>Size in KB</th>";
            while($row = $result->fetch_assoc())
            {
              $first_name = $row['first_name'];
              $last_name = $row['last_name'];
              $size = $row['size'];
              echo "<tr>";
              echo "<td>$i </td>";
              echo "<td>$first_name</td>";
              echo "<td>$last_name</td>";
              echo "<td>$size</td>";
              echo "</tr>";
              $i++;
            }
            echo "</table>";
          }
      ?>
    </div>




</body>
</html>