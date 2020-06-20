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
        <input type="hidden" name="" id="base_url" value="<?=base_url()?>">
        <div class="col-md-12">

            <div align="right" style="margin-bottom:1%;">

                <?php if ($this->session->userdata ( "userType" ) == 'O' || $this->session->userdata ( "userType" ) == 'A'): ?>
                <a class="btn btn-primary" data-toggle="tooltip" href="<?=base_url('Committee/listMeetings')?>" data-original-title="List Meetings"><i class="fa fa-list"></i></a>
                <?php endif; ?>

                <a class="btn btn-primary" title="" data-toggle="tooltip" href="<?=base_url('Committee/committeMemberList')?>" data-original-title="Committee Members"><i class="fa fa-reply"></i></a>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <?=validation_errors()?>
                </div>
                <div class="box-body">
                        <?=form_open('Committee/callMeeting')?>
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <input type="text" class="form-control" name="meeting_name" placeholder="Meeting on topic">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="place" placeholder="Meeting Venue">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control datepicker" name="joined_date" placeholder="Meetning date">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control time" name="time" placeholder="Meeting time">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="duration" placeholder="Meeting duration">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="meeting_description" rows="4"></textarea>
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
        $( '.datepicker' ).datepicker();
        $('.time').timepicker();
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
    $(document).ready(function() {
        // updating the view with notifications using ajax
        function load_unseen_notification(view = '') {
            var baseUrl = $('#base_url').val();
            $.ajax({
                url: baseUrl + 'Committee/getMeetingNotifications',
                method: "POST",
                data: {
                    view: view
                },
                dataType: "json",
                success: function(data) {
                    $('.dropdown-menu').html(data.notification);
                    if (data.unseen_notification > 0) {
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
        }

        load_unseen_notification();

        // submit form and get new records
        $('#comment_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#subject').val() != '' && $('#comment').val() != '') {
                var form_data = $(this).serialize();
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: form_data,
                    success: function(data) {
                        $('#comment_form')[0].reset();
                        load_unseen_notification();
                    }
                });
            } else {
                alert("Both Fields are Required");
            }
        });

        // load new notifications

        $(document).on('click', '.dropdown-toggle', function() {
            $('.count').html('');
            load_unseen_notification('yes');
        });

        setInterval(function() {
            load_unseen_notification();;
        }, 5000);
    });
</script>