<section class="content-header">
    <h1><?=$pageTitle?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('Dashboard/index')?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><a href="<?=base_url('Block/getBlocks')?>"><?=$text1?></a></li>
        <li class="active"><?=$text2?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Block/getBlocks')?>" data-original-title="Block list"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <div class="box-body">
                    <?=form_open('Dashboard/updateGymMember/'.$gymMember['gym_member_id'])?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="member_name" value="<?=$gymMember['member_name']?>" placeholder="Member Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="member_from" value="<?=date('m/d/Y', strtotime($gymMember['gym_member_from']))?>" placeholder="Member from">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="member_till" value="<?=($gymMember['gym_member_to'] != '0000-00-00 00:00:00') ? date('m/d/Y', strtotime($gymMember['gym_member_to'])) : '' ?>" placeholder="Member till">
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

<script type="text/javascript">
$(function() {
    $( '.datepicker' ).datepicker();
});
</script>