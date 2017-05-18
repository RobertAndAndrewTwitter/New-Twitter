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
		echo "Welcome @" . $arr[1]. "<br><br>";
   		$usernm = "@".$arr[1];
		// open connection
		$connection = mysqli_connect($host, $username, $password) or die ("Unable to connect!");

		// select database
		mysqli_select_db($connection, $dbname) or die ("Unable to select database!");

		// create query
		$query = "SELECT * FROM symbols WHERE name = '$usernm'";
       
		// execute query
		$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());

		// see if any rows were returned
		/*if (mysqli_num_rows($result) > 0) {

    		// print them one after another
    		echo "<table cellpadding=10 border=1>";
    		while($row = mysqli_fetch_row($result)) {
        		echo "<tr>";
				//echo "<td>".$row[0]."</td>";
        		echo "<td>" . $row[1]."</td>";
        		echo "<td>".$row[2]."</td>";
        		echo "<td><a class='waves-effect waves-pink darken-1 btn-flat no-uppercase' href=".$_SERVER['PHP_SELF']."?like=".$row[0]."><i class='material-icons right'>thumb_up</i>Like</a></td>";
        		echo "<td><a class='waves-effect waves-pink darken-1 btn-flat no-uppercase' href=".$_SERVER['PHP_SELF']."?dislike=".$row[0]."><i class='material-icons right'>thumb_down</i>Dislike</a></td>";
        		echo "<td>".$row[3]."  Likes"."</td>";
        		echo "<td>".$row[4]."  Dislikes"."</td>";
            echo "<td><a class='waves-effect waves-pink darken-1 btn-flat no-uppercase' href=".$_SERVER['PHP_SELF']."?id=".$row[0].">Remove From NewTwitter™</a></td>";
			//	echo "<td><a href=".$_SERVER['PHP_SELF']."?id=".$row[0].">Remove From Twitter</a></td>";
        		echo "</tr>";
    		}
		    echo "</table>";

		} else {
			
    		// print status message
        echo "\n";
        echo "No tweets found!";
		}*/


