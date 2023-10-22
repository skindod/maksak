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
                                                $attributes = array("id" => "addplayerform", "name" => "addplayerform", "class" => "kt-form", "method" => "post");
                                                echo form_open_multipart("players/update/".$player->id, $attributes);
                                                ?>
                                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
                                                            <span class="form-text text-muted">Gambar hendaklah tidak melebihi 2MB dan dalam format JPG,PNG,JPEG,HEIC,HEIF sahaja.</span>
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
                                                                <select id="sex" name="sex" class="form-control selectpicker required">
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
                                                                <option value="563" <?php if($player->grade_id == '563'){ echo 'selected'; } ?>>Tiada</option>
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
                                                                <?php if($player->surat_hrmis != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_hrmis/'.$player->surat_hrmis; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Laporan Profil Perkhidmatan Semasa Hrmis / MyTentera / BAT C 20 / BAT C 10"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <!-- <?php if($player->surat_hrmis != ''){ ?>
                                                                    <a onclick="addWatermark('<?php echo base_url().'images/surat_hrmis/'.$player->surat_hrmis; ?>')" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Laporan Profil Perkhidmatan Semasa Hrmis / MyTentera / BAT C 20 / BAT C 10"></i>
                                                                    </a>
                                                                <?php } ?> -->
                                                                <?php if($player->surat_pelantikan_terdahulu != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pelantikan_terdahulu/'.$player->surat_pelantikan_terdahulu; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Surat pelantikan terdahulu"></i>
                                                                    </a>
                                                                <?php } ?>
                                                                <?php if($player->surat_pelantikan_terkini != ''){ ?>
                                                                    <a href="<?php echo base_url().'images/surat_pelantikan_terkini/'.$player->surat_pelantikan_terkini; ?>" target="_blank">
                                                                        <i class="flaticon-file-2" data-toggle="kt-popover" data-placement="top" data-content="Surat pelantikan terkini"></i>
                                                                    </a>
                                                                <?php } ?>
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
                                                                <option value="contract for service" <?php if($player->state_of_position == 'contract for service'){ echo 'selected'; } ?> >Contract for service</option>
                                                                <option value="mystep" <?php if($player->state_of_position == 'mystep'){ echo 'selected'; } ?> >MySTEP</option>
                                                                <option value="lain lain" <?php if($player->state_of_position == 'lain lain'){ echo 'selected'; } ?> >Lain-lain</option>
                                                            </select>
                                                            
                                                        </div>
                                                    </div><br>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label>Badan Gabungan</label>
                                                            <select id="badan_gabungan_id" name="badan_gabungan_id" class="form-control selectpicker" required>
                                                                <option value="">Pilih satu</option>
                                                                <?php if(isset($badan_gabungan_list) && count($badan_gabungan_list) > 0){ foreach($badan_gabungan_list as $bg){ ?>
                                                                    <option value="<?php echo $bg->id; ?>" <?php if($bg->id == $player->badan_gabungan_id){ echo 'selected'; } ?>><?php echo $bg->name; ?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label>Jawatan dalam pasukan</label>
                                                            <select name="position" id="position" class="form-control">
                                                                <option value="">Sila pilih</option>
                                                                <option value="pengurus" <?php if($player->position == 'pengurus'){ echo 'selected'; } ?> >Pengurus</option>
                                                                <option value="jurulatih" <?php if($player->position == 'jurulatih'){ echo 'selected'; } ?> >Jurulatih</option>
                                                                <option value="fisioterapi" <?php if($player->position == 'fisioterapi'){ echo 'selected'; } ?> >Fisio</option>
                                                                <option value="kitman" <?php if($player->position == 'kitman'){ echo 'selected'; } ?> >Kitman</option>
                                                                <option value="koreografer" <?php if($player->position == 'koreografer'){ echo 'selected'; } ?> >Koreografer</option>
                                                                <option value="pemain" <?php if($player->position == 'pemain'){ echo 'selected'; } ?> >Pemain</option>
                                                                <option value="groundsman" <?php if($player->position == 'groundsman'){ echo 'selected'; } ?> >Groundsman</option>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group" id="doc_contract4" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Surat Pelantikan Terkini</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="surat_pelantikan_terkini" name="surat_pelantikan_terkini" onchange="Filevalidation('surat_pelantikan_terkini')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Surat Pelantikan Terdahulu</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="surat_pelantikan_terdahulu" name="surat_pelantikan_terdahulu" onchange="Filevalidation('surat_pelantikan_terdahulu')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="doc_contract1" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6" id="doc_contract1_1" style="display:none">
                                                                <label>Surat sah pelantikan</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="sah_surat_pelantikan" name="sah_surat_pelantikan" onchange="Filevalidation('sah_surat_pelantikan')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Kad pengenalan</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="kad_pengenalan" name="kad_pengenalan" onchange="Filevalidation('kad_pengenalan')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="doc_contract2" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Penyata gaji</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="penyata_gaji" name="penyata_gaji" onchange="Filevalidation('penyata_gaji')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Caruman KWSP</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="caruman_kwsp" name="caruman_kwsp" onchange="Filevalidation('caruman_kwsp')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="doc_contract3" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Surat pengesahan jabatan</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="surat_pengesahan_jabatan" name="surat_pengesahan_jabatan" onchange="Filevalidation('surat_pengesahan_jabatan')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="doc_contract5" style="display:none">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <label>Laporan Profil Perkhidmatan Semasa Hrmis (muka depan sahaja) / MyTentera / BAT C 20 / BAT C 10</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="surat_hrmis" name="surat_hrmis" onchange="Filevalidation('surat_hrmis')">
                                                                    <label class="custom-file-label" for="customFile">Sila muatnaik dokumen sokongan</label>
                                                                </div>
                                                                <span class="form-text text-muted">Fail hendaklah dalam format JPG,PNG,JPEG,HEIC,HEIF dan tidak melebihi 2MB.</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row" style="margin-top: 60px;">
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5>Info Vaksin</h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Dokumen Vaksin <?php if($player->vaccine_doc != ''){ echo '<a href="'.base_url().'images/vaccine_doc/'.$player->vaccine_doc.'" target="_blank"><img src="'.base_url().'images/vaccine_doc/'.$player->vaccine_doc.'" style="width:25px; height:25px;"></a>'; } ?></label>
                                                            <input class="form-control" type="file" name="vaccine_doc" accept="image/*"/>
                                                            <span class="form-text text-muted">Dokumen hendaklah tidak melebihi 2MB dan dalam format JPG,PNG,JPEG,HEIC,HEIF sahaja.</span>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Tarikh akhir vaksin</label>
                                                            <input type="text" name="last_vaccine_date" id="kt_datepicker_1" autocomplete="off" class="form-control" value="<?php echo date("m/d/Y", strtotime($player->last_vaccine_date)); ?>" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Jenis vaksin</label>
                                                            <select name="vaccine_type" class="form-control selectpicker" required>
                                                                <option value="">Sila pilih</option>
                                                                <option value="astrazeneca" <?php if($player->vaccine_type == 'astrazeneca'){ echo 'selected'; } ?> >Astrazeneca</option>
                                                                <option value="pfizer" <?php if($player->vaccine_type == 'pfizer'){ echo 'selected'; } ?> >Pfizer</option>
                                                                <option value="sinovac" <?php if($player->vaccine_type == 'sinovac'){ echo 'selected'; } ?> >Sinovac</option>
                                                                <option value="cansinobio" <?php if($player->vaccine_type == 'cansinobio'){ echo 'selected'; } ?> >CanSinoBIO</option>
                                                                <option value="gamaleya" <?php if($player->vaccine_type == 'gamaleya'){ echo 'selected'; } ?> >Gamaleya</option>
                                                                <option value="covax" <?php if($player->vaccine_type == 'covax'){ echo 'selected'; } ?> >Covax</option>
                                                            </select>
                                                        </div>
                                                    </div><br> -->
                                                    <div class="row" style="margin-top: 60px;">
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5>Info Tambahan (sila pilih jika pemain kebangsaan)</h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Tahun terakhir pemain kebangsaan</label>
                                                            <select name="tahun_pemain_kebangsaan" class="form-control selectpicker">
                                                                <option value="">Sila pilih</option>
                                                                <?php for($a=date('Y'); $a>date('Y', strtotime('-5 years')); $a--){ ?>
                                                                    <option value="<?php echo $a; ?>" <?php if($player->tahun_pemain_kebangsaan == $a){ echo 'selected'; } ?>><?php echo $a; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row" style="margin-top: 60px;">
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5>Info Tambahan (sila isi jika pemain golf handikap)</h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>WHS ID</label>
                                                            <input type="text" name="nhs_id" class="form-control" value="<?php echo $player->nhs_id; ?>">
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Handikap</label>
                                                            <select name="handicap_no" class="form-control selectpicker">
                                                                <option value="">Sila pilih</option>
                                                                <?php for($a=0; $a<25; $a++){ ?>
                                                                    <option value="<?php echo $a; ?>" <?php if($player->handicap_no == $a){ echo 'selected'; } ?>><?php echo $a; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div><br>
                                                    <div class="row" style="margin-top: 60px;">
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5>Info Tambahan (sila isi jika pemain chess)</h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>FIDE ID</label>
                                                            <input type="text" name="fide_id" class="form-control" value="<?php echo $player->fide_id; ?>">
                                                        </div>
                                                    </div><br>
                                                    <div class="row" style="margin-top: 60px;">
                                                        <div class="col-sm-12" style="margin-bottom:30px;">
                                                            <h5>Info Tambahan (wajib diisi)</h5>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label>Adakah anda mempunyai Kad Kredit?</label>
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="radio" class="form-control-sm" id="kad_kredit_ada" name="kad_kredit" value="ada" <?php echo $player->kad_kredit == 'ada'?'checked':''; ?> required>
                                                                </div>
                                                                <div class="col-sm-4 pt-2">
                                                                    <label for="kad_kredit_ada">Ada</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="radio" class="form-control-sm" id="kad_kredit_tiada" name="kad_kredit" value="tiada" <?php echo $player->kad_kredit == 'tiada'?'checked':''; ?> required>
                                                                </div>
                                                                <div class="col-sm-4 pt-2">
                                                                    <label for="kad_kredit_tiada">Tiada</label>
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <label>Pendapatan bulanan</label>
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="radio" class="form-control-sm" id="pen_1" name="pendapatan_bulanan" value="1" <?php echo $player->pendapatan_bulanan == '1'?'checked':''; ?> required>
                                                                </div>
                                                                <div class="col-sm-8 pt-2">
                                                                    <label for="pen_1">RM2,000 - RM3,000</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="radio" class="form-control-sm" id="pen_2" name="pendapatan_bulanan" value="2" <?php echo $player->pendapatan_bulanan == '2'?'checked':''; ?> required>
                                                                </div>
                                                                <div class="col-sm-8 pt-2">
                                                                    <label for="pen_2">RM3,001 - RM4,000</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="radio" class="form-control-sm" id="pen_3" name="pendapatan_bulanan" value="3" <?php echo $player->pendapatan_bulanan == '3'?'checked':''; ?> required>
                                                                </div>
                                                                <div class="col-sm-8 pt-2">
                                                                    <label for="pen_3">RM4,001 - RM5,000</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="radio" class="form-control-sm" id="pen_4" name="pendapatan_bulanan" value="4" <?php echo $player->pendapatan_bulanan == '4'?'checked':''; ?> required>
                                                                </div>
                                                                <div class="col-sm-8 pt-2">
                                                                    <label for="pen_4">RM5,001 dan ke atas</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 mt-5">
                                                            <div class="row">
                                                                <div class="col-sm-1">
                                                                    <input type="checkbox" class="form-control-sm" id="check_1" name="checked" value="1" checked required>
                                                                </div>
                                                                <div class="col-sm-11 pt-2">
                                                                    <label for="check_1">Saya/kami membenarkan MAKSAK menzahirkan dan berkongsi apa-apa maklumat yang relevan untuk tujuan jualan silang, pemasaran dan aktiviti promosi dengan anak syarikatnya, pembekal perkhidmatan dan rakan kongsi perniagaan strategik serta untuk menghubungi saya/kami sama ada melalui penggilan telepemasaran, mel terus, mel elektronik terus, khidmat pesanan ringkas (SMS) atau saluran komunikasi yang lain.</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><br>
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
                <!-- <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script> -->
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
                            if($('#state_of_position').val() == 'tetap'){
                                $("#doc_contract1").hide();
                                $("#doc_contract1_1").hide();
                                $("#doc_contract2").hide();
                                $("#doc_contract3").hide();
                                $("#doc_contract4").hide();
                                $("#doc_contract5").show();
                                $("#surat_pelantikan_terkini").prop('required',false);
                                $("#surat_pelantikan_terdahulu").prop('required',false);
                                $("#sah_surat_pelantikan").prop('required',false);
                                $("#kad_pengenalan").prop('required',false);
                                $("#penyata_gaji").prop('required',false);
                                $("#caruman_kwsp").prop('required',false);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                                $("#surat_hrmis").prop('required',true);
                            } else if($('#state_of_position').val() == 'contract of service' || $('#state_of_position').val() == 'sementara'){
                                $("#doc_contract1").show();
                                $("#doc_contract1_1").show();
                                $("#doc_contract2").show();
                                $("#doc_contract3").hide();
                                $("#doc_contract4").hide();
                                $("#doc_contract5").hide();
                                $("#surat_pelantikan_terkini").prop('required',false);
                                $("#surat_pelantikan_terdahulu").prop('required',false);
                                $("#sah_surat_pelantikan").prop('required',true);
                                $("#kad_pengenalan").prop('required',true);
                                $("#penyata_gaji").prop('required',true);
                                $("#caruman_kwsp").prop('required',true);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                                $("#surat_hrmis").prop('required',false);
                            } else if($('#state_of_position').val() == 'contract for service' || $('#state_of_position').val() == 'mystep'){
                                $("#doc_contract1").show();
                                $("#doc_contract1_1").hide();
                                $("#doc_contract2").show();
                                $("#doc_contract3").hide();
                                $("#doc_contract4").show();
                                $("#doc_contract5").hide();
                                $("#sah_surat_pelantikan").prop('required',false);
                                $("#kad_pengenalan").prop('required',true);
                                $("#penyata_gaji").prop('required',true);
                                $("#caruman_kwsp").prop('required',true);
                                $("#surat_pelantikan_terkini").prop('required',true);
                                $("#surat_pelantikan_terdahulu").prop('required',true);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                                $("#surat_hrmis").prop('required',false);
                            } else {
                                $("#doc_contract1").hide();
                                $("#doc_contract1_1").hide();
                                $("#doc_contract2").hide();
                                $("#doc_contract3").hide();
                                $("#doc_contract4").hide();
                                $("#doc_contract5").hide();
                                $("#surat_pelantikan_terkini").prop('required',false);
                                $("#surat_pelantikan_terdahulu").prop('required',false);
                                $("#sah_surat_pelantikan").prop('required',false);
                                $("#kad_pengenalan").prop('required',false);
                                $("#penyata_gaji").prop('required',false);
                                $("#caruman_kwsp").prop('required',false);
                                $("#surat_pengesahan_jabatan").prop('required',false);
                                $("#surat_hrmis").prop('required',false);
                            }

                            if($('#state_of_position').val() == 'lain lain')
                            {
                                $('#kt_select2_1').removeAttr('required');
                                $('#employer').removeAttr('required');
                                $('#occupation').removeAttr('required');
                                // $('#position')
                                //     .empty()
                                //     .append('<option selected="selected" value="">Sila pilih</option>');
                                // $('#position').append($('<option>', {
                                //     value: 'pengurus',
                                //     text: 'Pengurus'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'jurulatih',
                                //     text: 'Jurulatih'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'fisio',
                                //     text: 'Fisio'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'kitman',
                                //     text: 'Kitman'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'koreografer',
                                //     text: 'Koreografer'
                                // }));
                            }
                            else
                            {
                                $('#kt_select2_1').prop('required',true);
                                $('#employer').prop('required',true);
                                $('#occupation').prop('required',true);
                                // $('#position')
                                //     .empty()
                                //     .append('<option selected="selected" value="">Sila pilih</option>');
                                // $('#position').append($('<option>', {
                                //     value: 'pengurus',
                                //     text: 'Pengurus'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'jurulatih',
                                //     text: 'Jurulatih'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'fisio',
                                //     text: 'Fisio'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'kitman',
                                //     text: 'Kitman'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'koreografer',
                                //     text: 'Koreografer'
                                // }));
                                // $('#position').append($('<option>', {
                                //     value: 'pemain',
                                //     text: 'Pemain'
                                // }));
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

                    function Filevalidation(selectedFileId) {
                        const fi = document.getElementById(selectedFileId);
                        // console.log(fi);
                        // Check if any file is selected.
                        if (fi.files.length > 0) {
                            for (const i = 0; i <= fi.files.length - 1; i++) {
                    
                                const fsize = fi.files.item(i).size;
                                const file = Math.round((fsize / 1024));
                                // The size of the file.
                                if (file >= 2048) {
                                    alert(
                                        "Dokumen lebih dari 2MB! Sila muatnaik dokumen bawah dari 2MB.");
                                }
                                    
                            }
                        }
                    }

                    // Filevalidation = (fileId) => {
                    //     const fi = document.getElementById(fileId);
                    //     console.log(fi);
                    //     // Check if any file is selected.
                    //     if (fi.files[0].length > 0) {
                    //         for (const i = 0; i <= fi.files[0].length - 1; i++) {
                    
                    //             const fsize = fi.files[0].item(i).size;
                    //             const file = Math.round((fsize / 1024));
                    //             // The size of the file.
                    //             if (file >= 2048) {
                    //                 alert(
                    //                     fileId+" dokumen lebih dari 2MB! Select muatnaik dokumen bawah dari 2MB.");
                    //             }
                                    
                    //         }
                    //     }
                    // }

                    // Function to add watermark to an image
                    function addWatermark(imageUrl) {
                        const watermarkText = "KEGUNAAN MAKSAK SAHAJA";

                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        const image = new Image();
                        image.crossOrigin = 'Anonymous';
                        image.src = imageUrl;

                        image.onload = function() {
                            canvas.width = image.width;
                            canvas.height = image.height;

                            ctx.drawImage(image, 0, 0);
                            ctx.font = '25px Arial';
                            ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
                            ctx.fillText(watermarkText, 10, image.height - 10);

                            const watermarkedImageUrl = canvas.toDataURL('image/png');

                            const link = document.createElement('a');
                            link.href = watermarkedImageUrl;
                            link.download = 'watermarked_image.png';
                            link.innerHTML = '<img src="' + watermarkedImageUrl + '" alt="Watermarked Image">';
                            
                            // const watermarkedImagesDiv = document.getElementById('watermarkedImages');
                            // watermarkedImagesDiv.appendChild(link);

                            const link1 = document.createElement('a');
                            link1.href = link;
                            link1.download = '';
                            document.body.appendChild(link1);
                            link1.click();
                            document.body.removeChild(link1);
                        };
                    }
                </script>