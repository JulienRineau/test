
<?php if($this->session->flashdata('login_success')){?>
<p class='alert alert-success'>"<?php echo $this->session->flashdata('login_success');?></p>
<?php } ?>

<?php if($this->session->flashdata('no_access')){?>
<p class='alert alert-danger'>"<?php echo $this->session->flashdata('no_access');?></p>
<?php } ?>

<div class="text-center">
  <h1 class="display-1"><?php echo $value->value ?></h1>GZC
</div>

<br>

<table
  id="table"
  data-toggle="table">
  <thead>
  <tr>
    <th data-field="id" data-sortable="true">Montant</th>
    <th data-field="name" data-sortable="true">Jeux</th>
    <th data-field="action" data-sortable="true">Heure</th>
  </tr>
  </thead>
  <tbody>
    <?php foreach($transactions as $transactions): ?>
        <tr>
          <?php
            $value = $transactions->value;
            $game = $transactions->game;
            $getTimeStamp = $transactions->time;
            $date = new \DateTime($getTimeStamp);
            $hourString = $date->format('H');
            $minuteString = $date->format('i');
          ?>
          <td>
            <?php
              if($value > 0){
                echo "<p class='text-success'>+".$value." <i class='glyphicon glyphicon-arrow-up'></i></p>";
              }
              else{
                echo "<p class='text-danger'>".$value." <i class='glyphicon glyphicon-arrow-down'></i></p>";
              }
            ?>
          </td>
          <td><?php echo "<p> ".$game."</p>"; ?></td>
          <td><?php echo $hourString.":".$minuteString ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>