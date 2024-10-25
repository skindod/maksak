<?php include "template/header.php"; ?>

<title>MAKSAK | Anjur Event</title><!-- comment -->

<!-- begin custom css for page -->
<link href="<?php echo base_url(); ?>asset/assets/css/demo1/pages/general/wizard/wizard-2.css" rel="stylesheet" type="text/css" />
<!-- end custom css for page -->
<?php include "template/import-css.php"; ?>
<style>
    .kt-wizard-v2 .kt-wizard-v2__wrapper .kt-form 
    { 
        width: 100% !important;
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
                                    <h3 class="kt-subheader__title">Kejohanan</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Anjur kejohanan baharu</span>
                                </div>
                                <div class="kt-subheader__toolbar">
                                    <div class="kt-subheader__wrapper">
                                        <span class="kt-subheader__desc"><i class="flaticon2-calendar-1"></i> <?php echo $malayMonths[$month] . ' ' . $day; ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- end:: Content Head -->

                            <!-- begin:: Content -->
                            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                                <div class="kt-portlet">
                                    <div class="kt-portlet__body kt-portlet__body--fit">
                                        <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
                                            <div class="kt-grid__item kt-wizard-v2__aside">

                                                <!--begin: Form Wizard Nav -->
                                                <div class="kt-wizard-v2__nav">
                                                    <div class="kt-wizard-v2__nav-items">
                                                        <a class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                                            <div class="kt-wizard-v2__nav-body">
                                                                <div class="kt-wizard-v2__nav-icon">
                                                                    <i class="flaticon-globe"></i>
                                                                </div>
                                                                <div class="kt-wizard-v2__nav-label">
                                                                    <div class="kt-wizard-v2__nav-label-title">
                                                                        Kejohanan
                                                                    </div>
                                                                    <div class="kt-wizard-v2__nav-label-desc">
                                                                        Masukkan butiran kejohanan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                            <div class="kt-wizard-v2__nav-body">
                                                                <div class="kt-wizard-v2__nav-icon">
                                                                    <i class="flaticon-bus-stop"></i>
                                                                </div>
                                                                <div class="kt-wizard-v2__nav-label">
                                                                    <div class="kt-wizard-v2__nav-label-title">
                                                                        Lokasi dan Tarikh
                                                                    </div>
                                                                    <div class="kt-wizard-v2__nav-label-desc">
                                                                        Pilih tarikh dan lokasi kejohanan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                            <div class="kt-wizard-v2__nav-body">
                                                                <div class="kt-wizard-v2__nav-icon">
                                                                    <i class="flaticon-responsive"></i>
                                                                </div>
                                                                <div class="kt-wizard-v2__nav-label">
                                                                    <div class="kt-wizard-v2__nav-label-title">
                                                                        Pilihan Acara
                                                                    </div>
                                                                    <div class="kt-wizard-v2__nav-label-desc">
                                                                        Masukkan acara bagi kejohanan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <!--end: Form Wizard Nav -->
                                            </div>
                                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">

                                                <!--begin: Form Wizard Form-->
                                                <?php $attributes = array("id" => "kt_form", "name" => "kt_form", "class" => "kt-form");
                                                echo form_open_multipart("events/update/".$event[0]->id, $attributes); ?>

                                                    <!--begin: Form Wizard Step 1-->
                                                    <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                                        <div class="kt-heading kt-heading--md">Masukkan butiran penganjuran</div>
                                                        <div class="kt-form__section kt-form__section--first">
                                                            <div class="kt-wizard-v2__form">
                                                                <div class="form-group">
                                                                    <label>Nama kejohanan</label>
                                                                    <input type="text" class="form-control" name="event_name" placeholder="" value="<?php echo $event[0]->name; ?>" required="">
                                                                    <span class="form-text text-muted">Nama kejohanan berserta tahun penganjuran</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleTextarea">
                                                                        Gambar/Ikon kejohanan
                                                                        <?php if(!empty($event[0]->image)){ ?>
                                                                            <a target="_blank" href="<?php echo base_url().'images/events/'.$event[0]->image; ?>">
                                                                                <img class="kt-hidden-" style="width: 25px; height: 25px;" alt="Pic" src="<?php echo base_url().'images/events/'.$event[0]->image; ?>">
                                                                            </a>
                                                                        <?php } ?>
                                                                    </label>
                                                                    <input class="form-control" type="file" name="event_file">
                                                                    <span class="form-text text-muted">Hanya file 'jpg','png','jpeg','heic' sahaja dibenarkan</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleTextarea">Penerangan tentang kejohanan</label>
                                                                    <textarea class="form-control" name="event_description" rows="3"><?php echo $event[0]->description; ?></textarea>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end: Form Wizard Step 1-->

                                                    <!--begin: Form Wizard Step 2-->
                                                    <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                                        <div class="kt-heading kt-heading--md">Tetapkan lokasi dan tarikh</div>
                                                        <div class="kt-form__section kt-form__section--first">
                                                            <div class="kt-wizard-v2__form">
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group">
                                                                            <label>Nama lokasi penganjuran</label>
                                                                            <input type="text" class="form-control" name="location_name" value="<?php echo $event['location'][0]->location_name; ?>" placeholder="" required="">
                                                                            <span class="form-text text-muted">Contoh: Bangunan Pentadbiran Sukan</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group">
                                                                            <label>URL google map</label>
                                                                            <input type="text" class="form-control" name="url_map" value="<?php echo $event['location'][0]->url_map; ?>" placeholder="URL">
                                                                            <span class="form-text text-muted">Jika ada</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleTextarea">Alamat lokasi penganjuran</label>
                                                                    <textarea class="form-control" name="location_address" rows="3"><?php echo $event['location'][0]->location_address; ?></textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group">
                                                                            <label>Negeri:</label>
                                                                            <select name="location_state" class="form-control">
                                                                                <option value="">Pilih</option>
                                                                                <?php if(count($state_list) > 0){ foreach($state_list as $state){ ?>
                                                                                    <option value="<?php echo $state->id; ?>" <?php if($event['location'][0]->state_id == $state->id){ echo 'selected'; } ?>><?php echo $state->name; ?></option>
                                                                                <?php }} ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <div class="form-group">
                                                                            <label>Bandar</label>
                                                                            <input type="text" class="form-control" name="location_city" value="<?php echo $event['location'][0]->city; ?>" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-12 col-md-9 col-sm-12">
                                                                        <label>Tarikh anjuran</label>
                                                                        <div class='input-group' id='kt_daterangepicker_2'>
                                                                            <input type='text' class="form-control" readonly name="location_date_range" value="<?php echo date("Y-m-d", strtotime($event['location'][0]->date_from)).' / '.date("Y-m-d", strtotime($event['location'][0]->date_to)); ?>" required=""/>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-lg-12 col-md-9 col-sm-12">
                                                                        <label>Tarikh akhir penyertaan</label>
                                                                        <input type="text" class="form-control" id="kt_datepicker_1" readonly name="last_registration_date" value="<?php echo date("m/d/Y", strtotime($event['location'][0]->last_registration_date)); ?>" required="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end: Form Wizard Step 2-->

                                                    <!--begin: Form Wizard Step 3-->
                                                    <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                                        <div class="kt-heading kt-heading--md">Pilih acara</div>
                                                        <div class="kt-form__section kt-form__section--first">
                                                            <div class="kt-wizard-v2__form">
                                                                <div id="kt_repeater_1">
                                                                    <div class="form-group form-group-last row" id="kt_repeater_1">
                                                                        <div data-repeater-list="" class="col-lg-12" >
                                                                            <?php if(count($event['sports']) > 0){ foreach($event['sports'] as $event_sport){ ?>
                                                                            <div data-repeater-item class="form-group row align-items-center" style="margin-top:20px !important; background-color: #F4F6F9; border-radius: 5px; padding: 15px;">
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label >Nama acara</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <select name="acara" class="form-control" required="">
                                                                                                <option value="">Pilih</option>
                                                                                                <?php if(count($sports_list) > 0){ foreach($sports_list as $sport){ ?>
                                                                                                    <option value="<?php echo $sport->id; ?>" <?php if($event_sport->sport_id == $sport->id){ echo 'selected'; } ?>><?php echo $sport->name; ?></option>
                                                                                                <?php }} ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label >Kategori</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <select name="acara_kategori" class="form-control" required="">
                                                                                                <option value="single" <?php echo ($event_sport->event_sports_category == 'single')?'selected':''; ?>>Single</option>
                                                                                                <option value="team" <?php echo ($event_sport->event_sports_category == 'team')?'selected':''; ?>>Team</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <a href="javascript:;" data-repeater-delete="" class="btn-md btn btn-label-danger btn-bold" style="margin-top: 25px; width: 100%;">
                                                                                        <i class="la la-trash-o"></i>
                                                                                        Padam
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single" style="margin-bottom: 7px; margin-top: 35px; font-weight: bold;">
                                                                                                Butiran Veteran
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single" style="margin-bottom: 7px; margin-top: 35px; font-weight: bold;">
                                                                                                Bilangan Jantina
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Umur veteran lelaki</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="veteran_age_male" class="form-control" value="<?php echo ($event_sport->veteran_age_male == 99)?'':$event_sport->veteran_age_male; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Umur veteran perempuan</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="veteran_age_female" class="form-control" value="<?php echo ($event_sport->veteran_age_female == 99)?'':$event_sport->veteran_age_female; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Bilangan veteran</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="veteran_limit" class="form-control" value="<?php echo ($event_sport->veteran_num == 99)?'':$event_sport->veteran_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Bilangan Lelaki</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="male_num" class="form-control" value="<?php echo ($event_sport->male_num == 99)?'':$event_sport->male_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Bilangan Perempuan</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="female_num" class="form-control" value="<?php echo ($event_sport->female_num == 99)?'':$event_sport->female_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single" style="margin-bottom: 7px; margin-top: 35px; font-weight: bold;">
                                                                                                Bilangan Had
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Pengurus</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="pengurus_num" class="form-control" value="<?php echo ($event_sport->pengurus_num == 99)?'':$event_sport->pengurus_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Jurulatih</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="jurulatih_num" class="form-control" value="<?php echo ($event_sport->jurulatih_num == 99)?'':$event_sport->jurulatih_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Pemain</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="pemain_num" class="form-control" value="<?php echo ($event_sport->pemain_num == 99)?'':$event_sport->pemain_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Pemain Kebangsaan</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control col-6">
                                                                                            <input type="number" name="pemain_kebangsaan_num" class="form-control" value="<?php echo ($event_sport->pemain_kebangsaan_num == 99)?'':$event_sport->pemain_kebangsaan_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Fisio</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="fisio_num" class="form-control" value="<?php echo ($event_sport->fisio_num == 99)?'':$event_sport->fisio_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Kitman</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="kitman_num" class="form-control" value="<?php echo ($event_sport->kitman_num == 99)?'':$event_sport->kitman_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Koreografer</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="koreografer_num" class="form-control" value="<?php echo ($event_sport->koreografer_num == 99)?'':$event_sport->koreografer_num; ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                            </div>
                                                                            <?php } } else { ?>
                                                                            <div data-repeater-item class="form-group row align-items-center" style="margin-top:20px !important; background-color: #F4F6F9; border-radius: 5px; padding: 15px;">
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label >Nama acara</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <select name="acara" class="form-control" required="">
                                                                                                <option value="">Pilih</option>
                                                                                                <?php if(count($sports_list) > 0){ foreach($sports_list as $sport){ ?>
                                                                                                    <option value="<?php echo $sport->id; ?>"><?php echo $sport->name; ?></option>
                                                                                                <?php }} ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label >Kategori</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <select name="acara_kategori" class="form-control" required="">
                                                                                                <option value="single">Single</option>
                                                                                                <option value="team">Team</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <a href="javascript:;" data-repeater-delete="" class="btn-md btn btn-label-danger btn-bold" style="margin-top: 25px; width: 100%;">
                                                                                        <i class="la la-trash-o"></i>
                                                                                        Padam
                                                                                    </a>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single" style="margin-bottom: 7px; margin-top: 35px; font-weight: bold;">
                                                                                                Butiran Veteran
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single" style="margin-bottom: 7px; margin-top: 35px; font-weight: bold;">
                                                                                                Bilangan Jantina
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Umur veteran lelaki</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="veteran_age_male" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Umur veteran perempuan</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="veteran_age_female" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Bilangan veteran</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="veteran_limit" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Bilangan Lelaki</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="male_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Bilangan Perempuan</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="female_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single" style="margin-bottom: 7px; margin-top: 35px; font-weight: bold;">
                                                                                                Bilangan Had
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Pengurus</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="pengurus_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Jurulatih</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="jurulatih_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Pemain</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="pemain_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Fisio</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="fisio_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Kitman</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="kitman_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="kt-form__group--inline">
                                                                                        <div class="kt-form__label">
                                                                                            <label class="kt-label m-label--single">Koreografer</label>
                                                                                        </div>
                                                                                        <div class="kt-form__control">
                                                                                            <input type="number" name="koreografer_num" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="d-md-none kt-margin-b-10"></div>
                                                                                </div>
                                                                            </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-group-last row">
                                                                        <div class="col-lg-4">
                                                                            <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                                                                                <i class="la la-plus"></i> Tambah
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--end: Form Wizard Step 3-->

                                                    <!--begin: Form Actions -->
                                                    <div class="kt-form__actions">
                                                        <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                                            Kembali
                                                        </div>
                                                        <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                                            Hantar
                                                        </div>
                                                        <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                                            Seterusnya
                                                        </div>
                                                    </div>

                                                    <!--end: Form Actions -->
                                                <?php echo form_close(); ?>

                                                <!--end: Form Wizard Form-->
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
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/scripts.bundle.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/wizard/wizard-2.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/crud/forms/widgets/bootstrap-daterangepicker.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/crud/forms/widgets/form-repeater.js" type="text/javascript"></script>
                <!--end::Page Scripts -->

                <?php include "template/footer.php"; ?>