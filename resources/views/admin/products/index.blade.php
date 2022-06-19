@extends('layouts.home')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header bg-rosa">
                        <div><i class="fas fa-box"></i> Gestión de productos</div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <div class="p-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-rosa" data-toggle="modal" data-target="#addProduct">
                                    <i class="fas fa-plus"></i> Agregar
                                </button>

                                @include('components.product-modal')
                            </div>
                        </div>
                        {{-- <div class="table-responsive"> --}}
                        <table class="table table-striped table-hover">
                            <thead style="background: #3d0125; color:white">
                                <tr class="table-azul">
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($categorias as $categoria) --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-rosa dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href=""
                                                        data-toggle="modal"
                                                        data-target="#editCategory"><i
                                                            class="fas fa-edit"></i>
                                                        Editar categoria
                                                    </a>
                                                    <form action=""
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" onclick="return confirm('¿Estas seguro?')">
                                                            <i class="far fa-trash-alt"></i> 
                                                            Eliminar categoria</button>
                                                    </form>
                                                    {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                                                </div>
                                            </div>
                                        </td>
                                        {{-- @include('components.modal-edit') --}}
                                    </tr>
                            
                            </tbody>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
