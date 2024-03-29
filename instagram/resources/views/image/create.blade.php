@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Subir nueva imagen
                        <div class="card-body">
                            <form method="post" action="{{ route('image.save') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="image_path" class="col-md-3 col-form-label text-md-right">
                                        Imagen
                                    </label>
                                    <div class="col-md-7">
                                        <input id="image_path" type="file" name="image_path" class="form-control @error('image_path') is-invalid @enderror" required />
                                        @error('image_path')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-3 col-form-label text-md-right">
                                        Descripción
                                    </label>
                                    <div class="col-md-7">
                                        <textarea id="description" type="file" name="description" class="form-control" required></textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="submit" class="btn btn-primary" value="Subir imagen" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
