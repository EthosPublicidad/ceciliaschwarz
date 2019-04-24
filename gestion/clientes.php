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
							Clientes
							</h1>
						</div>
						<div class="col-lg-12">
							<table class="table text-center" id="tabla">
								<thead>
									<tr>
										<th>
											Apellido y Nombre
										</th>
										<th>
											Mail
										</th>
										<th>
											Telefono
										</th>
										<th>
											Acciones
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$registros = $gestion->traerClientes();
									if($registros){
										foreach ($registros as $reg)
										{
											echo "
											<tr>
												<td>".$reg['apellidonombre']."</td>
												<td>".$reg['mail']."</td>
												<td>".$reg['telefono']."</td>
												";
												echo "<td>
													<button title='Editar' class='btn btn-success' onclick='editar(\"$reg[apellidonombre]\", \"$reg[mail]\", \"$reg[telefono]\", \"$reg[id]\");'><i class='fa fa-pencil'></i></button>
												</td>";
											echo "</tr>";
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
		<!-- /#wrapper -->
	<!-- Modal -->
		<div class="modal fade out" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 80%;">
				<div class="modal-content">
					<form autocomplete="off" class="formModal" action="gestion.php" method="post" enctype="multipart/form-data">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
							<h4 class="modal-title" id="myModalLabel">Editar Producto</h4>
						</div>
						<div class="modal-body" style="display: inline-block;">
							<div class="col-md-12 col-sm-12 text-left">
								<label>Apellido y Nombre</label>
								<input name="apellidonombre" id="apellidonombre" placeholder="Apellido y Nombre" class="form-control" required="required" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Mail</label>
								<input name="mail" id="mail" placeholder="Email" type="email" class="form-control" required="required" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Telefono</label>
								<input name="telefono" id="telefono" placeholder="Telefono" type="text" class="form-control" required="required" />
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Continuar" />
							<input type="hidden" name="opcion" value="editarcliente" />
							<input type="hidden" name="id" id="idcliente" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>

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
						filename: 'Listado de Clientes',
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
		function editar(apellidonombre, mail, telefono, id){
			$('#modalEdicion').modal('show');

			$('#apellidonombre').val(desc);
			$('#mail').val(precio);
			$('#telefono').val(categoria);
			$('#idcliente').val(id);
		}
		</script>
		<style>
			th{
				text-align:center;
			}
		</style>

	</body>

</html>
