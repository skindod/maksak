<?php include "template/header.php"; ?>
    
<title>Papan Keputusan | <?php echo $event_details[0]->name; ?></title><!-- comment -->
                
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
                                        <h3 class="kt-subheader__title" style="width: 400px;">Papan Keputusan</h3>
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

                                    <!--Begin::Dashboard 2-->
                                    <!--begin:: event row-->
                                    <div class="kt-portlet">
                                        <div class="kt-portlet__body">
                                            <div class="kt-widget kt-widget--user-profile-3">
                                                <div class="kt-widget__top">
                                                    <div class="kt-widget__content">
                                                        <div class="kt-widget__head">
                                                            <a href="/dashboard-admin/event-detail.php" class="kt-widget__username">
                                                                <?php echo $event_details[0]->name; ?>
                                                                <i class="flaticon2-correct kt-font-success"></i>
                                                            </a>
                                                        </div>
                                                        <div class="kt-widget__subhead">
                                                                <a><i class="flaticon2-new-email"></i><?php echo $event_details[0]->location[0]->location_name . ', ' . $event_details[0]->location[0]->city; ?></a>
                                                                <a><i class="flaticon2-calendar-3"></i><?php echo date("d F Y", strtotime($event_details[0]->location[0]->date_from)).' / '.date("d F Y", strtotime($event_details[0]->location[0]->date_to)); ?> </a>
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
                                            <?php 
                                                $attributes = array("id" => "kt_form", "name" => "kt_form", "class" => "kt-form");
                                                if(isset($search_details) && count($search_details) > 0){ 
                                                    echo form_open_multipart("result/update", $attributes);
                                                }else{ 
                                                    echo form_open_multipart("result/create", $attributes);
                                                }
                                            ?>
                                            <!--begin:: Widgets/status-->
                                            <div class="kt-portlet" >
                                                <div class="kt-widget14">
                                                    <div class="kt-widget14__header">
                                                            <h3 class="kt-widget14__title">
                                                                    Kemaskini keputusan
                                                            </h3>
                                                            <span class="kt-widget14__desc">
                                                                    Tambah keputusan bagi setiap badan gabungan berdasarkan acara
                                                            </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Pilih acara</label>
                                                        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
                                                        <select class="form-control selectpicker" required="" id="select_sport" name="sport_id">
                                                            <option value="">Pilih satu</option>
                                                            <?php foreach($event_details[0]->sports as $sport){ ?>
                                                                <option value="<?php echo $sport->sport_id; ?>" <?php if(isset($_SESSION['search_sport_id'])){ if($_SESSION['search_sport_id'] == $sport->sport_id){ echo 'selected'; } } ?>><?php echo $sport->name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Pilih badan gabungan</label>
                                                                <select class="form-control selectpicker" name="state[]">
                                                                    <?php foreach($state_list as $state){ ?>
                                                                        <option value="<?php echo $state->id; ?>" <?php if(isset($search_details[0])){ if($search_details[0]->sport_id == $sport->sport_id){ echo 'selected'; } } ?>>MAKSAK <?php echo $state->name; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Pilih status keputusan</label>
                                                                <select class="form-control selectpicker" name="point[]">
                                                                    <?php foreach($points_list as $point){ ?>
                                                                        <option value="<?php echo $point->id; ?>" <?php if(isset($search_details[0])){ if($search_details[0]->point_id == $point->id){ echo 'selected'; } } ?>><?php echo $point->name.' (+'.$point->point.'pt)'; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php for($num = 1; $num < 16; $num++){ ?>
                                                        <div class="row" style="margin-top: -15px;">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select class="form-control selectpicker" name="state[]">
                                                                        <?php foreach($state_list as $state){ ?>
                                                                            <option value="<?php echo $state->id; ?>" <?php if(isset($search_details[$num])){ if($search_details[$num]->state_id == $state->id){ echo 'selected'; } } ?>>MAKSAK <?php echo $state->name; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select class="form-control selectpicker" name="point[]">
                                                                        <?php foreach($points_list as $point){ ?>
                                                                            <option value="<?php echo $point->id; ?>" <?php if(isset($search_details[$num])){ if($search_details[$num]->point_id == $point->id){ echo 'selected'; } } ?>><?php echo $point->name.' (+'.$point->point.'pt)'; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    
                                                </div>
                                                    
                                                <div class="kt-portlet__foot">
                                                    <div class="kt-form__actions">
                                                        <button type="submit" class="btn btn-primary"><?php if(isset($search_details) && count($search_details) > 0){ echo 'Sunting'; }else{ echo 'Tambah'; } ?> keputusan</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end:: Widgets/status-->
                                            <?php echo form_close(); ?>
					</div>
                                        <div class="col-xl-8">
                                            
                                            <div class="kt-portlet">
                                                <div class="kt-portlet__head">
                                                    <div class="kt-portlet__head-label">
                                                        <h3 class="kt-portlet__head-title">
                                                                Rumusan keputusan
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div class="kt-portlet__body">
                                                    <ul class="nav nav-tabs nav-fill" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#bysport">Kedudukan mengikut sukan</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#summary">Kedudukan keseluruhan</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="bysport" role="tabpanel">
                                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionBox">
                                                            <!--begin::Accordion-->
                                                            <?php if(count($result_per_sport_list) > 0){ foreach($result_per_sport_list as $sport){ ?>
                                                            
                                                                <div class="card">
                                                                    <div class="card-header" id="heading<?php echo $sport->sport_id; ?>">
                                                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#<?php echo 'box'.$sport->sport_id; ?>" aria-expanded="false" aria-controls="collapse">
                                                                            <?php echo $sport->name; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div id="<?php echo 'box'.$sport->sport_id; ?>" class="collapse" aria-labelledby="heading<?php echo $sport->sport_id; ?>" data-parent="#accordionBox" style="">
                                                                        <?php if(count($sport->result) > 0){ ?>
                                                                            <div class="card-body">
                                                                                <table class="podium">
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td class="podium-winner">
                                                                                            <?php echo 'MAKSAK '.$sport->result[0]->name; ?>
                                                                                        </td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td class="podium-1 podium-border-bottom" rowspan="4">1</td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="podium-winner">
                                                                                            <?php echo 'MAKSAK '.$sport->result[1]->name; ?>
                                                                                        </td>
                                                                                        <td></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="podium-2 podium-border-bottom" rowspan="2">2</td>
                                                                                        <td class="podium-winner">
                                                                                            <?php echo 'MAKSAK '.$sport->result[2]->name; ?>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="podium-3 podium-border-bottom">3</td>
                                                                                    </tr>
                                                                                </table>

                                                                                <div class="kt-portlet__body">
                                                                                    <!--begin::Section-->
                                                                                    <div class="kt-section">
                                                                                        <div class="kt-section__content">
                                                                                            <table class="table table-striped">
                                                                                                <tbody>
                                                                                                    <?php $num = 1; foreach($sport->result as $res){ ?>
                                                                                                    <tr>
                                                                                                        <th scope="row"><?php echo $num; ?></th>
                                                                                                        <td>MAKSAK <?php echo $res->name; ?></td>
                                                                                                    </tr>
                                                                                                    <?php $num++; } ?>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!--end::Section-->
                                                                                </div>
                                                                            </div>
                                                                        <?php } else { ?>
                                                                            <div class="card-body">
                                                                                Tiada markah direkodkan buat masa ini.
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                
                                                            
                                                            <!--end::Accordion-->
                                                            <?php }} ?>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="tab-pane " id="summary" role="tabpanel">
                                                            <!--begin: Datatable -->
                                                            <div class="kt-datatable" id="child_data_local"></div>
                                                            <!--end: Datatable -->
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
                <?php if(isset($_SESSION['search_event_id']) && isset($_SESSION['search_sport_id'])){ $this->session->unset_userdata('search_event_id'); $this->session->unset_userdata('search_sport_id'); } ?>
		<!--begin::Page Vendors(used by this page) -->
		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="<?php echo base_url(); ?>asset/assets/js/demo10/pages/dashboard.js" type="text/javascript"></script> <!-- for donut chart -->
		<script type="text/javascript">
                    'use strict';
                    // Class definition
                    var KTDatatableChildDataLocalDemo = function() {
                        // Private functions

                        var subTableInit = function(e) {
                            $('<div/>').attr('id', 'child_data_local_' + e.data.RecordID).appendTo(e.detailCell).KTDatatable({
                                data: {
                                        type: 'local',
                                        source: e.data.Orders,
                                        pageSize: 10,
                                },

                                // layout definition
                                layout: {
                                        scroll: false,
                                        footer: false,

                                        // enable/disable datatable spinner.
                                        spinner: {
                                                type: 1,
                                                theme: 'default',
                                        },
                                },

                                sortable: true,
                                pagination: false,

                                // columns definition
                                columns: [
                                    {
                                        field: 'sportID',
                                        title: 'Acara',
                                        width: 100,
                                        template: function(row) {
                                                return '<span>' + row.sportID + '</span>';
                                        },
                                    },{
                                        field: 'sportMarks',
                                        title: 'Markah',
                                        width: 80,
                                        type: 'number',
                                    }, {
                                        field: 'Status',
                                        title: 'Status',
                                        // callback function support for column rendering
                                        template: function(row) {
                                            var status = {
                                                    1: {'title': 'Johan', 'class': 'kt-badge--success'},
                                                    2: {'title': 'Naib johan', 'class': ' kt-badge--warning'},
                                                    3: {'title': 'Ketiga', 'class': ' kt-badge--primary'},
                                                    4: {'title': 'Keempat', 'class': ' kt-badge--primary'},
                                                    5: {'title': 'Follow Up', 'class': ' kt-badge--info'},
                                                    6: {'title': 'Tidak menyertai', 'class': ' kt-badge--danger'},
                                                    7: {'title': 'Tiada rekod', 'class': ' kt-badge--danger'},
                                            };
                                            return '<span class="kt-badge ' + status[row.Status].class + ' kt-badge--inline kt-badge--pill">' + status[row.Status].title + '</span>';
                                        },
                                    }
                                ],
                            });
                        };

                        // demo initializer
                        var mainTableInit = function() {
                        
                                    var dataJSONArray = JSON.parse('<?php echo $result_per_state_list; ?>');

                                    var datatable = $('.kt-datatable').KTDatatable({
                                            // datasource definition
                                            data: {
                                                    type: 'local',
                                                    source: dataJSONArray,
                                                    pageSize: 20, // display 20 records per page
                                            },

                                            // layout definition
                                            layout: {
                                                    scroll: false,
                                                    height: null,
                                                    footer: false,
                                            },

                                            sortable: true,

                                            filterable: false,

                                            pagination: true,

                                            detail: {
                                                    title: 'Load sub table',
                                                    content: subTableInit,
                                            },

                                            search: {
                                                    input: $('#generalSearch'),
                                            },

                                            // columns definition
                                            columns: [
                                                    {
                                                            field: 'RecordID',
                                                            title: '',
                                                            sortable: false,
                                                            width: 30,
                                                            textAlign: 'center',
                                                    }, {
                                                            field: 'body',
                                                            width: 200,
                                                            title: 'Badan gabungan',
                                                    }, {
                                                            field: 'totalMarks',
                                                            title: 'Jumlah markah',
                                                    }, {
                                                            field: 'sportsCount',
                                                            title: 'Bilangan penyertaan',
                                                    }],
                                    });

                                    $('#kt_form_status,#kt_form_type').selectpicker();

                            };

                            return {
                                    // Public functions
                                    init: function() {
                                            // init dmeo
                                            mainTableInit();
                                    },
                            };
                    }();

                    jQuery(document).ready(function() {
                            KTDatatableChildDataLocalDemo.init();
                    });
                </script> <!-- for dropdown keputusan table -->
		<!--end::Page Scripts -->
                <script>
                    $(function(){
                        // bind change event to select
                        $('#select_sport').on('change', function () {
                            var sport_id = $(this).val();
                            window.location = '<?php echo base_url(); ?>result/search/<?php echo $event_id; ?>/'+sport_id;
                        });
                    });
                </script>
                
                

<?php include "template/footer.php"; ?>