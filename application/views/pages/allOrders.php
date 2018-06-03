<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
</br>
<table class="table table-hover"style="width: 92%; text-align:center; margin-left:60px;">
  <thead>
    <tr class="table-dark">
      <th scope="col">Order ID</th>
      <th scope="col">Date of Passage of Order</th>
      <th scope="col">Shipping Adress</th>
      <th scope="col">Shipping Postal Code</th>
      <th scope="col">Order Total Cost</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach((array)$allOrders as $order) : ?>
        <tr class="table-dark"  >
          <td>
              <?php echo $order['IdOrder']; ?>
          </td>
          <td><?php echo $order['DateOrder']; ?></td>
          <td >
             <?php echo word_limiter($order['ShippingAdress'],15); ?>            
          </td>
          <td >
             <?php echo $order['ShippingPostalCode']; ?>            
          </td>
          <td >
             <?php echo word_limiter($order['TotalCost'],15); ?>$            
          </td>
          <td >
            <?php echo form_open('pages/endOrder'); ?> 
              <input type='hidden' name="idOrder" value='<?php echo $order['IdOrder']; ?>'>
              <input type="submit" value="Finish Order" class="btn btn-secondary">
            <?php echo form_close();?>
          </td>
        </tr>
   <?php endforeach; ?> 
  </tbody>
</table>
