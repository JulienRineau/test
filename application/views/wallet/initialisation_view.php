<h1 class="text-center">Initialisation</h1>
<br>

<?php $attributes = array('id' =>'register_form', 'class'=>'form_horizontal') ?>
<?php if($this->session->flashdata('everyone_get_password')){?>
<?php echo $this->session->flashdata('everyone_get_password');}?>

<?php 
    if($this->session->flashdata('errors')){
        echo $this->session->flashdata('errors');
    }
    if($this->session->flashdata('delete_all_transaction')){
        echo $this->session->flashdata('delete_all_transaction');
    }

    if ($this->session->flashdata('everyone_get_gzc')){
        echo $this->session->flashdata('everyone_get_gzc');
    }
    ?>

<div class="text-center">
    <h3>Transaction générale</h3>
    <?php echo form_open('wallet/everyone_get_gzc', $attributes); ?>
    <div class="form-group">
        <?php 
            $data = array
            (
                'class'=>'form-control',
                'name'=>'value',
                'type'=>'number',
                'placeholder'=>'Montant'
            );
            echo form_input($data); 
        ?>
    </div>

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
<br>
<div class="text-center">
    <h3>Réinitialiser transactions</h3>
    <?php echo form_open('wallet/delete_all_transaction', $attributes); ?>
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
<br>
<div class="text-center">
<h3>Générer les mdp</h3>
    <?php echo form_open('wallet/everyone_get_password', $attributes); ?>
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