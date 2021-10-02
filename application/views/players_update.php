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
                                    <span class="kt-subheader__desc">Kemaskini pemain</span>
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
                                                        Kemaskini butiran pemain
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body kt-portlet__body--fit">

                                                <!--begin::Form-->
                                                <?php
                                                $attributes = array("id" => "addplayerform", "name" => "addplayerform", "class" => "kt-form");
                                                echo form_open_multipart("players/update/".$player->id, $attributes);
                                                ?>
                                                <div class="kt-portlet__body">
                                                    <div class="form-group form-group-last">
                                                        <div class="alert alert-secondary" role="alert">
                                                            <div class="alert-icon"><i class="flaticon-user kt-font-brand"></i></div>
                                                            <div class="alert-text">
                                                                Isikan borang ini dengan maklumat lengkap dan tepat anda untuk mendaftarkan diri anda sebagai pemain kedalam pangkalan data MAKSAK. Masukkan no kad pengenalan anda dahulu.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>No kad pengenalan</label>
                                                                <input class="form-control" id="kt_inputmask_2" name="ic" maxlength="12" max="999999999999" type="number" inputmode="text" required="" value="<?php echo $player->ic; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-4" style="">
                                                            <label>Gambar Pasport</label>
                                                            <div class="circle">
                                                                <!-- User Profile Image -->
                                                                <img class="profile-pic" src="<?php if($player->passport_pic != ''){ echo base_url().'images/passport_pic/'.$player->passport_pic; } ?>">
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
                                                                                <option value="<?php echo $salut->id; ?>" <?php if($player->salutations_id == $salut->id){ echo 'selected'; } ?>><?php echo $salut->name; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <label>Nama penuh</label>
                                                                    <input type="text" name="name" class="form-control" placeholder="Ali bin Abu" value="<?php echo $player->name; ?>" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jantina</label>
                                                                <input type="hidden" id="sex" name="sex" >
                                                                <select id="select_sex" name="select_sex" disabled="" class="form-control selectpicker">
                                                                    <option value="">Pilih satu</option>
                                                                    <option value="1" <?php if($player->sex == 1){ echo 'selected'; } ?>>Lelaki</option>
                                                                    <option value="2" <?php if($player->sex == 2){ echo 'selected'; } ?>>Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label>Tarikh lahir</label>
                                                                <input type="hidden" id="dob_day" name="dob_day" value="<?php echo $player->dob_day; ?>">
                                                                <select id="day" name="day" class="form-control selectpicker" disabled>
                                                                    <option value="1" <?php if($player->dob_day == 1){ echo 'selected'; } ?>>1</option>
                                                                    <option value="2" <?php if($player->dob_day == 2){ echo 'selected'; } ?>>2</option>
                                                                    <option value="3" <?php if($player->dob_day == 3){ echo 'selected'; } ?>>3</option>
                                                                    <option value="4" <?php if($player->dob_day == 4){ echo 'selected'; } ?>>4</option>
                                                                    <option value="5" <?php if($player->dob_day == 5){ echo 'selected'; } ?>>5</option>
                                                                    <option value="6" <?php if($player->dob_day == 6){ echo 'selected'; } ?>>6</option>
                                                                    <option value="7" <?php if($player->dob_day == 7){ echo 'selected'; } ?>>7</option>
                                                                    <option value="8" <?php if($player->dob_day == 8){ echo 'selected'; } ?>>8</option>
                                                                    <option value="9" <?php if($player->dob_day == 9){ echo 'selected'; } ?>>9</option>
                                                                    <option value="10" <?php if($player->dob_day == 10){ echo 'selected'; } ?>>10</option>
                                                                    <option value="11" <?php if($player->dob_day == 11){ echo 'selected'; } ?>>11</option>
                                                                    <option value="12" <?php if($player->dob_day == 12){ echo 'selected'; } ?>>12</option>
                                                                    <option value="13" <?php if($player->dob_day == 13){ echo 'selected'; } ?>>13</option>
                                                                    <option value="14" <?php if($player->dob_day == 14){ echo 'selected'; } ?>>14</option>
                                                                    <option value="15" <?php if($player->dob_day == 15){ echo 'selected'; } ?>>15</option>
                                                                    <option value="16" <?php if($player->dob_day == 16){ echo 'selected'; } ?>>16</option>
                                                                    <option value="17" <?php if($player->dob_day == 17){ echo 'selected'; } ?>>17</option>
                                                                    <option value="18" <?php if($player->dob_day == 18){ echo 'selected'; } ?>>18</option>
                                                                    <option value="19" <?php if($player->dob_day == 19){ echo 'selected'; } ?>>19</option>
                                                                    <option value="20" <?php if($player->dob_day == 20){ echo 'selected'; } ?>>20</option>
                                                                    <option value="21" <?php if($player->dob_day == 21){ echo 'selected'; } ?>>21</option>
                                                                    <option value="22" <?php if($player->dob_day == 22){ echo 'selected'; } ?>>22</option>
                                                                    <option value="23" <?php if($player->dob_day == 23){ echo 'selected'; } ?>>23</option>
                                                                    <option value="24" <?php if($player->dob_day == 24){ echo 'selected'; } ?>>24</option>
                                                                    <option value="25" <?php if($player->dob_day == 25){ echo 'selected'; } ?>>25</option>
                                                                    <option value="26" <?php if($player->dob_day == 26){ echo 'selected'; } ?>>26</option>
                                                                    <option value="27" <?php if($player->dob_day == 27){ echo 'selected'; } ?>>27</option>
                                                                    <option value="28" <?php if($player->dob_day == 28){ echo 'selected'; } ?>>28</option>
                                                                    <option value="29" <?php if($player->dob_day == 29){ echo 'selected'; } ?>>29</option>
                                                                    <option value="30" <?php if($player->dob_day == 30){ echo 'selected'; } ?>>30</option>
                                                                    <option value="31" <?php if($player->dob_day == 31){ echo 'selected'; } ?>>31</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>&nbsp;</label>
                                                            <input type="hidden" id="dob_month" name="dob_month" value="<?php echo $player->dob_month; ?>">
                                                            <select id="month" name="month" disabled="" class="form-control selectpicker">
                                                                <option value="1" <?php if($player->dob_day == 1){ echo 'selected'; } ?>>Januari</option>
                                                                <option value="2" <?php if($player->dob_day == 2){ echo 'selected'; } ?>>Februari</option>
                                                                <option value="3" <?php if($player->dob_day == 3){ echo 'selected'; } ?>>Mac</option>
                                                                <option value="4" <?php if($player->dob_day == 4){ echo 'selected'; } ?>>April</option>
                                                                <option value="5" <?php if($player->dob_day == 5){ echo 'selected'; } ?>>Mei</option>
                                                                <option value="6" <?php if($player->dob_day == 6){ echo 'selected'; } ?>>Jun</option>
                                                                <option value="7" <?php if($player->dob_day == 7){ echo 'selected'; } ?>>Julai</option>
                                                                <option value="8" <?php if($player->dob_day == 8){ echo 'selected'; } ?>>Ogos</option>
                                                                <option value="9" <?php if($player->dob_day == 9){ echo 'selected'; } ?>>September</option>
                                                                <option value="10" <?php if($player->dob_day == 10){ echo 'selected'; } ?>>Oktober</option>
                                                                <option value="11" <?php if($player->dob_day == 11){ echo 'selected'; } ?>>November</option>
                                                                <option value="12" <?php if($player->dob_day == 12){ echo 'selected'; } ?>>Disember</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <label>&nbsp;</label>
                                                            <input type="hidden" id="dob_year" name="dob_year" value="<?php echo $player->dob_year; ?>">
                                                            <select id="year" name="year" disabled="" class="form-control selectpicker">
                                                                <?php for ($a = date('Y'); $a > 1950; $a--) { ?>
                                                                    <option value="<?php echo $a; ?>" <?php if($player->dob_year == $a){ echo 'selected'; } ?>><?php echo $a; ?></option>
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
                                                                <textarea class="form-control" name="address" id="address" rows="4"><?php echo $player->address; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Maklumat penghubungan</label>
                                                            <input type="text" class="form-control" name="telephone" placeholder="No telefon" value="<?php echo $player->telephone; ?>"><br>
                                                            <input type="text" class="form-control" name="email" placeholder="Alamat email" value="<?php echo $player->email; ?>">
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Gred jawatan</label>
                                                            <select class="form-control kt-select2" id="kt_select2_1" name="grade_id">
                                                                <option value="">Pilih satu</option>
                                                                <?php foreach($grades as $grade) { ?>
                                                                    <option value="<?php echo $grade->id; ?>" <?php if($player->grade_id == $grade->id){ echo 'selected'; } ?> ><?php echo $grade->name; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Nama majikan</label>
                                                            <input type="text" name="employer" class="form-control" value="<?php echo $player->employer; ?>">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Nama jawatan</label>
                                                            <input type="text" name="occupation" class="form-control" value="<?php echo $player->occupation; ?>">
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label>
                                                                Taraf jawatan
                                                                <?php if($player->sah_surat_pelantikan != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/sah_surat_pelantikan/'.$player->sah_surat_pelantikan; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Surat Sah pelantikan"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <?php if($player->kad_pengenalan != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/kad_pengenalan/'.$player->kad_pengenalan; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Kad pengenalan"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <?php if($player->penyata_gaji != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/penyata_gaji/'.$player->penyata_gaji; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Penyata gaji"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <?php if($player->caruman_kwsp != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/caruman_kwsp/'.$player->caruman_kwsp; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Caruman KWSP"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <?php if($player->surat_pengesahan_jabatan != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pengesahan_jabatan/'.$player->surat_pengesahan_jabatan; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Surat pengesahan jabatan"></i>
                                                                    </a>
                                                                <?php } ?>
                                                            </label>
                                                            <select id="state_of_position" name="state_of_position" class="form-control selectpicker">
                                                                <option value="">Sila pilih</option>
                                                                <option value="tetap" <?php if($player->state_of_position == 'tetap'){ echo 'selected'; } ?> >Tetap</option>
                                                                <option value="sementara" <?php if($player->state_of_position == 'sementara'){ echo 'selected'; } ?> >Sementara/Pinjaman</option>
                                                                <option value="contract of service" <?php if($player->state_of_position == 'contract of service'){ echo 'selected'; } ?> >Contract of service</option>
                                                            </select>
                                                            
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Jawatan dalam pasukan</label>
                                                            <select name="position" class="form-control selectpicker">
                                                                <option value="">Sila pilih</option>
                                                                <option value="pengurus" <?php if($player->position == 'pengurus'){ echo 'selected'; } ?> >Pengurus</option>
                                                                <option value="jurulatih" <?php if($player->position == 'jurulatih'){ echo 'selected'; } ?> >Jurulatih</option>
                                                                <option value="pemain" <?php if($player->position == 'pemain'){ echo 'selected'; } ?> >Pemain</option>
                                                                <option value="fisioterapi" <?php if($player->position == 'fisioterapi'){ echo 'selected'; } ?> >Fisio</option>
                                                                <option value="kitman" <?php if($player->position == 'kitman'){ echo 'selected'; } ?> >Kitman</option>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group" id="doc_contract1" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Surat sah pelantikan</label>
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
                                                        <button type="submit" id="submit_form" class="btn btn-primary">Kemaskini</button>
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