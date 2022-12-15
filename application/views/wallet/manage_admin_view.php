<h1 class="text-center">Gestion des admin</h1>
<br>

<?php $attributes = array('id' =>'register_form', 'class'=>'form_horizontal') ?>
<?php if($this->session->flashdata('register_username')){?>
<?php echo $this->session->flashdata('register_username');}?>

<?php 
    if($this->session->flashdata('errors_register')){
        echo $this->session->flashdata('errors_register');
    }

    if ($this->session->flashdata('manage_admin')){
        echo $this->session->flashdata('manage_admin');
    }
    ?>

<div class="">
    <?php echo form_open('wallet/manage_admin', $attributes); ?>

    <div class="form-group">
        <?php 
            echo form_label('Joueur');
            $data = array
            (
                'class'=>'form-control',
                'name'=>'username',
                'placeholder'=>'Ex: 123-41An220',
                'value'=> set_value('joueur'),
            );
            echo form_input($data); 
        ?>
    </div>

    <div class="form-group">
        <label>Droits</label>
        <select class="form-control" name="admin" >
            <option value="true">admin</option>
            <option value="false">joueur</option>
        </select>
    </div>

    <br>
    <div class="form-group">
        <?php 
            $data = array
            (
                'class'=>'btn btn-primary btn-block',
                'name'=>'submit',
                'value'=> 'Valider',
            );
            echo form_submit($data); 
        ?>
    </div>

    <?php echo form_close(); ?>
<div>