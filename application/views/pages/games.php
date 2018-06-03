<h1 class="text-info" style="padding:20px;">ALL <?=$title ?></h1>
</br>
<table class="table table-hover"style="width: 92%; text-align:center; margin-left:60px;">
  <thead>
    <tr class="table-dark">
      <th scope="col">Game Name</th>
      <th scope="col">Recommended Age for this Game</th>
      <th scope="col">Copies of this Game available in our store</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($games as $game) : ?>
    <tr class="table-dark">
      <td><?php echo $game['NameGame']; ?></td>
      <td><?php echo $game['RequiredAge']; ?></td>
      <td><?php echo $game['Copies']; ?></td>
    </tr>
   <?php endforeach; ?> 
  </tbody>
</table>