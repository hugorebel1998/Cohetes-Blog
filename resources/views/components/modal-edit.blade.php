  <!-- Modal -->
  <div class="modal fade text-left" id="editCategory{{ $categoria->id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header bg-rosa">
                  <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <ul id="error_list"></ul>
                  <form action="{{ route('admin.categories.update', [$categoria->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="row">
                          <div class="col-md-12">
                              <label for="nombre">Nombre</label>
                              <input type="hidden" value="{{ $categoria->id}}">
                              <input type="text" name="nombre" id="nombre"
                                  class="form-control @error('nombre') is-invalid @enderror"
                                  value="{{ $categoria->name }}">
                              @error('nombre')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>

                          <div class="col-md-12 mt-3">
                              <label for="estatus">Estatus</label>
                              <select class="form-control @error('estatus') is-invalid @enderror" name="estatus"
                                  id="estatus">
                                  <option value="" selected class="lang-text" key="select-opction">-- Selecciona
                                      una opcion --
                                  </option>
                                  <option value="En existencia"
                                      @if ($categoria->status == 'En existencia') selected @endif>
                                      En existencia
                                  </option>

                                  <option value="Sin existencia"
                                      @if ($categoria->status == 'Sin existencia') selected @endif>
                                      Sin existencia
                                  </option>
                              </select>
                              @error('estatus')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="col-md-12 mb-5 mt-4">
                              <div class="form-group">
                                  <label for="description">Descripción</label>
                                  <input type="text" name="descripcion" id="descripcion"
                                      class="form-control @error('descripcion') is-invalid @enderror"
                                      value="{{ $categoria->description }}">
                                  @error('descripcion')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                          </div> 
                      </div>
                      <hr>
                      <div class="d-flex justify-content-end">
                          <div class="p-2">
                              <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                          </div>
                          <div class="p-2">
                              <button type="submit" class="add_Category btn btn-rosa">Actualizar</button>
                          </div>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>
