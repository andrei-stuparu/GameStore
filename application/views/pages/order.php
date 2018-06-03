<div class="text-danger" style="padding-left:20px;">
<?php echo validation_errors(); ?></div>
<?php echo form_open('pages/compute_order');?>
<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
<div id='all' class="text-info" style="padding:40px">
 <div class="form-group col-md-6">
      <label for="adress">Shipping Adress</label>
      <input type="text" class="form-control" maxlength="200" name="adress" placeholder="Insert Adress">
 </div>
 <div class="form-group col-md-6">
    <label for="cp">Shipping Postal Code</label>
    <input type="number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="10" name="cp" placeholder="Insert Postal Code">
  </div>
  <div class="form-group col-md-6">
    <h3 class="text-info" style="padding:20px;">Your total price is:<?php echo $price;?>$ </h3> 
  </div>
    <div class="col-md-6">
      <input type="hidden"  name="price" value="<?php echo $price;?>">
      <button type="submit" class="btn btn-info col-md-12" >Send Order</button>
    </div>
</div>
<?php echo form_close();?>