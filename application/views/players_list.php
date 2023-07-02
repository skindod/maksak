<?php include "template/header.php"; ?>
    
<title>MAKSAK</title><!-- comment -->
                
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
                                        <h3 class="kt-subheader__title" style="width: 400px;">Pemain</h3>
                                    </div>
				</div>
                                <!-- end:: Content Head -->

				<!-- begin:: Content -->
				<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">

                                    <!--Begin::Section-->
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-portlet kt-portlet--mobile">
                                                <div class="kt-portlet__head kt-portlet__head--lg">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                            Cari pemain
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body">
                                                    <?php $attributes = array("id" => "search", "name" => "search", "class" => "kt-form");
                                                    echo form_open("players/search_player", $attributes); ?>
                                                    <!--begin: Search Form -->
                                                    <div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
                                                        <div class="row align-items-center">
                                                            <div class="col-xl-12">
                                                                <div class="row align-items-center" style="margin-bottom: 20px;">
                                                                    <div class="col-md-11 kt-margin-b-20-tablet-and-mobile">
                                                                        <div class="kt-input-icon kt-input-icon--left">
                                                                            <input type="text" class="form-control" placeholder="IC pemain (cth: 900111551234)" name="ic" id="generalSearch" required="">
                                                                            <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                                                                <span><i class="la la-search"></i></span>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1 kt-margin-b-20-tablet-and-mobile">
                                                                        <button type="submit" class="btn btn-primary btn-upper">cari</button>
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
                                                        <?php if(isset($player) && is_object($player)){ ?>
                                                            <div class="card-body">
                                                                <div class="kt-portlet__body">
                                                                    <!--begin::Section-->
                                                                    <div class="kt-section">
                                                                        <div class="kt-section__content">
                                                                            <table class="table table-striped sortTable">
                                                                                <thead>
                                                                                    <th>Nama</th>
                                                                                    <th>Email</th>
                                                                                    <th>Tarikh Lahir</th>
                                                                                    <th>Jantina</th>
                                                                                    <th>Taraf Jawatan</th>
                                                                                    <th>Kemaskini</th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <a target="_blank" href="<?php $pic = 'default_avatar.jpeg'; if(!empty($player->passport_pic)){ $pic = $player->passport_pic; } echo base_url() . 'images/passport_pic/' . $pic; ?>"><img class="kt-hidden-" style="width: 25px; height: 25px;" alt="Pic" src="<?php $pic = 'default_avatar.jpeg'; if(!empty($player->passport_pic)){ $pic = $player->passport_pic; } echo base_url() . 'images/passport_pic/' . $pic; ?>" /></a>
                                                                                            <?php echo strtoupper($player->name); ?>
                                                                                        </td>
                                                                                        <td><?php echo $player->email; ?></td>
                                                                                        <td><?php echo $player->dob_day.'-'.$player->dob_month.'-'.$player->dob_year; ?></td>
                                                                                        <td><?php if($player->sex == 1){ echo 'Lelaki'; }else{ echo 'Perempuan'; } ?></td>
                                                                                        <td><?php echo ucfirst($player->state_of_position); ?></td>
                                                                                        <td>
                                                                                            <a href="<?php echo base_url().'players/update/'.$player->id; ?>" class="btn kt-subheader__btn-primary btn-icon" target="_blank">
                                                                                                <i class="flaticon2-edit"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Section-->
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End::Section-->
                                    <!--Begin::Section-->
                                    <!-- <div class="row">
                                        <div class="col-xl-12">
                                            <div class="kt-portlet kt-portlet--mobile">
                                                <div class="kt-portlet__head kt-portlet__head--lg">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                            Senarai pemain baru daftar
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body kt-portlet__body--fit">
                                                    <div style="padding: 20px;">
                                                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionBox">
                                                            <div class="card-body">
                                                                <div class="kt-portlet__body">
                                                                    <div class="kt-section">
                                                                        <div class="kt-section__content">
                                                                            <table class="table table-striped sortTable">
                                                                                <thead>
                                                                                    <th>Nama</th>
                                                                                    <th>Badan Gabungan</th>
                                                                                    <th>Email</th>
                                                                                    <th>Tarikh Lahir</th>
                                                                                    <th>Jantina</th>
                                                                                    <th>Taraf Jawatan</th>
                                                                                    <th>Kemaskini</th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php if(isset($players_list) && count($players_list) > 0){ foreach($players_list as $player){ ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <a target="_blank" href="<?php $pic = 'default_avatar.jpeg'; if(!empty($player->passport_pic)){ $pic = $player->passport_pic; } echo base_url() . 'images/passport_pic/' . $pic; ?>"><img class="kt-hidden-" style="width: 25px; height: 25px;" alt="Pic" src="<?php $pic = 'default_avatar.jpeg'; if(!empty($player->passport_pic)){ $pic = $player->passport_pic; } echo base_url() . 'images/passport_pic/' . $pic; ?>" /></a>
                                                                                            <a target="_blank" href="/players/details?id=<?php echo $player->id; ?>"><?php echo strtoupper($player->name); ?></a>
                                                                                        </td>
                                                                                        <td><?php echo $player->badan_name; ?></td>
                                                                                        <td><?php echo $player->email; ?></td>
                                                                                        <td><?php echo $player->dob_day.'-'.$player->dob_month.'-'.$player->dob_year; ?></td>
                                                                                        <td><?php if($player->sex == 1){ echo 'Lelaki'; }else{ echo 'Perempuan'; } ?></td>
                                                                                        <td><?php echo ucfirst($player->state_of_position); ?></td>
                                                                                        <td>
                                                                                            <a href="<?php echo base_url().'players/update/'.$player->id; ?>" class="btn kt-subheader__btn-primary btn-icon" target="_blank">
                                                                                                <i class="flaticon2-edit"></i>
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!--End::Section-->
				</div>
                                <!-- end:: Content -->
                            </div>
			</div>
                    </div>
		<?php include "template/footer-page.php"; ?>		

		<?php include "template/global-script.php"; ?>
		<!--begin::Page Vendors(used by this page) -->
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script> <!-- for donut chart -->
		<!--<script src="<?php echo base_url(); ?>asset/assets/js/data-local.js" type="text/javascript"></script>  for dropdown keputusan table -->
		<!--end::Page Scripts -->
                <script>
                </script>
<?php include "template/footer.php"; ?>