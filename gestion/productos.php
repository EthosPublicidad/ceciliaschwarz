	<?php 
	require_once "Objetos/GestionProducto.php";
	require_once "Objetos/GestionCategoria.php";
	session_start();

	$productos = new GestionProducto();
	$gestioncategoria = new GestionCategoria();

	if(!isset($_SESSION['login']) and $_SESSION['login']=='false'){
		header('Location: ./index.php');
	}
	include "header.php";
	?>
						<div class="col-lg-12">
							<h1 class="page-header">
							Productos
							<button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal">
								Crear
							</button>
							<!-- Modal -->
							<div class="modal fade out" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="false" style="display: none;">
								<div class="modal-dialog" style="width: 80%;">
									<div class="modal-content">
										<form class="formModal" action="gestion.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
												<h4 class="modal-title" id="myModalLabel">Crear Producto</h4>
											</div>
											<div class="modal-body" style="display: inline-block;">
												<div class="col-md-6 col-sm-6 text-left">
													<label>Descripcion</label>
													<input name="descripcion" placeholder="Descripcion" class="form-control" required="required" />
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Precio</label>
													<input name="precio" placeholder="Precio" class="form-control" required="required" />
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Categoria</label>
													<select name="categoria" class="form-control">
														<?php 
															$categorias = $gestioncategoria->traerCategorias();
															foreach($categorias as $categoria){
																echo "<option value='$categoria[id]'>$categoria[descripcion]</option>";
															}

														?>
													</select>
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Foto 1</label>
													<input name="frontal" placeholder="Frontal" type="file" class="form-control" />
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Foto 2</label>
													<input name="lateral" placeholder="Lateral" type="file" class="form-control" />
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Foto 3</label>
													<input name="espalda" placeholder="Espalda" type="file" class="form-control" />
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Stock</label>
													<input name="stock" placeholder="Stock" type="number" min="0" class="form-control" />
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Es Destacado?</label>
													<select name="destacado" class="form-control">
														<option value="0">NO</option>
														<option value="1">SI</option>
													</select>
												</div>
												<div class="col-md-6 col-sm-6 text-left">
													<label>Es Tendecia?</label>
													<select name="tendencia" class="form-control">
														<option value="0">NO</option>
														<option value="1">SI</option>
													</select>
												</div>
												<div class="col-md-12 text-left">
													<label>Informaci&oacute;n Detallada</label>
													<textarea style="height: 200px;" name="infodetallada" class="form-control"></textarea>
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" value="Continuar" />
												<input type="hidden" name="opcion" value="altaproducto" />
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
											Descripcion
										</th>
										<th>
											Precio
										</th>
										<th>
											Categoria
										</th>
										<th>
											Acciones
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$regproductos = $productos->traerProductos();
									if($regproductos){
										
										foreach ($regproductos as $reg)
										{
											echo "
											<tr>
												<td>".$reg['descripcion']."</td>
												<td>".$reg['precio']."</td>
												<td>".$reg['categoria']."</td>
												";
												if($reg['estado']=='B'){
													echo "<td>
														<a title='Activar' class='btn btn-primary' href='./gestion.php?id=$reg[id]&opcion=activarproducto'><i class='fa fa-spin fa-refresh'></i></a>
													</td>";
												}else{
													$info = rawurlencode($reg['infodetallada']);
													echo "<td>
														<button title='Editar' class='btn btn-success' onclick='editar(\"$reg[descripcion]\", $reg[precio], \"$reg[idcategoria]\", \"$reg[foto1]\", \"$reg[foto2]\", \"$reg[foto3]\", \"$reg[id]\", \"$reg[stock]\", \"$reg[destacado]\", \"$reg[tendencia]\", \"$info\");'><i class='fa fa-pencil'></i></button>
														<a title='Borrar' class='btn btn-danger' href='./gestion.php?id=$reg[id]&opcion=bajaproducto'><i class='fa fa-times'></i></a>
													</td>";
												}
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
							<div class="col-md-6 col-sm-6 text-left">
								<label>Descripcion</label>
								<input name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control" required="required" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Precio</label>
								<input name="precio" id="precio" placeholder="Precio" type="text" class="form-control" required="required" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Categoria</label>
								<select name="categoria" id="categoria" class="form-control">
									<?php 
										$categorias = $gestioncategoria->traerCategorias();
										foreach($categorias as $categoria){
											echo "<option value='$categoria[id]'>$categoria[descripcion]</option>";
										}

									?>
								</select>
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Foto 1</label> <span id="foto1"></span>
								<input name="frontal" placeholder="Frontal" type="file" class="form-control" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Foto 2</label> <span id="foto2"></span>
								<input name="lateral" placeholder="Lateral" type="file" class="form-control" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Foto 3</label> <span id="foto3"></span>
								<input name="espalda" placeholder="Espalda" type="file" class="form-control" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Stock</label>
								<input name="stock" id="stock" placeholder="Stock" type="number" min="0" class="form-control" />
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Es Destacado?</label>
								<select name="destacado" id="destacado" class="form-control">
									<option value="0">NO</option>
									<option value="1">SI</option>
								</select>
							</div>
							<div class="col-md-6 col-sm-6 text-left">
								<label>Es Tendecia?</label>
								<select name="tendencia" id="tendencia" class="form-control">
									<option value="0">NO</option>
									<option value="1">SI</option>
								</select>
							</div>
							<div class="col-md-12 text-left">
								<label>Informaci&oacute;n Detallada</label>
								<textarea style="height: 200px;" name="infodetallada" class="form-control" id="infodetallada"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<input type="submit" class="btn btn-primary" value="Continuar" />
							<input type="hidden" name="opcion" value="editarproducto" />
							<input type="hidden" name="id" id="idproducto" />
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
				}
			});
		});
		function editar(desc, precio, categoria, foto1, foto2,foto3,id, stock, destacado, tendencia, infodetallada){
			$('#modalEdicion').modal('show');

			$('#descripcion').val(desc);
			$('#precio').val(precio);
			$('#categoria').val(categoria);
			$('#foto1').html(foto1);
			$('#foto2').html(foto2);
			$('#foto3').html(foto3);
			$('#idproducto').val(id);
			$('#stock').val(stock);
			$('#destacado').val(destacado);
			$('#tendencia').val(tendencia);
			$('#infodetallada').val(decodeURIComponent(infodetallada));
		}
		</script>
		<style>
			th{
				text-align:center;
			}
		</style>

	</body>

	</html>
