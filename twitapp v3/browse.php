<?php
     // pass in some info;
    require("common.php"); 
    
    if(empty($_SESSION['user'])) { 
  
      // If they are not, we redirect them to the login page. 
      $location = "http://" . $_SERVER['HTTP_HOST'] . "/login.php";
      echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
      //exit;
         
          // Remember that this die statement is absolutely critical.  Without it, 
          // people can view your members-only content without logging in. 
          die("Redirecting to login.php"); 
      } 

    $arr = array_values($_SESSION['user']);
    $userid = $arr[0];
    // open connection
    $connection = mysqli_connect($host, $username, $password) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection, $dbname) or die ("Unable to select database!");

    // create query
    $following = "SELECT following FROM users WHERE id=$userid";
    $query = "SELECT * FROM users WHERE NOT id=$userid AND NOT id=1";
    $fquery = mysqli_query($connection,$following) or die ("Error in query: $following. ".mysql_error());
    $farray = mysqli_fetch_array($fquery);
    $fstring = implode("", $farray);
    $flength = (strlen($fstring)/2);
    $fstring = substr_replace($fstring,"",$flength);
    $newstring = "";
    $token = strtok($fstring, ",");
    while ($token !== false){
      $token = strtok(",");
      $newstring = $newstring . " AND NOT id=". $token;
    }

    $finalq = $query . $newstring;
    $finalq = substr_replace($finalq,"",-12);

    // execute query
    $result = mysqli_query($connection,$finalq) or die ("Error in query: $query. ".mysql_error());

    // see if any rows were returned
    if (mysqli_num_rows($result) > 0) {

        // print them one after another
        echo "<table cellpadding=10 border=1>";
        while($row = mysqli_fetch_row($result)) {
            echo "<tr>";
        //echo "<td>".$row[0]."</td>";
            echo "<td>" . "@" . $row[1]."</td>";
            echo "<td><a href=".$_SERVER['PHP_SELF']."?add=".$row[0].">Add Friend</a></td>";
            echo "</tr>";
        }
        echo "</table>";

    } else {
      
        // print status message
        echo "\n";
        echo "No users found!";
    }

    // free result set memory
    mysqli_free_result($connection,$result);


    // if DELETE pressed, set an id, if id is set then delete it from DB
    if (isset($_GET['add'])) {
       $friend = (integer)$_GET['add'];

      // create query to delete record
        echo $_SERVER['PHP_SELF'];
       // $find = "SELECT username FROM users WHERE id=$friend";
       // $findresult = mysqli_query($connection,$find) or die ("Error in query: $find. ".mysql_error());

        $following = "SELECT following FROM users WHERE id=$userid";
        $fquery = mysqli_query($connection,$following) or die ("Error in query: $following. ".mysql_error());
        $farray = mysqli_fetch_array($fquery);
        $fstring = implode(",", $farray);
        echo $fstring;
        $flength = (strlen($fstring)/2) + 1;
        $fstring = substr_replace($fstring,"",$flength);
        $fadd = $fstring . (string)$friend;
        $fquery = "UPDATE users SET following='$fadd' WHERE id=$userid";
        echo $fquery;
       //run the query
        $result = mysqli_query($connection,$fquery) or die ("Error in query: $fquery. ".mysql_error());
      // reset the url to remove id $_GET variable
      $location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
      echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
      exit;
      
    }

    // close connection
    mysqli_close($connection);

	?>

  <html>

    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <style>
        body{
          background-color: pink ;
          border-style: dashed;
          border-color: white;
    }
    </style>
    <style>
      .page-footer{
         position: relative;
      }
    </style>


    <script>
    </script>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      
   <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red" href="profile.php"><i class="material-icons">perm_identity</i></a></li>
      <li><a class="btn-floating yellow darken-1" href="browse.php"><i class="material-icons">language</i></a></li>
      <li><a class="btn-floating green" href="info.php"><i class="material-icons">info_outline</i></a></li>
      <li><a class="btn-floating blue" href="settings.php"><i class="material-icons">settings</i></a></li>
    </ul>
  </div>
  <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="https://i.ytimg.com/vi/5LlQNty_C8s/hqdefault.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">

                My name is Ansh. I love New Twitter.
              </span>
            </div>
          </div>
            <a class="btn" onclick="Materialize.toast('Ansh Added', 4000)">Add Friend</a>
        </div>
      </div>

    <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="http://toriavey.com/images/2011/01/Falafel-10-640x480.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">

                My name is Neel. I love New Twitter.
              </span>
            </div>
          </div>
            <a class="btn" onclick="Materialize.toast('Neel Added', 4000)">Add Friend</a>
        </div>
      </div>

      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="http://www.ldoceonline.com/media/english/illustration/waffle.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">

                My name is Shrimad. I love New Twitter.
              </span>
            </div>
          </div>
            <a class="btn" onclick="Materialize.toast('Shrimad Added', 4000)">Add Friend</a>
        </div>
      </div>


     <form action="logout.php" method="post"><button class="btn waves-effect waves-light" type="submit" name="action">Log Out
    <i class="material-icons right">send</i>
  </button><br><br>
    <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"> </h5>
                <p class="grey-text text-lighten-4">Thank You for visiting New Twitter.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links to support us</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.Patreon.com">Patreon</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.GoFundMe.com/newtwitter">Go Fund Me</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.PayPal.com">Pay Pal</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.gmail.com">E-Mail</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 FY CompSci
            <a class="grey-text text-lighten-4 right" href="https://www.github.com">GitHub</a>
            </div>
          </div>
        </footer>
	</body>
</html>