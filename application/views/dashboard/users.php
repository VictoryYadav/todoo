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
    <link href="<?= base_url()?>assets_admin/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
        <?php $this->load->view('layouts/admin/navbar'); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php $this->load->view('layouts/admin/topbar'); ?>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>All User</h5>
                                <a href="<?= base_url()?>admin/add-users" class="btn btn-primary btn-xs pull-right" style="margin-top: -3px;"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                            <?php if($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert" id="alertBlock"><?= $this->session->flashdata('success') ?></div>
                            <?php endif; ?>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table table-v-middle table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50px;">Sr. No.</th>
                                                <th class="text-center" style="width: 100px;">Date</th>
                                                <th>Name</th>
                                                <th class="text-center" style="width: 100px;">Email</th>
                                                <th class="text-center" style="width: 100px;">Mobile</th>
                                                <th class="text-center" style="width: 100px;">Status</th>
                                                <th class="text-center" style="width: 100px;">Role</th>
                                                <!-- <th class="text-center" style="width: 100px;">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($users)){
                                                $i=1;
                                                foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td class="text-center"><?php echo date('d-M-Y',strtotime($user['created_at'])); ?></td>
                                                <td class="text-center">
                                                    <?php echo $user['name']; ?>                                         
                                                </td>
                                                <td class="text-center"><?php echo $user['email']; ?></td>
                                                <td class="text-center"><?php echo $user['mobile']; ?></td>
                                                <td class="text-center">
                                                    <?php echo status($user['status']); ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo role($user['role']); ?>
                                                </td>
                                                <!-- <td class="text-center">
                                                    <a href="<?= base_url('admin/home')?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="<?= base_url('admin/home')?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                                </td> -->
                                            </tr>
                                        <?php } } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('layouts/admin/footer'); ?>
        </div>
    </div>
    <?php $this->load->view('layouts/admin/scripts'); ?>
    <script src="<?= base_url()?>assets_admin/js/plugins/dataTables/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    {extend: 'copy'},
                    {extend: 'csv', title: 'SB_Media'},
                    {extend: 'excel', title: 'SB_Media'},
                    {extend: 'pdf', title: 'SB_Media'},
                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                        }
                    }
                ]
            });
        });

        setTimeout(function() {
            $('#alertBlock').fadeOut('fast');
        }, 15000);
    </script>
</body>
</html>