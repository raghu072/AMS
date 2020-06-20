<section class="content-header">
    <h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('Dashboard/index')?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><?=$text1?></li>
        <li class="active"><?=$text2?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Flat/flatList')?>" data-original-title="Unit List"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <?=validation_errors()?>
                <div class="box-body">
                    <?=form_open('Flat/updateFlat/'.$flatData['block'].$flatData['flat_number'])?>
                        <div class="col-md-4">
                            <h3 class="box-title"><?=$text2?></h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="flat_number" placeholder="Flat Number" value="<?=$flatData['flat_number']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="block" placeholder="Block" value="<?=$flatData['block']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" placeholder="Description" value="<?=$flatData['description']?>">
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
</section>
<!-- /.row -->
<script type="text/javascript">
    function validateMe() {
        if ($("#ddlFloor").val() == '') {
            alert("Select Floor !!!");
            $("#ddlFloor").focus();
            return false;
        } else if ($("#txtUnit").val() == '') {
            alert("Unit Required !!!");
            $("#txtUnit").focus();
            return false;
        } else {
            return true;
        }
    }
</script>