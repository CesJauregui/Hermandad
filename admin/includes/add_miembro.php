          <form action="includes/functions.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <h5><button type="submit" class="btn btn-success" name="agregar_i"> Agregar</button></h5>
              </div>
              <div class="form-group">
                <strong><small>(*)Obligatorio</small></strong>
              </div>
              <div class="form-row">
                
                <div class="form-group col-md-6">
                  <label>*Nombre</label>
                  <input type="text" class="form-control" name="nombre_i" required oninvalid="setCustomValidity('Debe ingresar el nombre')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group col-md-6">
                  <label>*Apellidos</label>
                  <input type="text" class="form-control" name="apellido_i" required oninvalid="setCustomValidity('Debe ingresar los apellidos')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group col-md-4">
                  <label>*Tiempo en la hermandad</label>
                  <input type="text" class="form-control" name="tiempo" placeholder="Ejm: 12 meses" required oninvalid="setCustomValidity('Debe ingresar el tiempo')" onchange="try{setCustomValidity('')}catch(e){}">
                </div>
                <div class="form-group col-md-4">
                  <label>Correo</label>
                  <input type="email" class="form-control" name="correo">
                </div>
                <div class="form-group col-md-4">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto">
                </div>
                <input type="hidden" class="form-control" name="estado" value="activo">
              </div>
            </form>