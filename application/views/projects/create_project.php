<h1>Create Project</h1>

<?php 
    if($this->session->flashdata('errors_project')){
        echo $this->session->flashdata('errors_project');
    }
?>

<?php $attributes = array('id' =>'create_project_form', 'class'=>'form_horizontal') ?>
<?php echo form_open('projects/create', $attributes); ?>
<div class="form-group">
    <?php 
        echo form_label('Project Name'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'project_name',
            'placeholder'=>'Enter Project Name',
            'value'=> set_value('project_name'),
        );
        echo form_input($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        echo form_label('Project description'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'project_body',
            'placeholder'=>'Project Body',
            'value'=> set_value('project_body'),
        );
        echo form_textarea($data); 
    ?>
</div>

<?php echo form_hidden('project_user_id',$this->session->userdata('user_id')); ?>

<div class="form-group">
    <?php 
        $data = array
        (
            'class'=>'btn btn-primary',
            'name'=>'submit',
            'value'=>'Create',
        );
        echo form_submit($data); 
    ?>
</div>



<?php echo form_close(); ?>
