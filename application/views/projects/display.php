<?php 
    if($this->session->flashdata('edit_project')){
        echo $this->session->flashdata('edit_project');
    }
?>
<div class="row">
    <div class="col-9">
        <h1><?php echo $project_data->project_name ;?></h1>
        <p>Created on <?php echo $project_data->date_created ?></p>
        <br>
        <h3>Description</h3>
        <p><?php echo $project_data->project_body ?></p>
    </div>
    <div class="col-3"> 
    <h4>Project Actions</h4>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="">Create Task</a></li>
            <li class="list-group-item"><a href="<?php echo base_url()?>projects/edit/<?php echo $project_data->project_id?>">Edit Project</a></li>
            <li class="list-group-item"><a href="<?php echo base_url()?>projects/delete/<?php echo $project_data->project_id?>">Delete Project</a></li>
        </ul>
    </div>
</div>
