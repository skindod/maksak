<?php include "template/header.php"; ?>

<title>MAKSAK | Senarai Badan Gabungan</title><!-- comment -->

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
                                    <h3 class="kt-subheader__title">Jana Laporan Elaun</h3>
                                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                                    <span class="kt-subheader__desc">tahun</span>
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

                            <div class="kt-content kt-grid__item" id="kt_content">
                                <!--Begin::Section-->
                                <div class="row mb-3">
                                    <div class="col-xl-12">
                                        <input type="hidden" id="settings_available" value="<?php if(empty($settings_allowance)){ echo 'nope'; }else{ echo 'have'; } ?>">
                                        <button type="submit" id="submit_form" class="btn btn-primary" onclick="allowanceSettingsModal()">
                                            <i class="flaticon2-settings"></i>
                                            Tetapan Elaun
                                        </button>
                                        <?php if(empty($settings_allowance)){ echo '<span style="color:red"> <- Tiada elaun tetapan bagi tahun ini. Sila kemaskini tetapan ini dahulu.</span>'; } ?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="allowanceSettingsModal" tabindex="-1" role="dialog" aria-labelledby="aria" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <?php $attributes = array("id" => "allowanceSettingsform", "name" => "allowanceSettingsform");
                                                    echo form_open_multipart("report/allowance_settings", $attributes);?>
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="aria">Tetapan Elaun</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="datetime">Elaun mileage (RM/KM) :</label>
                                                                <input type="text" class="form-control" id="mileage_allowance" name="mileage_allowance" placeholder="Jika 20 sen, masukkan 0.20" required="" value="<?php if(!empty($settings_allowance)){ echo $settings_allowance->mileage_allowance; } ?>" />
                                                                <input type="hidden" name="year_allowance" id="year_allowance" value="<?php echo $selectYear; ?>" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="datetime">Elaun makanan seorang (RM/sehari) :</label>
                                                                <input type="text" class="form-control" id="food_allowance" name="food_allowance" placeholder="Jika RM20, masukkan 20" required="" value="<?php if(!empty($settings_allowance)){ echo $settings_allowance->food_allowance; } ?>" />
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="datetime">Elaun penginapan seorang (RM/semalam) :</label>
                                                                <input type="text" class="form-control" id="accommodation_allowance" name="accommodation_allowance" placeholder="Jika RM20, masukkan 20" required="" value="<?php if(!empty($settings_allowance)){ echo $settings_allowance->accommodation_allowance; } ?>" />
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
                                    </div>
                                </div>
                                <?php
                                    $attributes = array("id" => "allowanceform", "name" => "allowanceform", "class" => "kt-form");
                                    // echo form_open_multipart("report/create_allowance", $attributes);
                                    echo form_open_multipart("report/generate_allowance_report", $attributes);
                                ?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="kt-portlet kt-portlet--mobile">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h4 class="kt-portlet__head-title">1. Pilih badan gabungan</h4>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body">
                                                <div class="col-lg-12 col-xxl-12">
                                                    <select class="form-control" name="selected_bg" id="selected_bg" onchange="check_selected()">
                                                        <option value="">Pilih satu</option>
                                                        <?php if(count($state_list) > 0){ foreach($state_list as $state){ if($state->id != 18){ ?>
                                                            <option value="<?php echo $state->id; ?>"><?php echo $state->name; ?></option>
                                                        <?php }}} ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8 mx-auto">
                                        <div class="kt-portlet kt-portlet--mobile">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h4 class="kt-portlet__head-title">2. Pilih kejohanan</h4>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body">
                                                <div class="col-lg-12 col-xxl-12">
                                                    <div class="form-group">
                                                        <!-- Select All / Deselect All Button -->
                                                        <button type="button btn-sm" id="toggle-select-all" class="btn btn-primary mb-3">Pilih semua</button>
            
                                                        <div class="checkbox-list">
                                                            <?php if(count($event_list) > 0){ foreach($event_list as $event){ ?>
                                                                <label class="checkbox checkbox-lg">
                                                                    <input type="checkbox" value="<?php echo $event->id; ?>" name="selected_events[]" id="selected_events[]" onchange="check_selected()">
                                                                    <span></span>&nbsp;&nbsp;
                                                                    <?php echo $event->name.' ( '.$event->date_from.' - '.$event->date_to.' )'; ?>
                                                                </label>
                                                            <?php }} ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 mx-auto">
                                        <div class="kt-portlet kt-portlet--mobile">
                                            <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                                                <div class="kt-portlet__head-label">
                                                    <h4 class="kt-portlet__head-title">3. Hantar</h4>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body">
                                                <div class="col-lg-12 col-xxl-12">
                                                    <div class="form-group">
                                                        <input type="hidden" name="selected_year" id="selected_year" value="<?php echo $selectYear; ?>" />
                                                        <button type="submit" id="submit_btn" class="btn btn-primary col-lg-12" disabled="">Jana laporan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close(); ?>
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
                <script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script>
                <!--end::Page Scripts -->

                <?php include "template/footer.php"; ?>

                <style>
                    .checkbox-list {
                        list-style-type: none;
                        padding-left: 0;
                    }

                    .checkbox-list .checkbox {
                        display: block;
                        margin-bottom: 10px;
                    }
                </style>
                <script language = "JavaScript">

                    function allowanceSettingsModal() {
                        $('#allowanceSettingsModal').modal('show');
                    }
                        
                    function changeYear() {
                        var year = document.getElementById("selectYear").value;
                        location.replace("/report/allowance?year="+year);
                    }

                    function check_selected() {
                        // Get the value of the selected option in the dropdown
                        var settings_available = document.getElementById("settings_available").value;
                        // Get the value of the selected option in the dropdown
                        var selected_bg = document.getElementById("selected_bg").value;
                        // Get all checked checkboxes with the id 'selected_events[]'
                        const selected_events = document.querySelectorAll('input[id="selected_events[]"]:checked');

                        // Get the submit button
                        const submitButton = document.getElementById('submit_btn');
                        
                        // Debugging logs
                        console.log(settings_available);
                        // console.log('Number of selected events:', selected_events.length);
                        
                        // Enable or disable the button based on whether any checkboxes are checked and selected_bg has a value
                        if (selected_events.length > 0 && selected_bg !== '' && settings_available == 'have') {
                            submitButton.disabled = false;
                        } else {
                            submitButton.disabled = true;
                        }
                    }


                    document.getElementById('toggle-select-all').addEventListener('click', function() {
                        event.preventDefault();
                        // Get all checkboxes
                        const checkboxes = document.querySelectorAll('.checkbox-list input[type="checkbox"]');
                        
                        // Determine the new state based on the first checkbox
                        const selectAll = !checkboxes[0].checked;
                        
                        // Update all checkboxes
                        checkboxes.forEach(checkbox => {
                            checkbox.checked = selectAll;
                        });
                        
                        // Update the button text
                        this.textContent = selectAll ? 'Batal semua' : 'Pilih semua';
                        check_selected();
                    });
                </script>