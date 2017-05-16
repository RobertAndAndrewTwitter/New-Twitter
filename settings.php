<?php

  ?>
  <html>

    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>`

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <style>
        body{
           background-color: pink ;
           border-style: dashed;
          border-color: white;
    }
      h2{
        text-align: center;
        font-family:"Times New Roman", Times, serif;
        font-size: 60px;
        font-weight: bold;
        position: relative;
        bottom: 20px;
      }
      h1{
        text-align: left;
        font-family:"Times New Roman", Times, serif;
        font-size: 30px;
         position: relative;
         left:80px;
         font-weight: bold;
      }
      h3{
        text-align: center;
        font-family:"Times New Roman", Times, serif;
        font-size: 20px;
        position: relative;
         left:80px;

      }
      h4{
        text-align: left;
        font-family:"Times New Roman", Times, serif;
        font-size: 24px;
         position: relative;
         left:30px;
      </style>
      <style>
      .page-footer{
         position: relative;
      }

      h6{
        position: relative;
        top: .2px;
        left:10;
      }
       h5{
        position: relative;
        top: 2px;
        left:10;
      }
  
    </style>


    <script>
    </script>

    <body>
      <h2>Help Page</h2>
      <h1>How To Use Our Website </h1>
      <h4>Menu</h4>
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
  <div>
           <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">

       <h6><a class="btn-floating btn-large red" href="settings.php"><i class="material-icons">menu</i></a></h6>
      </div>
        <div class="card-content">
          <p>By clicking this button in the bottom right corner of your screen, you will be able to access everything on the website. This includes all the things listed below, which are: </p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
 <h4>Profile Page</h4>
            <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h5><a class="btn-floating btn-large pink accent-1" href="profile.php"><i class="material-icons">perm_identity</i></a></h5>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you will be able to access your profile page. Here you are able to change your profile picture as well as bio, both of which can be seen by our numerous users. </p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
<h4>Your Friend's Tweets</h4>   
<div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h6><a class="btn-floating btn-large orange darken-1" href="everyone.php"><i class="material-icons">language</i></a></h6>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you will be able to see all of your and all of your friend's tweets. You can add friends by using the browse button.</p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
<h4>Browse Page</h4>
        <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h5><a class="btn-floating btn-large yellow darken-1" href="browse.php"><i class="material-icons">contact_phone</i></a></h5>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you will be able to see all of the users of New Twitter. On the browse page, you can see all the user's profile picturea and their bio, and if you are interested, you can add them as a friend by clicking the button. When you add a friend you are now able to see all of their tweets.</p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
<h4>Tweet And Your Tweets</h4>
        <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h5><a class="btn-floating btn-large green" href="edit.php"><i class="material-icons">message</i></a></h5>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you can tweet, see all of your previous tweets, and search for tweets by keyword and user. This search only works for your tweets, and your friend's tweets. </p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
<h4>Help Page</h4>
        <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h6><a class="btn-floating btn-large cyan lighten-2" href="settings.php"><i class="material-icons">live_help</i></a></h6>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you will be able access this page, where you can see the fuctions of all the pages.</p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
<h4>About Us</h4>
        <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h6><a class="btn-floating btn-large deep-purple lighten-3" href="info.php"><i class="material-icons">info_outline</i></a></h6>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you will be able learn more about the creators of New Twitter. </p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
<h4>Log Out Button</h4>
        <div class="col s12 m7">
    <div class="card horizontal">
      <div class="card-image">
       <h6><a class="btn-floating btn-large blue darken-3" href="logout.php"><i class="material-icons">settings_power</i></a></h6>
      </div>
        <div class="card-content">
          <p>By either clicking the button to the left, or by using the menu button, you will be able to log off of New Twitter.</p>
        </div>
        <div class="card-action">
        </div>
      </div>
    </div>
  </div>
</br>
</br>
</br>
              </span>
               <body>
               </body>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>