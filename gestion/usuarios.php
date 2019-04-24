<?php 
require_once "Objetos/GestionUsuario.php";
session_start();

if(!isset($_SESSION['login']) or $_SESSION['login']=='false'){
	header('Location: ./index.php');
}

$usuarios = new GestionUsuario();

include('header.php');
?>

                    <div class="col-lg-12">
                        <h1 class="page-header">
						Usuarios
						<button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal">
							Crear
						</button>
						<!-- Modal -->
						<div class="modal fade out" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="false" style="display: none;">
							<div class="modal-dialog">
								<div class="modal-content">
									<form class="formModal" action="gestion.php" method="post">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
											<h4 class="modal-title" id="myModalLabel">Crear Empleado</h4>
										</div>
										<div class="modal-body">
											<div style="text-align: left;">
												<label>Apellido y nombre</label>
												<input name="apellidonombre" placeholder="Apellido y Nombre" class="form-control" required="required" />
											</div>
											<div style="text-align: left;">
												<label>Mail</label>
												<input name="mail" placeholder="Mail" class="form-control" required="required" />
											</div>
											<div style="text-align: left;">
												<label>Tel&eacute;fono</label>
												<input name="telefono" placeholder="Tel&eacute;fono" class="form-control" required="required" />
											</div>
											<div style="text-align: left;">
												<label>Nombre de usuario</label>
												<input name="usuario" placeholder="Nombre de Usuario" class="form-control" required="required" />
											</div>
											<div style="text-align: left;">
												<label>Clave</label>
												<input name="clave" placeholder="Clave" type="password" class="form-control" required="required" />
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn btn-primary" value="Continuar" />
											<input type="hidden" name="opcion" value="altausuario" />
											<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
										</div>
									</form>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->										
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
										Usuario
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
								$regusuarios = $usuarios->traerUsuarios();
	
								foreach ($regusuarios as $reg)
								{
									echo "
									<tr>
										<td>$reg[apellidonombre]</td>
										<td>$reg[usuario]</td>
										<td>$reg[mail]</td>
										<td>$reg[telefono]</td>
										";
										if($reg['estado']=='B'){
											echo "<td>
												<a title='Activar' class='btn btn-primary' href='./gestion.php?id=$reg[id]&opcion=activarusuario'><i class='fa fa-spin fa-refresh'></i></a>
											</td>";
										}else{
											echo "<td>
												<button title='Editar' class='btn btn-success' onclick='editar(\"$reg[apellidonombre]\", \"$reg[usuario]\", \"$reg[mail]\", \"$reg[telefono]\", \"$reg[clave]\", \"$reg[id]\");'><i class='fa fa-pencil'></i></button>
												<a title='Borrar' class='btn btn-danger' href='./gestion.php?id=$reg[id]&opcion=bajausuario'><i class='fa fa-times'></i></a>
											</td>";
										}
									echo "</tr>";
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
		<div class="modal-dialog">
			<div class="modal-content">
				<form autocomplete="off" class="formModal" action="gestion.php" method="post">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
						<h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
					</div>
					<div class="modal-body">
						<div style="text-align: left;">
							<label>Apellido y Nombre</label>
							<input name="apellidonombre" id="apellidonombre" placeholder="apellidonombre" class="form-control" required="required" />
						</div>
						<div style="text-align: left;">
							<label>Mail</label>
							<input name="mail" id="mail" placeholder="Nombre de Usuario" type="email" class="form-control" required="required" />
						</div>
						<div style="text-align: left;">
							<label>Tel&eacute;fono</label>
							<input name="telefono" id="telefono" placeholder="Tel&eacute;fono" type="text" class="form-control" required="required" />
						</div>
						<div style="text-align: left;">
							<label>Usuario</label>
							<input name="usuario" id="usuario" placeholder="Nombre de Usuario" type="text" class="form-control" required="required" />
						</div>
						<div style="text-align: left;">
							<label>Clave</label>
							<input id="clave" name="clave" type="password" placeholder="Clave" class="form-control" value="" />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Continuar" />
						<input type="hidden" name="opcion" value="editarusuario" />
						<input type="hidden" name="id" id="idusuario" />
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

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#tabla').DataTable({
			"scrollY":        "400px",
			"scrollX": true,
			"scrollCollapse": true,
			"paging": false,
			"info": false,
			responsive: true,
			"filter": true,
			"order": [[0, "asc"]],
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
			}
        });
    });
	function editar(apellidonombre, usuario, mail, telefono, clave, id){
		$('#modalEdicion').modal('show');
		$('#apellidonombre').val(apellidonombre);
		$('#usuario').val(usuario);
		$('#mail').val(mail);
		$('#telefono').val(telefono);
		$('#clave').val(clave);
		$('#idusuario').val(id);
	}
	</script>
	<style>
		th{
			text-align:center;
		}
	</style>

</body>

</html>
