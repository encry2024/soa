@extends('Template.Template')

@section('head')
<!-- LOGIN UTILITIES -->
	@include('utilities.login')
<!--  -->
@endsection

@section('body')
	<!--  -->
	
		<div class="row">
			<div class="large-10 columns large-centered" style="margin-left: 13rem;">
				<br>
				<label class="size-20 nsi-asset-fnt">Import XLS<span style="margin-left: 30rem;"></label>
				<br>
				<div class="row">
					<div class="large-12 columns">
						<table id="payment_history" class="dtable large-12" style="width: 100%; margin-bottom: 3rem;">
					</div>
				</div>
			</div>
		</div>

	<!--  -->
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready( function() {
	$.getJSON("{{ URL::to('/') }}/get_payment_history",function(data) {
		$('#payment_history').dataTable({
			"aaData": data,
			"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
			"aaSorting": [[ 1, 'asc' ]],
			"oLanguage": {
				"sLengthMenu": "No. of Items to display _MENU_",
				"oPaginate": {
				"sFirst": "First ", // This is the link to the first 
				"sPrevious": "&#8592; Previous", // This is the link to the previous 
				"sNext": "Next &#8594;", // This is the link to the next 
				"sLast": "Last " // This is the link to the last 
				}
			},
			//DISPLAYS THE VALUE
			//sTITLE - HEADER
			//MDATAPROP - TBODY
			"aoColumns": 
			[
				{"sTitle": "#", "mDataProp": "id", "sClass": "size-14"},
				{"sTitle": "Student No", "sWidth": "160px", "mDataProp": "id"},
				{"sTitle": "Student Name", "sWidth": "160px","mDataProp": "student_name"},
				{"sTitle": "Course",  "mDataProp": "course"},
				{"sTitle": "Payment Mode", "sWidth": "160px", "mDataProp": "payment_mode"},
				{"sTitle": "Payment Breakdown", "mDataProp": "payment_breakdown"}

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
				//CATEGORY NAME
				{
					"aTargets": [ 1 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="text-center size-14">' + full["id"] + '</label>';
					}
				},
				{
					"aTargets": [ 2 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="text-center size-14">' + full["student_name"] + '</label>';
					}
				},
				{
					"aTargets": [ 3 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="text-center size-14">' + full["course"] + '</label>';
					}
				},
				{
					"aTargets": [ 4 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="text-center size-14">' + full["payment_mode"] + '</label>';
					}
				},
				{
					"aTargets": [ 5 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="text-center size-14">' + full["payment_breakdown"] + '</label>';
					}
				}
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
	$('div.dataTables_filter input').attr('placeholder', 'Category / Date Updated...');
	});
});
</script>
@endsection