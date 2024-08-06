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
                                        <h3 class="kt-subheader__title" style="">Senarai acara ditanding oleh <b><?php echo $player->name; ?></b></h3>
                                        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                        <span class="kt-subheader__desc">Data tahun</span>
                                        <select id="selectYear" onchange="changeYear()">
                                            <?php for($a = date('Y'); $a > 2020; $a--){ ?>
                                                <option value="<?php echo $a; ?>" <?php if($a == $selectYear){ echo 'selected'; } ?>><?php echo $a; ?></option>
                                            <?php } ?>
                                        </select>
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
                                                            Senarai acara
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body kt-portlet__body--fit">
                                                    <div style="padding: 20px;">
                                                        <div class="accordion accordion-solid accordion-toggle-plus" id="accordionBox">
                                                        <!--begin::Accordion-->
                                                        <?php if(isset($player)){  ?>
                                                            <div class="card-body">
                                                                <div class="kt-portlet__body">
                                                                    <!--begin::Section-->
                                                                    <div class="kt-section">
                                                                        <div class="kt-section__content">
                                                                            <table class="table table-striped sortTable">
                                                                                <thead>
                                                                                    <th>Butiran pemain</th>
                                                                                    <th>Butiran jawatan & majikan</th>
                                                                                    <th>Butiran kejohanan</th>
                                                                                    <th>Butiran acara ditanding</th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php foreach($sports_list as $sport){ ?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Nama : <b><?php echo $sport->name; ?></b><br>
                                                                                            Umur & Jantina : <b><?php echo $sport->age.' '; if($sport->sex == 1){ echo '( Lelaki )'; }else{ echo '( Perempuan )'; } ?></b><br>
                                                                                            Tarikh lahir : <b><?php echo $sport->dob_day.'-'.$sport->dob_month.'-'.$sport->dob_year; ?></b><br>
                                                                                            Nombor telefon : <b><?php echo $sport->telephone; ?></b><br>
                                                                                            Email : <b><?php echo $sport->email; ?></b>
                                                                                        </td>
                                                                                        <td>
                                                                                            Majikan : <b><?php echo $sport->employer; ?></b><br>
                                                                                            Jawatan : <b><?php echo $sport->occupation; ?></b><br>
                                                                                            Grade : <b><?php echo $sport->grade_name; ?></b><br>
                                                                                            Taraf jawatan : <b><?php echo $sport->state_of_position; ?></b>
                                                                                        </td>
                                                                                        <td>
                                                                                            Kejohanan : <b><?php echo $sport->event_name; ?></b><br>
                                                                                            Lokasi : <b><?php echo $sport->location_name; ?></b><br>
                                                                                            Tarikh : 
                                                                                            <?php 
                                                                                                $date_from = new DateTime($sport->kejohanan_date_from);
                                                                                                $date_to = new DateTime($sport->kejohanan_date_to);
                                                                                                $formattedDateFrom = $date_from->format('d/m/Y');
                                                                                                $formattedDateTo = $date_to->format('d/m/Y');
                                                                                                echo '<b>'.$formattedDateFrom . ' - ' . $formattedDateTo.'</b>';
                                                                                            ?>
                                                                                        </td>
                                                                                        <td>
                                                                                            Acara : <b><?php echo $sport->sport_name; ?></b><br>
                                                                                            Jawatan : <b><?php echo $sport->registered_position; ?></b>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <?php } ?>
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
            function changeYear() {
                var year = document.getElementById("selectYear").value;
                location.replace("/players/players_join_sports_list/<?php echo $player->id; ?>?year="+year);
            }
        </script>
<?php include "template/footer.php"; ?>