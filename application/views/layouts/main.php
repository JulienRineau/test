<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.css">

    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script>scr="<?php echo base_url();?>assets/js/jquery.js"</script>
    <script>scr="<?php echo base_url();?>assets/js/bootstrap.min.js"</script> -->

    <title>GadzCoin Wallet</title>
</head>
<body>
    
    <?php $this->load->view('layouts/navbar') ?>
    <div class="">
    <div class="container-sm">
        <div class="row">
            <div class="col-sm-3">
                <?php $this->load->view('users/login_view'); ?>
            </div>

            <div class="col-sm-9">
                <?php $this->load->view($main_view);  ?>
            </div>
        </div>
    </div>
    <br>
    <p class="mt-5 mb-3 text-center text-muted">Usiné with <i class="text-danger glyphicon glyphicon-heart"></i> by Shield 112</p>
    </div>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.2/dist/bootstrap-table.min.js"></script>

</body>
</html>