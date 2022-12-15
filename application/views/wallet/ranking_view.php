
<?php if($this->session->flashdata('login_success')){?>
<p class='alert alert-success'>"<?php echo $this->session->flashdata('login_success');?></p>
<?php } ?>

<?php if($this->session->flashdata('no_access')){?>
<p class='alert alert-danger'>"<?php echo $this->session->flashdata('no_access');?></p>
<?php } ?>

<div class="text-center">
  <h1 class="text-center">Classement</h1>
</div>

<br>
<div class="">
<table
  id="table"
  data-toggle="table">
  <thead>
  <tr>
    <th data-field="action" data-sortable="true">Classement</th>
    <th data-field="id" data-sortable="true">Surn's</th>
    <th data-field="name" data-sortable="true">Gadzcoin</th>
  </tr>
  </thead>
  <tbody>
    <?php 
    $rang = 0;
    foreach($users as $users): 
    $rang = $rang+1;
    ?>
        <tr>
          <?php
            $surns = $users->surns;
            $fams = $users->fams;
            $coin = $users->coin;
            
          ?>
          <td><?php echo "<p> ".$rang."</p>"; ?></td>
          <td><?php echo "<p> ".$surns." ".$fams."</p>"; ?></td>
          <td><?php echo "<p> ".$coin."</p>"; ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
