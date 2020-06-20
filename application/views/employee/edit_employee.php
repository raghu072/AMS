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
            <div align="right" style="margin-bottom:1%;"> <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Employee/employeeList')?>" data-original-title="Employee list"><i class="fa fa-reply"></i></a> </div>
            <div class="box box-info">
                <div class="box-header">
                    <p class="box-title" style="color: red;"><?=validation_errors()?></p>
                </div>
                <div class="box-body">
                    <?=form_open('Employee/updateEmployee/'.$employee['emp_id'])?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="emp_name" value="<?=$employee['emp_name']?>" placeholder="Employee Name">
                            </div>
                            <div class="form-group">
                                <span id="err_msg"></span>
                                <input type="text" class="form-control" name="emp_username" value="<?=$employee['emp_username']?>" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact" value="<?=$employee['contact']?>" placeholder="Contact" maxlength="10">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="salary" value="<?=$employee['salary']?>" placeholder="Salary">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="joined_date" value="<?=date('d/m/Y', strtotime($employee['joined_date']))?>" placeholder="Joined Date">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control time" name="shift_start_time" value="<?=date('H:i', strtotime($employee['shift_start_time']))?>" placeholder="Shift start time">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control time" name="shift_end_time" value="<?=date('H:i', strtotime($employee['shift_end_time']))?>" placeholder="Shift end time">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="address" rows="3"><?=$employee['address']?></textarea>
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