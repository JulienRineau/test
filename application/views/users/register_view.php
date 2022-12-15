<h2 class="text-center">Ajouter un joueur</h2>
<br>

<?php $attributes = array('id' =>'register_form', 'class'=>'form_horizontal') ?>
<?php if($this->session->flashdata('register_username')){?>
<?php echo $this->session->flashdata('register_username');}?>

<?php 
    if($this->session->flashdata('errors_register')){
        echo $this->session->flashdata('errors_register');
    }

    // if ($this->session->flashdata('success_register')){
    //     echo "The new user has been successfully added ";
    // }

echo form_open('users/register', $attributes); ?>

<div class="mb-5">

<div class="form-group">
    <?php 
        echo form_label('Pseudo'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'username',
            'placeholder'=>'Du type: 112An220',
            'value'=> set_value('username'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <label>Droits</label>
    <select class="form-control" name="admin" >
        <option value="false">Joueur</option>
        <option value="true">Admin</option>
    </select>
</div>

<div class="form-group">
    <?php 
        echo form_label('Prénom');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'first_name',
            'placeholder'=>'Rentre son prénom',
            'value'=> set_value('first_name'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        echo form_label('Nom de famille');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'last_name',
            'placeholder'=>'Rentre son nom de famille',
            'value'=> set_value('last_name'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php
        echo form_label('Email');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'email',
            'placeholder'=>'Rentre son email',
            'type'=>'email',
            'value'=> set_value('email'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php
        echo form_label('Surn\'s');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'surns',
            'placeholder'=>'Rentre son surn\'s',
            'type'=>'text',
            'value'=> set_value('surns'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php
        echo form_label('Fam\'s');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'fams',
            'placeholder'=>'Rentre sa fam\'s',
            'type'=>'text',
            'value'=> set_value('fams'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php
        echo form_label('GZC');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'coin',
            'placeholder'=>'Nombre de GZC initiaux',
            'type'=>'number',
            'value'=> set_value('coin'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        echo form_label('Mot de passe'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'password',
            'placeholder'=>'Rentre son mot de passe',
        );
        echo form_password($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        echo form_label('Confirmer le mot de passe');
        $data = array
        (
            'class'=>'form-control',
            'name'=>'confirm_password',
            'placeholder' =>'On sait jamais'
        );
        echo form_password(($data));
    ?>
</div>
<br>
<div class="form-group">
    <?php 
        $data = array
        (
            'class'=>'btn btn-primary btn-block',
            'name'=>'submit',
            'value'=>'Valider',
        );
        echo form_submit($data); 
    ?>
</div>
</div>
<?php echo form_close(); ?>