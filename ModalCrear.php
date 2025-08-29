<!--ventana para Update--->
<div class="modal fade" id="Crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #563d7c !important;">
        <h6 class="modal-title" style="color: #fff; text-align: center;">
          Nuevo Integrante
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>



      <form name="form-data" action="_functions.php" method="POST">

        <div class="modal-body" id="cont_modal">
          <div class="form-group">
            <label for="name" class="form-label">Nombre de la Persona:</label>
            <input type="text" class="form-control" name="nombre" required='true' autofocus>
          </div>

          <div class="form-group">
            <label for="ubi" class="form-label">Rut:</label>
            <input type="text" class="form-control" name="rut">
          </div>
        </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" id="btnEnviar">
            <input type="hidden" name="accion" value="nuevo_user">
            Registrar Integrante
          </button>
        </div>
    </div>
    </form>

  </div>
</div>
</div>
<!---fin ventana Update --->