<?php include "template/header.php"; ?>

<title>MAKSAK | Tambah Acara</title><!-- comment -->

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
                                    <h3 class="kt-subheader__title">Acara</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Tambah acara</span>
                                </div>
                                <div class="kt-subheader__toolbar">
                                    <div class="kt-subheader__wrapper">
                                        <span class="kt-subheader__desc"><i class="flaticon2-calendar-1"></i> <?php echo date('M j'); ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- end:: Content Head -->

                            <!-- begin:: Content -->
                            <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">

                                <!--Begin::Section-->
                                <div class="row">
                                    <div class="col-xl-8">
                                        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Tambah acara baru
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">

                                                <!--begin::Form-->
                                                <?php $attributes = array("id" => "forgetaccountform", "name" => "forgetaccountform", "class" => "kt-form");
                                                echo form_open("sports/create", $attributes); ?>
                                                    <div class="kt-portlet__body">
                                                        <div class="form-group form-group-last">
                                                            <div class="alert alert-secondary" role="alert">
                                                                <div class="alert-icon"><i class="flaticon-add kt-font-brand"></i></div>
                                                                <div class="alert-text">
                                                                    Borang ini akan menambah acara baru ke dalam borang penganjuran anda.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama acara</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Nama acara atau sukan" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextarea">Penerangan tentang acara</label>
                                                            <textarea class="form-control" name="description" id="exampleTextarea" rows="3"></textarea>
                                                        </div>
<!--                                                        <div class="form-group form-group-last">
                                                            <label for="exampleSelect1">Pembahagian jenis acara</label>
                                                            <select class="form-control" id="exampleSelect1">
                                                                <option>Tiada</option>
                                                                <option>Lelaki / Perempuan</option>
                                                                <option>Berkumpulan / Persendirian</option>
                                                            </select>
                                                        </div>-->

                                                    </div>
                                                    <div class="kt-portlet__foot">
                                                        <div class="kt-form__actions">
                                                            <button type="submit" class="btn btn-primary">Tambah acara</button>
                                                            <button type="reset" class="btn btn-secondary">Reset borang</button>
                                                        </div>
                                                    </div>
                                                <?php echo form_close(); ?>

                                                <!--end::Form-->
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
                                                        Jumlah anjuran berdasarkan jenis acara
                                                    </span>
                                                </div>
                                                <!--begin::Widget 11-->
                                                <div class="kt-widget11">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td style=" width: 40%;">Acara</td>
                                                                    <td style=" width: 40%;">Jumlah anjuran</td>
                                                                    <td style=" width: 20%;">Sunting</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(count($sports_list) > 0){ foreach($sports_list as $sport){ ?>
                                                                <tr>
                                                                    <td>
                                                                        <span class="kt-widget11__title"><?php echo $sport->name; ?></span>
                                                                    </td>
                                                                    <td><?php echo $sport->total_anjuran; ?></td>
                                                                    <td><a href="sports/update/<?php echo $sport->id; ?>" class="btn kt-subheader__btn-primary btn-icon"><i class="flaticon2-edit"></i></a></td>
                                                                </tr>
                                                                <?php }} ?>
                                                            </tbody>
                                                        </table>
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