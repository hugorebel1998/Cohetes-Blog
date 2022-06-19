@extends('layouts.home')
@section('content')
    <div class="container-fluid">
        <div class="row content-justify-content-center">
            <div class="col-md-12">
                <ul id="success_list"></ul>
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
                                {{-- @foreach ($categorias as $categoria) --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>


                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('formulario')
    <script>
        $(document).ready(function() {
        //    Funcion mostrar las catregorias
        categoryAll();

        function categoryAll()
        {
            let url = "./categories/all"
            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'json', 
                success: function(resp) {
                        $('tbody').html("");
                    $.each(resp.categorias, function(index, categoria)
                    {
                        $('tbody').append(`
                            <tr>
                                        <td>${categoria.id}</td>
                                        <td>${categoria.name}</td>
                                        <td>${categoria.slug}</td>
                                        <td>${categoria.status}</td>
                                        <td>${categoria.description}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-rosa dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Acciones
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>
                                                        Editar</a>
                                                    <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i>
                                                        Eliminar</a>
                                                    {{-- <a class="dropdown-item" href="#">Something else here</a> --}}
                                                </div>
                                            </div>
                                        </td>


                                    </tr>
                                    `);

                    });
                }
            });

        }




            // Funcion guardar categoria
            $(document).on("click", '.add_Category', function(e) {
                e.preventDefault();
                //    console.log("Hoola");
                let url = "./categories/store";
                let data = {
                    'nombre': $('#nombre').val(),
                    'estatus': $('#estatus').val(),
                    'descripcion': $('#descripcion').val(),
                }
                // console.log(data);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // console.log(headers);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function(resp) {
                        // console.log(result)
                        if (resp.status === 400) {
                            $('#error_list').html("");
                            $('#error_list').addClass("alert alert-danger");
                            $.each(resp.errors, function(index, value) {
                                $('#error_list').append('<li>' + value + '</li>')
                            });
                        }

                        if(resp.status === 200){
                            $('#success_list').html("");
                            $('#success_list').addClass("alert alert-success");
                            $('#success_list').text(resp.message);
                            $('#addCategory').modal('hide');
                            $('#formCategory')[0].reset();
                           
                            categoryAll();


                        }
                    }
                });
            })
        });
    </script>
@endsection
