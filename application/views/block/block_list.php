<section class="content-header">
    <h1> <?=$pageTitle?> </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url("Block/getBlocks")?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><?=$block?></li>
        <li class="active"><?=$blockList?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div id="me" class="alert alert-danger alert-dismissable" style="display:none;">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-close"></i></button>
                <h4><i class="icon fa fa-ban"></i><!-- <?php //echo $_data['delete_text'];?> -->delete_text !</h4>
                <!-- <?php //echo $_data['delete_floor_information']; ?> -->delete_floor_information
            </div>
            <div id="you" class="alert alert-success alert-dismissable" style="display:none;">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button"><i class="fa fa-close"></i></button>
                <h4><i class="icon fa fa-check"></i> success
                    <!-- <?php //echo $_data['success'];?> --> !</h4>
                <!-- <?php //echo $msg; ?> -->
            </div>
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Block/addNewBlock')?>" data-original-title="Add block"><i class="fa fa-plus"></i></a> <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Dashboard/index')?>" data-original-title="Dashboard"><i class="fa fa-dashboard"></i></a> </div>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Blocks</h3>
                    <!-- <div class="row">
                        <div class="col-md-2">
                            <select name="block" id="block" class="form-control">
                                <option value="A">Block A</option>
                            </select>
                        </div>
                    </div> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table sakotable table-bordered table-striped dt-responsive">
                        <thead>
                            <tr>
                                <th>Block</th>
                                <th>Floors</th>
                                <th>Flat per floors</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($blocks): ?>
                                <?php foreach($blocks as $block): ?>
                            <tr>
                                <td><?=$block['block_name']?></td>
                                <td><?=$block['total_floors']?></td>
                                <td><?=$block['flats_per_floor']?></td>
                                <td>
                                    <!-- <a class="btn btn-success" data-toggle="tooltip" href="javascript:;" onclick="$('#nurse_view_<?php// echo $row['fid']; ?>').modal('show');" data-original-title="<?php // echo $_data['view_text'];?>"><i class="fa fa-eye"></i></a> -->
                                    <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Block/editBlock/'.$block['block_name'])?>" data-original-title="<?='Edit '.$block['block_name'].' block'?>"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger" data-toggle="tooltip" href="<?=base_url('Block/deleteBlock/'.$block['block_name'])?>" data-original-title="<?='Delete '.$block['block_name'].' block'?>"><i class="fa fa-trash-o"></i></a>
                                    <div id="nurse_view_<?php echo 1; //$row['fid']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header orange_header">
                                                    <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>
                                                    <h3 class="modal-title"><?php echo 'floor_details';//$_data['floor_details'];?></h3>
                                                </div>
                                                <div class="modal-body model_view" align="center">&nbsp;
                                                    <div>
                                                        <!--<img class="photo_img_round" style="width:100px;height:100px;" src="#" />-->
                                                    </div>
                                                    <div class="model_title"><?php echo 'floor_no';//$row['floor_no']; ?></div>
                                                </div>
                                                <div class="modal-body">
                                                    <h3 style="text-decoration:underline;"><?php echo 'details_information';//$_data['details_information'];?></h3>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <b><?php echo 'floor_no';//$_data['floor_no'];?> :</b> <?php echo 'floor_no';//$row['floor_no']; ?><br />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <!-- <?php //} mysql_close($link); ?> -->
                        </tbody>
                        <!-- <tfoot>
                            <tr>
                                <th><?php //echo 'floor_no'; //$_data['floor_no'];?></th>
                                <th><?php //echo 'action_text'; //$_data['action_text'];?></th>
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
        function deleteFloor(Id) {
            var iAnswer = confirm("Are you sure you want to delete this Floor ?");
            if (iAnswer) {
                window.location = '<?php echo WEB_URL; ?>floor/floorlist.php?id=' + Id;
            }
        }

        /*$(document).ready(function() {
            setTimeout(function() {
                $("#me").hide(300);
                $("#you").hide(300);
            }, 3000);
        });*/
    </script>