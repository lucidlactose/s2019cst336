<?php
    session_start();
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <!------ Include the above in your HEAD tag ---------->
  </head>
  <body>
  <div id="login">
      <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
          <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
            <form id="login-form" class="form" action="" method="post">
              <h3 class="text-center text-info">Greetings not-admin</h3>
              <div class="form-group">
                <input type="button" name="logout" class="btn btn-info btn-md" value="logout">
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>