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
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Tenent/tenentList')?>" data-original-title="Tenent list"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <div class="box-header">
                    <p class="box-title" style="color: red;"><?=validation_errors()?></p>
                </div>
                <div class="box-body">
                    <?=form_open('Tenent/addTenent')?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tenent_name" placeholder="Tenent Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" placeholder="Contact" maxlength="10">
                            </div>
                            <div class="form-group">
                                <span id="err_msg"></span>
                                <input type="text" class="form-control" name="flat_moved" id="flat_moved" placeholder="Flat moved">
                            </div>
                            <div class="form-group">
                                <select name="block" id="tenent_block" class="form-control">
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
                                <input type="text" class="form-control datepicker" name="moved_date" placeholder="Moved in date">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
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
        $('#tenent_block').on('change', () => {
            var blockName = $('#tenent_block').val();
            var flatNumber = $('#flat_moved').val();
            var baseURL = $('#baseUrl').val();

            $.ajax({
                url: baseURL + 'Tenent/checkFlatMoved',
                type: 'POST',
                data: {
                    'block_name': blockName,
                    'flat': flatNumber
                },
                datatype: 'json',
                success: function(data) {
                    if (data == '1') {
                        $('#err_msg').html('Flat is occupied owner');
                        $('#err_msg').css('color', 'red');
                    } else if (data == '2') {
                        $('#err_msg').html('Flat already has a tenent');
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