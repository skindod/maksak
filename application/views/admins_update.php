<?php include "template/header.php"; ?>

<title>MAKSAK | Profil Pengguna</title><!-- comment -->

<?php include "template/import-css.php"; ?>
<style>
    .profile-pic {
        max-width: 160px;
        max-height: 160px;
        display: block;
    }

    .file-upload {
        display: none;
    }
    .circle {
        border-radius: 15px !important;
        overflow: hidden;
        width: 160px;
        height: 160px;
        border: 3px solid #fff;
        /*position: absolute;*/
        top: 72px;
        box-shadow: 1px 1px 15px #f3f3f3;
    }
    img {
        max-width: 100%;
        height: auto;
    }
    .p-image {
        position: absolute;
        top: 125px;
        left: 135px;
        color: #666666;
        background-color: #fff;
        padding: 5px 5px 2px 5px;
        border-radius: 50%;
        box-shadow: 1px 1px 15px #f1f1f1;
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .p-image:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
    }
    .upload-button {
        font-size: 1.2em;
    }

    .upload-button:hover {
        transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
        color: #999;
    }
</style>

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
                                    <span class="kt-subheader__desc">Tambah admin</span>
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

                                <!--Begin::Section-->
                                <div class="row">
                                    <div class="col-xl-7">
                                        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Profil pengguna
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">

                                                <!--begin::Form-->
                                                <?php $attributes = array("id" => "forgetaccountform", "name" => "forgetaccountform", "class" => "kt-form");
                                                echo form_open_multipart("admins/update/".$admin->id, $attributes); ?>
                                                    <div class="kt-portlet__body">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-sm-3" style="">
                                                                    <div class="circle">
                                                                        <!-- User Profile Image -->
                                                                        <img class="profile-pic" src="<?php echo base_url('images/profile/'.$admin->image_url); ?>">
                                                                    </div>
                                                                    <div class="p-image">
                                                                        <i class="fa fa-camera upload-button"></i>
                                                                        <input class="file-upload" type="file" name="file_upload" accept="image/*"/>
                                                                    </div>
                                                                    <span class="form-text text-muted">Gambar hendaklah tidak melebihi 2MB dan dalam format JPG dan PNG sahaja.</span>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <div class="form-group">
                                                                        <label>Nama pengguna</label>
                                                                        <input type="username" class="form-control" aria-describedby="username" name="name" value="<?php echo $admin->name;?>">
                                                                    </div>
                                                                    <div class="form-group form-group-last">
                                                                        <label>Taraf pengguna</label>
                                                                        <select class="form-control selectpicker" name="role">
                                                                            <option value="0" <?php if($admin->role == 0){ echo 'selected'; } ?> >Setiausaha Agung (superadmin)</option>
                                                                            <option value="1" <?php if($admin->role == 1){ echo 'selected'; } ?> >Pengurus Aplikasi (admin)</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>E-mel pengguna</label>
                                                            <input type="email" class="form-control" aria-describedby="userEmail" placeholder="eg: ren@gmail.com" name="email" required="" value="<?php echo $admin->email;?>">
                                                            <span class="form-text text-muted">Sila pastikan email yang didaftarkan boleh diakses sepanjang masa untuk sebarang pengumuman</span>
                                                        </div>

                                                    </div>
                                                    <div class="kt-portlet__foot">
                                                        <div class="kt-form__actions">
                                                            <button type="submit" class="btn btn-primary">Kemaskini</button>
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
                                                        Senarai admin
                                                    </h3>
                                                    <span class="kt-widget14__desc">
                                                        <?php echo count($admins_list); ?> pengguna berdaftar
                                                    </span>
                                                </div>
                                                <!--begin::Widget 11-->
                                                <div class="kt-widget11">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <td style=" width: 40%;">Nama pengguna</td>
                                                                    <td style=" width: 40%;">Taraf pengguna</td>
                                                                    <td style=" width: 20%;">Kemaskini</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(count($admins_list) > 0){ foreach($admins_list as $admin){ ?>
                                                                <tr>
                                                                    <td>
                                                                        <span class="kt-widget11__title"><?php echo $admin->name; ?></span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="btn btn-sm btn-label-<?php if($admin->role == 0){ echo 'danger'; }else{ echo 'warning'; } ?> btn-pill"><?php if($admin->role == 0){ echo 'superadmin'; }else{ echo 'admin'; } ?></span>
                                                                    </td>
                                                                    <td>
                                                                        <a href="admins/update/<?php echo $admin->id; ?>" class="btn kt-subheader__btn-primary btn-icon">
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
                <script>
                    $(document).ready(function () {
                        var readURL = function (input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('.profile-pic').attr('src', e.target.result);
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }


                        $(".file-upload").on('change', function () {
                            readURL(this);
                        });

                        $(".upload-button").on('click', function () {
                            $(".file-upload").click();
                        });
                    });
                </script>
                <!--end::Page Scripts -->

                <?php include "template/footer.php"; ?>