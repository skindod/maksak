<?php include "template/header.php"; ?>
    
<title>MAKSAK</title><!-- comment -->
                
<?php include "template/import-css.php"; ?>

    <!-- begin::Body -->
    <body class="kt-page--fixed kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
        <?php if($public_mode != true){ ?>
            <!-- begin:: Page -->
            <?php include "template/header-mobile.php"; ?>
        <?php } ?>
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">
		<?php if($public_mode != true){ ?>			
                    <?php include "template/header-desktop.php"; ?>
                <?php } ?>			
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
			<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<!-- begin:: Content Head -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                    <div class="kt-subheader__main">
                                        <h3 class="kt-subheader__title" style="width: 400px;">Butiran Kejohanan</h3>
                                    </div>
                                    <div class="kt-subheader__toolbar">
                                        <div class="kt-subheader__wrapper">
                                            <button class="btn btn-success btn-sm" onclick="copyLink()"><i class="flaticon-paper-plane-1"></i>&nbsp;Kongsi pautan umum</button>
                                            <input type="hidden" id="urlLink" value="<?php echo base_url().ltrim($_SERVER['REQUEST_URI'], '/'); ?>">
					</div>
                                    </div>
				</div>
                                <!-- end:: Content Head -->

				<!-- begin:: Content -->
				<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">

                                    <!--Begin::Dashboard 2-->
                                    <!--begin:: event row-->
                                    <div class="kt-portlet">
                                        <div class="kt-portlet__body">
                                            <div class="kt-widget kt-widget--user-profile-3">
                                                <div class="kt-widget__top">
                                                    <div class="kt-widget__content">
                                                        <div class="kt-widget__head">
                                                            <a href="" class="kt-widget__username">
                                                                <?php echo $event_details[0]->name; ?>
                                                                <i class="flaticon2-correct kt-font-success"></i>
                                                            </a>
                                                            <div class="kt-widget__action">
                                                                <?php if($event_details[0]->publish_status == 0){ ?>
                                                                    <a href="<?php echo base_url().'events/update/'.$event_details[0]->id; ?>">
                                                                        <button type="button" class="btn btn-label-brand btn-sm btn-upper">kemaskini</button>&nbsp;
                                                                    </a>
                                                                    <a data-toggle="modal" data-target="#publish<?php echo $event_details[0]->id; ?>" href="#">
                                                                        <button type="button" class="btn btn-success btn-sm btn-upper">terbit</button>
                                                                    </a>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="publish<?php echo $event_details[0]->id; ?>" tabindex="-1" role="dialog" aria-labelledby="taskform" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content" style="">
                                                                                <?php $attributes = array("id" => "publishform".$event_details[0]->id, "name" => "publishform".$event_details[0]->id);
                                                                                echo form_open_multipart("events/publish", $attributes);?>
                                                                                <!-- Modal Header -->
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title">Terbit kejohanan</h4>
                                                                                </div>
                                                                                <!-- Modal Body -->
                                                                                <div class="modal-body">
                                                                                    <input type="hidden" value="<?php echo $event_details[0]->id; ?>" name="event_id">
                                                                                    Anda pasti ingin terbit kejohanan ini?<br>
                                                                                    Setiap badan gabungan akan terima e-mail dan mulakan pendaftaran pemain.
                                                                                    Kejohanan juga tidak boleh dikemaskini lagi selepas ini.
                                                                                </div>
                                                                                <!-- Modal Footer -->
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                                                    <input type="submit" value="Ya" class="btn btn-success" />
                                                                                </div>
                                                                                <?php echo form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget__subhead">
                                                                <a><i class="flaticon-placeholder-2"></i><?php echo $event_details['location'][0]->location_name; ?>, <?php echo $event_details['location'][0]->city; ?></a>
                                                                <a><i class="flaticon2-calendar-3"></i>
                                                                    <?php 
                                                                        $from = date("d F Y", strtotime($event_details['location'][0]->date_from)); 
                                                                        $to = date("d F Y", strtotime($event_details['location'][0]->date_to)); 
                                                                        echo $from.' - '.$to;
                                                                    ?>
                                                                </a>
                                                        </div>
                                                        <div class="kt-widget__info">
                                                            <div class="kt-widget__desc">
                                                                <?php echo $event_details[0]->description; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end:: event row-->
                                    
                                    <!--Begin::Section-->
                                    <div class="row">
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
                                                                            <td style=" width: 50%;">Acara</td>
                                                                            <td style=" width: 50%;">Jumlah Badan Berdaftar</td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(count($event_details['sports']) > 0){ foreach($event_details['sports'] as $sport){ ?>
                                                                        <tr>
                                                                            <td>
                                                                                <span class="kt-widget11__title"><?php echo $sport->sport_name; ?></span>
                                                                            </td>
                                                                            <td><?php echo $sport->jumlah_badan_berdaftar; ?></td>
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
                                        <div class="col-xl-8">
                                            <!--begin:: Widgets/status-->
                                            <div class="kt-portlet kt-portlet--height-fluid">
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                            <h3 class="kt-widget14__title">
                                                                Lokasi penganjuran
                                                            </h3>
                                                            <span class="kt-widget14__desc">
                                                                    <?php echo $event_details['location'][0]->location_name; ?>, <?php echo $event_details['location'][0]->city; ?>
                                                            </span>
                                                    </div>
                                                    <div class="kt-widget14__content">
                                                        <?php if($event_details['location'][0]->url_map != ''){ ?>
                                                            <iframe src="<?php echo $event_details['location'][0]->url_map; ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end:: Widgets/status-->
                                            
					</div>
                                        
                                    </div>
                                    <!--End::Section-->
                                    <?php if($event_details[0]->publish_status == 1){ ?>
                                        <!--Begin::Section-->
                                            <div class="row">
                                                <?php if($public_mode != true){ ?>	
                                                <?php //if($event_details['location'][0]->closed_registration == false){ ?>
                                                <div class="col-xl-12">
                                                    <!--begin:: Widgets/Revenue Change-->
                                                    <div class="kt-portlet kt-portlet--height-fluid">
                                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                                            <div class="kt-portlet__head-label">
                                                                <h3 class="kt-portlet__head-title">
                                                                        Daftar pemain baharu
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget14">
                                                            <?php $attributes = array("id" => "forgetaccountform", "name" => "forgetaccountform", "class" => "kt-form");
                                                            echo form_open("events/register_player/".$event_details[0]->id, $attributes); ?>
                                                            <!--begin::Widget 11-->
                                                            <div class="kt-widget11 row">
                                                                <div class="col-md-3 form-group">
                                                                    <label>Pilih badan</label>
                                                                    <select class="form-control selectpicker" name="state_id" required=""
                                                                            <?php if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){ echo 'disabled'; } ?>
                                                                    >
                                                                        <?php foreach($badan_gabungan_list as $badan){ ?>
                                                                            <option value="<?php echo $badan->id; ?>"
                                                                                    <?php if(isset($_SESSION['badan_gabungan_id']) && $_SESSION['badan_gabungan_id'] != 0){
                                                                                        if($_SESSION['badan_gabungan_id'] == $badan->id){ echo 'selected'; }
                                                                                    } ?>
                                                                            >
                                                                                <?php echo $badan->name; ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <input type="hidden" value="<?php echo $_SESSION['badan_gabungan_id']; ?>" name="temp_state_id">
                                                                </div>
                                                                <div class="col-md-3 form-group">
                                                                    <label>Pilih acara</label>
                                                                    <select class="form-control selectpicker" name="sport_id" required="">
                                                                        <?php if(count($event_details['sports']) > 0){ foreach($event_details['sports'] as $sport){ ?>
                                                                            <option value="<?php echo $sport->sport_id; ?>"><?php echo $sport->sport_name; ?></option>
                                                                        <?php }} ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 form-group">
                                                                    <label>Masukkan no kad pengenalan pemain</label>
                                                                    <input type="ic" class="form-control" aria-describedby="ic" name="ic" placeholder="Sila isikan tanpa sempang '-'" required="">
                                                                </div>
                                                                <div class="col-md-2 form-group">
                                                                    <label>Pilih jawatan</label>
                                                                    <select class="form-control selectpicker" name="jawatan" required="">
                                                                        <option value="">Sila pilih</option>
                                                                        <option value="pengurus">Pengurus</option>
                                                                        <option value="jurulatih">Jurulatih</option>
                                                                        <option value="pemain">Pemain</option>
                                                                        <option value="fisioterapi">Fisio</option>
                                                                        <option value="kitman">Kitman</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-1 form-group">
                                                                    <button type="submit" class="btn btn-primary btn-md btn-upper pull-right" style="margin-top: 25px;">tambah</button>
                                                                </div>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                            <!--end::Widget 11-->
                                                        </div>
                                                        <div class="kt-widget14">
                                                            <?php if(count($registered_list) > 0){ foreach($registered_list as $reg){  ?>
                                                                <h5><?php echo $reg->sport_name; ?></h5>
                                                                <table class="table table-striped" id="sortTable">
                                                                    <thead>
                                                                        <th>No.</th>
                                                                        <th>Nama</th>
                                                                        <th>Badan Gabungan</th>
                                                                        <th>Jawatan</th>
                                                                        <th>Umur</th>
                                                                        <th>Jantina</th>
                                                                        <th>Taraf Jawatan</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php if(count($reg->registered_list) > 0){$num = 1; foreach($reg->registered_list as $player){  ?>
                                                                            <tr>
                                                                                <th scope="row"><?php echo $num; ?></th>
                                                                                <td><?php echo $player->name; ?></td>
                                                                                <td><?php echo $player->badan_gabungan_name; ?></td>
                                                                                <td><?php echo ucfirst($player->playing_position); ?></td>
                                                                                <td>
                                                                                    <?php echo $player->age; ?>
                                                                                    <?php if($player->veteran_status == 1){ ?>
                                                                                        <span class="kt-badge kt-badge--inline kt-badge--warning">Veteran</span>
                                                                                    <?php } ?>
                                                                                </td>
                                                                                <td><?php if($player->sex == '1'){ echo 'Lelaki'; }else{ echo 'Perempuan'; } ?></td>
                                                                                <td>
                                                                                    <?php if($player->state_of_position == 'tetap'){ ?>
                                                                                        Tetap
                                                                                    <?php } else if($player->state_of_position == 'sementara'){ ?>
                                                                                        Sementara 
                                                                                        <a href="<?php echo base_url().'images/surat_pengesahan_jabatan/'.$player->surat_pengesahan_jabatan; ?>" target="_blank" data-toggle="tooltip" title="Surat pengesahan jabatan"><i class="flaticon2-file-1"></i></a>
                                                                                    <?php } else if($player->state_of_position == 'contract of service'){ ?>
                                                                                        Contract of Service 
                                                                                        <a href="<?php echo base_url().'images/sah_surat_pelantikan/'.$player->sah_surat_pelantikan; ?>" target="_blank" data-toggle="tooltip" title="Sah surat pelantikan"><i class="flaticon2-file-1"></i></a>
                                                                                        <a href="<?php echo base_url().'images/kad_pengenalan/'.$player->kad_pengenalan; ?>" target="_blank" data-toggle="tooltip" title="Kad pengenalan"><i class="flaticon2-file-1"></i></a>
                                                                                        <a href="<?php echo base_url().'images/penyata_gaji/'.$player->penyata_gaji; ?>" target="_blank" data-toggle="tooltip" title="Penyata gaji"><i class="flaticon2-file-1"></i></a>
                                                                                        <a href="<?php echo base_url().'images/caruman_kwsp/'.$player->caruman_kwsp; ?>" target="_blank" data-toggle="tooltip" title="Caruman KWSP"><i class="flaticon2-file-1"></i></a>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php $num++; } } else { ?>
                                                                            <tr>
                                                                                <th colspan="7">Tiada pemain didaftar lagi</th>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            <?php } } ?>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Revenue Change-->
                                                </div>
                                                <?php //} ?>
                                                <?php } ?>
                                                <div class="col-xl-12">
                                                    <div class="kt-portlet kt-portlet--mobile">
                                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                                            <div class="kt-portlet__head-label">
                                                                <h3 class="kt-portlet__head-title">
                                                                        Senarai daftar pemain
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-portlet__body">
                                                            <?php $attributes = array("id" => "search", "name" => "search", "class" => "kt-form");
                                                            echo form_open("events/search_player/".$event_details[0]->id, $attributes); ?>
                                                            <!--begin: Search Form -->
                                                            <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                                                <div class="row align-items-center">
                                                                    <div class="col-xl-12">
                                                                        <div class="row align-items-center" style="margin-bottom: 20px;">
                                                                            <div class="col-md-11 kt-margin-b-20-tablet-and-mobile">
                                                                                <div class="kt-input-icon kt-input-icon--left">
                                                                                    <input type="text" class="form-control" placeholder="Nama pemain" name="name" id="generalSearch">
                                                                                    <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                                                        <span><i class="la la-search"></i></span>
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-1 kt-margin-b-20-tablet-and-mobile">
                                                                                <button type="submit" class="btn btn-primary btn-upper">cari</button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row align-items-center">
                                                                            <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                                                                                <div class="kt-form__group kt-form__group--inline">
                                                                                    <div class="kt-form__label">
                                                                                            <label>Acara:</label>
                                                                                    </div>
                                                                                    <div class="kt-form__control">
                                                                                        <select class="form-control selectpicker" name="sport_id" id="kt_form_status">
                                                                                            <option value="0" <?php if(isset($search_param['sport_id']) && $search_param['sport_id'] == '0'){ echo 'selected'; } ?> >Papar semua</option>
                                                                                            <?php if(count($event_details['sports']) > 0){ foreach($event_details['sports'] as $sport){ ?>
                                                                                                <option value="<?php echo $sport->sport_id; ?>" <?php if(isset($search_param['sport_id']) && $search_param['sport_id'] == $sport->sport_id){ echo 'selected'; } ?> ><?php echo $sport->sport_name; ?></option>
                                                                                            <?php }} ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                                                                                <div class="kt-form__group kt-form__group--inline">
                                                                                    <div class="kt-form__label">
                                                                                        <label>Badan:</label>
                                                                                    </div>
                                                                                    <div class="kt-form__control">
                                                                                        <select class="form-control selectpicker" name="state_id" id="kt_form_type">
                                                                                            <option value="0" <?php if(isset($search_param['state_id']) && $search_param['state_id'] == '0'){ echo 'selected'; } ?> >Papar semua</option>
                                                                                            <?php foreach($badan_gabungan_list as $badan){ ?>
                                                                                                <option value="<?php echo $badan->id; ?>" <?php if(isset($search_param['state_id']) && $search_param['state_id'] == $badan->id){ echo 'selected'; } ?> ><?php echo $badan->name; ?></option>
                                                                                            <?php } ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                                                                <div class="kt-form__group kt-form__group--inline">
                                                                                    <div class="kt-form__label">
                                                                                        <label>Jawatan:</label>
                                                                                    </div>
                                                                                    <div class="kt-form__control">
                                                                                        <select class="form-control selectpicker" name="jawatan" id="kt_form_type">
                                                                                                <option value="0" <?php if(isset($search_param['jawatan']) && $search_param['jawatan'] == '0'){ echo 'selected'; } ?> >Papar semua</option>
                                                                                                <option value="pengurus" <?php if(isset($search_param['jawatan']) && $search_param['jawatan'] == 'pengurus'){ echo 'selected'; } ?> >Pengurus</option>
                                                                                                <option value="jurulatih" <?php if(isset($search_param['jawatan']) && $search_param['jawatan'] == 'jurulatih'){ echo 'selected'; } ?> >Jurulatih</option>
                                                                                                <option value="pemain" <?php if(isset($search_param['jawatan']) && $search_param['jawatan'] == 'pemain'){ echo 'selected'; } ?> >Pemain</option>
                                                                                                <option value="fisioterapi" <?php if(isset($search_param['jawatan']) && $search_param['jawatan'] == 'fisioterapi'){ echo 'selected'; } ?> >Fisio</option>
                                                                                                <option value="kitman" <?php if(isset($search_param['jawatan']) && $search_param['jawatan'] == 'kitman'){ echo 'selected'; } ?> >Kitman</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                                                                <div class="kt-form__group kt-form__group--inline">
                                                                                    <div class="kt-form__label">
                                                                                        <label>Jantina:</label>
                                                                                    </div>
                                                                                    <div class="kt-form__control">
                                                                                        <select class="form-control selectpicker" name="gender" id="kt_form_type">
                                                                                                <option value="0" <?php if(isset($search_param['gender']) && $search_param['gender'] == '0'){ echo 'selected'; } ?> >Papar semua</option>
                                                                                                <option value="1" <?php if(isset($search_param['gender']) && $search_param['gender'] == '1'){ echo 'selected'; } ?> >Lelaki sahaja</option>
                                                                                                <option value="2" <?php if(isset($search_param['gender']) && $search_param['gender'] == '2'){ echo 'selected'; } ?> >Perempuan sahaja</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                                                                <div class="kt-form__group kt-form__group--inline">
                                                                                    <div class="kt-form__label">
                                                                                        <label>Status:</label>
                                                                                    </div>
                                                                                    <div class="kt-form__control">
                                                                                        <select class="form-control selectpicker" name="veteran_status" id="kt_form_type">
                                                                                                <option value="2" <?php if(isset($search_param['veteran_status']) && $search_param['veteran_status'] == '2'){ echo 'selected'; } ?> >Papar semua</option>
                                                                                                <option value="1" <?php if(isset($search_param['veteran_status']) && $search_param['veteran_status'] == '1'){ echo 'selected'; } ?> >Veteran sahaja</option>
                                                                                                <option value="0" <?php if(isset($search_param['veteran_status']) && $search_param['veteran_status'] == '0'){ echo 'selected'; } ?> >Bukan veteran sahaja</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end: Search Form -->
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                        <div class="kt-portlet__body kt-portlet__body--fit">
                                                            <div style="padding: 20px;">
                                                                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionBox">
                                                                <!--begin::Accordion-->
                                                                <?php if(isset($search_list) && count($search_list) > 0){ foreach($search_list as $search){ ?>
                                                                    <?php if(isset($search->data_list)){ ?>
                                                                        <div class="card">
                                                                            <div class="card-header" id="heading<?php echo $search->id; ?>">
                                                                                <div class="card-title collapsed" data-toggle="collapse" data-target="#<?php echo 'box'.$search->id; ?>" aria-expanded="false" aria-controls="collapse">
                                                                                    <?php echo $search->name; ?>
                                                                                </div>
                                                                            </div>
                                                                            <div id="<?php echo 'box'.$search->id; ?>" class="collapse" aria-labelledby="heading<?php echo $search->id; ?>" data-parent="#accordionBox" style="">

                                                                                <div class="card-body">
                                                                                    <div class="kt-portlet__body">
                                                                                        <!--begin::Section-->
                                                                                        <div class="kt-section">
                                                                                            <div class="kt-section__content">
                                                                                                <table class="table table-striped" id="sortTable">
                                                                                                    <thead>
                                                                                                        <th>No.</th>
                                                                                                        <th>Nama</th>
                                                                                                        <th>Jawatan</th>
                                                                                                        <th>Acara</th>
                                                                                                        <th>Umur</th>
                                                                                                        <th>Jantina</th>
                                                                                                        <th>Taraf Jawatan</th>
                                                                                                    </thead>
                                                                                                    <tbody>
                                                                                                        <?php $num = 1; foreach($search->data_list as $data){ ?>
                                                                                                        <tr>
                                                                                                            <th scope="row"><?php echo $num; ?></th>
                                                                                                            <td><?php echo $data->name; ?></td>
                                                                                                            <td><?php echo ucfirst($data->playing_position); ?></td>
                                                                                                            <td><?php echo $data->sport_name; ?></td>
                                                                                                            <td>
                                                                                                                <?php echo $data->age; ?>
                                                                                                                <?php if($data->veteran_status == 1){ ?>
                                                                                                                    <span class="kt-badge kt-badge--inline kt-badge--warning">Veteran</span>
                                                                                                                <?php } ?>
                                                                                                            </td>
                                                                                                            <td><?php if($data->sex == '1'){ echo 'Lelaki'; }else{ echo 'Perempuan'; } ?></td>
                                                                                                            <td>
                                                                                                                <?php if($data->state_of_position == 'tetap'){ ?>
                                                                                                                    Tetap
                                                                                                                <?php } else if($data->state_of_position == 'sementara'){ ?>
                                                                                                                    Sementara 
                                                                                                                    <a href="<?php echo base_url().'images/surat_pengesahan_jabatan/'.$data->surat_pengesahan_jabatan; ?>" target="_blank" data-toggle="tooltip" title="Surat pengesahan jabatan"><i class="flaticon2-file-1"></i></a>
                                                                                                                <?php } else if($data->state_of_position == 'contract of service'){ ?>
                                                                                                                    Contract of Service 
                                                                                                                    <a href="<?php echo base_url().'images/sah_surat_pelantikan/'.$data->sah_surat_pelantikan; ?>" target="_blank" data-toggle="tooltip" title="Sah surat pelantikan"><i class="flaticon2-file-1"></i></a>
                                                                                                                    <a href="<?php echo base_url().'images/kad_pengenalan/'.$data->kad_pengenalan; ?>" target="_blank" data-toggle="tooltip" title="Kad pengenalan"><i class="flaticon2-file-1"></i></a>
                                                                                                                    <a href="<?php echo base_url().'images/penyata_gaji/'.$data->penyata_gaji; ?>" target="_blank" data-toggle="tooltip" title="Penyata gaji"><i class="flaticon2-file-1"></i></a>
                                                                                                                    <a href="<?php echo base_url().'images/caruman_kwsp/'.$data->caruman_kwsp; ?>" target="_blank" data-toggle="tooltip" title="Caruman KWSP"><i class="flaticon2-file-1"></i></a>
                                                                                                                <?php } ?>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <?php $num++; } ?>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--end::Section-->
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                <?php }} ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <!--End::Section-->
                                        <!--End::Dashboard 2-->
                                    <?php } ?>
				</div>
                                <!-- end:: Content -->
                            </div>
			</div>
                    </div>

		<?php include "template/footer-page.php"; ?>		

		<?php include "template/global-script.php"; ?>
                <script type="text/javascript">
			$('#sortTable').DataTable();
		</script>
		<!--begin::Page Vendors(used by this page) -->
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script> <!-- for donut chart -->
		<!--<script src="<?php echo base_url(); ?>asset/assets/js/data-local.js" type="text/javascript"></script>  for dropdown keputusan table -->
		<!--end::Page Scripts -->
                <script>
                    function copyLink() {
                        var inputc = document.body.appendChild(document.createElement("input"));
                        inputc.value = window.location.href;
                        inputc.focus();
                        inputc.select();
                        document.execCommand('copy');
                        inputc.parentNode.removeChild(inputc);
                        alert("Pautan telah disalin.");
                    }
                </script>
<?php include "template/footer.php"; ?>