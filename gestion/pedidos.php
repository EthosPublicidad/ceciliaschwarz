	<?php 
	require_once "Objetos/Gestion.php";
	session_start();

	$gestion = new Gestion();

	if(!isset($_SESSION['login']) and $_SESSION['login']=='false'){
		header('Location: ./index.php');
	}
	include "header.php";
	?>
						<div class="col-lg-12">
							<h1 class="page-header">
							Pedidos
							</h1>
						</div>
						<div class="col-lg-12">
							<table class="table text-center" id="tabla">
								<thead>
									<tr>
										<th>
											ID
										</th>
										<th>
											Fecha
										</th>
										<th>
											Cliente
										</th>
										<th>
											Mail
										</th>
										<th>
											Tel&eacute;fono
										</th>
										<th>
											Total
										</th>
										<th>
											Estado
										</th>
										<th>
											Acciones
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$registros = $gestion->traerPedidos();
									if($registros){
										foreach ($registros as $reg)
										{
											$detalles = "";
											foreach($gestion->traerDetallesPedido($reg['id']) as $detallepedido){
												$detalles .= "Nombre $detallepedido[nombreproducto] - Cantidad: $detallepedido[cantidad] - Precio: $ $detallepedido[precio] <br/>";
											}											
											echo "
											<tr>
												<td>PEDIDO-$reg[id]</td>
												<td>$reg[fecha]</td>
												<td>$reg[cliente]</td>
												<td>$reg[clientemail]</td>
												<td>$reg[clientetelefono]</td>
												<td>$ $reg[total]</td>
												<td>$reg[estadopago]</td>
												<td>
													<button class='btn btn-primary' onclick=\"modal('PEDIDO-$reg[id]', '$detalles')\"><i class='fa fa-search'></i></button>
												</td>
											</tr>";
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /#page-wrapper -->
		</div>

		<div class="modal fade out" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="false" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h4 class="modal-title" id="nombre"></h4>
					</div>
					<div class="modal-body">
						<div style="text-align: left;">
							<label>Descripci&oacute;n del pedido</label> <br/>
							<span id="detalle"></span>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<!-- /#wrapper -->
		<!-- jQuery -->
		<script src="bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>


		<!-- DataTables JavaScript -->
		<script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

		<script language="JavaScript" type="text/JavaScript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js "> </script> 
		<script language="JavaScript" type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js "> </script> 
		<script language="JavaScript" type="text/JavaScript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"> </script> 
		<script language="JavaScript" type="text/JavaScript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"> </script> 
		<script language="JavaScript" type="text/JavaScript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js "> </script> 
		<link href='https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>  

		<!-- Custom Theme JavaScript -->
		<script src="dist/js/sb-admin-2.js"></script>

		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script>
		$(document).ready(function() {
			$('#tabla').DataTable({
				"scrollY":        "400px",
				responsive: true,
				order: [[0, "desc"]],
				"oLanguage": {
				   "sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ning&uacute;n dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
					}			
				},
				dom: 'Bfrtip',
				buttons: [
					{
						extend: 'excelHtml5',
						filename: 'Listado de Pedidos',
						text: 'Guardar en excel',
						exportOptions: {
							modifier: {
								page: 'current'
							}
						},
						footer: true
					}
				],
			});
			
			$(".buttons-excel").addClass("btn btn-success");
			$(".buttons-excel").removeClass("dt-button");
		});
		
		function modal(nombre, detalle){
			$('#modal').modal('show');
			$("#nombre").html(nombre);
			$("#detalle").html(detalle);
		}
		</script>
		<style>
			th{
				text-align:center;
			}
		</style>

	</body>

</html>
