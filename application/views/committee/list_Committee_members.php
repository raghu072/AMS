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
                                <th>Member name</th>
                                <th>Designation</th>
                                <th>Member from</th>
                                <th>Member till</th>
                                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($members): ?>
                                <?php foreach ($members as $member): ?>
                            <tr>
                                <td><?=$member['member_name']?></td>
                                <td><?=$member['designation']?></td>
                                <td><?=date('d M Y', strtotime($member['member_from']))?></td>
                                <td><?=($member['member_till'] != '0000-00-00 00:00:00') ? date('d M Y', strtotime($member['member_till'])) : 'Present Member'?></td>
                                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <td>
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
                                                    <!-- <div>&nbsp;</div> -->
                                                    <div class="model_title"><?='Member Name: '.$member['member_name']?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <h3 style="text-decoration:underline;"></h3> -->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?='Username'?> </b>: <?=$member['designation']?><br />
                                                            <b><?='Status'?></b>: <?=($member['active'] == 1)?'Current Member':'Former Member'?><br />
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