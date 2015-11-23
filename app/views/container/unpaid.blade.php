@extends('Template.template')

@section('head')
	@include('utilities.mainpage')
@endsection

@section('body')
	<!-- SIDEBAR -->
	@include('utilities.history_sidebar')
	<!-- LOGIN FIELD -->
	@include('field.unpaid')
@endsection

@section('scripts')
<script type="text/javascript">


	$.getJSON(" {{ URL::to('/') }}/fetch/unpaid", function(data) {
		$('#unpaid').dataTable({
			"aaData": data,
			"oLanguage": {
				"sLengthMenu": "No. of Items to display _MENU_",
				"iDisplayLength": 50,
				"oPaginate": {
					"sFirst": "&#8606; First", // This is the link to the first 
					"sPrevious": "&#8592; Previous", // This is the link to the previous 
					"sNext": "Next &#8594;", // This is the link to the next 
					"sLast": "Last &#8608;" // This is the link to the last 
				}
			},
			//DISPLAYS THE VALUE
			//sTITLE - HEADER
			//MDATAPROP - TBODY
			"aoColumns": 
			[
				{"sTitle": "#", "sWidth": "70px", "mDataProp": "id", "sClass": "size-14"},
				{"sTitle": "Student No#", "sWidth": "70px", "mDataProp": "student_no"},
				{"sTitle": "Student Name", "sWidth": "100px", "mDataProp": "student_name"},
				{"sTitle": "Total Unpaid DGR", "sWidth": "200px", "mDataProp": "unpaid"},

			],
			"aoColumnDefs": 
			[
				//FORMAT THE VALUES THAT IS DISPLAYED ON mDataProp
				//ID
				{ "bSortable": false, "aTargets": [ 0 ] },
				{
					"aTargets": [ 0 ], // Column to target
					"mRender": function ( data, type, full ) {
					// 'full' is the row's data object, and 'data' is this column's data
					// e.g. 'full[0]' is the comic id, and 'data' is the comic title

					return '<label class="text-center size-14">' + data + '</label>';
					}
				},
				//APPLICANTS FULLNAME
				{
					"aTargets": [ 1 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="size-14 dtem">' + full["student_no"] + '</label>';
					}
				},

				{
					"aTargets": [ 2 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="size-14 dtem">' + full["student_name"] + '</label>';
					}
				},

				//Field
				{
					"aTargets": [ 3 ], // Column to target
					"mRender": function ( data, type, full ) {
					// 'full' is the row's data object, and 'data' is this column's data
					// e.g. 'full[0]' is the comic id, and 'data' is the comic title
					return '<label class="text-center size-14">' + full["unpaid"] + '</label>';
					}
				},
			],

			"fnDrawCallback": function( oSettings ) {
				/* Need to redo the counters if filtered or sorted */
				if ( oSettings.bSorted || oSettings.bFiltered )
				{
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
					{
						$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( "<label>" + (i+1) + "</label>" );
					}
				}
			}
		});
	$('div.dataTables_filter input').attr('placeholder', 'Users/Events/Fields/Objects');
});
</script>
@endsection

@section('style')
@endsection