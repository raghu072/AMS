<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url()?>assets/dist/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?=base_url()?>assets/dist/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
 folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?=base_url()?>assets/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/dist/css/dataTables.responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/dist/css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url()?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- jQuery 2.1.4 -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?=base_url()?>assets/dist/js/printThis.js"></script>
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?=base_url('assets/favicon/apts.png')?>">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>

<body class="skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?=base_url('Dashboard/index')?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <!-- <span class="logo-mini">AMS</span> -->
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">Adarsh AMS</span> </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <ul class="dropdown-menu">
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <!-- start message -->
                                        <a href="#">
                                            <div class="pull-left"> <img src="<?=base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image" /> </div>
                                        </a> </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#"></a></li>
                        </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
                            <ul class="dropdown-menu"></ul>
                        </li>
                        <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user fa-lg"></i> <span class="hidden-xs"> <?=$this->session->userdata("username")?> </span> </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header"> <img src="<?=base_url('assets/img/user.png')?>" class="img-circle" alt="User Image" />
                                    <p> <?php
                                        if ($this->session->userdata('userType') == 'O') {
                                            echo $userDetails[0]['owner_name'];
                                        } else if ($this->session->userdata('userType') == 'A') {
                                            echo $userDetails[0]['admin_name'];
                                        } else if ($this->session->userdata('userType') == 'E') {
                                            echo 'Employee ID '.$userDetails[0]['emp_id'];
                                        } else {
                                            echo $userDetails[0]['tenent_name'];
                                        }

                                        ?>
                                        <small>
                                            <?php
                                                if($this->session->userdata('userType') == 'A'){
                                                    echo 'Admin';
                                                } else if($this->session->userdata('userType') == 'O') {
                                                    echo 'Owner '.$userDetails[0]['block'].$userDetails[0]['flat_owned'];
                                                } else if($this->session->userdata('userType') == 'T') {
                                                    echo 'Tenent '.$userDetails[0]['block'].$userDetails[0]['flat'];;
                                                }
                                            ?>
                                            <br /> <?=($this->session->userdata('userType') == 'E')?$userDetails[0]['emp_name']:$this->session->userdata("username")?></p></small>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left"><a data-target="#user_profile" data-toggle="modal" class="btn btn-success btn-flat">Profile</a></div>
                                    <div class="pull-right"> <a href="<?=base_url('Users/logout')?>" class="btn btn-danger btn-flat">Sign out</a> </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="margin-top:10px;">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="<?=($this->uri->segment(2) == 'index') ? 'active': ''?>"><a href="<?=base_url('dashboard/index')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a> </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-building"></i> <span>Block</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url('Block/getBlocks')?>"><i class="fa fa-arrow-circle-right"></i>Block List</a></li>
                            <?php if($this->session->userdata('userType') == 'A'): ?>
                            <li class="active"><a href="<?=base_url('Block/addNewBlock')?>"><i class="fa fa-arrow-circle-right"></i>Add Block</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-home"></i> <span>Flat</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <?php if($this->session->userdata('userType') == 'A'): ?>
                            <li class="active"><a href="<?=base_url('Flat/addFlat')?>"><i class="fa fa-arrow-circle-right"></i>Add Flat</a></li>
                            <?php endif; ?>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Complaints</a></li>
                            <li class="active"><a href="<?=base_url('Flat/flatList')?>"><i class="fa fa-arrow-circle-right"></i>Flat List</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Maintenance</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Flat for rent</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Flat for sale</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Utility Details</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Vehicle & Parking Details</a></li>
                        </ul>
                    </li>
                    <?php if($this->session->userdata('userType') == 'A' || $this->session->userdata('userType') == 'O'): ?>
                    <li class="treeview"> <a href="#"> <i class="fa fa-user"></i> <span>Owner</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url('Owner/addOwner')?>"><i class="fa fa-arrow-circle-right"></i>Add Owner</a></li>
                            <li class="active"><a href="<?=base_url('Owner/ownerList')?>"><i class="fa fa-arrow-circle-right"></i>Owners List</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php if($this->session->userdata('userType') == 'A' || $this->session->userdata('userType') == 'O'): ?>
                    <li class="treeview"> <a href="#"> <i class="fa fa-user"></i> <span>Tenent</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url('Tenent/addTenent')?>"><i class="fa fa-arrow-circle-right"></i>Add Tenent</a></li>
                            <li class="active"><a href="<?=base_url('Tenent/tenentList')?>"><i class="fa fa-arrow-circle-right"></i>Tenent List</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <li class="treeview"> <a href="#"> <i class="fa fa-user"></i> <span>Employee</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url('employee/addemployee')?>"><i class="fa fa-arrow-circle-right"></i>Add Employee</a></li>
                            <li class="active"><a href="<?=base_url('employee/employeelist')?>"><i class="fa fa-arrow-circle-right"></i>Employee List</a></li>

                        </ul>
                    </li>
                    <li class="treeview"> <a href="#"> <i class="fa fa-money"></i> <span>Club house</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url('Dashboard/gymMembers')?>"><i class="fa fa-arrow-circle-right"></i>Gym members</a></li>
                            <li class="active"><a href="<?=base_url('Dashboard/sportsInfo')?>"><i class="fa fa-arrow-circle-right"></i>Sports info</a></li>
                        </ul>
                    </li>
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-rupee"></i> <span>Utility</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Utility Details</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Add Utility Details</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-cog"></i> <span>maintenance</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>maintenance/maintenance_cost_list"><i class="fa fa-arrow-circle-right"></i>Cost</a></li>
                            <li class="active"><a href="<?=base_url()?>maintenance/add_maintenance_cost"><i class="fa fa-arrow-circle-right"></i>Details</a></li>
                        </ul>
                    </li> -->
                    <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Committee</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url('Committee/addCommitteeMember')?>"><i class="fa fa-arrow-circle-right"></i>Add committe member</a></li>
                            <li class="active"><a href="<?=base_url('Committee/committeMemberList')?>"><i class="fa fa-arrow-circle-right"></i>Committee details</a></li>
                        </ul>
                    </li>
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-money"></i> <span>Funds</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>fund/fund_list"><i class="fa fa-arrow-circle-right"></i>Fund Details</a></li>
                            <li class="active"><a href="<?=base_url()?>fund/add_fund"><i class="fa fa-arrow-circle-right"></i>Add Fund Details</a></li>
                        </ul>
                    </li> -->
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-money"></i> <span>Billing</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>bill/bill_list"><i class="fa fa-arrow-circle-right"></i>Billing Details</a></li>
                            <li class="active"><a href="<?=base_url()?>bill/add_bill"><i class="fa fa-arrow-circle-right"></i>Expenses Details</a></li>
                        </ul>
                    </li> -->
                    <li class="<?=($this->uri->segment(2) == 'buildingInformation') ? 'active': ''?>"><a href="<?=base_url('Dashboard/buildingInformation')?>"><i class="fa fa-building"></i> <span>Appartment Information</span></a> </li>
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-warning"></i> <span>Complaints</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>complain/complainlist"><i class="fa fa-arrow-circle-right"></i>Complaint List</a></li>
                            <li class="active"><a href="<?=base_url()?>complain/addcomplain"><i class="fa fa-arrow-circle-right"></i>Raise Complaint</a></li>
                        </ul>
                    </li> -->
                    <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Visitor</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Add Visitor</a></li>
                            <li class="active"><a href="<?=base_url()?>"><i class="fa fa-arrow-circle-right"></i>Visitor List</a></li>
                        </ul>
                    </li>
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-users"></i> <span>Branch</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>branch/branchlist"><i class="fa fa-arrow-circle-right"></i>Branch List</a></li>
                            <li class="active"><a href="<?=base_url()?>branch/addbranch"><i class="fa fa-arrow-circle-right"></i>Add Branch</a></li>
                        </ul>
                    </li> -->
                    <?php if($this->session->userdata('userType') == 'A'): ?>
                    <li class="treeview"> <a href="#"> <i class="fa fa-bar-chart-o"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <!-- <li class="active"><a href="<?=base_url()?>report/fair_report"><i class="fa fa-arrow-circle-right"></i>Fare Report</a></li> -->
                            <li class="active"><a href="<?=base_url()?>report/complain_report"><i class="fa fa-arrow-circle-right"></i>Complaint Report</a></li>
                            <li class="active"><a href="<?=base_url()?>report/unit_report"><i class="fa fa-arrow-circle-right"></i>Flat Status Report</a></li>
                            <li class="active"><a href="<?=base_url()?>report/rented_report"><i class="fa fa-arrow-circle-right"></i>Rent Report</a></li>
                            <li class="active"><a href="<?=base_url()?>report/visitors_report"><i class="fa fa-arrow-circle-right"></i>Visitor Report</a></li>
                            <!-- <li class="active"><a href="<?=base_url()?>report/fund_status"><i class="fa fa-arrow-circle-right"></i>Fund Status Report</a></li>
                            <li class="active"><a href="<?=base_url()?>report/bill_report"><i class="fa fa-arrow-circle-right"></i>Billing Report</a></li> -->
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- <li class="treeview"> <a href="#"> <i class="fa fa-wrench"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i> </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="<?=base_url()?>setting/bill_setup"><i class="fa fa-arrow-circle-right"></i>Billing Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/utility_bill_setup"><i class="fa fa-arrow-circle-right"></i>Utility Bill Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/employee_salary_setup"><i class="fa fa-arrow-circle-right"></i>Employee Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/member_type_setup"><i class="fa fa-arrow-circle-right"></i>Member Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/month_setup"><i class="fa fa-arrow-circle-right"></i>Month Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/year_setup"><i class="fa fa-arrow-circle-right"></i>Year Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/language"><i class="fa fa-arrow-circle-right"></i>Language Settings</a></li>
                            <li class="active"><a href="<?=base_url()?>setting/admin"><i class="fa fa-arrow-circle-right"></i>Admin Settings</a></li>
                        </ul>
                    </li> -->
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <form id="updateprofile" action="<?=base_url()?>ajax/updateProfile" method="post">
                <div class="modal fade" role="dialog" id="user_profile" aria-labelledby="gridSystemModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="gridSystemModalLabel">Update Your Profile</h4>
                            </div>
                            <div class="modal-body">
                                <div align="center"><img class="photo_img_round" style="width:100px;height:100px;" src="<?=base_url('assets/images/no_image.jpg')?>" /></div>
                                <h4 align="center"><?=$this->session->userdata("username")?></h4>
                                <h4 align="center">
                                    <?php
                                        if ($this->session->userdata("userType") == 'A') {
                                            echo 'Admin';
                                        } else if ($this->session->userdata("userType") == 'E') {
                                            echo 'Employee';
                                        } else if ($this->session->userdata("userType") == 'O') {
                                            echo 'Owner';
                                        } else {
                                            echo 'Tenent';
                                        }
                                    ?>
                                    <?php
                                        if ($this->session->userdata('userType') == 'O') {
                                            $name = $userDetails[0]['owner_name'];
                                        } else if ($this->session->userdata('userType') == 'A') {
                                            $name = $userDetails[0]['admin_name'];
                                        } else if ($this->session->userdata('userType') == 'E') {
                                            $name = $userDetails[0]['emp_name'];
                                        } else {
                                            $name = $userDetails[0]['tenent_name'];
                                        }

                                        ?>
                                </h4>

                                <div class="form-group">
                                    <label class="control-label">Name:&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" id="txtProfileName" name="txtProfileName" value="<?=$name?>">
                                </div>
                                <?php if ($this->session->userdata("userType") == 'O' || $this->session->userdata("userType") == 'T' || $this->session->userdata("userType") == 'A'): ?>
                                <div class="form-group">
                                    <label class="control-label">Email:&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" id="txtProfileEmail" name="txtProfileEmail" value="<?=$this->session->userdata("username")?>">
                                </div>
                                <?php endif ?>
                                <?php if ($this->session->userdata("userType") == 'E'): ?>
                                <div class="form-group">
                                    <label class="control-label">Username:&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" id="txtProfileEmail" name="txtProfileEmail" value="<?=$this->session->userdata("username")?>">
                                </div>
                                <?php endif ?>

                                <!-- <div class="form-group">
                                    <label class="control-label">Password:&nbsp;&nbsp;</label>
                                    <input type="text" class="form-control" id="txtProfilePassword" name="txtProfilePassword" value="">
                                </div> -->
                                <!-- <div style="color:orange;font-weight:bold;text-align:left;font-size:15px;">After update application will be logout automatically.</div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" onClick="javascript:$('#updateprofile').submit();">Update</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <input type="hidden" name="user_id" id="user_id" value="<?=$this->session->userdata("userId")?>">
            </form>
            <input type="hidden" name="" id="baseUrl" value="<?=base_url()?>">