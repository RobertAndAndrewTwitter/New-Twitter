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
    	
		// open connection
		$connection = mysqli_connect($host, $username, $password) or die ("Unable to connect!");

		// select database
		mysqli_select_db($connection, $dbname) or die ("Unable to select database!");

		// create query
		if(isset($_POST['search'])){
			$searchq = $_POST['search'];
		
			$query = "SELECT * FROM symbols WHERE tweet LIKE '%".$searchq."%'"; 

       
		// execute query
			$result = mysqli_query($connection,$query) or die ("Error in query: $query. ".mysql_error());

		// see if any rows were returned
			if (mysqli_num_rows($result) > 0) {

    		// print them one after another
				echo "<table cellpadding=10 border=1>";
    			while($row = mysqli_fetch_row($result)) {
        			echo "<tr>";
					//echo "<td>".$row[0]."</td>";
        			echo "<td>" . $row[1]."</td>";
        			echo "<td>".$row[2]."</td>";
					//echo "<td><a href=".$_SERVER['PHP_SELF']."?id=".$row[0].">Remove From Twitter</a></td>";
        			echo "</tr>";
    		}
		    echo "</table>";

		} else {
			
    		// print status message
    		echo "No tweets found!";
		}

		// free result set memory
		mysqli_free_result($connection,$result);
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
    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>


	</body>
</html>