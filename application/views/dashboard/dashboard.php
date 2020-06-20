<section class="content-header">
    <h1><?=$title?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url("Dashboard/index")?>"><i class="fa fa-dashboard"></i> <?=$homeBreadcam?></a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- /.row start -->
    <div class="row home_dash_box">
        <!-- col start -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Blocks</h3>
                    <p><?=$blocks[0]['no_of_blocks'].' Blocks'?></p>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/floor.png')?>"><!-- </a> --> </div>
                <a href="<?=base_url('Block/getBlocks')?>" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col end -->
        <!-- col start -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Flats</h3>
                    <p><?=$units[0]['no_of_units'].' Flats'?></p>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/room.png')?>"></a> </div>
                <a href="<?=base_url('Flat/flatList')?>" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col end -->
        <!-- col start -->
        <?php if ($this->session->userdata('userType') == 'A') : ?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Owners</h3>
                    <p><?=$owners[0]['no_of_owners'].' Flat Owners'?></p>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/owner.png')?>"></a> </div>
                <a href="<?=base_url('Owner/ownerList')?>" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col end -->
        <!-- col start -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Tenents</h3>
                    <p><?=$tenents[0]['no_of_tenents'].' Flats Rented'?></p>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/rented.png')?>"></a> </div>
                <a href="<?=base_url()?>rent/rentlist.php" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?> --> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endif; ?>
        <!-- ./col end -->
        <!-- col start -->
        <?php if ($this->session->userdata('userType') == 'A' || $this->session->userdata('userType') == 'E') : ?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Staff</h3>
                    <p><?=$employees[0]['no_of_employees'].' Staff Members'?></p>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/employee.png')?>"></a> </div>
                <a href="<?=base_url()?>employee/employeelist.php" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?> --> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endif; ?>
        <!-- ./col end -->
        <!-- ./col end -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Committee </h3>
                    <p><?=($committee[0]['no_of_committees'] > 0) ? $committee[0]['no_of_committees'].' Members':'0 Members';?></p>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/comittee.png')?>"></a> </div>
                <a href="<?=base_url('Committee/committeMemberList')?>" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?> --> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col end -->
        <!-- col start -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Parking</h3>
                    <p>Vehicles</p>
                    <!-- <h3>Amount</h3> -->
                    <!-- <?php if($currency_position == 'left') { ?>
                    <h3><?php echo $global_currency.$total_fair; ?></h3>
                    <?php } else { ?>
                    <h3><?php echo $total_fair.$global_currency; ?></h3>
                    <?php } ?>
                    <p><?php echo $_data['dashboard_total_fare']; ?></p> -->
                </div>
                <!-- <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/fair.png')?>"></a> </div> -->
                <a href="<?=base_url()?>fair/fairlist.php" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?>  --><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col end -->
        <!-- col start -->
        <?php if ($this->session->userdata('userType') == 'A') : ?>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Maintenance</h3>
                    <!-- <h3>total_fair</h3> -->
                    <p>Funds</p>
                    <!-- <?php if($currency_position == 'left') { ?>
                    <h3><?php echo $global_currency.$total_mc; ?></h3>
                    <?php } else { ?>
                    <h3><?php echo $total_mc.$global_currency; ?></h3>
                    <?php } ?>
                    <p><?php echo $_data['dashboard_total_maintenance']; ?></p> -->
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/maintenance.png')?>"></a> </div>
                <a href="<?=base_url()?>maintenance/maintenance_cost_list.php" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?> --> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col end -->
        <!-- col start -->
        <!-- col start -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Visitor</h3>
                    <!-- <h3>total_fair</h3> -->
                    <p>Visitors Today</p>
                    <!-- <?php if($currency_position == 'left') { ?>
                    <h3><?php echo $global_currency.$total_fund; ?></h3>
                    <?php } else { ?>
                    <h3><?php echo $total_fund.$global_currency; ?></h3>
                    <?php } ?>
                    <p><?php echo $_data['dashboard_total_fund']; ?></p> -->
                </div>
                <!-- <div class="icon"> <<i></i>mg height="80" width="80" src="<?=base_url('assets/images/fund.png')?>"></a> </div> -->
                <a href="<?=base_url()?>fund/fund_list.php" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?> --> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- col start -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>Events</h3>
                    <h3><!-- total_fair --></h3>
                    <p>Yearly events</p>
                    <!-- <?php if($currency_position == 'left') { ?>
                    <h3><?php echo $global_currency.$total_utility; ?></h3>
                    <?php } else { ?>
                    <h3><?php echo $total_utility.$global_currency; ?></h3>
                    <?php } ?>
                    <p><?php echo $_data['dashboard_total_owner_utility']; ?></p> -->
                </div>
                <!-- <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/utility.png')?>"></a> </div> -->
                <a href="<?=base_url()?>owner_utility/owner_utility_list.php" class="small-box-footer">More Information<!-- <?php echo $_data['dashboard_more_info']; ?> --> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <?php endif; ?>
        <!-- ./col end -->
        <!-- col start -->
        <?php if ($this->session->userdata('userType') == 'A') : ?>
        <!-- <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>dashboard_report</h3>
                    <h3>Reports</h3>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/report.png')?>"></a> </div>
                <a href="<?=base_url()?>report/report.php" class="small-box-footer">More Information<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
        <?php endif; ?>
        <!-- ./col end -->
        <!-- col start -->
        <!-- <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>dashboard_settings</h3>
                    <h3>settings</h3>
                </div>
                <div class="icon"> <img height="80" width="80" src="<?=base_url('assets/images/setting.png')?>"></a> </div>
                <a href="<?=base_url()?>setting/setting.php" class="small-box-footer">More Information <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> -->
        <!-- ./col end -->
    </div>
    <!-- /.row end -->
</section>
<!-- /.content -->