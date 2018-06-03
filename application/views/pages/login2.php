<div style="padding-left:30px; width:400px; clear:both">
<?php echo form_open('pages/login2');?>
  <h1 class="text-info" style="padding:30px;"><?=$title ?></h1>
  <div class="form-group">
    <label class="text-info" for="user">Username</label>
    <input type="text" class="form-control" name="user" id="user" aria-describedby="userHelp" placeholder="Enter username" required autofocus>
  </div>
  <div class="form-group">
    <label class="text-info" for="pass">Password</label>
    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required autofocus>
  </div>
</br>
  <button type="submit" class="btn btn-info btn-block">Login</button>
<?php echo form_close();?>