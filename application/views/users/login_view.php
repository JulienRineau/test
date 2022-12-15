<?php if($this->session->userdata('logged_in')){ ?>

<?php
    }
    else{
?>

<div class="text-center">
<?php if($this->session->flashdata('login_failed')){?>
<p class='alert alert-danger'>"<?php echo $this->session->flashdata('login_failed');?></p>
<?php } ?>
<h2>Connexion</h2>

<?php 
    if($this->session->flashdata('errors_login')){
        echo $this->session->flashdata('errors_login');
    }
?>

<?php $attributes = array('id' =>'login_form', 'class'=>'form_signin') ?>

<?php echo form_open('users/login', $attributes); ?>
<div class="form-group">
    <?php 
        // echo form_label('Nom'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'username',
            'placeholder'=>'Identifiant',
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        // echo form_label('Mot de passe'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'password',
            'placeholder'=>'Ton mot de passe siteup\'s',
        );
        echo form_password($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        $data = array
        (
            'class'=>'btn btn-primary btn-block',
            'name'=>'submit',
            'value'=>'Zeee parti !',
        );
        echo form_submit($data); 
    ?>
</div>

<?php 
echo form_close();
} 
    
?>
</div>
<br>