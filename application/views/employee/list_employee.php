<section class="content-header">
    <h1><?=$pageTitle?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url("Dashboard/index")?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><?=$text1?></li>
        <li class="active"><?=$text2?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div id="me" class="alert alert-danger alert-dismissable" style="display:none">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-close"></i></button>
                <h4><i class="icon fa fa-ban"></i> <?='delete_text'?>!</h4>
                <?='delete_unit_information'?>
            </div>
            <div id="you" class="alert alert-success alert-dismissable" style="display:none">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-close"></i></button>
                <h4><i class="icon fa fa-check"></i><?='success'?> !</h4>
                <?='success'?>
            </div>
            <div align="right" style="margin-bottom:1%;">
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Employee/addEmployee')?>" data-original-title="Add Employee"><i class="fa fa-plus"></i></a>

                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url("Dashboard/index")?>" data-original-title="<?=$homeBreadcam?>"><i class="fa fa-dashboard"></i></a>
            </div>
            <div class="box box-info">
                <div class="box-header"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table sakotable table-bordered table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>Employee name</th>
                                <th>Username</th>
                                <th>Contact number</th>
                                <th>salary</th>
                                <th>Shift start time</th>
                                <th>Shift end time</th>
                                <th>Joined date</th>
                                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($employees): ?>
                                <?php foreach ($employees as $employee): ?>
                                        <?php
                                        if (date('H:i',strtotime($employee['shift_start_time'])) >= '12:00') {
                                            $strStart = 'pm';
                                        } else {
                                            $strStart = 'am';
                                        }

                                        if (date('H:i',strtotime($employee['shift_end_time'])) <= '12:00') {
                                            $strEnd = 'am';
                                        } else {
                                            $strEnd = 'pm';
                                        }
                                        ?>
                            <tr>
                                <td><?=$employee['emp_name']?></td>
                                <td><?=$employee['emp_username']?></td>
                                <td><?=$employee['contact']?></td>
                                <td><?='₹ '.number_format($employee['salary'],2,".",",")?></td>
                                <td><?=date('h:i',strtotime($employee['shift_start_time'])).' '.$strStart?></td>
                                <td><?=date('h:i',strtotime($employee['shift_end_time'])).' '.$strEnd?></td>
                                <td><?=date('d M Y', strtotime($employee['joined_date']))?></td>
                                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <td>
                                    <a class="btn btn-success" data-toggle="tooltip" onclick="$('#nurse_view_<?=$employee['emp_id']?>').modal('show');" data-original-title="<?='View Id '.$employee['emp_id']?>">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Employee/editEmployee/'.$employee['emp_id'])?>" data-original-title="<?='Edit Id '.$employee['emp_id']?>">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger" data-toggle="tooltip" href="<?=base_url('Employee/deleteEmployee/'.$employee['emp_id'])?>" data-original-title="<?='Delete Id '.$employee['emp_id']?>"><i class="fa fa-trash-o"></i></a>
                                    <div id="nurse_view_<?=$employee['emp_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header orange_header">
                                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                                    <h3 class="modal-title"><?='Employee Details'?></h3>
                                                </div>
                                                <div class="modal-body model_view">
                                                    <!-- <div>&nbsp;</div> -->
                                                    <div class="model_title"><?='Employee Name: '.$employee['emp_name']?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <h3 style="text-decoration:underline;"></h3> -->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?='Username'?> </b>: <?=$employee['emp_username']?><br />
                                                            <b><?='Status'?></b>: <?=($employee['is_active'] == 1)?'Current Employee':'Former Employee'?><br />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th>floor_no</th>
                                <th>unit_no</th>
                                <th>action_text</th>
                            </tr>
                        </tfoot> -->
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
    <script type="text/javascript">
        function deleteUnit(Id) {
            var iAnswer = confirm("Are you sure you want to delete this Unit ?");
            if (iAnswer) {
                window.location = '<?php echo WEB_URL; ?>unit/unitlist.php?id=' + Id;
            }
        }

        $(document).ready(function() {
            setTimeout(function() {
                $("#me").hide(300);
                $("#you").hide(300);
            }, 3000);
        });
    </script>