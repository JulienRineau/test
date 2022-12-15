<h1>Edit Project</h1>

<?php 
    if($this->session->flashdata('errors_project')){
        echo $this->session->flashdata('errors_project');
    }
?>

<?php $attributes = array('id' =>'edit_project_form', 'class'=>'form_horizontal') ?>
<?php echo form_open('projects/edit/'.$project_data->project_id, $attributes); ?>
<div class="form-group">
    <?php 
        echo form_label('Project Name'); 
        $data = array
        (
            'class'=>'form-control',
            'name'=>'project_name',
            'value'=>$project_data->project_name,
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
            'value'=>$project_data->project_body,
        );
        echo form_textarea($data); 
    ?>
</div>

<div class="form-group">
    <?php 
        $data = array
        (
            'class'=>'btn btn-primary',
            'name'=>'submit',
            'value'=>'Edit',
        );
        echo form_submit($data); 
    ?>
</div>



<?php echo form_close(); ?>
