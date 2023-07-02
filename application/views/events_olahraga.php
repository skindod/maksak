<?php include "template/header.php"; ?>
    
<title>MAKSAK</title><!-- comment -->
                
<?php include "template/import-css.php"; ?>

    <!-- begin::Body -->
    <body class="kt-page--fixed kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
			<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

				<!-- begin:: Content Head -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                   
                                    
				</div>
                                <!-- end:: Content Head -->

				<!-- begin:: Content -->
				<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
                                    <?php if($event_details[0]->publish_status == 1){ ?>
                                        <!--Begin::Section-->
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <!--begin:: Widgets/Revenue Change-->
                                                    <div class="kt-portlet kt-portlet--height-fluid">
                                                        <div class="kt-portlet__head kt-portlet__head--lg">
                                                            <div class="kt-portlet__head-label">
                                                                <h3 class="kt-portlet__head-title">
                                                                    Senarai pemain
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget14">
                                                            <h4><?php echo $event_details[0]->name; ?></h4>
                                                            <table class="table table-striped" id="sortTable">
                                                                <thead>
                                                                    <th>No.</th>
                                                                    <th>Nama</th>
                                                                    <th>IC</th>
                                                                    <th>Badan Gabungan</th>
                                                                    <?php foreach($report['sport_list'] as $sport){ ?>
                                                                        <th><?php echo $sport->name; ?></th>
                                                                    <?php } ?>
                                                                </thead>
                                                                <tbody>
                                                                    <?php if(isset($report['data']) && count($report['data']) > 0){$num = 1; foreach($report['data'] as $data){  ?>
                                                                        <tr>
                                                                            <th scope="row"><?php echo $num; ?></th>
                                                                            <td><?php echo $data['name']; ?></td>
                                                                            <td><?php echo $data['ic']; ?></td>
                                                                            <td><?php echo $data['badan_gabungan']; ?></td>
                                                                            <?php foreach($report['sport_list'] as $sport){ ?>
                                                                                <td><?php if($data[$sport->name]){ echo '<h5>Daftar</h5>'; }else{ } ?></td>
                                                                            <?php } ?>
                                                                        </tr>
                                                                    <?php $num++; } } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Revenue Change-->
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
		<!--begin::Page Vendors(used by this page) -->
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script> <!-- for donut chart -->
		<!--<script src="<?php echo base_url(); ?>asset/assets/js/data-local.js" type="text/javascript"></script>  for dropdown keputusan table -->
		<!--end::Page Scripts -->
                <script>
                        $('#sortTable').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                'csvHtml5',
                                'pdf',
                            ]
                        });
                </script>
<?php include "template/footer.php"; ?>