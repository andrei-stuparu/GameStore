<h1 class="text-info" style="padding:20px;"><?=$title ?></h1>
</br>
<table class="table table-hover"style="width: 92%; text-align:center; margin-left:60px;">
  <thead>
    <tr class="table-dark">
      <th scope="col">Category ID</th>
      <th scope="col">Category Name</th>
      <th scope="col" >Games of this Category</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($categories as $cat) : ?>
    <tr class="table-dark">
      <td><?php echo $cat['IdCategory']; ?></td>
      <td><?php echo $cat['NameCategory']; ?></td>
      <td>
      <?php echo form_open('pages/gamesByCategory'); ?> 
        <input type='hidden' name="idCat" value='<?php echo $cat['IdCategory']; ?>'>
        <input type="submit" value="LINK" class="btn btn-secondary">
      <?php echo form_close();?>
    </td>
    </tr>
   <?php endforeach; ?> 
  </tbody>
</table>