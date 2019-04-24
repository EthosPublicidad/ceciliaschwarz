<?php 
require_once "Objetos/GestionCategoria.php";
session_start();
$categorias = new GestionCategoria();

if(!isset($_SESSION['login']) or $_SESSION['login']=='false'){
	header('Location: ./index.php');
}
include "header.php";
?>
                    <div class="col-lg-12">
                        <h1 class="page-header">
						Categorias
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
											<h4 class="modal-title" id="myModalLabel">Crear Categoria</h4>
										</div>
										<div class="modal-body">
											<div style="text-align: center;">
												<input name="descripcion" placeholder="Nombre de Categoria" class="form-control" required="required" />
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" class="btn btn-primary" value="Continuar" />
											<input type="hidden" name="opcion" value="altacategoria" />
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
										Descripci&oacute;n
									</th>
									<th>
										Acciones
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$regcategorias = $categorias->traerCategorias();
	
								foreach ($regcategorias as $reg)
								{
									echo "
									<tr>
										<td>$reg[descripcion]</td>";
										if($reg['estado']=='B'){
											echo "<td>
												<a title='Activar' class='btn btn-primary' href='./gestion.php?id=$reg[id]&opcion=activarcategoria'><i class='fa fa-spin fa-refresh'></i></a>
											</td>";
										}else{
											echo "<td>
												<button title='Editar' class='btn btn-success' onclick='editar(\"$reg[descripcion]\", \"$reg[id]\");'><i class='fa fa-pencil'></i></button>
												<a title='Borrar' class='btn btn-danger' href='./gestion.php?id=$reg[id]&opcion=bajacategoria'><i class='fa fa-times'></i></a>
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
						<h4 class="modal-title" id="myModalLabel">Editar Categoria</h4>
					</div>
					<div class="modal-body">
						<div style="text-align: left;">
							<label>Descripcion</label>
							<input name="descripcion" id="eddescripcion" placeholder="Descripcion" class="form-control" required="required" />
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="Continuar" />
						<input type="hidden" name="opcion" value="editarcategoria" />
						<input type="hidden" name="id" id="idcategoria" />
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
	function editar(descripcion, id){
		$('#modalEdicion').modal('show');
		$('#eddescripcion').val(descripcion);
		$('#idcategoria').val(id);
	}
    </script>
	<style>
		th{
			text-align:center;
		}
	</style>

</body>

</html>
