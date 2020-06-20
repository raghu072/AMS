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
                    <?=form_open('Committee/addCommitteeMember')?>
                        <div class="col-md-10 col-md-offset-1">
                            <!-- <h3 class="box-title"><?=$text2?></h3> -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="member_name" placeholder="Member Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="designation" placeholder="Designation">
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" name="contact" placeholder="Contact" maxlength="10">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="salary" placeholder="Salary">
                            </div> -->
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="joined_date" placeholder="Joined Date">
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control time" name="shift_start_time" placeholder="Shift start time">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control time" name="shift_end_time" placeholder="Shift end time">
                            </div> -->
                            <!-- <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" rows="3"></textarea>
                            </div> -->
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

    $(document).ready(() => {
        /*$('#rent_field').hide();
        $('#deposit_field').hide();
        $('#rent').on('click', ()=> {
            $('#rent_field').show();
            $('#deposit_field').show();
        });

        $('#no_rent').on('click', ()=> {
            $('#rent_amt').val('');
            $('#deposit_amt').val('');
            $('#rent_field').hide();
            $('#deposit_field').hide();
        });*/

        $('#owner_block').on('change', () => {
            var blockName = $('#owner_block').val();
            var flatNumber = $('#owner_flat').val();
            var baseURL = $('#baseUrl').val();

            $.ajax({
                url: baseURL + 'Owner/checkFlatOwned',
                type: 'POST',
                data: {
                    'block_name': blockName,
                    'flat': flatNumber
                },
                datatype: 'json',
                success: function(data) {
                    // console.log(data);
                    if (data == '1') {
                        $('#err_msg').html('Flat is owned');
                        $('#err_msg').css('color', 'red');
                    } else {
                        $('#err_msg').html('');
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
    });
</script>