<?php include "template/header.php"; ?>

<title>MAKSAK | Laman Utama</title><!-- comment -->

<?php include "template/import-css.php"; ?>
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type = "text/javascript">google.charts.load('current', {packages: ['corechart']});</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>

<!-- begin::Body -->
<body class="kt-page--fixed kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

    <!-- begin:: Page -->
    <?php include "template/header-mobile.php"; ?>

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

                <?php include "template/header-desktop.php"; ?>

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                            <!-- begin:: Content Head -->
                            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                <div class="kt-subheader__main">
                                    <h3 class="kt-subheader__title">Laman Utama</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Data tahun</span>
                                    <select id="selectYear" onchange="changeYear()">
                                        <?php for($a = date('Y'); $a > 2020; $a--){ ?>
                                            <option value="<?php echo $a; ?>" <?php if($a == $selectYear){ echo 'selected'; } ?>><?php echo $a; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="kt-subheader__toolbar">
                                    <div class="kt-subheader__wrapper">
                                        <span class="kt-subheader__desc"><i class="flaticon2-calendar-1"></i> <?php echo $malayMonths[$month] . ' ' . $day; ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- end:: Content Head -->

                            <!-- begin:: Content -->
                            <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">

                                <!--Begin::Dashboard 2-->

                                <!--Begin::Section-->
                                <div class="row">
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col-12 m-0">
                                            <!--begin:: Widgets/daftar ahli-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header kt-margin-b-30">
                                                        <h3 class="kt-widget14__title">
                                                            Pemain
                                                        </h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            Jumlah berdaftar tahun <?php echo $selectYear; ?>:
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="font-weight-bold"><?php echo $players_data['all']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            Jumlah pemain lelaki:
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="text-primary font-weight-bold"><?php echo $players_data['male']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            Jumlah pemain perempuan:
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="text-danger font-weight-bold"><?php echo $players_data['female']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end:: Widgets/daftar ahli-->
                                        </div>
                                        <div class="col-12 m-0">
                                            <!--begin:: Widgets/daftar ahli-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header kt-margin-b-30">
                                                        <h3 class="kt-widget14__title">
                                                            Kejohanan
                                                        </h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            Jumlah kejohanan diadakan:
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="font-weight-bold"><?php echo $events_data['all']; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-10">
                                                            Jumlah kejohanan diadakan tahun <?php echo $selectYear; ?>:
                                                        </div>
                                                        <div class="col-2">
                                                            <span class="font-weight-bold"><?php echo $events_data['this_year']; ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end:: Widgets/daftar ahli-->
                                        </div>
                                        <div class="col-12">
                                            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                            Bilangan pemain baru daftar tahun <?php echo $selectYear; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body kt-portlet__body--fit">
                                                    <div id = "barChart" style = "width: 100%; margin: 0 auto"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col-12">
                                            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                            Jadual kejohanan <?php echo $selectYear; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body kt-portlet__body--fit p-4">
                                                    <div id="calendar"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                                <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                            Kedudukan Badan Gabungan Tahun <?php echo $selectYear; ?>
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body kt-portlet__body--fit">
                                                    <!-- <div id = "pieChart" style = "width: 100%; margin: 0 auto"></div> -->
                                                    <div class="row p-4">
                                                        <div class="col-12">
                                                            <table class="table table-striped dataTable no-footer">
                                                                <?php $b=1; foreach($ranking_data as $rank){ ?>
                                                                    <tr>
                                                                        <td><?php echo $b; ?></td>
                                                                        <td><?php echo $rank->name; ?></td>
                                                                        <td><?php echo $rank->point; ?></td>
                                                                    </tr>
                                                                <?php $b++; } ?>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- <div class="col-xl-4">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-widget14">
                                                <div class="kt-widget14__header kt-margin-b-30">
                                                    <h3 class="kt-widget14__title">
                                                        Acara
                                                    </h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-10">
                                                        Jumlah acara:
                                                    </div>
                                                    <div class="col-2">
                                                        <span class="font-weight-bold"><?php echo $sports_data['all']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>

                                <!--End::Section-->
                            </div>
                            <!-- end:: Content -->
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="eventModalLabel">Butiran Kejohanan</h5>
                            <button type="button" class="btn-sm btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                        <div class="modal-body" id="eventModalBody">
                            <!-- Event details will be displayed here -->
                        </div>
                        </div>
                    </div>
                </div>

<?php include "template/footer-page.php"; ?>		

<?php include "template/global-script.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="<?php echo base_url(); ?>asset/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>


<script language = "JavaScript">
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            locale: 'ms',
            initialView: 'dayGridMonth',
            firstDay: 1,  // Start the week on Monday
            dayNames: ["Ahad", "Isnin", "Selasa", "Rabu", "Khamis", "Jumaat", "Sabtu"],
            dayNamesShort: ["Ahd", "Isn", "Sel", "Rab", "Khms", "Jum", "Sab"],
            // Manually set month names in Malay
            monthNames: [
                "Januari", "Februari", "Mac", "April", "Mei", "Jun", 
                "Julai", "Ogos", "September", "Oktober", "November", "Disember"
            ],
            monthNamesShort: [
                "Jan", "Feb", "Mac", "Apr", "Mei", "Jun", 
                "Jul", "Ogos", "Sep", "Okt", "Nov", "Dis"
            ],
            buttonText: {
                today: 'Hari Ini',  // Custom text for the "Today" button
                month: 'Bulan',     // Custom text for month view button if applicable
                week: 'Minggu',     // Custom text for week view button if applicable
                day: 'Hari'         // Custom text for day view button if applicable
            },
            
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',  // The month title is displayed here
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            // other options...
            events: [
            <?php if(!empty($calendar_data)){ ?>
                <?php foreach($calendar_data as $program){ ?>
                    {
                        date_from: '<?php $formatted_date_from = date('d-m-Y', strtotime($program->program_date_from)); echo $formatted_date_from; ?>',
                        date_to: '<?php $new_date = date('Y-m-d', strtotime($program->program_date_to . ' +1 day')); $formatted_date_to = date('d-m-Y', strtotime($program->program_date_to)); echo $formatted_date_to; ?>',
                        title: '<?php echo str_replace("\n", "", $program->program_name); ?>',
                        start: '<?php echo $program->program_date_from; ?>',
                        end: '<?php echo $new_date; ?>',
                        tempat: '<?php echo str_replace("\n", "", $program->program_location); ?>',
                        pengelola: '<?php echo str_replace("\n", "", $program->program_host); ?>',
                        kategori: '<?php echo str_replace("\n", "", $program->program_category); ?>',
                        color: '#7DF9FF',
                        textColor: '#FFFFFF' // Custom text color for the event
                    },
                <?php } ?>
            <?php } ?>
            
            ],
            eventClick: function(info) {
                $('#eventModalBody').html('<p><strong>Program : </strong> ' + info.title + '</p>' +
                                        '<p><strong>Tarikh Kejohanan / Program : </strong> ' + info.date_from + ' sehingga ' + info.date_to + '</p>' +
                                        '<p><strong>Tempat : </strong> ' + info.tempat + '</p>' +
                                        '<p><strong>Pengelola : </strong> ' + info.pengelola + '</p>' +
                                        '<p><strong>Kategori : </strong> ' + info.kategori + '</p>');
                $('#eventModal').modal('show');
            },
        });
    });


    function drawChart() {
    // Define the chart to be drawn.
    var data = google.visualization.arrayToDataTable(<?php echo json_encode($barchart_data); ?>);

    var options = {
        'width':'100%',
        'height':300
    }; 

    // Instantiate and draw the chart.
    var chart = new google.visualization.BarChart(document.getElementById('barChart'));
    chart.draw(data, options);
    }
    google.charts.setOnLoadCallback(drawChart);

    function changeYear() {
        var year = document.getElementById("selectYear").value;
        location.replace("/dashboard?year="+year);
    }
</script>

<!--begin::Page Vendors(used by this page) -->

<!-- <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script> -->
<!-- <script src="<?php echo base_url(); ?>asset/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script> -->
<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script>
<!--end::Page Scripts -->

<?php include "template/footer.php"; ?>