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
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('owner/addOwner')?>" data-original-title="Add Owner"><i class="fa fa-plus"></i></a>

                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url("Dashboard/index")?>" data-original-title="<?=$homeBreadcam?>"><i class="fa fa-dashboard"></i></a>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title"><?=$text2?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table sakotable table-bordered table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>Owner name</th>
                                <th>Flat owned</th>
                                <th>Contact number</th>
                                <th>Email</th>
                                <th>Purchased date</th>
                                <?php if ($this->session->userdata ( "userType" ) == 'A' || $this->session->userdata ( "userType" ) == 'O'): ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($owners): ?>
                                <?php foreach ($owners as $owner): ?>
                                    <?php if ($owner['own_flag'] != 0): ?>
                            <tr>
                                <td><?=$owner['owner_name']?></td>
                                <td><?=$owner['block'].$owner['flat_owned']?></td>
                                <td><?=$owner['contact']?></td>
                                <td><?=$owner['email']?></td>
                                <td><?=date('d M Y', strtotime($owner['owned_from']))?></td>
                                <?php if ($this->session->userdata ( "userType" ) == 'A' || $this->session->userdata ( "userType" ) == 'O'): ?>
                                <td>
                                    <a class="btn btn-success" data-toggle="tooltip" onclick="$('#nurse_view_<?=$owner['block'].$owner['flat_owned']?>').modal('show');" data-original-title="<?='View '.$owner['block'].$owner['flat_owned']?>">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Owner/editOwner/'.$owner['block'].$owner['flat_owned'])?>" data-original-title="<?='Edit '.$owner['block'].$owner['flat_owned']?>">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a class="btn btn-danger" data-toggle="tooltip" href="<?=base_url('Owner/deleteOwner/'.$owner['block'].$owner['flat_owned'])?>" data-original-title="<?='Delete '.$owner['block'].$owner['flat_owned']?>"><i class="fa fa-trash-o"></i></a>
                                    <div id="nurse_view_<?=$owner['block'].$owner['flat_owned']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header orange_header">
                                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                                    <h3 class="modal-title"><?='Flat Details'?></h3>
                                                </div>
                                                <div class="modal-body model_view">
                                                    <!-- <div>&nbsp;</div> -->
                                                    <div class="model_title"><?='Flat: '.$owner['block'].$owner['flat_owned']?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- <h3 style="text-decoration:underline;"></h3> -->
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?='Block'?> </b>: <?=$owner['block']?><br />
                                                            <b><?='Flat Number'?></b>: <?=$owner['flat_owned']?><br />
                                                            <!-- <b><?='Description'?></b>: <?=$owner['description']?> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                </td>
                                <?php endif; ?>
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