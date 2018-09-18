<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>message board</title>
    <link rel="stylesheet" href="msgb.css">

  </head>
  <body>


    <ul class="nav" >
      <li><a href="index.php">Home page </a></li>
      <li><a href="exercise.html">exercise one </a></li>
      <li><a href="numguess.html">number guessing game </a></li>
      <li><a href="msgbd.php">message board</a></li>
      <li><a href="index.php?logout='1'"  >logout</a></li>

    </ul><br>


    <?php
    // $con = mysqli_connect('localhost', 'root', '', 'registration');
    $con = mysqli_connect('localhost', 'i169178', 'i169178', 'it6117_i169178');

    if (!$con) {
      die("can't connect" . mysqli_error());
    }
    mysqli_select_db($con, "it6117_i169178");

    $result = mysqli_query($con, "SELECT*FROM users");
    if (!empty($_POST['username'])) {
      $sql = "INSERT INTO users (username, message, replydate)VALUES(
                      '".$_POST['username']."',
                      '".$_POST['message']."',
                      '".date("Y-m-d:h:s")."')";

    if ($con->query($sql) === TRUE) {
      echo "new record created successfully";
    }
    else {
      echo "Error:" .$sql . "<br>". $con->error;
    }
    }


    ?>

    <style>
      table, th, td{
        border:1px solid black;
        word-break: break-all;
      }
      table{
        width: 95%;
      }
    </style>
    <?php
      echo $_POST['username'];
      echo "<br>";
      echo $_POST['message'];
     ?>

    <form action="msgbd.php" accept-charset="utf-8" method="post">
      Name:<br>
      <input type="text" name="username" >
      <br>
      Message:<br>
      <textarea name="message" rows="4" cols="40"></textarea>
      <br>
      <button type="submit" >Send</button>
    </form>

<hr>


    <table >

      <tr>
        <th>Name</th>
        <th>Message</th>
        <th>Time</th>
      <?php
    while ($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td >".$row['username']."</td>";
      echo "<td >".$row['message']."</td>";
      echo "<td >".$row['replydate']."</td>";
      echo "</tr>";
      echo "<br />";
    }

    ?>
</table>
  <?php
  mysqli_close($con);
 ?>
  </body>
</html>
