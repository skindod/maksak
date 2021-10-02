<?php include "template/header.php"; ?>

<title>MAKSAK | Tambah Ahli Badan Gabungan</title><!-- comment -->

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
                                    <h3 class="kt-subheader__title">Badan Gabungan</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Tambah ahli badan gabungan</span>
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
                                    <div class="col-xl-7">
                                        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Tambah ahli badan gabungan baru
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">

                                                <!--begin::Form-->
                                                <?php $attributes = array("id" => "forgetaccountform", "name" => "forgetaccountform", "class" => "kt-form");
                                                echo form_open("jointBodies/create", $attributes); ?>
                                                    <div class="kt-portlet__body">
                                                        <div class="form-group form-group-last">
                                                            <div class="alert alert-secondary" role="alert">
                                                                <div class="alert-icon"><i class="flaticon-add kt-font-brand"></i></div>
                                                                <div class="alert-text">
                                                                    Borang ini akan menambah ahli badan gabungan baru.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nama</label>
                                                            <input type="text" class="form-control" name="name" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>E-mel</label>
                                                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required="" placeholder="Masukkan e-mel untuk kegunaan log masuk ke dashboard">
                                                            <span class="form-text text-muted">E-mel ini akan digunakan untuk sebarang pengumuman dan log masuk ke dashboard untuk pendaftaran acara.</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleTextarea">Nombor telefon</label>
                                                            <input type="text" class="form-control" name="phone">
                                                        </div>
                                                        <div class="form-group form-group-last">
                                                            <label>Negeri</label>
                                                            <select class="form-control" name="state" required="">
                                                                <option value="">Sila pilih satu</option>
                                                                <?php if(count($state_list) > 0){ foreach($state_list as $state){ ?>
                                                                <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="kt-portlet__foot">
                                                        <div class="kt-form__actions">
                                                            <button type="submit" class="btn btn-primary">Tambah ahli</button>
                                                            <button type="reset" class="btn btn-secondary">Reset borang</button>
                                                        </div>
                                                    </div>
                                                <?php echo form_close(); ?>

                                                <!--end::Form-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5">

                                        <!--begin:: Widgets/Revenue Change-->
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-widget14">
                                                <div class="kt-widget14__header">
                                                    <h3 class="kt-widget14__title">
                                                        Senarai badan gabungan
                                                    </h3>
                                                    <span class="kt-widget14__desc">
                                                        Jumlah badan gabungan berdaftar
                                                    </span>
                                                </div>
                                                <!--begin::Widget 11-->
                                                <div class="kt-widget11">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                    <tr>
                                                                            <td style=" width: 30%;">Badan Gabungan</td>
                                                                            <td style=" width: 30%;">Nama</td>
                                                                            <td style=" width: 30%;">E-mel Pengurus</td>
                                                                            <td style=" width: 10%;">Kemaskini</td>
                                                                    </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(count($joint_bodies_list) > 0){ foreach($joint_bodies_list as $bodies){ ?>
                                                                <tr>
                                                                    <td>
                                                                        <span class="kt-widget11__title"><?php echo $bodies->badan_name; ?></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="kt-widget11__title">
                                                                            <?php echo $bodies->name; ?>
                                                                            <?php if($bodies->status == 1){ ?>
                                                                            <br><span class="kt-badge kt-badge--success kt-badge--inline" style="color: #FFF !important;">Aktif</span>
                                                                            <?php }else{ ?>
                                                                            <br><span class="kt-badge kt-badge--danger kt-badge--inline" style="color: #FFF !important;">Tidak aktif</span>
                                                                            <?php } ?>
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $bodies->email; ?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?php echo base_url(); ?>jointBodies/update/<?php echo $bodies->id; ?>" class="btn kt-subheader__btn-primary btn-icon">
                                                                            <i class="flaticon2-edit"></i>
                                                                        </a>
                                                                    </td>
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