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
                                    <h3 class="kt-subheader__title">Senarai Kejohanan</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">Data tahun</span>
                                    <select id="selectYear" onchange="changeYear()">
                                        <?php for($a = date('Y'); $a > 2020; $a--){ ?>
                                            <option value="<?php echo $a; ?>" <?php if($a == $selectYear){ echo 'selected'; } ?>><?php echo $a; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="kt-subheader__toolbar">
                                    <div class="kt-subheader__wrapper">
                                        <span class="kt-subheader__desc"><i class="flaticon2-calendar-1"></i> <?php echo $malayMonths[$month] . ' ' . $day; ?></span>
                                    </div>
                                </div>
                            </div>

                            <!-- end:: Content Head -->

                            <!-- begin:: Content -->
                            <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
                                <?php if (count($events_list) > 0) {
                                        foreach ($events_list as $event) { ?>
                                    <!--Begin::Section-->
                                    <div class="row">

                                    
                                            <!--begin:: event row-->
                                            <div class="kt-portlet">
                                                <div class="kt-portlet__body">
                                                    <div class="kt-widget kt-widget--user-profile-3">
                                                        <div class="kt-widget__top">
                                                            <div class="kt-widget__content">
                                                                <div class="kt-widget__head">
                                                                    <a class="kt-widget__username">
                                                                        <?php echo $event->name; ?>
                                                                        <?php if($event->publish_status == 0){ ?>
                                                                            <span class="kt-badge kt-badge--inline kt-badge--warning">Belum diterbit</span>
                                                                        <?php } else if($event->publish_status == 1){ ?>
                                                                            <span class="kt-badge kt-badge--inline kt-badge--success">Terbit</span>
                                                                        <?php } else if($event->publish_status == 2){ ?>
                                                                            <span class="kt-badge kt-badge--inline kt-badge--danger">Dibatalkan</span>
                                                                        <?php } ?>
                                                                    </a>
                                                                    <div class="kt-widget__action">
                                                                        <?php if($_SESSION['role'] == 0){ ?>
                                                                            <button type="button" class="btn btn-secondary btn-sm btn-upper" onclick="openModal(<?php echo $event->id; ?>)">ubah tarikh tutup pendaftaran</button>&nbsp;
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="dateTimeModal<?php echo $event->id; ?>" tabindex="-1" role="dialog" aria-labelledby="dateTimeModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <?php $attributes = array("id" => "changedateform", "name" => "changedateform");
                                                                                        echo form_open_multipart("events/change_date", $attributes);?>
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title" id="dateTimeModalLabel">Ubah tarik tutup pendaftaran</h5>
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                    <span aria-hidden="true">&times;</span>
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="form-group">
                                                                                                    <label for="datetime">Pilih tarikh :</label>
                                                                                                    <input type="text" class="form-control" id="kt_datepicker_1" readonly name="last_registration_date" required="" />
                                                                                                    <input type="hidden" name="event_id" value="<?php echo $event->id; ?>" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                                <input type="submit" value="Hantar" class="btn btn-success" />
                                                                                            </div>
                                                                                        <?php echo form_close(); ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                        <a href="<?php echo base_url().'events/details/'.$event->id; ?>">
                                                                            <button type="button" class="btn btn-primary btn-sm btn-upper">butiran</button>&nbsp;
                                                                        </a>
                                                                        <?php if($event->publish_status == 0){ ?>
                                                                            <a href="<?php echo base_url().'events/update/'.$event->id; ?>">
                                                                                <button type="button" class="btn btn-label-brand btn-sm btn-upper">kemaskini</button>&nbsp;
                                                                            </a>
                                                                            <a data-toggle="modal" data-target="#publish<?php echo $event->id; ?>" href="#">
                                                                                <button type="button" class="btn btn-success btn-sm btn-upper">terbit</button>
                                                                            </a>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="publish<?php echo $event->id; ?>" tabindex="-1" role="dialog" aria-labelledby="taskform" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content" style="">
                                                                                        <?php $attributes = array("id" => "publishform".$event->id, "name" => "publishform".$event->id);
                                                                                        echo form_open_multipart("events/publish", $attributes);?>
                                                                                        <!-- Modal Header -->
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">Terbit kejohanan</h4>
                                                                                        </div>
                                                                                        <!-- Modal Body -->
                                                                                        <div class="modal-body">
                                                                                            <input type="hidden" value="<?php echo $event->id; ?>" name="event_id">
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
                                                                        <?php } else if($event->publish_status == 1){ ?>
                                                                            <?php if($event->location[0]->event_date_status == 'past' || $event->location[0]->event_date_status == 'current'){ ?>
                                                                            <a href="<?php echo base_url() . 'result/index/' . $event->id; ?>">
                                                                                <button type="button" class="btn btn-warning btn-sm btn-upper">Papan Keputusan</button>
                                                                            </a>
                                                                            <?php } ?>
                                                                            <?php if($event->location[0]->event_date_status == 'coming'){ ?>
                                                                            <a data-toggle="modal" data-target="#cancel<?php echo $event->id; ?>" href="#">
                                                                                <button type="button" class="btn btn-danger btn-sm btn-upper">batal kejohanan</button>
                                                                            </a>

                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="cancel<?php echo $event->id; ?>" tabindex="-1" role="dialog" aria-labelledby="taskform" aria-hidden="true">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content" style="">
                                                                                        <?php $attributes = array("id" => "publishform".$event->id, "name" => "publishform".$event->id);
                                                                                        echo form_open_multipart("events/unpublish", $attributes);?>
                                                                                        <!-- Modal Header -->
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">Batal kejohanan</h4>
                                                                                        </div>
                                                                                        <!-- Modal Body -->
                                                                                        <div class="modal-body">
                                                                                            <input type="hidden" value="<?php echo $event->id; ?>" name="event_id">
                                                                                            Anda pasti ingin batal kejohanan ini?<br>
                                                                                            Sistem akan menghantar email kepada semua ahli badan gabungan. Sila isi sebab-sebab pembatalan di bawah.
                                                                                            <textarea class="form-control" name="reason" rows="3" required=""></textarea>
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
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="kt-widget__subhead">
                                                                    <a>
                                                                        <i class="flaticon-placeholder-3"></i>
                                                                        <?php echo $event->location[0]->location_name . ', ' . $event->location[0]->city; ?>
                                                                    </a>
                                                                    <a>
                                                                        <i class="flaticon2-calendar-3"></i>
                                                                        <?php 
                                                                            $from = date("d F Y", strtotime($event->location[0]->date_from)); 
                                                                            $to = date("d F Y", strtotime($event->location[0]->date_to)); 
                                                                            echo $from.' - '.$to;
                                                                        ?>
                                                                    </a>
                                                                    <a>
                                                                        <i class="flaticon2-calendar-3"></i> Tarikh tutup pendaftaran : 
                                                                        <?php 
                                                                            $last = date("d F Y", strtotime($event->location[0]->last_registration_date));
                                                                            echo $last;
                                                                        ?>
                                                                    </a>
                                                                </div>
                                                                <div class="kt-widget__info">
                                                                    <div class="kt-widget__desc">
                                                                        <?php echo $event->description; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="kt-widget__bottom">
                                                            <div class="kt-widget__item">
                                                                <div class="kt-widget__icon">
                                                                    <i class="flaticon-confetti"></i>
                                                                </div>
                                                                <div class="kt-widget__details">
                                                                    <span class="kt-widget__title">Jumlah acara</span>
                                                                    <span class="kt-widget__value"><?php echo count($event->sports); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="kt-widget__item">
                                                                <div class="kt-widget__icon">
                                                                    <i class="flaticon-user"></i>
                                                                </div>
                                                                <div class="kt-widget__details">
                                                                    <span class="kt-widget__title">Badan gabungan berdaftar</span>
                                                                    <span class="kt-widget__value"><?php echo count($event->badan_gabungan); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="kt-widget__item">
                                                                <div class="kt-widget__icon">
                                                                    <i class="flaticon-customer"></i>
                                                                </div>
                                                                <div class="kt-widget__details">
                                                                    <span class="kt-widget__title">Veteran berdaftar</span>
                                                                    <span class="kt-widget__value"><?php echo count($event->veteran_num); ?></span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                    <!--end:: event row-->
                                </div>
                            <?php } } else { ?>
                                <div class="form-group form-group-last">
                                    <div class="alert alert-secondary" role="alert">
                                        <div class="alert-icon"><i class="flaticon-background kt-font-brand"></i></div>
                                        <div class="alert-text">
                                            Tiada data direkodkan buat masa ini. <a href="<?php echo base_url('dashboard/index');?>">Kembali ke halaman utama</a>.
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                                <!--End::Section-->



                                <!--End::Dashboard 2-->
                            </div>

                            <!-- end:: Content -->
                        </div>
                    </div>
                </div>

                <?php include "template/footer-page.php"; ?>		

<?php include "template/global-script.php"; ?>

<script language = "JavaScript">
    function changeYear() {
        var year = document.getElementById("selectYear").value;
        location.replace("/events?year="+year);
    }

    function openModal(eventid) {
        $('#dateTimeModal'+eventid).modal('show');
    }
</script>

                <!--begin::Page Vendors(used by this page) -->
                <script src="<?php echo base_url(); ?>asset/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
                <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
                <script src="<?php echo base_url(); ?>asset/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
                <!--end::Page Vendors -->

                <!--begin::Page Scripts(used by this page) -->
                <script src="<?php echo base_url(); ?>asset/assets/js/demo1/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
                
                <!--end::Page Scripts -->

<?php include "template/footer.php"; ?>