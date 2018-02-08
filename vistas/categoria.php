<?php 
require 'header.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categorías
        <small>Agrega, modifica y desactiva las categorías</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categorías</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div class="box box-warning">
        <div class="box-header with-border">
              <h3 class="box-title"><button class="btn btn-block btn-success" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h3>
              <div class="box-tools pull-right"> </div>
        </div>
        <div class="box-body table-responsive" id="listadosregistros">
          <table id="tbllistado" class="table table-bordered table-striped table-condensed">
            <thead>
            <tr>
                  <th>Opciones</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>Opciones</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                </tr>
                </tfoot>
              </table>
        </div>
      </div>
      <div class="box box-primary" id="formularioregistros">
            <div class="box-header">
              <h3 class="box-title">Agregar Categoría</h3>
            </div>
            <!-- /.box-header -->
              <form role="form" name="formulario"  id="formulario"  method="POST">
                <div class="box-body">  
                <!-- text input -->
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Nombre :</label>
                  <input type="hidden" name="idcategoria" id="idcategoria">
                  <input type="text" name="nombre" id="nombre" maxlength="50" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                  <label>Descripción: </label>
                  <textarea class="form-control" rows="3" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción"></textarea>
                </div>
                
              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-danger" onclick="cancelarForm()"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                <button type="submit" class="btn btn-info pull-right" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
              </div>
              </form>
            </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
require 'footer.php';
  ?>
<script type="text/javascript" src="scripts/categoria.js"></script>