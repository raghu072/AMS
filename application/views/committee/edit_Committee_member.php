<section class="content-header">
    <h1><?=$pageTitle?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('Dashboard/index')?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><a href="<?=base_url('Committee/committeMemberList')?>"></a><?=$text1?></li>
        <li class="active"><?=$text2?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Committee/committeMemberList')?>" data-original-title="Committee Members"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <div class="box-header">
                    <p class="box-title" style="color: red;"><?=validation_errors()?></p>
                </div>
                <div class="box-body">
                    <?=form_open('Committee/udateCommitteeMember/'.$member['member_id'])?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="member_name" placeholder="Member Name" value="<?=$member['member_name']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="designation" placeholder="Designation" value="<?=$member['designation']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="joined_date" placeholder="Member from" value="<?=date('d/m/Y', strtotime($member['member_from']))?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="member_till" placeholder="Member till" value="<?=($member['member_till'] != '') ? date('d/m/Y', strtotime($member['member_till'])):''?>">
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
        /*$('.time').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '1',
            maxTime: '12:00pm',
            defaultTime: '8',
            startTime: '1:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });*/
    });
</script>