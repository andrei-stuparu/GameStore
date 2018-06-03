<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
</br>
<table class="table table-hover"style="width: 92%; text-align:center; margin-left:60px;">
  <thead>
    <tr class="table-dark">
      <th scope="col">Game Name</th>
      <th scope="col">Price</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($cartGames as $cartGame) : ?>
    <?php foreach($games as $game) : ?>
      <?php if($cartGame['IdGame']==$game['IdGame']):?>
        <tr class="table-dark"  >
          <td>
              <?php echo $game['NameGame']; ?>
          </td>
          <td><?php echo $game['PriceGame']*(100-$game['Reduction'])/100; ?>$</td>
          <td >
             <?php echo form_open('pages/remove_game_cart/'); ?>            
               <input type="hidden"  name="idG" value="<?php echo $cartGame['IdGame']?>">
               <input type="submit" value="Remove" class="btn btn-danger">
             <?php echo form_close();?>
           </td>
        </tr>
        <?php endif; ?>
      <?php endforeach; ?>
   <?php endforeach; ?> 
  </tbody>
</table>

<?php
  $i=0;
  foreach($cartGames as $cartGame){
    foreach($games as $game){
      if($cartGame['IdGame']==$game['IdGame']){
        $i=$i+$game['PriceGame']-($game['Reduction']/100)*$game['PriceGame'];
      }
    }
  }
  
;?>$


<div class='create' style="padding:60px;">
    <?php echo form_open('pages/order_print'); ?>
      <?php if($i >0):?>
        <h3 class="text-info" style="padding:20px;">Your total price is:<?php echo $i;?></h3>
        <input type="hidden"  name="price" value="<?php echo $i;?>">
        <input  type="submit" value="Send Order" class="btn btn-success">
      <?php endif;?>
    <?php echo form_close();?>
</div>