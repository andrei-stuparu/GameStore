<div class="text-danger" style="padding-left:20px;">
<?php echo validation_errors(); ?></div>
<?php echo form_open('pages/update_game_db');?>
<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
<div id='all' class="text-info" style="padding:40px">
 <input type="hidden"  name="id" value="<?php echo $myGame->IdGame?>">
 <div class="form-group col-md-6">
      <label for="gameName">Game Name</label>
      <input type="text" class="form-control" maxlength="20" name="gameName" value="<?php echo $myGame->NameGame?>">
 </div>
 <div class="form-group col-md-6" >
      <label for="category">Category</label>
      <input type="text" class="form-control" maxlength="20"name="category" value="<?php echo $category->NameCategory?>">
 </div>
 <div class="form-group col-md-6">
    <label for="age">Required Age</label>
    <input type="number"  min="1" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" name="age" value="<?php echo $myGame->RequiredAge?>">
  </div>
  <div class="form-group col-md-6">
    <label for="price">Price</label>
    <input type="number"  min="1" max="200" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="11" name="price" value="<?php echo $myGame->PriceGame?>">
  </div>
    <div class="form-group col-md-6">
      <label for="reduction">Reduction</label>
      <input type="number"  min="0" max="99" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" class="form-control" name="reduction" value="<?php echo $myGame->Reduction?>">
    </div>
    <div class="form-group col-md-6">
      <label for="copies">Copies</label>
      <input type="number" min="0" max="200" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" maxlength="2" class="form-control" name="copies" value="<?php echo $myGame->Copies?>">
    </div>
    <div class="col-md-6">
      <button type="submit" class="btn btn-info col-md-12" >Save</button>
    </div>
</div>
<?php echo form_close();?>