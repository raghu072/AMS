<section class="content-header">
    <h1><?=$title;?></h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('Dashboard/index')?>"><i class="fa fa-dashboard"></i><?=$homeBreadcam?></a></li>
        <li class="active"><?=$text_1?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Full Width boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div align="right" style="margin-bottom:1%;">
            	<a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Dashboard/index')?>" data-original-title="Dashboard">
            		<i class="fa fa-reply"></i>
            	</a>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <h3 style="color:red;font-weight:bold;" class="box-title"><?=$buildingInfo[0]['building_name']?></h3>
                    <p><?='<strong>Amenities</strong>: '.$buildingInfo[0]['parks'].', '.$buildingInfo[0]['club_house'].', '.$buildingInfo[0]['gym'].' & sports '.$buildingInfo[0]['sports']?></p>
                    <p><?='<strong>Address</strong>: '.$buildingInfo[0]['address'].' '.$buildingInfo[0]['pincode']?><br>
                    	<?=''.$buildingInfo[0]['city'].' '.$buildingInfo[0]['state'].' '.$buildingInfo[0]['country']?>
                    </p>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
<!-- /.row -->