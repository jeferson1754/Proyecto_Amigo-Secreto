<div class="modal fade" id="editAdmin<?php echo $mostrar['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">
          Actualizar Anime
        </h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <form method="POST" action="_functions.php">
        <input type="hidden" name="id" value="<?php echo $mostrar['ID']; ?>">
        <div class="modal-body" id="cont_modal">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $mostrar['Nombre_Personas']; ?>" disabled>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Opcion 1:</label>
            <input type="text" name="op1" class="form-control" value="<?php echo $mostrar['Deseo1']; ?>" required="true">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Opcion 2:</label>
            <input type="text" name="op2" class="form-control" value="<?php echo $mostrar['Deseo2']; ?>" required="true">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Opcion 3:</label>
            <input type="text" name="op3" class="form-control" value="<?php echo $mostrar['Deseo3']; ?>" required="true">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <input type="hidden" name="accion" value="editar_admin">
          </div>
      </form>

    </div>
  </div>
</div>
<!---fin ventana Update --->