@extends('Template.Template')

@section('head')
<!-- LOGIN UTILITIES -->
	@include('utilities.mainpage')
<!--  -->
@endsection

@section('body')

	<!-- MAINPAGE SIDEBAR -->
	@include('utilities.sidebar_mainpage')
	<!-- FIELD MAINPAGE -->
	@include('field.mainpage')
	<!--  -->
@endsection

@section('scripts')

<script type="text/javascript">
	$(document).ready( function() {
		$.getJSON("{{ URL::to('/') }}/fetch/users",function(data) {
			console.log(data)
		$('#users').dataTable({
			"aaData": data,
			"lengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
			"aaSorting": [[ 3, 'desc' ]],
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
				{"sTitle": "Users", "sWidth": "200px","mDataProp": "users"},
				{"sTitle": "Role", "sWidth": "200px", "mDataProp": "roles"},
				{"sTitle": "Date Created", "mDataProp": "created_at"}

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

					return '<label class="label-black">' + data + '</label>';
					}
				},
				//USERS
				{
					"aTargets": [ 1 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="label-black">' + full["users"] + '</label>';
					}
				},
				//USER ROLE
				{
					"aTargets": [ 2 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="label-black">' + full["roles"] + '</label>';
					}
				},
				//CREATED_AT
				{
					"aTargets": [ 3 ], // Column to target
					"mRender": function ( data, type, full ) {
						// 'full' is the row's data object, and 'data' is this column's data
						// e.g. 'full[0]' is the comic id, and 'data' is the comic title
						return '<label class="label-black"> ' + full["created_at"] + '</label>';
					}
				}
			],

			"fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
			//var id = aData[0];
				var id = aData.id;
				$(nRow).attr("data-pass", id);
				return nRow;
			},

			"fnDrawCallback": function( oSettings ) {
				$('#users tbody tr').click( function() {
					var id = $(this).attr("data-pass");
					document.location.href = "{{ URL::to('/') }}/user/" + id + "/profile";
				});

				$('#users tbody tr').hover(function() {
					$(this).css('cursor', 'pointer');
				}, function() {
					$(this).css('cursor', 'auto');
				});
				/* Need to redo the counters if filtered or sorted */
				if ( oSettings.bSorted || oSettings.bFiltered )
				{
					for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
					{
						$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( "<label class='label-black'>" + (i+1) + "</label>" );
					}
				}
			}
		});
	$('div.dataTables_filter input').attr('placeholder', 'Category / Date Updated...');
	});
});
</script>
@endsection

@section('style')

@endsection