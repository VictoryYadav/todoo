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
                                <h5>All Tasks</h5>
                                <a href="<?= base_url()?>admin/add-task" class="btn btn-primary btn-xs pull-right" style="margin-top: -3px;"><i class="fa fa-plus"></i> Add New</a>
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
                                                <th>Title</th>
                                                <th class="text-center" style="width: 100px;">Description</th>
                                                <th class="text-center" style="width: 100px;">Assigned to</th>
                                                <th class="text-center" style="width: 100px;">Status</th>
                                                <th class="text-center" style="width: 100px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($list)){
                                                $i=1;
                                                foreach ($list as $task) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td class="text-center"><?php echo date('d-M-Y',strtotime($task['created_at'])); ?></td>
                                                <td class="text-center">
                                                    <?php echo $task['title']; ?>                                          
                                                </td>
                                                <td class="text-center"><?php echo $task['description']; ?></td>
                                                <td class="text-center"><?php echo $task['name']; ?></td>
                                                <td class="text-center"><?php echo $task['status']; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-success btn-xs" title="reply" onclick="replyModel(<?php echo $task['task_id']; ?>)"> Reply </button>
                                                    <a href="<?= base_url('DashboardController/deleteTask/'.$task['task_id'])?>" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                                </td>
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

    <div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" id='replyForm'>
                <input type="hidden" name="task_id" id="taskid">
                <div class="form-group">
                    <label>Reply</label>
                    <input type="text" name="reply" class="form-control" required="" id="reply">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required="" id="status">
                        <option value="">Choose</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <input type="submit" class=" btn btn-sm btn-success" value="Reply">
            </form>
          </div>
        </div>
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

        function replyModel(taskid){
            $('#taskid').val(taskid);
            $('#replyModal').modal('show');
        }

        $('#replyForm').on('submit', function(e){
            e.preventDefault();
            var taskid = $('#taskid').val();
            var reply = $('#reply').val();
            var status = $('#status').val();

            $.post('<?php echo base_url('admin/reply'); ?>',{task_id: taskid,reply:reply,status,status}, function(res){
                if(res.status == 'success'){
                    alert(res.response);
                    location.reload();
                }
            });

        })
    </script>
</body>
</html>