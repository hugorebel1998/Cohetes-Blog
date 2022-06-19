  <!-- Modal -->
  <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header bg-rosa">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva producto</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="#" method="POST">
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre" id="nombre"
                                  class="form-control @error('nombre') is-invalid @enderror">
                              @error('nombre')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>


                          <div class="col-md-6">
                            <label for="nombre">Estatus</label>
                            <select class="form-control @error('estatus') is-invalid @enderror" name="estatus"
                                id="estatus">
                                <option value="" selected class="lang-text" key="select-opction">-- Selecciona
                                    una opcion --
                                </option>
                                <option value="En existencia"
                                    @if (old('status') == 'En existencia') selected="selected" @endif class="lang-text">
                                    En existencia
                                </option>

                                <option value="Sin existencia"
                                    @if (old('status') == 'Sin existencia') selected="selected" @endif class="lang-text">
                                    Sin existencia
                                </option>
                            </select>
                            @error('estatus')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                          <div class="col-md-6 mt-3">
                              <label for="precio">Precio</label>
                              <input type="number" name="precio" id="precio"
                                  class="form-control @error('precio') is-invalid @enderror">
                              @error('precio')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-md-6 mt-3">
                              <label for="cantidad">Cantidad</label>
                              <input type="number" name="cantidad" id="precio"
                                  class="form-control @error('cantidad') is-invalid @enderror">
                              @error('cantidad')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-md-12 mt-3">
                              <div class="form-group">
                                  <label for="imagen">Imagen destacada</label>
                                  <div class="custom-file">
                                      <input accept="image/*" type="file"
                                          class="custom-file-input @error('imagen') is-invalid @enderror" name="imagen"
                                          value="{{ old('imagen') }}">
                                      <label class="custom-file-label"for="customFile">Selecciona imagen</label>
                                      @error('imagen')
                                          <div class="text-danger">{{ $message }}</div>
                                      @enderror
                                  </div>
                              </div>

                          </div>

                        

                          <div class="col-md-12 mt-3">
                              <label for="descripcion">Descripcion</label>
                              <textarea name="descripcion" class="form-control"  cols="30" rows="5"></textarea>

                          </div>
                      </div>
                      <hr>
                      <div class="d-flex justify-content-end">
                          <div class="p-2">
                              <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                          </div>
                          <div class="p-2">
                              <button type="submit" class="add_Category btn btn-rosa">Guardar</button>
                          </div>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>
