<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php if($this->session->userdata('logged_in')){ ?>
  <ul class="navbar-nav pull-right"> 
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo base_url();?>users/logout"><i class="glyphicon glyphicon-off text-danger"></i></a>
  </li>
</ul>
<p>
    <?php 
        if($this->session->userdata('username')){
            echo "<a class='navbar-brand' href='".base_url()."wallet/display_transaction/".$this->session->userdata('user_id')."'><h2>".$this->session->userdata('surns')." ".$this->session->userdata('fams')."</h2></a>";
        }
    ?>
</p>
<?php
    }
    else{
?>

<a href="#" class="navbar-brand">GadzCoin Wallet</a>
<?php } ?>

  <?php if($this->session->userdata('logged_in')):?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav mr-auto">
        <li class="nav-item <?php echo activate_menu('home'); ?>">
          <a class="nav-link" href="<?php echo base_url();?>wallet/display_transaction/<?php echo $this->session->userdata('user_id') ?>">Acceuil<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item <?php echo activate_menu('users','register'); ?>">
          <a class="nav-link " href="<?php echo base_url();?>wallet/display_ranking">Classement</a>
        </li>
        <?php if($this->session->userdata('admin')=='true'):?>
          <li class="nav-item <?php echo activate_menu('users','register'); ?>">
            <a class="nav-link " href="<?php echo base_url()?>wallet/display_all_transactions">Transactions</a>
          </li>
          <li class="nav-item <?php echo activate_menu('users','register'); ?>">
            <a class="nav-link " href="<?php echo base_url();?>users/register">Ajouter un joueur</a>
          </li>
          <li class="nav-item <?php echo activate_menu('users','register'); ?>">
            <a class="nav-link " href="<?php echo base_url();?>wallet/manage_admin">Gestion des admin</a>
          </li>
        <?php endif; ?>
        <?php if($this->session->userdata('user_id')==1):?>
        <li class="nav-item <?php echo activate_menu('users','register'); ?>">
            <a class="nav-link " href="<?php echo base_url();?>wallet/initialisation">Initialisation</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  <?php endif; ?>
</nav>
<br>