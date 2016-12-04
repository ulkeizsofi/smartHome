<head>
    <link rel="stylesheet" type="text/css" href="/css/login.css">
<!--       <script src="js/main.js"></script>
 -->
</head>

<body>
  
  <div id="login_container">
    
    <?php
        include "login_menu.php"
    ?>

    <div class="row login_row">
      <div class="box" id="login_box">
        <h2><?php etrans("login"); ?></h2>
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-3" for="name"><?php etrans("name"); ?></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd"><?php etrans("password"); ?></label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="remember"> <?php etrans("remember_me"); ?>
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <button id="login_btn" type="submit" class="btn btn-default"><?php etrans("submit"); ?></button>
            </div>
          </div>
        </form>
      </div>


      <div class="box" id="signup_box">
        <h2><?php etrans("signup"); ?></h2>
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-3" for="name"><?php etrans("name"); ?></label>
            <div class="col-sm-8">
              <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email"><?php etrans("email"); ?></label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="psw"><?php etrans("password"); ?></label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="password">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="con_psw"><?php etrans("password_conf"); ?></label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="con_psw" placeholder="Reenter your password" name="con_psw">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
              <button id="signup_btn" type="signup" class="btn btn-default"><?php etrans("signup"); ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
