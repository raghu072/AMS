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
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Owner/ownerList')?>" data-original-title="Owner List"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <?=validation_errors()?>
                <div class="box-body">
                    <?=form_open('Owner/updateOwner/'.$ownerData['block'].$ownerData['flat_owned'])?>
                        <div class="col-md-10 col-md-offset-1">
                            <h3 class="box-title"><?=$text2?></h3>
                            <div class="form-group">
                                <input type="text" class="form-control" name="owner_name" placeholder="Owner name" value="<?=$ownerData['owner_name']?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Emailid" value="<?=$ownerData['email']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" placeholder="Contact" value="<?=$ownerData['contact']?>">
                            </div>
                            <div class="form-group">
                                <span id="err_msg"></span>
                                <input type="text" class="form-control" name="flat_owned" placeholder="Flat Number" value="<?=$ownerData['flat_owned']?>">
                            </div>
                            <div class="form-group">
                                <select name="block" id="owner_block" class="form-control">
                                    <option value selected disabled>Select block</option>
                                    <option value="A" <?=($ownerData['block'] == 'A')? 'selected':''?> >A</option>
                                    <option value="B" <?=($ownerData['block'] == 'B')? 'selected':''?> >B</option>
                                    <option value="C" <?=($ownerData['block'] == 'C')? 'selected':''?> >C</option>
                                    <option value="D" <?=($ownerData['block'] == 'D')? 'selected':''?> >D</option>
                                    <option value="E" <?=($ownerData['block'] == 'E')? 'selected':''?> >E</option>
                                    <option value="F" <?=($ownerData['block'] == 'F')? 'selected':''?> >F</option>
                                    <option value="G" <?=($ownerData['block'] == 'G')? 'selected':''?> >G</option>
                                    <option value="H" <?=($ownerData['block'] == 'H')? 'selected':''?> >H</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="owned_date" placeholder="Purchased Date" value="<?=date('m/d/Y', strtotime($ownerData['owned_from']))?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <span><input type="radio" name="stay" id="no_rent" value="1" <?=($flatDetails['is_occupied']==1)?'checked':''?>> Owner stay</span>
                                <span><input type="radio" name="stay" id="rent" value="2" <?=($flatDetails['is_occupied']==2)?'checked':''?>> To rent</span>
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
    $(function() {
        $( ".datepicker" ).datepicker();
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

        /*$('#owner_block').on('change', () => {
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
        });*/
    });
</script>