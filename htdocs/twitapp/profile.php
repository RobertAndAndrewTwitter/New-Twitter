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
    
    // To access $_SESSION['user'] values put in an array, show user his username
    $arr = array_values($_SESSION['user']);
    $usernm = "@".$arr[1];
    $userid = $arr[0];
    $profileimg = $_POST['profimg'];
    $biography = $_POST['biography'];
    $count = 0;

    // open connection
    $connection = mysqli_connect($host, $username, $password) or die ("Unable to connect!");

    // select database
    mysqli_select_db($connection, $dbname) or die ("Unable to select database!");


    if ($profileimg != "") {
    // create query
    $query = "UPDATE users SET img='$profileimg' WHERE id='$userid'";
       
    // execute query
    $result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());
    mysqli_free_result($connection,$result);
   }

    if ($biography != "") {
    // create query
    $query2 = "UPDATE users SET bio='$biography' WHERE id='$userid'";     
    // execute query
    $result2 = mysqli_query($connection,$query2) or die ("Error in query: $query2. ".mysql_error());
    mysqli_free_result($connection,$result2);
    }

    $bquery = "SELECT bio FROM users WHERE id='$userid'";
    $bresult = mysqli_query($connection,$bquery) or die ("Error in query: $bquery. ".mysql_error());
    $bioarray = mysqli_fetch_array($bresult);
    $biotext = implode("", $bioarray);
    $length = (strlen($biotext))/2;
    $biotext = substr_replace($biotext,"", $length);
    mysqli_free_result($connection,$bresult);

    $imgquery = "SELECT img FROM users WHERE id='$userid'";
    $current = mysqli_query($connection,$imgquery) or die ("Error in query: $imgquery. ".mysql_error());
    $imgarray = mysqli_fetch_array($current);
    $imgname = implode("", $imgarray);
    $length = (strlen($imgname))/2;
    $imgname = substr_replace($imgname,"", $length);
    mysqli_free_result($connection,$current);


    $following = "SELECT following FROM users WHERE id='$userid'";
    $query = "SELECT * FROM users WHERE";
    $fquery = mysqli_query($connection,$following) or die ("Error in query: $following. ".mysql_error());
    $farray = mysqli_fetch_array($fquery);
    $fstring = implode("", $farray);
    $flength = (strlen($fstring)/2);
    $fstring = substr_replace($fstring,"",$flength);
    $newstring = "";
    $token = strtok($fstring, ",");
    while ($token !== false){
      $token = strtok(",");
      $newstring = $newstring . " OR id=". $token;
    }

    $newstring = substr_replace($newstring,"", 0,3);
    $finalq = $query . $newstring;
    $finalq = substr_replace($finalq,"",-7);
    if ($finalq == "SELECT * FROM users WH"){
      $fullstop = true;
    }
         // execute query
    $result = mysqli_query($connection,$finalq) or die ("Error in query: $finalq. ".mysql_error());
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
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

