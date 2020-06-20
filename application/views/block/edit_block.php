<section class="content-header">
    <h1><?=$pageTitle?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('Dashboard/index')?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><a href="<?=base_url('Block/getBlocks')?>"><?=$module?></a></li>
        <li class="active"><?=$pageTitle?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Block/getBlocks')?>" data-original-title="Block list"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <!-- <div class="box-header">
                    <h3 class="box-title"><?=$pageTitle?></h3>
                </div> -->
                <div class="box-body">
                    <?=validation_errors()?>
                    <?=form_open('Block/updateBlock/'.$editBlock[0]['block_name'])?>
                        <div class="col-md-4">
                            <h3 class="box-title"><?=$pageTitle?></h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="block_name" placeholder="Block Name" value="<?=$editBlock[0]['block_name']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="floors" placeholder="Floors" value="<?=$editBlock[0]['total_floors']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="flat_per_floors" placeholder="Flat per floors" value="<?=$editBlock[0]['flats_per_floor']?>">
                            </div>
                            <input type="submit" name="" value="Submit" class="btn btn-primary pull-right">
                        </div>
                    <?=form_close()?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>