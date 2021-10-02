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
                                    <h3 class="kt-subheader__title">Umum</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Daftar pemain</span>
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
                                                        Daftar pemain baru
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">

                                                <!--begin::Form-->
                                                <?php
                                                $attributes = array("id" => "addplayerform", "name" => "addplayerform", "class" => "kt-form");
                                                echo form_open_multipart("players/create", $attributes);
                                                ?>
                                                <div class="kt-portlet__body">
                                                    <div class="form-group form-group-last">
                                                        <div class="alert alert-secondary" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-user kt-font-brand"></i></div>
                                                            <div class="alert-text">
                                                                Isikan borang ini dengan maklumat lengkap dan tepat anda untuk mendaftarkan diri anda sebagai pemain kedalam pangkalan data MAKSAK. Masukkan no kad pengenalan anda dan tekan Mula untuk bermula.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>No kad pengenalan</label>
                                                                <input class="form-control" id="kt_inputmask_2" name="ic" maxlength="12" max="999999999999" type="number" inputmode="text" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-4" style="">
                                                            <label>Gambar Pasport</label>
                                                            <div class="circle">
                                                                <!-- User Profile Image -->
                                                                <img class="profile-pic" src="<?php //echo base_url().'images/profile/'.$admin->image_url;  ?>">
                                                            </div>
                                                            <div class="p-image">
                                                                <i class="fa fa-camera upload-button"></i>
                                                                <input class="file-upload" type="file" name="passport_pic" accept="image/*"/>
                                                            </div>
                                                            <span class="form-text text-muted">Gambar hendaklah tidak melebihi 2MB dan dalam format JPG dan PNG sahaja.</span>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                        <label>Gelaran</label>
                                                                        <select id="" name="salutations_id" class="form-control selectpicker">
                                                                            <option value="">Pilih satu</option>
                                                                            <?php foreach($salutations as $salut){ ?>
                                                                                <option value="<?php echo $salut->id; ?>"><?php echo $salut->name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <label>Nama penuh</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Ali bin Abu" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jantina</label>
                                                                <input type="hidden" id="sex" name="sex" >
                                                                <select id="select_sex" name="select_sex" disabled="" class="form-control selectpicker">
                                                                    <option value="">Pilih satu</option>
                                                                    <option value="1">Lelaki</option>
                                                                    <option value="2">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label>Tarikh lahir</label>
                                                                <input type="hidden" id="dob_day" name="dob_day" >
                                                                <select id="day" name="day" class="form-control selectpicker" disabled>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    <option value="6">6</option>
                                                                    <option value="7">7</option>
                                                                    <option value="8">8</option>
                                                                    <option value="9">9</option>
                                                                    <option value="10">10</option>
                                                                    <option value="11">11</option>
                                                                    <option value="12">12</option>
                                                                    <option value="13">13</option>
                                                                    <option value="14">14</option>
                                                                    <option value="15">15</option>
                                                                    <option value="16">16</option>
                                                                    <option value="17">17</option>
                                                                    <option value="18">18</option>
                                                                    <option value="19">19</option>
                                                                    <option value="20">20</option>
                                                                    <option value="21">21</option>
                                                                    <option value="22">22</option>
                                                                    <option value="23">23</option>
                                                                    <option value="24">24</option>
                                                                    <option value="25">25</option>
                                                                    <option value="26">26</option>
                                                                    <option value="27">27</option>
                                                                    <option value="28">28</option>
                                                                    <option value="29">29</option>
                                                                    <option value="30">30</option>
                                                                    <option value="31">31</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>&nbsp;</label>
                                                            <input type="hidden" id="dob_month" name="dob_month" >
                                                            <select id="month" name="month" disabled="" class="form-control selectpicker">
                                                                <option value="1">Januari</option>
                                                                <option value="2">Februari</option>
                                                                <option value="3">Mac</option>
                                                                <option value="4">April</option>
                                                                <option value="5">Mei</option>
                                                                <option value="6">Jun</option>
                                                                <option value="7">Julai</option>
                                                                <option value="8">Ogos</option>
                                                                <option value="9">September</option>
                                                                <option value="10">Oktober</option>
                                                                <option value="11">November</option>
                                                                <option value="12">Disember</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>&nbsp;</label>
                                                            <input type="hidden" id="dob_year" name="dob_year" >
                                                            <select id="year" name="year" disabled="" class="form-control selectpicker">
                                                                <?php for ($a = date('Y'); $a > 1950; $a--) { ?>
                                                                    <option value="<?php echo $a; ?>"><?php echo $a; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Umur pada tahun ini</label>
                                                            <input type="text" class="form-control" id="age" disabled value="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label for="exampleTextarea">Alamat jabatan</label>
                                                                <textarea class="form-control" name="address" id="address" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Maklumat penghubungan</label>
                                                            <input type="text" class="form-control" name="telephone" placeholder="No telefon"><br>
                                                            <input type="text" class="form-control" name="email" placeholder="Alamat email">
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Gred jawatan</label>
                                                            <select class="form-control kt-select2" id="kt_select2_1" name="grade_id">
                                                                <option value="">Pilih satu</option>
                                                                <?php foreach($grades as $grade) { ?>
                                                                    <option value="<?php echo $grade->id; ?>"><?php echo $grade->name; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Nama majikan</label>
                                                            <input type="text" name="employer" class="form-control">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Nama jawatan</label>
                                                            <input type="text" name="occupation" class="form-control">
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>Taraf jawatan</label>
                                                            <select id="state_of_position" name="state_of_position" class="form-control selectpicker">
                                                                <option value="">Sila pilih</option>
                                                                <option value="tetap">Tetap</option>
                                                                <option value="sementara">Sementara/Pinjaman</option>
                                                                <option value="contract of service">Contract of service</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Jawatan dalam pasukan</label>
                                                            <select name="position" class="form-control selectpicker">
                                                                <option value="">Sila pilih</option>
                                                                <option value="pengurus">Pengurus</option>
                                                                <option value="jurulatih">Jurulatih</option>
                                                                <option value="pemain">Pemain</option>
                                                                <option value="fisioterapi">Fisio</option>
                                                                <option value="kitman">Kitman</option>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group" id="doc_contract1" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Surat Sah  Pelantikan</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="sah_surat_pelantikan" name="sah_surat_pelantikan">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format pdf, jpg atau png, dan tidak melebihi 2MB.</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Kad pengenalan</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="kad_pengenalan" name="kad_pengenalan">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format pdf, jpg atau png, dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="doc_contract2" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Penyata gaji</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="penyata_gaji" name="penyata_gaji">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format pdf, jpg atau png, dan tidak melebihi 2MB.</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Caruman KWSP</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="caruman_kwsp" name="caruman_kwsp">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format pdf, jpg atau png, dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="doc_contract3" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Surat pengesahan jabatan</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="surat_pengesahan_jabatan" name="surat_pengesahan_jabatan">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format pdf, jpg atau png, dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <button type="submit" id="submit_form" class="btn btn-primary" disabled="">Tambah pemain</button>
                                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                                    </div>
                                                </div>
                                                <?php echo form_close(); ?>

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
                <!--end::Page Scripts -->

                <?php include "template/footer.php"; ?>

                <script>
                    $(document).ready(function () {
                        
                        $('#state_of_position').on('change', function() {
                            if($('#state_of_position').val() == 'contract of service'){
                                $("#doc_contract1").show();
                                $("#doc_contract2").show();
                                $("#doc_contract3").hide();
                                $("#sah_surat_pelantikan").prop('required',true);
                                $("#kad_pengenalan").prop('required',true);
                                $("#penyata_gaji").prop('required',true);
                                $("#caruman_kwsp").prop('required',true);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                            } else if($('#state_of_position').val() == 'sementara'){
                                $("#doc_contract1").show();
                                $("#doc_contract2").show();
                                $("#doc_contract3").hide();
                                $("#sah_surat_pelantikan").prop('required',true);
                                $("#kad_pengenalan").prop('required',true);
                                $("#penyata_gaji").prop('required',true);
                                $("#caruman_kwsp").prop('required',true);
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
                                $.post("players/check_ic", {ic: $("#kt_inputmask_2").val()}, function (data) {
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
                                            $('#sex').val('2');
                                            $('#select_sex').val('2').change();
                                        } else {
                                            $('#sex').val('1');
                                            $('#select_sex').val('1').change();
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