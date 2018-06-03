<div class="text-danger" style="padding-left:20px;">
<?php echo validation_errors(); ?></div>
<?php echo form_open('pages/create_game');?>
<h1 class="text-info" style="padding:20px;">Create Game</h1>
<div id='all' class="text-info" style="padding:40px">
 <div class="form-group col-md-6">
      <label for="gameName">Game Name</label>
      <input type="text" class="form-control" maxlength="30" name="gameName" placeholder="Game Name">
 </div>
 <div class="form-group col-md-6" >
      <label for="category">Category</label>
      <input type="text" class="form-control" maxlength="20"name="category" placeholder="Category Name">
 </div>
 <div class="form-group col-md-6">
    <label for="age">Required Age</label>
    <input type="number"  min="1" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" name="age" placeholder="Required Age">
  </div>
  <div class="form-group col-md-6">
    <label for="price">Price</label>
    <input type="number"  min="1" max="200" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="11" name="price" placeholder="Price">
  </div>
    <div class="form-group col-md-6">
      <label for="reduction">Reduction</label>
      <input type="number"  min="0" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" class="form-control" name="reduction" placeholder="Reduction">
    </div>
    <div class="form-group col-md-6">
      <label for="copies">Copies</label>
      <input type="number" min="0" max="200" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" class="form-control" name="copies" placeholder="Copies">
    </div>
    <div class="col-md-6">
      <button type="submit" class="btn btn-info col-md-12" >Save</button>
    </div>
</div>
<?php echo form_close();?>