//
//
//

		if (mysqli_num_rows($result) > 0) {

        // print them one after another
        while($row = mysqli_fetch_row($result)) {
            $usrnm = $row[1];
            $tweet = $row[2];
            $likes = $row[3];
            $dislikes = $row[4];
            $likehref = $_SERVER['PHP_SELF']."?like=".$row[0];
            $dislikehref = $_SERVER['PHP_SELF']."?dislike=".$row[0];
            $remove = $_SERVER['PHP_SELF']."?id=".$row[0];
            $user = ltrim($row[1],"@");
            $imgquery = "SELECT img FROM users WHERE username='$user'";
            $imgresult = mysqli_query($connection,$imgquery) or die ("Error in query: $imgquery. ".mysql_error());
            $imgarr = mysqli_fetch_array($imgresult);
		      	$img = implode("", $imgarr);
		      	$length = (strlen($img))/2;
		      	$img = substr_replace($img,"", $length);
            if ($likes == 0 && $dislikes == 0){
              $diff = "100%";
            }
            if ($dislikes == 0 && $likes > 0){
              $diff = "100%";
            }
            if ($likes == 0 && $dislikes > 0){
              $diff = "0%";
            }
            else {
              $diff = (($likes)/($likes+$dislikes)*100)."%";
            }
 

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
              <br>
              <span class="likes"><?php echo $likes; ?>  Likes</span>
              <span class="likes"><?php echo $dislikes; ?>  Disikes</span>
              <div class="progress"><div class="determinate" style="width: <?php echo $diff; ?>; background-color: #e80202;"></div></div><br>
              <p>
                <?php echo $tweet; ?>
              </p>
            </div>
          </div>
          <a class='waves-effect waves-pink darken-1 btn-flat no-uppercase' href="<?php echo $likehref; ?>"><i class='material-icons right'>thumb_up</i>Like</a>
          <a class='waves-effect waves-pink darken-1 btn-flat no-uppercase' href="<?php echo $dislikehref; ?>"><i class='material-icons right'>thumb_down</i>Dislike</a>
          <a class='waves-effect waves-pink darken-1 btn-flat no-uppercase' href="<?php echo $remove; ?>">Remove From NewTwitter™</a>
        </div>
      </div>

      <?php
      
        }
        

    } else {
      
        // print status message
        echo "\n";
        echo "No tweets found!";
    }


		// free result set memory
		mysqli_free_result($connection,$result);

		// set variable values to HTML form inputs
		  $search = $_POST['search2'];
    	$tweet = $_POST['tweet'];
		
		// check to see if user has entered anything
		if ($tweet != "") {
	 		// build SQL query
			$query = "INSERT INTO symbols (name, tweet) VALUES ('$usernm', '$tweet')";
			// run the query
     		$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());
			// refresh the page to show new update
	 		echo "<meta http-equiv='refresh' content='0'>";
		}
		
    if ($search != "") {
      // build SQL query
      header("Location: search.php"); 
      die("Redirecting to: search.php");
     }


		// if DELETE pressed, set an id, if id is set then delete it from DB
		if (isset($_GET['id'])) {

			// create query to delete record
			echo $_SERVER['PHP_SELF'];
    		$query = "DELETE FROM symbols WHERE id = ".$_GET['id'];

			// run the query
     		$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());
			
			// reset the url to remove id $_GET variable
			$location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
			exit;
			
		}

		if (isset($_GET['like'])) {

			// create query to delete record
			$likeid = $_GET['like'];
			echo $_SERVER['PHP_SELF'];
			$likesq = "SELECT likes from symbols WHERE id='$likeid'";
			$lres = mysqli_query($connection,$likesq) or die ("Error in query: $query. ".mysql_error());
			$likesarr = mysqli_fetch_array($lres);
			$likes = implode("", $likesarr);
			$length = (strlen($likes))/2;
			$likes = substr_replace($likes,"", $length);
			$likes = (integer)$likes + 1;
 

    		$query = "UPDATE symbols SET likes='$likes' WHERE id ='$likeid'";
			// run the query
     		$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());
			
			// reset the url to remove id $_GET variable
			$location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
			exit;	

		}


		if (isset($_GET['dislike'])) {

			// create query to delete record
			$dislikeid = $_GET['dislike'];
			echo $_SERVER['PHP_SELF'];
			$dislikesq = "SELECT dislikes from symbols WHERE id='$dislikeid'";
			$dlres = mysqli_query($connection,$dislikesq) or die ("Error in query: $query. ".mysql_error());
			$dislikesarr = mysqli_fetch_array($dlres);
			$dislikes = implode("", $dislikesarr);
			$length = (strlen($dislikes))/2;
			$dislikes = substr_replace($dislikes,"", $length);
			$dislikes = (integer)$dislikes + 1;
 

    		$query = "UPDATE symbols SET dislikes='$dislikes' WHERE id ='$dislikeid'";
			// run the query
     		$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());
			
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

      .no-uppercase {
     text-transform: none;
     }
</style>
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

      <div class="progress">
      <div class="determinate" style="width: 100%"></div>
      </div><br>

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

    <!-- This is the HTML form that appears in the browser -->
   	<div class="input-field">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <input id="search" type="text" name="tweet">
    <label for="search">Tweet</label>
    <button class="btn waves-effect waves-light" type="submit" name="action">Post
    <i class="material-icons right">send</i>
    </button>
    </form>
    </div><br>


    <div class="input-field">
    <form action="search.php?go" id="searchform" method="get">
    <input id="search" type="text" name="search">
    <label for="search">Search</label>
    <button class="btn waves-effect waves-light" type="submit" name="submit">Search
    <i class="material-icons right">search</i>
    </button>
    </form>
    <div><br>


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