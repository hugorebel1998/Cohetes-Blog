@extends('layouts.home')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-rosa">
                        <div><i class="fas fa-boxes"></i> Gestión de categorias</div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <div class="p-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-rosa" data-toggle="modal" data-target="#addCategory">
                                    <i class="fas fa-plus"></i> Agregar
                                </button>

                                @include('components.modal')
                            </div>
                        </div>
                        {{-- <div class="table-responsive"> --}}
                        <table class="table table-striped table-hover">
                            <thead style="background: #3d0125; color:white">
                                <tr class="table-azul">
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre categoria</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorias as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->slug }}</td>
                                        <td>
                                            @if ($categoria->status == 'En existencia')
                                            <span class="badge badge-success">
                                                {{ $categoria->status }}
                                            </span>
                                            @else
                                            <span class="badge badge-danger">
                                                {{ $categoria->status }}
                                            </span>
                                                
                                            @endif
                                        </td>
                                        <td>{{ $categoria->description }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-rosa dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ $categoria->id }}"
                                                        data-toggle="modal"
                                                        data-target="#editCategory{{ $categoria->id }}"><i
                                                            class="fas fa-edit"></i>
                                                        Editar categoria
                                                    </a>
                                                    <form action="{{ route('admin.categories.delete', $categoria->id) }}"
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
                                        @include('components.modal-edit')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
