<section class="content-header">
    <h1><?=$pageTitle?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url("Dashboard/index")?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><?=$text1?></li>
        <!-- <li class="active"><?=$text2?></li> -->
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
                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Dashboard/addGymMember')?>" data-original-title="Add gym member"><i class="fa fa-plus"></i></a>
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
                                <th>Member Id</th>
                                <th>Member name</th>
                                <th>Member from</th>
                                <th>Member till</th>
                                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($gymMembers): ?>
                                <?php foreach ($gymMembers as $gymMember): ?>
                            <tr>
                                <td><?=$gymMember['gym_member_id']?></td>
                                <td><?=$gymMember['member_name']?></td>
                                <td><?=date('d M Y', strtotime($gymMember['gym_member_from']))?></td>
                                <td><?=($gymMember['gym_member_to'] != '0000-00-00 00:00:00') ? date('d M Y', strtotime($gymMember['gym_member_to'])) : 'Present Member'?></td>
                                <?php if ($this->session->userdata ( "userType" ) == 'A'): ?>
                                <td>
                                    <a class="btn btn-success" data-toggle="tooltip" onclick="$('#nurse_view_<?=$gymMember['gym_member_id']?>').modal('show');" data-original-title="<?='View Id '.$gymMember['gym_member_id']?>">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Dashboard/editGymMember/'.$gymMember['gym_member_id'])?>" data-original-title="<?='Edit Id '.$gymMember['gym_member_id']?>">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger" data-toggle="tooltip" href="<?=base_url('Dashboard/deleteGymMember/'.$gymMember['gym_member_id'])?>" data-original-title="<?='Delete Id '.$gymMember['gym_member_id']?>"><i class="fa fa-trash-o"></i></a>
                                    <div id="nurse_view_<?=$gymMember['gym_member_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header orange_header">
                                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                                    <h3 class="modal-title"><?='Member Details'?></h3>
                                                </div>
                                                <div class="modal-body model_view">
                                                    <!-- <div>&nbsp;</div> -->
                                                    <div class="model_title"><?='Member Name: '.$gymMember['member_name']?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <h3 style="text-decoration:underline;"></h3> -->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?='Username'?> </b>: <?=$gymMember['member_name']?><br />
                                                            <b><?='Status'?></b>: <?=($gymMember['active'] == 1)?'Current Member':'Previous Member'?><br />
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