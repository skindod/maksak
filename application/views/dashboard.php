<?php include "template/header.php"; ?>

<title>MAKSAK | Dashboard</title><!-- comment -->

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
                                    <h3 class="kt-subheader__title">Dashboard</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Festival Sukan 2021</span>
                                </div>
                                <div class="kt-subheader__toolbar">
                                    <div class="kt-subheader__wrapper">
                                        <span class="kt-subheader__desc"><i class="flaticon2-calendar-1"></i> Aug 16</span>
                                        <a href="#" class="btn kt-subheader__btn-primary btn-icon">
                                            <i class="flaticon2-file"></i>
                                        </a>
                                        <a href="#" class="btn kt-subheader__btn-primary btn-icon">
                                            <i class="flaticon-download-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- end:: Content Head -->

                            <!-- begin:: Content -->
                            <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">

                                <!--Begin::Dashboard 2-->

                                <!--Begin::Section-->
                                <div class="row">
                                    <div class="col-xl-4">

                                        <!--begin:: Widgets/daftar ahli-->
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-widget14">
                                                <div class="kt-widget14__header kt-margin-b-30">
                                                    <h3 class="kt-widget14__title">
                                                        Bilangan ahli berdaftar
                                                    </h3>
                                                    <span class="kt-widget14__desc">
                                                        Berdasarkan jenis sukan
                                                    </span>
                                                </div>
                                                <div class="kt-widget14__chart" style="height:120px;">
                                                    <canvas id="kt_chart_daily_sales"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end:: Widgets/daftar ahli-->
                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin:: Widgets/status-->
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-widget14">
                                                <div class="kt-widget14__header">
                                                    <h3 class="kt-widget14__title">
                                                        Peratus ahli
                                                    </h3>
                                                    <span class="kt-widget14__desc">
                                                        Berdasarkan status jawatan
                                                    </span>
                                                </div>
                                                <div class="kt-widget14__content">
                                                    <div class="kt-widget14__chart">
                                                        <div class="kt-widget14__stat">249</div>
                                                        <canvas id="kt_chart_profit_share" style="height: 140px; width: 140px;"></canvas>
                                                    </div>
                                                    <div class="kt-widget14__legends">
                                                        <div class="kt-widget14__legend">
                                                            <span class="kt-widget14__bullet kt-bg-primary"></span>
                                                            <span class="kt-widget14__stats">37% Tetap</span>
                                                        </div>
                                                        <div class="kt-widget14__legend">
                                                            <span class="kt-widget14__bullet kt-bg-danger"></span>
                                                            <span class="kt-widget14__stats">47% Sementara</span>
                                                        </div>
                                                        <div class="kt-widget14__legend">
                                                            <span class="kt-widget14__bullet kt-bg-success"></span>
                                                            <span class="kt-widget14__stats">19% Lain-lain</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end:: Widgets/status-->
                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin:: Widgets/status-->
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-widget14">
                                                <div class="kt-widget14__header">
                                                    <h3 class="kt-widget14__title">
                                                        null
                                                    </h3>
                                                    <span class="kt-widget14__desc">
                                                        Berdasarkan ...
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <!--end:: Widgets/status-->
                                    </div>
                                </div>

                                <!--End::Section-->

                                <!--Begin::Section-->
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Rekod pendaftaran ahli oleh Badan
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">

                                                <!--begin: Datatable -->
                                                <div class="kt-datatable" id="kt_datatable_latest_orders"></div>

                                                <!--end: Datatable -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin:: Widgets/Revenue Change-->
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-widget14">
                                                <div class="kt-widget14__header">
                                                    <h3 class="kt-widget14__title">
                                                        Senarai acara
                                                    </h3>
                                                    <span class="kt-widget14__desc">
                                                        Jumlah ahli berdaftar berdasarkan jenis acara
                                                    </span>
                                                </div>
                                                <!--begin::Widget 11-->
                                                <div class="kt-widget11">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td style=" width: 40%;">Acara</td>
                                                                    <td style=" width: 40%;">Jumlah</td>
                                                                    <td style=" width: 20%;">Status</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <span class="kt-widget11__title">Bola Tampar</span>
                                                                        <span class="kt-widget11__sub">Wanita</span>
                                                                    </td>
                                                                    <td>0</td>
                                                                    <td><span class="kt-badge kt-badge--danger kt-badge--inline">Tiada</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="kt-widget11__title">Bola Sepak</span>
                                                                        <span class="kt-widget11__sub">Lelaki</span>
                                                                    </td>
                                                                    <td>26</td>
                                                                    <td><span class="kt-badge kt-badge--success kt-badge--inline">Penuh</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <span class="kt-widget11__title">Catur</span>
                                                                        <span class="kt-widget11__sub">Wanita</span>
                                                                    </td>
                                                                    <td>3</td>
                                                                    <td><span class="kt-badge kt-badge--warning kt-badge--inline">Buka</span></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="kt-widget11__action kt-align-right">
                                                        <button type="button" class="btn btn-label-success btn-sm btn-bold">Lihat senarai acara</button>
                                                    </div>
                                                </div>

                                                <!--end::Widget 11-->
                                            </div>
                                        </div>

                                        <!--end:: Widgets/Revenue Change-->
                                    </div>
                                </div>

                                <!--End::Section-->



                                <!--End::Dashboard 2-->
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