<?php include "template/header.php"; ?>

<title>MAKSAK | Daftar Pemain</title><!-- comment -->

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
    <!--?php include "header-mobile.php"; ?-->

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

                <!--?php include "header-desktop.php"; ?-->

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                            <!-- begin:: Content Head -->
                            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                <div class="kt-subheader__main">
                                    <h3 class="kt-subheader__title">Pemain</h3>
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
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-8">
                                        <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        Butiran pemain
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">
                                                <!--begin::Form-->
                                                <div class="kt-portlet__body">
                                                    <div class="row">
                                                        <div class="col-sm-4" style="">
                                                            <b><label>Gambar Pasport</label></b><br>
                                                            <div class="circle">
                                                                <!-- User Profile Image -->
                                                                <img class="profile-pic" src="<?php if($player->passport_pic != ''){ echo base_url().'images/passport_pic/'.$player->passport_pic; } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Nama</label></b><br>
                                                            <span><?php echo strtoupper($player->salute_name).' '.strtoupper($player->name); ?></span>
                                                            <br><br>
                                                            <b><label>Jantina</label></b><br>
                                                            <span><?php if($player->sex == 1){ echo 'Lelaki'; }else{ echo 'Perempuan'; } ?></span>
                                                            <br><br>
                                                            <b><label>No. Telefon</label></b><br>
                                                            <span><?php echo $player->telephone; ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>No kad pengenalan</label></b><br>
                                                            <span><?php echo $player->ic; ?></span>
                                                            <br><br>
                                                            <b><label>Tarikh lahir</label></b><br>
                                                            <span><?php echo $player->dob_day.'/'.$player->dob_month.'/'.$player->dob_year; ?></span>
                                                            <br><br>
                                                            <b><label>Email</label></b><br>
                                                            <span><?php echo $player->email; ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12 mt-5 mb-5" style="border-top: solid 1px;"></div>
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5><b>Info Pekerjaan</b></h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Gred jawatan</label></b><br>
                                                            <span><?php echo $player->grade_name; ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Nama majikan</label></b><br>
                                                            <span><?php echo $player->employer; ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Nama jawatan</label></b><br>
                                                            <span><?php echo $player->occupation; ?></span>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <b><label for="exampleTextarea">Alamat jabatan</label></b><br>
                                                            <span><?php echo $player->address; ?></span>
                                                        </div>
                                                    </div><br><br>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                        <b><label>Taraf jawatan</label></b><br>
                                                        <?php if($player->state_of_position == 'tetap'){ ?>
                                                            Tetap
                                                            <?php if(isset($player->surat_hrmis) && $player->surat_hrmis != ''){ ?>
                                                                <a href="<?php echo base_url().'images/surat_hrmis/'.$player->surat_hrmis; ?>" target="_blank" data-toggle="tooltip" title="Laporan Profil Perkhidmatan Semasa Hrmis / MyTentera / BAT C 20 / BAT C 10"><i class="flaticon2-file-1"></i></a>
                                                            <?php } ?>
                                                        <?php } else if($player->state_of_position == 'sementara'){ ?>
                                                            Sementara 
                                                            <?php if(isset($_SESSION['login'])){ ?>
                                                                <a href="<?php echo base_url().'images/sah_surat_pelantikan/'.$player->sah_surat_pelantikan; ?>" target="_blank" data-toggle="tooltip" title="Sah surat pelantikan"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/kad_pengenalan/'.$player->kad_pengenalan; ?>" target="_blank" data-toggle="tooltip" title="Kad pengenalan"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/penyata_gaji/'.$player->penyata_gaji; ?>" target="_blank" data-toggle="tooltip" title="Penyata gaji"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/caruman_kwsp/'.$player->caruman_kwsp; ?>" target="_blank" data-toggle="tooltip" title="Caruman KWSP"><i class="flaticon2-file-1"></i></a>
                                                            <?php } ?>
                                                        <?php } else if($player->state_of_position == 'contract of service'){ ?>
                                                            Contract of Service 
                                                            <?php if(isset($_SESSION['login'])){ ?>
                                                                <a href="<?php echo base_url().'images/sah_surat_pelantikan/'.$player->sah_surat_pelantikan; ?>" target="_blank" data-toggle="tooltip" title="Sah surat pelantikan"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/kad_pengenalan/'.$player->kad_pengenalan; ?>" target="_blank" data-toggle="tooltip" title="Kad pengenalan"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/penyata_gaji/'.$player->penyata_gaji; ?>" target="_blank" data-toggle="tooltip" title="Penyata gaji"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/caruman_kwsp/'.$player->caruman_kwsp; ?>" target="_blank" data-toggle="tooltip" title="Caruman KWSP"><i class="flaticon2-file-1"></i></a>
                                                            <?php } ?>
                                                        <?php } else if($player->state_of_position == 'contract for service'){ ?>
                                                            Contract for Service <br>
                                                            <?php if(isset($_SESSION['login'])){ ?>
                                                                <?php if(isset($player->surat_pelantikan_terkini)){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pelantikan_terkini/'.$player->surat_pelantikan_terkini; ?>" target="_blank" data-toggle="tooltip" title="Surat pelantikan terkini"><i class="flaticon2-file-1"></i></a>
                                                                <?php } ?>
                                                                <?php if(isset($player->surat_pelantikan_terdahulu)){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pelantikan_terdahulu/'.$player->surat_pelantikan_terdahulu; ?>" target="_blank" data-toggle="tooltip" title="Surat pelantikan terdahulu"><i class="flaticon2-file-1"></i></a>
                                                                <?php } ?>
                                                                <a href="<?php echo base_url().'images/kad_pengenalan/'.$player->kad_pengenalan; ?>" target="_blank" data-toggle="tooltip" title="Kad pengenalan"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/penyata_gaji/'.$player->penyata_gaji; ?>" target="_blank" data-toggle="tooltip" title="Penyata gaji"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/caruman_kwsp/'.$player->caruman_kwsp; ?>" target="_blank" data-toggle="tooltip" title="Caruman KWSP"><i class="flaticon2-file-1"></i></a>
                                                            <?php } ?>
                                                        <?php } else if($player->state_of_position == 'mystep'){ ?>
                                                            MyStep<br>
                                                            <?php if(isset($_SESSION['login'])){ ?>
                                                                <?php if(isset($player->surat_pelantikan_terkini)){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pelantikan_terkini/'.$player->surat_pelantikan_terkini; ?>" target="_blank" data-toggle="tooltip" title="Surat pelantikan terkini"><i class="flaticon2-file-1"></i></a>
                                                                <?php } ?>
                                                                <?php if(isset($player->surat_pelantikan_terdahulu)){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pelantikan_terdahulu/'.$player->surat_pelantikan_terdahulu; ?>" target="_blank" data-toggle="tooltip" title="Surat pelantikan terdahulu"><i class="flaticon2-file-1"></i></a>
                                                                <?php } ?>
                                                                <a href="<?php echo base_url().'images/kad_pengenalan/'.$player->kad_pengenalan; ?>" target="_blank" data-toggle="tooltip" title="Kad pengenalan"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/penyata_gaji/'.$player->penyata_gaji; ?>" target="_blank" data-toggle="tooltip" title="Penyata gaji"><i class="flaticon2-file-1"></i></a>
                                                                <a href="<?php echo base_url().'images/caruman_kwsp/'.$player->caruman_kwsp; ?>" target="_blank" data-toggle="tooltip" title="Caruman KWSP"><i class="flaticon2-file-1"></i></a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Badan Gabungan</label></b><br>
                                                            <span><?php echo $player->badan_name; ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Jawatan dalam pasukan</label></b><br>
                                                            <span><?php echo ucfirst($player->position); ?></span>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-12 mt-5 mb-5" style="border-top: solid 1px;"></div>
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5><b>Info Vaksin</b></h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Dokumen Vaksin </label></b><br>
                                                            <?php if($player->vaccine_doc != ''){ echo '<a href="'.base_url().'images/vaccine_doc/'.$player->vaccine_doc.'" target="_blank"><img src="'.base_url().'images/vaccine_doc/'.$player->vaccine_doc.'" style="width:25px; height:25px;"></a>'; } ?>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Tarikh akhir vaksin</label></b><br>
                                                            <span><?php echo date("d/m/Y", strtotime($player->last_vaccine_date)); ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Jenis vaksin</label></b><br>
                                                            <span><?php echo ucfirst($player->vaccine_type); ?></span>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-12 mt-5 mb-5" style="border-top: solid 1px;"></div>
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5><b>Info Tambahan (jika pemain golf handikap)</b></h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>WHS ID</label></b><br>
                                                            <span><?php echo $player->nhs_id; ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Handikap</label></b><br>
                                                            <span><?php echo $player->handicap_no; ?></span>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-12 mb-5" style="border-top: solid 1px;"></div>
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5><b>Info Tambahan (jika pemain chess)</b></h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>FIDE ID</label></b><br>
                                                            <span><?php echo $player->fide_id; ?></span>
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-12 mb-5" style="border-top: solid 1px;"></div>
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5><b>Info Tambahan</b></h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Kad Kredit</label></b><br>
                                                            <span><?php echo ucfirst($player->kad_kredit); ?></span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b><label>Pendapatan Bulanan</label></b><br>
                                                            <span>
                                                                <?php if($player->pendapatan_bulanan=='1'){
                                                                        echo 'RM2,000 - RM3,000';
                                                                } else if($player->pendapatan_bulanan=='2'){
                                                                        echo 'RM3,001 - RM4,000';
                                                                } else if($player->pendapatan_bulanan=='3'){
                                                                        echo 'RM4,001 - RM5,000';
                                                                } else {
                                                                        echo 'RM5,001 dan ke atas';
                                                                }; ?>
                                                            </span>
                                                        </div>
                                                    </div><br>
                                                </div>
                                                <!--end::Form-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-2"></div>

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
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/crud/forms/widgets/select2.js" type="text/javascript"></script>
                <script src="/metronic/theme/html/demo1/dist/assets/js/pages/crud/forms/widgets/input-mask.js?v=7.1.9"></script>
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
                <!--end::Page Scripts -->

                <?php include "template/footer.php"; ?>

                <script>
                    $(document).ready(function () {
                        
                        var age1 = <?php echo date('Y'); ?> - <?php echo $player->dob_year; ?>;
                        $('#age').val(age1);
                                        
                        $('#state_of_position').on('change', function() {
                            if($('#state_of_position').val() == 'contract of service' || $('#state_of_position').val() == 'sementara'){
                                $("#doc_contract1").show();
                                $("#doc_contract2").show();
                                $("#doc_contract3").hide();
                                $("#sah_surat_pelantikan").prop('required',false);
                                $("#kad_pengenalan").prop('required',false);
                                $("#penyata_gaji").prop('required',false);
                                $("#caruman_kwsp").prop('required',false);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                            } else {
                                $("#doc_contract1").hide();
                                $("#doc_contract2").hide();
                                $("#doc_contract3").hide();
                                $("#sah_surat_pelantikan").prop('required',false);
                                $("#kad_pengenalan").prop('required',false);
                                $("#penyata_gaji").prop('required',false);
                                $("#caruman_kwsp").prop('required',false);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                            }
                        });

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

                        $("#kt_inputmask_2").keyup(function () {
                            var len = $(this).val().length;
                            if (len == 12) {
                                $.post("check_ic", {ic: $("#kt_inputmask_2").val()}, function (data) {
                                    if (data == '1') {
                                        alert('Kad pengenalan tiada dalam sistem, sila teruskan mendaftar.');
                                        $("#submit_form").prop("disabled", false);

                                        // select year
                                        var year = $("#kt_inputmask_2").val().substring(0, 2);
                                        if (year.substring(0, 1) >= 5) {
                                            year = '19' + year;
                                        } else {
                                            year = '20' + year;
                                        }
                                        $('#dob_year').val(year);
                                        $('#year').val(year).change();

                                        // select month
                                        var month = $("#kt_inputmask_2").val().substring(2, 4);
                                        month = month.replace(/^0+/, '');
                                        $('#dob_month').val(month);
                                        $('#month').val(month).change();

                                        // select month
                                        var day = $("#kt_inputmask_2").val().substring(4, 6);
                                        day = day.replace(/^0+/, '');
                                        $('#dob_day').val(day);
                                        $('#day').val(day).change();

                                        // select age
                                        var age = <?php echo date('Y'); ?> - year;
                                        $('#age').val(age);

                                        // select gender
                                        var gender = $("#kt_inputmask_2").val().substring(11, 12);
                                        if (gender % 2 == 0) {
                                            $('#sex').val('2').change();
                                        } else {
                                            $('#sex').val('1').change();
                                        }

                                        $("#kt_inputmask_2").css("border-color", "green");
                                    } else if (data == '0') {
                                        alert('Kad pengenalan sudah di dalam sistem, sila cuba kad pengenalan lain atau hubungi ketua badan gabungan anda.');
                                        $("#submit_form").prop("disabled", true);
                                        $("#kt_inputmask_2").css("border-color", "red");
                                    }
                                });

                            } else
                            {
                                $("#submit_form").prop("disabled", true);
                                $("#kt_inputmask_2").css("border-color", "#e2e5ec");
                            }
                        });
                    });
                </script>