<div style="padding-left:30px; width:400px; clear:both">
<?php echo form_open('pages/login');?>
  <h1 class="text-info" style="padding:30px;"><?=$title ?></h1>
  <div class="form-group">
    <label class="text-info" for="email">Email Address</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
  </div>
  <div class="form-group">
    <label class="text-info" for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required autofocus>
  </div>
    <a class="text-info" href="<?php echo base_url(); ?>create">Create New Account</a>
</br>
  <button type="submit" class="btn btn-info btn-block">Login</button>
<?php echo form_close();?>