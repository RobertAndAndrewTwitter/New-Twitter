<?php
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
      <li><a class="btn-floating green" href="edit.php"><i class="material-icons">info_outline</i></a></li>
      <li><a class="btn-floating blue" href="everyone.php"><i class="material-icons">settings</i></a></li>
      <li><a class="btn-floating orange" href="info.php"><i class="material-icons">dashboard</i></a></li>
      <li><a class="btn-floating light-green accent-3" href="browse.php"><i class="material-icons">shop</i></a></li>

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

	</body>
</html>