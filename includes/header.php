
<html>
    
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>CSUMB League of Legends</title>
    
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Style sheet -->
    <link rel="stylesheet" href="includes/style.css" type="text/css" />
    
</head>

<nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
          <a href="https://csumb.edu "><img class="navbar-brand" src="images/ot.jpeg" alt="CSUMB Logo"></a>
          
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li id="homeLink"><a href="index.php"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li id="eventLink"><a href="events.php"><span class="glyphicon glyphicon-list-alt"></span> Events</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="glyphicon glyphicon-list"></span> Resources<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li id="guidesLink"><a href="guides.php"><span class="glyphicon glyphicon-book"></span> Guides</a></li>
                <li id="toolsLink"><a href="tools.php"> <span class="glyphicon glyphicon-wrench"></span> Tools</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search Summoner">
            </div>
            <button type="submit" class="btn btn-default"> <span class="glyphicon glyphicon-search"></span> Search</button>
          </form>
          
          <ul class="nav navbar-nav navbar-right">
            <li id="loginLink"><a href="#" data-toggle='modal' data-target='#myModal'>Log In</a></li>
            <li id="signupLink"><a href="signup.php">Sign Up</a></li>
            <li id="accSettings" class="hidden"><a id="accLink"> Account Settings</a></li>
            <li id="logoutLink" class="hidden"><a href="logout.php">Log Out</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      
    </nav>
    
    <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel"> Log In </h4>
            </div>
            <div class="modal-body">
              <form method="POST">
                  <input type="text" name="username" placeholder="Username"><br>
                  <input type="password" name="password"  placeholder="Password"><br>
                  <button type="submit" name="loginForm">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div> <!-- End Modal -->
      
<?php
if($_SESSION['username'] != "") {
      echo "<script>\n $('#signupLink').addClass('hidden'); $('#loginLink').addClass('hidden');\n";
      echo "$('#accSettings').removeClass('hidden');\n $('#accLink').html(\"" . $_SESSION['username'] . " <span class='glyphicon glyphicon-cog'></span>" .  "\"); $('#logoutLink').removeClass('hidden');\n";
      echo "$('#accLink').attr('href','accSettings.php?id=" . $_SESSION['userId'] . "');\n";
      echo "</script>";
    }
?>

