<?php include "template/header.php"; ?>

<title>Log Masuk</title>

<!--begin::Page Custom Styles(used by this page) -->
<link href="<?php echo base_url(); ?>asset/assets/css/demo1/pages/general/login/login-4.css" rel="stylesheet" type="text/css" />
<!--end::Page Custom Styles -->

<?php include "template/import-css.php"; ?>		

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo base_url(); ?>asset/assets/media/bg/bg-2.jpg);">
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <h1 class="kt-login__title">MAKSAK ARENA</h1>
                            <a href="/dashboard-admin/">
                                <img class="logo-large" src="<?php echo base_url(); ?>asset/assets/media/logos/logo-maksak.png">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Log masuk</h3>
                            </div>
                            <?php $attributes = array("id" => "loginform", "name" => "loginform", "class" => "kt-form");
                            echo form_open("", $attributes); ?>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Kata laluan" name="password">
                                </div>
                                <div class="row kt-login__extra">
                                    <div class="col">
                                    </div>
                                    <div class="col kt-align-right">
                                        <a href="javascript:;" id="kt_login_forgot" class="kt-login__link">Lupa kata laluan?</a>
                                    </div>
                                </div>
                                <div class="kt-login__actions">
                                    <button id="" class="btn btn-brand btn-pill kt-login__btn-primary">Log masuk</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div class="kt-login__forgot">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Terlupa kata laluan?</h3>
                                <div class="kt-login__desc">Hantarkan email anda untuk memohon kata laluan baharu</div>
                            </div>
                            <?php $attributes = array("id" => "forgetaccountform", "name" => "forgetaccountform", "class" => "kt-form");
                            echo form_open("Welcome/forgetaccount", $attributes); ?>
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="Email" name="email" id="kt_email" autocomplete="off">
                                </div>
                                <div class="kt-login__actions">
                                    <button class="btn btn-brand btn-pill kt-login__btn-primary">Mohon</button>&nbsp;&nbsp;
                                    <button class="btn btn-secondary btn-pill kt-login__btn-secondary">Batal</button>
                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

<?php include "template/global-script.php"; ?>

    <!--begin::Page Scripts(used by this page) -->
    <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/login/login-general.js" type="text/javascript"></script>

    <!--end::Page Scripts -->
<?php include "template/footer.php"; ?>