
<?php if($this->session->flashdata('login_success')){?>
<p class='alert alert-success'>"<?php echo $this->session->flashdata('login_success');?></p>
<?php } ?>

<?php if($this->session->flashdata('no_access')){?>
<p class='alert alert-danger'>"<?php echo $this->session->flashdata('no_access');?></p>
<?php } ?>

<div class="jumbotron">
  <h1 class="display-4">GadzCoin Wallet</h1>
  <p class="lead">Bienvenue sur ton GadzCoin (GZC) Wallet</p>
  <hr class="my-4">
  <p>Tu y trouveras ton solde de GZC, son évolution et un classement. Maintenant tu n'as qu'un seul but: être premier(e) ! Si tu as des difficultés à te connecter envois un sms au 0643515201 ou va embeter Maleaume Cellard sur messenger</p>
</div>