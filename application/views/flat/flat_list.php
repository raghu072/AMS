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
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Flat/addFlat')?>" data-original-title="Add Flat"><i class="fa fa-plus"></i></a>

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
                                <th>Flat</th>
                                <th>Description</th>
                                <th>Status</th>
                                <?php if ($this->session->userdata ( "userType" ) == 'A' || $this->session->userdata ( "userType" ) == 'O'): ?>
                                <th>Action</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($flats): ?>
                                <?php foreach ($flats as $flat): ?>
                            <tr>
                                <td><?=$flat['block'].$flat['flat_number']?></td>
                                <td><?=$flat['description']?></td>
                                <td><?php
                                    if ($flat['is_occupied'] == 0) {
                                        echo 'Flat empty';
                                    } else if ($flat['is_occupied'] == 1) {
                                        echo 'owner occpied';
                                    } else if ($flat['is_occupied'] == 2) {
                                        echo 'For Rent';
                                    }
                                ?></td>
                                <?php if ($this->session->userdata ( "userType" ) == 'A' || $this->session->userdata ( "userType" ) == 'O'): ?>
                                <td>
                                    <a class="btn btn-success" data-toggle="tooltip" onclick="$('#nurse_view_<?=$flat['block'].$flat['flat_number']?>').modal('show');" data-original-title="<?='View '.$flat['block'].$flat['flat_number']?>">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Flat/editFlat/'.$flat['block'].$flat['flat_number'])?>" data-original-title="<?='Edit '.$flat['block'].$flat['flat_number']?>">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <div id="nurse_view_<?=$flat['block'].$flat['flat_number']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header orange_header">
                                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                                    <h3 class="modal-title"><?='Flat Details'?></h3>
                                                </div>
                                                <div class="modal-body model_view">
                                                    <div class="model_title"><?='Flat: '.$flat['block'].$flat['flat_number']?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?='Block'?> </b>: <?=$flat['block']?><br />
                                                            <b><?='Flat Number'?></b>: <?=$flat['flat_number']?><br />
                                                            <b><?='Description'?></b>: <?=$flat['description']?>
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