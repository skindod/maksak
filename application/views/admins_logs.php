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
                                        <h3 class="kt-subheader__title" style="width: 400px;">Aktiviti Catatan</h3>
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
                                                            Senarai aktiviti
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body kt-portlet__body--fit">
                                                    <div style="padding: 20px;">
                                                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionBox">
                                                        <!--begin::Accordion-->
                                                            <div class="card-body">
                                                                <div class="kt-portlet__body">
                                                                    <!--begin::Section-->
                                                                    <div class="kt-section">
                                                                        <div class="kt-section__content">
                                                                            <table class="table table-striped sortTable">
                                                                                <thead>
                                                                                    <th>No.</th>
                                                                                    <th>Aktiviti</th>
                                                                                    <th>Pemain</th>
                                                                                    <th>Badan Gabungan</th>
                                                                                    <th>Kejohanan</th>
                                                                                    <th>Acara</th>
                                                                                    <th>Dilakukan oleh</th>
                                                                                    <th>Masa dilakukan</th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php $no = 1; if(isset($logs_list) && count($logs_list) > 0){ foreach($logs_list as $log){ ?>
                                                                                    <tr>
                                                                                        <td><?php echo $no; ?></td>
                                                                                        <td><?php echo $log->description; ?></td>
                                                                                        <td><?php echo $log->player_name.'<br>'.$log->player_ic; ?></td>
                                                                                        <td><?php echo $log->badan_name; ?></td>
                                                                                        <td><?php echo $log->event_name; ?></td>
                                                                                        <td><?php echo $log->sport_name; ?></td>
                                                                                        <td><?php echo $log->user_name; ?></td>
                                                                                        <td><?php echo $log->created_date; ?></td>
                                                                                    </tr>
                                                                                    <?php $no++; } } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!--end::Section-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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