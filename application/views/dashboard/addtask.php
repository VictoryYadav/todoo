<?php
    $_SESSION["page"] = "user";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <?php $this->load->view('layouts/admin/head'); ?>
    <link href="<?= base_url()?>assets_admin/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url()?>assets_admin/css/datepicker.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php $this->load->view('layouts/admin/navbar'); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php $this->load->view('layouts/admin/topbar'); ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Add New </h5>
                                <a href="<?= base_url()?>admin/todo" class="btn btn-primary btn-xs pull-right" style="margin-top: -3px;"><i class="fa fa-list"></i> All Taks</a>
                            </div>

                            <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                            <?php endif; ?>
                            
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?= base_url()?>admin/add-task" enctype="multipart/form-data">
                                  
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Title</label>
                                            <input type="text" class="form-control" id="" name="title" placeholder="title" required />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Description</label>
                                            <input type="text" class="form-control" id="" name="description" placeholder="description" required />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">User</label>
                                            <select name="user_id" class="form-control">
                                                <option value="">Choose</option>
                                                <?php if(!empty($users)){
                                                    foreach ($users as $user) {
                                                 ?>
                                                <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
                                                <?php } } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="">Choose</option>
                                                <option value="pending">Pending</option>
                                                <option value="completed">Completed</option>
                                            </select>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group mt-4" style="margin-top: 5px;">
                                        <div class="text-center">
                                            <button type="submit" name="" class="btn btn-w-m btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('layouts/admin/footer'); ?>
        </div>
    </div>
    <?php $this->load->view('layouts/admin/scripts'); ?>
    <script src="<?= base_url()?>assets_admin/js/plugins/jasny/jasny-bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets_admin/js/datepicker.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                dateFormat : 'dd-mm-yy',
                changeMonth : true,
                changeYear : true,
                yearRange: '-50y:c+nn'
                // maxDate: '-1d'
            });
        });
    </script>
</body>
</html>