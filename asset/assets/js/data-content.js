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
                                4: {'title': 'Saguhati', 'class': ' kt-badge--info'},
                                5: {'title': 'Tidak menyertai', 'class': ' kt-badge--danger'},
                        };
                        return '<span class="kt-badge ' + status[row.Status].class + ' kt-badge--inline kt-badge--pill">' + status[row.Status].title + '</span>';
                    },
                }
            ],
        });
    };

    // demo initializer
    var mainTableInit = function() {

		var dataJSONArray = JSON.parse(
			'[{"RecordID":1,"body":"MAKSAK Selangor","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +
			'{"RecordID":2,"body":"MAKSAK WP Kuala Lumpur","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK Perak","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":2,"body":"MAKSAK Melaka","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK Perlis","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":2,"body":"MAKSAK Pulau Pinang","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK Kedah","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":2,"body":"MAKSAK Terengganu","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK Kelantan","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":2,"body":"MAKSAK Pahang","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK Johor","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":2,"body":"MAKSAK WP Putrajaya","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK WP Labuan","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":2,"body":"MAKSAK Sabah","totalMarks":"216","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' +                       
			'{"RecordID":3,"body":"MAKSAK Sarawak","totalMarks":"193","sportsCount":"11","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]},\n' + 
			'{"RecordID":4,"body":"MAKSAK Negeri Sembilan","totalMarks":"172","sportsCount":"10","Orders":[{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Karom","sportMarks":"5","Status":4},{"sportID":"Badminton","sportMarks":"8","Status":2},{"sportID":"Catur","sportMarks":"0","Status":5},{"sportID":"Bola Tampar","sportMarks":"8","Status":2},{"sportID":"FIFA","sportMarks":"5","Status":3},{"sportID":"Catur","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1},{"sportID":"Bola Tampar","sportMarks":"10","Status":1}]}]');

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