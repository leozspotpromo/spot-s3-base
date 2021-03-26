
/*
 * Editor client script for DB table teste
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: 'php/table.teste.php',
		table: '#teste',
		fields: [
			{
				"label": "name:",
				"name": "name"
			}
		]
	} );

	var table = $('#teste').DataTable( {
		dom: 'Bfrtip',
		ajax: 'php/table.teste.php',
		columns: [
			{
				"data": "name"
			}
		],
		select: true,
		lengthChange: false,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );

}(jQuery));

