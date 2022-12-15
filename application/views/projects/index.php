<h1>Projects</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Project Name</th>
            <th scope="col">Project Body</th>
            <th><a href="<?php echo base_url();?>projects/create"><i class="glyphicon glyphicon-plus"></i></a></th>
        </tr>
    </thead>
    <?php 
        if($this->session->flashdata('create_project')){
            echo $this->session->flashdata('create_project');
        }
    ?>
    <tbody>
        <?php foreach($projects as $project): ?>
        <tr>
            <th><?php echo $project->project_id; ?></th>
            <?php 
                $project_name = $project->project_name;
                $project_id = $project->project_id;
            ?>
            <td><a href="<?php echo base_url()?>projects/display/<?php echo $project_id ?>"><?php echo $project_name; ?></a></td>
            <td><?php echo word_limiter($project->project_body, 13); ?></td>
            <td><a href="<?php echo base_url()?>projects/delete/<?php echo $project->project_id?>"><i class="glyphicon glyphicon-trash text-danger"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>