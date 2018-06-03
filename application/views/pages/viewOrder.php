<h1 class="text-info" style="padding:20px;"> Games of order NO. <?=$title ?></h1>
</br>
<table class="table table-hover"style="width: 92%; text-align:center; margin-left:60px;">
  <thead>
    <tr class="table-dark">
      <th scope="col">Game Name</th>
      <th scope="col">Game Required Age</th>
      <th scope="col" >Price</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($games as $gamer) : ?>
    <?php foreach($gamer as $game) : ?>
      <tr class="table-dark">
        <td><?php echo $game['NameGame']; ?></td>
        <td><?php echo $game['RequiredAge']; ?></td>
        <td><?php echo $game['PriceGame']; ?></td>
      </tr>
    <?php endforeach; ?>
   <?php endforeach; ?> 
  </tbody>
</table>