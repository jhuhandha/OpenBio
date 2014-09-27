<form id="agenda-evento">
	
	<div class="row">
		<table class="table table-hover table-condensed" id="tblAgendaevento">
			<thead>
				<tr>
					<th>Hora Inicio</th>
					<th>Hora Fin</th>
					<th>Actividad</th>
					<th>Detalle</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					echo $datos;
		 		?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<?php  echo CHtml::htmlButton('Enviar',array(
                'onclick'=>'javascript: evento.CrearEvento("agenda-evento");', // on submit call JS send() function
                'id'=> 'btnGuardar', // button id
                'class'=>'btn btn-success',
            ));
    	?>
	</div>
</form>


 <script type="text/javascript">
	jQuery(function(){
		$('#tblAgendaevento').dataTable({"bPaginate": false});

		$('#tblAgendaevento_info').css("display","none");

		$('#tblAgendaevento').each(function(){
            var datatable = $(this);
                // Buscar - Add the placeholder for Buscar and Turn this into in-line form control
                var Buscar_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                Buscar_input.attr('placeholder', 'Buscar');
                Buscar_input.addClass('form-control');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.addClass('form-control');
        });
	});

</script>