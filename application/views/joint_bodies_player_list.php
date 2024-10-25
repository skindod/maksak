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
                                    <h3 class="kt-subheader__title"><?php echo $kejohanan->event_name; ?></h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc"><?php echo $acara->sport_name; ?></span>
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
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="kt-portlet kt-portlet--mobile">
                                                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                        <div class="kt-portlet__head-label">
                                                            <h4 class="kt-portlet__head-title">Senarai pendaftar <?php echo $badan_gabungan->name; ?></h4>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__body">
                                                        <div class="kt-portlet__body">
                                                            <table class="table table-striped sortTable">
                                                                <thead>
                                                                    <th>No.</th>
                                                                    <th>Nama</th>
                                                                    <th>Jawatan dalam pasukan</th>
                                                                    <th>Umur</th>
                                                                    <th>Jantina</th>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $num = 1; foreach($player_list as $player){ ?>
                                                                    <tr>
                                                                        <td><?php echo $num; ?></td>
                                                                        <td><a href="/players/players_join_sports_list/<?php echo $player->player_id; ?>" target="_blank"><?php echo $player->name; ?></a></td>
                                                                        <td><?php echo $player->registered_position; ?></td>
                                                                        <td><?php echo $player->age; ?></td>
                                                                        <td><?php echo ($player->sex==1) ? 'Lelaki' : 'Perempuan'; ?></td>
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