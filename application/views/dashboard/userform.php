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
                                <h5>Add New User</h5>
                                <a href="<?= base_url()?>admin/users" class="btn btn-primary btn-xs pull-right" style="margin-top: -3px;"><i class="fa fa-list"></i> All Users</a>
                            </div>

                            <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                            <?php endif; ?>
                            
                            <div class="ibox-content">
                                <form method="post" class="form-horizontal" action="<?= base_url()?>admin/add-users" enctype="multipart/form-data">
                                  
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Name</label>
                                            <input type="text" class="form-control" id="" name="name" placeholder="name" required />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Email</label>
                                            <input type="email" class="form-control" id="" name="email" placeholder="email" required />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Mobile</label>
                                            <input type="tel" class="form-control" id="" name="mobile" placeholder="mobile" required maxlength="10" minlength="10" />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Password</label>
                                            <input type="password" class="form-control" id="" name="password" placeholder="password" required />
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="control-label" style="margin-bottom: 7px; text-align: left;">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="">Choose Role</option>
                                                <option value="0">User</option>
                                                <option value="1">Admin</option>
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