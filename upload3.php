
<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';
include_once 'UserSign.php';

if(isset($_SESSION['userData']))
{
  ;
}
else
{
  header("Location: sign.php");
}
$user = new User();

$userData = $user->checkUser($_SESSION['userData']);

$name = '' . $userData['first_name'].' '.$userData['last_name'];
$email = '' . $userData['email'];
$picture = '<img class="circle" src="'.$userData['picture'].'" alt="7" width=175px>';
$google_id = '' . $userData['oauth_uid'];

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

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

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

</head>
<body>

  <div >
    <nav>
      <div >
        <a href="index3.html" class="brand-logo">
          <img src="images.png" alt="OnePlus">
        </a>
        <div class ="space">
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

    <div>
    <ul id="slide-out" class="side-nav">
        <li><div class="user-view">
          <div class="background">
            <img src="2048x1350-large-landscape-2-1032x663.jpg" alt="6" >
          </div>
          <a href="#!user"><?php echo $picture; ?></a>
          </div></li>
        <li><a href="#!"  class="waves-effect"> <?php echo $name;  ?></a></li>
        <li><a href="#!" class="waves-effect"> <?php echo $email; ?> </a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Subheader</a></li>
        <li><a class="waves-effect" href="logout.php">Log Out</a></li>
      </ul>
      <a href="#" data-activates="slide-out" class="button-collapse">Profile</a>

    </div>


<div id="container">
    <h2>Upload Files</h2>

    <fieldset>
    <legend>Add New files to the Storage</legend>
    <form name="UploadForm" action = "upload.php" method="post" enctype="multipart/form-data">
    <p><label for="name">Select Files <br> Maximum File Size: 2MB | Allowed File Extensions are: .jpg , .png , .gif , .txt , .doc , .rar , .exe , .pdf</label><br/><br />

    <input type="file" name="files[]" multiple>

    </p>
    <p>
    <input type="submit"  value="Upload" >
    </p>
  </form>
</fieldset>
<br><br>

<div> <?php 

 $query = "SELECT * FROM `files_stored` WHERE    google_id = '".$google_id."'  ";
 $result = $user->db->query($query);

if($result->num_rows > 0)
{ 
  $i=1;
 echo '<h3>Uploaded Files </h3>'; 
 echo "<table border='1px' >" ;
 echo "<th>SR.NO</th>";
 echo "<th>File</th>";
 echo "<th>Download the File</th>";
 while($row = $result->fetch_assoc())
 {
    $file_name = $row['file_name'];
    echo "<tr>";
    echo "<td> $i </td>";
    echo "<td> <a href='http://localhost/fileSS/$file_name' >$file_name</a>  </td>";
    echo "<td> <a href='$file_name' download>Download</a> </td>";
    echo "</tr>";
    $i++;
 }

 echo "</table>";
}
else
{
  echo '<h3>No Files Uploaded Yet ! </h3>';  
}

?> </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <script type="text/javascript" src="script777.js"></script>
  <script src="myScript.js"></script>
<script src="about.js"></script>
</body>
 </html>
