<div class="text-danger" style="padding-left:20px;">
<?php echo validation_errors(); ?></div>
<?php echo form_open('pages/addCustomer');?>
<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
<div id='all' class="text-info" style="padding:40px">
<div class="form-row">
 <div class="form-group col-md-6">
      <label for="firstName">First Name</label>
      <input type="text" class="form-control" maxlength="20" name="firstName" placeholder="First name">
 </div>
 <div class="form-group col-md-6" >
      <label for="lastName">Last Name</label>
      <input type="text" class="form-control" maxlength="20"name="lastName" placeholder="Last name">
 </div>
</div>
<div class="form-row">
 <div class="form-group col-md-6">
    <label for="age">Your Age</label>
    <input type="number" min="1" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" name="age" placeholder="18">
  </div>
</div>
 <div class="form-row">
  <div class="form-group col-md-6">
    <label for="telephone">Telephone</label>
    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="11" name="telephone" placeholder="301557156874">
    <small id="TelephoneHelp" class="form-text text-info">Also write your country code without the +.</small>
  </div>
 </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Your Email</label>
      <input type="email" class="form-control" maxlength="40" name="email" placeholder="Joe.doe@yahoo.com">
      <small id="emailHelp" class="form-text text-info">We'll never share your email with anyone else.</small>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="pass">Your Password</label>
      <input type="password" class="form-control" minlength="6" maxlength="18" name="pass" placeholder="*******">
      <small id="passHelp" class="form-text text-info">Your password should have in between 6 and 18 characters.</small>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="pass2">Confirm Password</label>
      <input type="password" class="form-control" minlength="6" maxlength="18" name="pass2" placeholder="*******">
      <small id="passHelp" class="form-text text-info">Your password should match the one from before.</small>
    </div>
  </div>
  <button type="submit" class="btn btn-info col-md-6 ">Save</button>
<?php echo form_close();?>