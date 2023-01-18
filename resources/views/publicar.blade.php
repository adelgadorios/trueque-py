@extends('layouts.app')

@section('content')
    @push('styles')

        <link href="{{ asset('css/image.css') }}" rel="stylesheet">
    @endpush
    @push('scripts')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/image.js') }}" defer></script>

    @endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Publicar') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/store">
                            @csrf
                            <div class="form-group">
                                <label for="titulo">Titulo de la Publicacion*</label>
                                <input required type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo de la publicacion">
                            </div>
                            <div class="form-group">
                                <label for="producto">Nombre del Producto*</label>
                                <input oninvalid="this.setCustomValidity('Seleccione una categoría')"
                                       oninput="this.setCustomValidity('')"  required type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del Producto">
                            </div>

                            <div class="form-group">
                                <label >Categorías*</label>
                                <select oninvalid="this.setCustomValidity('Seleccione una categoría')"
                                oninput="this.setCustomValidity('')"  class="form-control"  name="categoria" id="categoria">
                                    <option value="" selected="selected">Todas las categorías</option>
                                    <option value="motor">Motor</option>
                                    <option value="inmuebles">Inmuebles</option>
                                    <option value="telefonos">Teléfonos y tablets</option>
                                    <option value="electronica">Electrónica</option>
                                    <option value="hogar">Hogar, muebles y jardín</option>
                                    <option value="servicios">Servicios</option>
                                    <option value="hobbies">Hobbies, Música, Libros</option>
                                    <option value="deportes">Deportes</option>
                                    <option value="herramientas">Herramientas de construcción y oficina</option>
                                </select>
                            </div>

                            <span class="btn btn-primary fileinput-button">
                            <span id="seleccion">Seleccionar Imágenes</span>
                            <input class='file-input' onclick='myFunction(this)' type='file' name='imagenes[]'  id='files' multiple='multiple' accept='image/*' required><br/>
                            </span>
                            <hr>
                            <div>
                            <output id="Filelist">

                            </output>
                            </div>
                            <hr>
                            <div id="displayFileNames"></div>
                            <div class="form-group">
                                <label for="cambio">Producto por el cual desea cambiar(Opcional)</label>
                                <input type=text class=form-control id=cambio name=cambio placeholder=Opcional>
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción*</label>
                                <textarea required class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                            </div>
                            <label >Selecciona un departamento*</label>
                            <select class="form-control" id="departamento" name="departamento"  required>
                                <option  name="alto-paraguay">Alto Paraguay</option>
                                <option  name="alto-parana">Alto Paraná</option>
                                <option  name="amambay">Amambay</option>
                                <option  name="asuncion">Asunción</option>
                                <option  name="boqueron">Boquerón</option>
                                <option  name="caaguazu">Caaguazú</option>
                                <option  name="caazapa">Caazapá</option>
                                <option  name="canindeyu">Canindeyú</option>
                                <option  name="central-">Central</option>
                                <option  name="concepcion">Concepción</option>
                                <option  name="cordillera">Cordillera</option>
                                <option  name="guaira">Guairá</option>
                                <option  name="itapua">Itapúa</option>
                                <option  name="misiones">Misiones</option>
                                <option  name="neembucu">Ñeembucú</option>
                                <option  name="paraguari">Paraguarí</option>
                                <option  name="presidente-hayes">Presidente Hayes</option>
                                <option  name="san-pedro">San Pedro</option>
                            </select>
                            <div class="form-group">
                                <label for="zona">Zona*</label>
                                <input required type="text" class="form-control" id="zona" name="zona" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="calle1">Dirección de calle(esta información no se hara publica)*</label>
                                <input required type="text" class="form-control" id="calle1" name="calle1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="calle2">Segunda dirección de calle(esta información no se hara publica)</label>
                                <input type="text" class="form-control" id="calle2" name="calle2" placeholder="" >
                            </div>

                            <div class="form-group">
                                <label >Desea enviar y recibir los productos vía delivery?</label>
                                <select class="form-control"  required name="delivery_op" id="delivery_op">
                                    <option value="si" selected="selected">Sí</option>
                                    <option value="no">No</option>

                                </select>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Publicar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
