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
                <?php if ($this->session->userdata ( "userType" ) == 'O' || $this->session->userdata ( "userType" ) == 'A'): ?>
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Committee/callMeeting')?>" data-original-title="Call Meeting"><i class="fa fa-users"></i></a>
                <?php endif; ?>

                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Committee/addCommitteeMember')?>" data-original-title="Add member"><i class="fa fa-plus"></i></a>
                <?php endif; ?>

                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url("Dashboard/index")?>" data-original-title="<?=$homeBreadcam?>"><i class="fa fa-dashboard"></i></a>
            </div>
            <div class="box box-info">
                <div class="box-header"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table sakotable table-bordered table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>Serial no.</th>
                                <th>Meeting on</th>
                                <th>Meeting venue</th>
                                <th>Meeting date</th>
                                <th>Meeting time</th>
                                <th>Meeting duration in minutes</th>
                                <th>Meeting description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($meetings): ?>
                                <?php foreach ($meetings as $meeting): ?>
                                    <?php
                                        if (date('H:i',strtotime($meeting['meeting_time'])) >= '12:00') {
                                            $strStart = 'pm';
                                        } else {
                                            $strStart = 'am';
                                        }

                                        if (date('H:i',strtotime($meeting['meeting_time'])) <= '12:00') {
                                            $strEnd = 'am';
                                        } else {
                                            $strEnd = 'pm';
                                        }
                                        ?>
                            <tr>
                                <td><?=$meeting['meeting_id']?></td>
                                <td><?=$meeting['meeting_on']?></td>
                                <td><?=$meeting['meeting_venue']?></td>
                                <td><?=date('d D M Y', strtotime($meeting['meeting_date']))?></td>
                                <td><?=date('h:i',strtotime($meeting['meeting_time'])).' '.$strEnd?></td>
                                <td><?=$meeting['meeting_duration']?></td>
                                <td><?=$meeting['description']?></td>
                                <?php //if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <!-- <td>
                                    <a class="btn btn-success" data-toggle="tooltip" onclick="$('#nurse_view_<?=$member['member_id']?>').modal('show');" data-original-title="<?='View Id '.$member['member_id']?>">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Committee/editCommitteeMember/'.$member['member_id'])?>" data-original-title="<?='Edit Id '.$member['member_id']?>">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger" data-toggle="tooltip" href="<?=base_url('Committee/deleteCommitteeMember/'.$member['member_id'])?>" data-original-title="<?='Delete Id '.$member['member_id']?>"><i class="fa fa-trash-o"></i></a>
                                    <div id="nurse_view_<?=$member['member_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header orange_header">
                                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                                    <h3 class="modal-title"><?='Member Details'?></h3>
                                                </div>
                                                <div class="modal-body model_view">
                                                    <div class="model_title"><?='Member Name: '.$member['member_name']?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?='Username'?> </b>: <?=$member['designation']?><br />
                                                            <b><?='Status'?></b>: <?=($member['active'] == 1)?'Current Member':'Former Member'?><br />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> -->
                                <?php //endif; ?>
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