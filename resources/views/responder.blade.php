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
                    <div class="card-header">{{ __('Responder a la Publicación') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/store_prod/{{$pub_id}}">
                            @csrf
                            <div class="form-group">
                                <label for="producto">Nombre del Producto*</label>
                                <input required type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del Producto">
                            </div>
                            <span class="btn btn-primary  fileinput-button">
                            <span id="seleccion">Seleccionar Imágenes</span>
                            <input class='file-input' onclick='myFunction(this)' type='file' name='imagenes[]'  id='files' multiple='multiple' accept='image/*'><br/>
                            </span>
                            <hr>
                            <div>
                                <output id="Filelist">

                                </output>
                            </div>
                            <hr>
                            <div id="displayFileNames"></div>



                            <div class="form-group">
                                <label for="calle1">Dirección de calle(esta información no se hara publica)*</label>
                                <input required type="text" class="form-control" id="calle1" name="calle1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="calle2">Segunda dirección de calle(esta información no se hara publica)</label>
                                <input type="text" class="form-control" id="calle2" name="calle2" placeholder="" >
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar al publicador
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
