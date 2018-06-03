<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
</br>
<table class="table table-hover"style="width: 92%; text-align:center; margin-left:60px;">
  <thead>
    <tr class="table-dark">
      <th scope="col">Game Name</th>
      <th scope="col">Recommended Age for this Game</th>
      <th scope="col">Copies of this Game available in our store</th>
      <th scope="col">Price</th>
      <?php if(isset($_COOKIE['loginManager'])):?>
        <th scope="col">Modify</th>
      <?php endif; ?>
      <?php if(isset($_COOKIE['loginCustomer'])):?>
        <th scope="col">Action</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody>
  <?php foreach($games as $game) : ?>
    <?php if($game['Copies']>0):?>
      <tr class="table-dark"  >
        <td><?php echo $game['NameGame']; ?></td>
        <td><?php echo $game['RequiredAge']; ?></td>
        <td><?php echo $game['Copies']; ?></td>
        <td><?php echo $game['PriceGame']*(100-$game['Reduction'])/100; ?>$</td>
        <?php if(isset($_COOKIE['loginManager'])):?>
          <td >
             <a class="btn btn-warning pull-left" href="pages/update_game/<?php echo $game['IdGame'];?>">Update</a>
             <?php echo form_open('pages/delete_game/'.$game['IdGame']); ?>
             <input type="submit" value="Delete" class="btn btn-danger">
             <?php echo form_close();?>
             
          </td>
        <?php endif; ?>

        <?php if(isset($_COOKIE['loginCustomer'])):?>
          <td >
             <?php echo form_open('pages/add_game_cart/'.$game['IdGame']); ?>
             <input type="submit" value="Add to cart" class="btn btn-success">
             <?php echo form_close();?>
             
          </td>

        <?php endif; ?>
      </tr>
    <?php endif; ?>
   <?php endforeach; ?> 
  </tbody>
</table>
<div class='create' style="padding:60px;">
  <?php if(isset($_COOKIE['loginManager'])):?>
    <?php echo form_open('pages/view/create_game'); ?>
      <input  type="submit" value="New Game" class="btn btn-success">
    <?php echo form_close();?>
  <?php endif; ?>
</div>