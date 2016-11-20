<?php
    include "basic_menu.php"
  ?>

<div class="row">
  <div class="box" id="login_box">
    <h2>Login</h2>
    <form class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember"> Remember me
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button id="login_btn" type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    </form>
  </div>


  <div class="box" id="signup_box">
    <h2>Sign up</h2>
    <form class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" id="name" placeholder="Enter your name" name="name">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter your email address" name="email">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="psw">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="pwd" placeholder="Enter your password" name="password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="con_psw">Confirm password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="con_psw" placeholder="Reenter your password" name="con_psw">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button id="signup_btn" type="signup" class="btn btn-default">Sign up</button>
        </div>
      </div>
    </form>
  </div>
</div>
