
<?php if($this->session->flashdata('login_success')){?>
<p class='alert alert-success'>"<?php echo $this->session->flashdata('login_success');?></p>
<?php } ?>

<?php if($this->session->flashdata('no_access')){?>
<p class='alert alert-danger'>"<?php echo $this->session->flashdata('no_access');?></p>
<?php } ?>

<div class="text-center">
  <h1 class="text-center">Transactions</h1>
</div>

<div>
  <br>
  <button onclick="location.href='<?php echo base_url(); ?>/wallet/create_transaction'" type="button" class="btn btn-primary btn-lg btn-block"><i class="glyphicon glyphicon-plus"></i></button>
  <br>
  <table
    id="table"
    data-toggle="table">
    <thead>
    <tr>
      <th data-field="time" data-sortable="true">Heure</th>
      <th data-field="id" data-sortable="true">Montant</th>
      <th data-field="name" data-sortable="true">Jeux</th>
      <th data-field="player" data-sortable="true">Joueur</th>
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
              $player_last_name = $transactions->last_name;
              $player_first_name = $transactions->first_name;
            ?>
            <td><?php echo $hourString.":".$minuteString ?></td>
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
            <td><?php echo word_limiter($game,2); ?></td>
            <td><?php echo $player_first_name[0].".".ellipsize($player_last_name,8) ?></td>
          </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