<div class="fixed-action-btn horizontal click-to-toggle">
       <a class="btn-floating btn-large red">
         <i class="material-icons">menu</i>
       </a>
         <ul>
          <li><a class="btn-floating pink accent-1" href="profile.php"><i class="material-icons">perm_identity</i></a></li>
          <li><a class="btn-floating orange darken-1" href="everyone.php"><i class="material-icons">language</i></a></li>
          <li><a class="btn-floating yellow darken-1" href="browse.php"><i class="material-icons">contact_phone</i></a></li>
          <li><a class="btn-floating green" href="edit.php"><i class="material-icons">message</i></a></li>
          <li><a class="btn-floating cyan lighten-2" href="settings.php"><i class="material-icons">live_help</i></a></li>
          <li><a class="btn-floating deep-purple lighten-3" href="info.php"><i class="material-icons">info_outline</i></a></li>
          <li><a class="btn-floating blue darken-3" href="logout.php"><i class="material-icons">settings_power</i></a></li>
       </ul>
    </div>

    <div class="row">
      <div class="col s12 m7">
        <div class="card red">
          <div class="card-image">
            <img src="<?php echo $imgname; ?>" alt="No Image Found. Try Adding One!">
             </div>
           <div class="card-content">
          <span class="card-title"><?php echo $usernm; ?>'s Profile</span>
        <p><?php echo $biotext; ?></p>
      </div>
      </div>
      </div>

      <div class="progress">
      <div class="determinate" style="width: 100%"></div>
      </div><br>
    

    <!-- This is the HTML form that appears in the browser -->

    <div class="input-field">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
     <input id="img" type="text" name="profimg">
      <label for="bib">Input a link to update profile image</label>
      <button class="btn waves-effect waves-light" type="submit" name="action">Update
      <i class="material-icons right">present_to_all</i>
      </button>
      </form>
    </div><br>


    <div class="input-field">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <input id="bib" type="text" name="biography">
      <label for="bib">Input text to update biography</label>
      <button class="btn waves-effect waves-light" type="submit" name="action">Update
      <i class="material-icons right">present_to_all</i>
      </button>
    </form>
    </div><br>


      <div class="progress">
      <div class="determinate" style="width: 100%"></div>
      </div><br>

      <?php
      if (mysqli_num_rows($result) > 0) {

        // print them one after another
        while($row = mysqli_fetch_row($result)) {
            $count = $count+1;
            $img = $row[5];
            $bio = $row[6];
            $usrnm = "@" . $row[1];
            $hlink = $_SERVER['PHP_SELF']."?remove=".$row[0];
            if ($fullstop == true){
              echo "No friends yet... Try adding some!";
              exit;
            }
            else {
      ?>
      <style>
        .cardusrnm {
          font-size: 20px;
        }
      </style>

      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="<?php echo $img; ?>" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="cardusrnm"><?php echo $usrnm; ?></span>
              <p>
                <?php echo $bio; ?>
              </p>
            </div>
          </div>
          <a class="btn" href="<?php echo $hlink; ?>">Remove Friend</a>
        </div>
      </div>

      <?php
      } 

    }
        

    } else {
      
        // print status message
        echo "\n";
        echo "No users found!";
    }

    // free result set memory
    mysqli_free_result($connection,$result);


    // if DELETE pressed, set an id, if id is set then delete it from DB
    if (isset($_GET['remove'])) {
       $friend = (integer)$_GET['remove'];

      // create query to delete record
 //  echo $_SERVER['PHP_SELF'];
       // $find = "SELECT username FROM users WHERE id=$friend";
       // $findresult = mysqli_query($connection,$find) or die ("Error in query: $find. ".mysql_error());

        $following = "SELECT following FROM users WHERE id=$userid";
        $fquery = mysqli_query($connection,$following) or die ("Error in query: $following. ".mysql_error());
        $farray = mysqli_fetch_array($fquery);
        $fstring = implode(",", $farray);
        $flength = (strlen($fstring)/2) + 1;
        $fstring = substr_replace($fstring,"",$flength);
        $looparray = explode(",", $fstring);
        $fcount = 0;
        for ($i=0; $i<count($looparray); $i++){
            if ($looparray[$i] == $friend){
              $teststr = array_splice($looparray,$i,1);
            }
            $fcount = $fcount+1;
        }

        $finalstring = implode(",", $looparray);
        $teststr = implode("", $teststr);
        $testlen = strlen($teststr)+1;
        $finalstring = rtrim($finalstring, ",");
        /*$finalstring = substr_replace($finalstring,"", -($testlen));
        echo $finalstring . "<br> ";
        $flen = (strlen($finalstring)/2);
        $finalstring = substr_replace($finalstring, "", $flen);
       // echo $teststr . "<br> ";
        echo $finalstring;
        // echo $fstring;

        $rightstr = strstr($fstring, $friend);
        $leftstr = strstr($fstring, $friend, true);
       

        echo $leftstr;
        echo "<br> ";
        //echo $fstring;
        echo $rightstr;
        if strlen($leftstr )
        $fadd = $fstring . (string)$friend;
*/
        $fquery = "UPDATE users SET following='$finalstring' WHERE id=$userid";
     //   echo $fquery;
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

    <div class="progress">
      <div class="determinate" style="width: 100%"></div>
      </div><br>

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
                  <li><a class="grey-text text-lighten-3" href="https://funds.gofundme.com/dashboard/newtwitter">Go Fund Me</a></li>
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