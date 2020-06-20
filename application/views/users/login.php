<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Management System</title>
    <link type="text/css" rel="stylesheet" href="<?=base_url('assets/css/bootstrap.css')?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url('assets/css/font-awesome.css')?>">
    <link type="text/css" rel="stylesheet" href="<?=base_url('assets/css/custom.css')?>">
    <link type='text/css' rel='stylesheet' href="<?=base_url('assets/css/googlefonts.css')?>">
    <style type="text/css">
        .msg {
            margin-bottom:8px;
            padding-top:2px;
            width:100%;
            height:25px;
            background:#E52740;
            color:#fff;
            display: block;
            text-align: center;
        }

        .valid {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <br>
        <div class="row text-center text-center">
            <div class="col-md-12">
                <span style="font-size:18px;">Apartment Management System</span>
            </div>
        </div>
        <br>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <?php if ($this->session->flashdata("failed_login")) : ?>
                    <div class="msg"><?=$this->session->flashdata("failed_login")?></div>
                <?php endif; ?>
                <?php if ($this->session->flashdata("user_logged_out")) : ?>
                    <div class="msg"><?=$this->session->flashdata("user_logged_out")?></div>
                <?php endif; ?>
                <span class="valid"><?=validation_errors()?></span>
                <div class="panel panel-default" id="loginBox">
                    <div class="panel-heading text-center"> <strong> Login </strong> </div>
                    <div class="panel-body">
                        <?=form_open('users/login')?>
                        <br />
                        <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <select name="ddlLoginType" onChange="mewhat(this.value);" id="ddlLoginType" class="form-control">
                                <option value="" selected disabled>User Type</option>
                                <option value="A">Admin</option>
                                <option value="O">Owner</option>
                                <option value="E">Employee</option>
                                <option value="T">Tenent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-inline"></div>
                            <span class="pull-right"> <a href="#">Forgot password? </a> </span>
                        </div>
                        <div align="center">
                            <button type="submit" id="login" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Login</button>
                        </div>
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?=base_url('assets/js/jquery-1.10.2.js')?>"></script>
</body>

</html>