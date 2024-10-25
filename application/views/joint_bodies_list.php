<?php include "template/header.php"; ?>

<title>MAKSAK | Senarai Badan Gabungan</title><!-- comment -->

<?php include "template/import-css.php"; ?>

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
                                    <h3 class="kt-subheader__title"><?php echo $badan_gabungan->name; ?></h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">bersama butiran tahun</span>
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

                            <div class="kt-content kt-grid__item" id="kt_content">
                                <!--Begin::Section-->
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="row">
                                            <!-- First Row: Four col-2 divs -->
                                            <div class="col-xl-3 mx-auto text-center">
                                                <div class="kt-portlet kt-portlet--mobile">
                                                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                        <div class="kt-portlet__head-label">
                                                            <h4 class="kt-portlet__head-title">Jumlah Kejohanan Sertai</h4>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-portlet__body">
                                                            <div class="col-lg-12 col-xxl-12">
                                                                <h1 class="fancy-number"><?php echo $num_of_events[0]->num_of_events; ?></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 mx-auto text-center">
                                                <div class="kt-portlet kt-portlet--mobile">
                                                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                        <div class="kt-portlet__head-label">
                                                            <h4 class="kt-portlet__head-title">Jumlah Acara Sertai</h4>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-portlet__body">
                                                            <div class="col-lg-12 col-xxl-12">
                                                                <h1 class="fancy-number"><?php echo $num_of_sports[0]->num_of_sports; ?></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 mx-auto text-center">
                                                <div class="kt-portlet kt-portlet--mobile">
                                                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                        <div class="kt-portlet__head-label">
                                                            <h4 class="kt-portlet__head-title">Jumlah Pemain Daftar</h4>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-portlet__body">
                                                            <div class="col-lg-12 col-xxl-12">
                                                                <h1 class="fancy-number"><?php echo $num_of_players[0]->num_of_players; ?></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 mx-auto text-center">
                                                <div class="kt-portlet kt-portlet--mobile">
                                                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                        <div class="kt-portlet__head-label">
                                                            <h4 class="kt-portlet__head-title">Jumlah Point Terkumpul</h4>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-portlet__body">
                                                            <div class="col-lg-12 col-xxl-12">
                                                                <h1 class="fancy-number"><?php echo $total_points[0]->total_points; ?></h1>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="kt-portlet kt-portlet--mobile">
                                                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                        <div class="kt-portlet__head-label">
                                                            <h4 class="kt-portlet__head-title">Senarai Acara Sertai</h4>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-portlet__body">
                                                            <table class="table table-striped sortTable">
                                                                <thead>
                                                                    <th>No.</th>
                                                                    <th>Acara</th>
                                                                    <th>Kejohanan</th>
                                                                    <th>Tarikh Kejohanan</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $num = 1; foreach($list_of_sports as $sport){ ?>
                                                                    <tr>
                                                                        <td><?php echo $num; ?></td>
                                                                        <td><a href="/jointBodies/sport_details?sport_id=<?php echo $sport->sport_id; ?>&event_id=<?php echo $sport->event_id; ?>&bg_id=<?php echo $badan_gabungan->id; ?>" target="_blank"><?php echo $sport->sport_name; ?></a></td>
                                                                        <td><a href="/events/details/<?php echo $sport->event_id; ?>" target="_blank"><?php echo $sport->event_name; ?></a></td>
                                                                        <td><?php echo $sport->date_from.' - '.$sport->date_to; ?></td>
                                                                    </tr>
                                                                    <?php $num++; } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4">
                                        <div class="col-xl-12">
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                        <h3 class="kt-widget14__title">Senarai badan gabungan</h3>
                                                    </div>
                                                    <div class="kt-widget11">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <td style=" width: 10%;">No.</td>
                                                                        <td style=" width: 70%;">Badan gabungan</td>
                                                                        <td style=" width: 20%;">Butiran</td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(count($state_list) > 0){ $num = 1; foreach($state_list as $state){ if($state->id != 18){ ?>
                                                                    <tr>
                                                                        <td>
                                                                            <span class="kt-widget11__title"><?php echo $num; ?></span>
                                                                        </td>
                                                                        <td>
                                                                            <span class=""><?php echo $state->name; ?></span>
                                                                        </td>
                                                                        <td><a href="<?php echo base_url(); ?>jointBodies/list?bg=<?php echo $state->id; ?>" class="btn kt-subheader__btn-primary btn-icon"><i class="flaticon-eye"></i></a></td>
                                                                    </tr>
                                                                    <?php $num++; }}} ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- end:: Content -->
                        </div>
                    </div>
                </div>

                <?php include "template/footer-page.php"; ?>		

                <?php include "template/global-script.php"; ?>

                <!--begin::Page Vendors(used by this page) -->
                <script src="<?php echo base_url(); ?>asset/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>asset/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
                <!--end::Page Vendors -->

                <!--begin::Page Scripts(used by this page) -->
                <script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script>
                <!--end::Page Scripts -->

                <?php include "template/footer.php"; ?>

                <style>
                    .fancy-number {
                        font-size: 4rem; /* Bigger than the default h1 */
                        font-weight: bold;
                        color: #646C9A; /* A bright, eye-catching color */
                        line-height: 1.2; /* Adjust line height if necessary */
                    }

                </style>
                <script language = "JavaScript">
                    function changeYear() {
                        var year = document.getElementById("selectYear").value;
                        location.replace("/jointBodies/list?year="+year);
                    }
                </script>