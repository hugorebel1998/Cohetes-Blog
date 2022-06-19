  <!-- Modal -->
  <div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header bg-rosa">
              <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
              <button type="button" class="close text-white" data-dismiss="modal"
                  aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="{{ route('admin.categories.store') }}" method="POST">
                  @csrf
                  <div class="row">
                      <div class="col-md-12">
                          <label for="nombre">Nombre de la categoria</label>
                          <input type="text" name="nombre" id="nombre"
                              class="form-control @error('nombre') is-invalid @enderror">
                          @error('nombre')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="col-md-12 mt-3">
                          <label for="nombre">Estatus</label>
                          <select
                              class="form-control @error('estatus') is-invalid @enderror"
                              name="estatus" id="estatus">
                              <option value="" selected class="lang-text"
                                  key="select-opction">-- Selecciona una opcion --
                              </option>
                              <option value="En existencia"
                                  @if (old('status') == 'En existencia') selected="selected" @endif
                                  class="lang-text">
                                  En existencia
                              </option>

                              <option value="Sin existencia"
                                  @if (old('status') == 'Sin existencia') selected="selected" @endif
                                  class="lang-text">
                                  Sin existencia
                              </option>
                          </select>
                          @error('estatus')
                              <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="col-md-12 mb-5 mt-4">
                          <label for="descripcion">Descripción</label>
                          <input type="text" name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" >
                          @error('descripcion')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-end">
                      <div class="p-2">
                          <button type="button" class="btn btn-dark"
                              data-dismiss="modal">Cerrar</button>
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