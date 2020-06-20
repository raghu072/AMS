<section class="content-header">
    <h1><?=$pageTitle?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('Dashboard/index')?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><a href="<?=base_url('Owner/ownerList')?>"></a><?=$text1?></li>
        <li class="active"><?=$text2?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('owner/ownerList')?>" data-original-title="Owner list"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <div class="box-header">
                    <p class="box-title" style="color: red;"><?=validation_errors()?></p>
                </div>
                <div class="box-body">
                    <?=form_open('owner/addOwner')?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="owner_name" placeholder="Owner Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" placeholder="Contact" maxlength="10">
                            </div>
                            <div class="form-group">
                                <span id="err_msg"></span>
                                <input type="text" class="form-control" name="flat_owned" id="owner_flat" placeholder="Flat Owned">
                            </div>
                            <div class="form-group">
                                <select name="block" id="owner_block" class="form-control">
                                    <option value selected disabled>Select block</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="owned_date" placeholder="Purchased Date">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <span><input type="radio" name="stay" id="no_rent" value="1" placeholder=""> Owner stay</span>
                                <span><input type="radio" name="stay" id="rent" value="2" placeholder=""> To rent</span>
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
        $( ".datepicker" ).datepicker();
    });

    $(document).ready(() => {
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