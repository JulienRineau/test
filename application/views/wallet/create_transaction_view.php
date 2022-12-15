<h1 class="text-center">Faire une transaction</h1>
<br>

<?php $attributes = array('id' =>'register_form', 'class'=>'form_horizontal') ?>
<?php if($this->session->flashdata('register_username')){?>
<?php echo $this->session->flashdata('register_username');}?>

<?php 
    if($this->session->flashdata('errors_register')){
        echo $this->session->flashdata('errors_register');
    }

    if ($this->session->flashdata('create_transaction')){
        echo $this->session->flashdata('create_transaction');
    }
    ?>

<div class="">
    <?php echo form_open('wallet/create_transaction', $attributes); ?>

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
        <label>Jeux</label>
        <select class="form-control" name="game" >
            <option value="Qui veut gagner des Gadzcoin">Qui veut gagner des Gadzcoin</option>
            <option value="Roue de la fortune">Roue de la fortune</option>
            <option value="Among Us">Among Us</option>
            <option value="Poker">Poker</option>
        </select>
    </div>

    <div class="form-group">
        <?php
            echo form_label('Gain');
            $data = array
            (
                'class'=>'form-control',
                'name'=>'value',
                'placeholder'=>'Ce qu\'il a gagné',
                'type'=>'number',
                'value'=> set_value('gain'),
            );
            echo form_input($data); 
        ?>
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