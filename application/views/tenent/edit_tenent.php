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
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Tenent/tenentList')?>" data-original-title="Tenent List"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title"><?=validation_errors()?></h3>
                </div>
                <div class="box-body">
                    <?=form_open('Tenent/updateTenent/'.$tenentData['block'].$tenentData['flat'])?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tenent_name" placeholder="Tenent name" value="<?=$tenentData['tenent_name']?>">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?=$tenentData['email']?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" placeholder="Contact" value="<?=$tenentData['contact']?>">
                            </div>
                            <div class="form-group">
                                <span id="err_msg"></span>
                                <input type="text" class="form-control" name="flat_moved" placeholder="Flat Number" value="<?=$tenentData['flat']?>">
                            </div>
                            <div class="form-group">
                                <select name="block" id="tenent_block" class="form-control">
                                    <option value selected disabled>Select block</option>
                                    <option value="A" <?=($tenentData['block'] == 'A')? 'selected':''?> >A</option>
                                    <option value="B" <?=($tenentData['block'] == 'B')? 'selected':''?> >B</option>
                                    <option value="C" <?=($tenentData['block'] == 'C')? 'selected':''?> >C</option>
                                    <option value="D" <?=($tenentData['block'] == 'D')? 'selected':''?> >D</option>
                                    <option value="E" <?=($tenentData['block'] == 'E')? 'selected':''?> >E</option>
                                    <option value="F" <?=($tenentData['block'] == 'F')? 'selected':''?> >F</option>
                                    <option value="G" <?=($tenentData['block'] == 'G')? 'selected':''?> >G</option>
                                    <option value="H" <?=($tenentData['block'] == 'H')? 'selected':''?> >H</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="moved_date" placeholder="Moved Date" value="<?=date('m/d/Y', strtotime($tenentData['moved_date']))?>">
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
</section>
<!-- /.row -->
<script type="text/javascript">
    $(function() {
        $( ".datepicker" ).datepicker();
    });
</script>