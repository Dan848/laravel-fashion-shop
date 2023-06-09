@extends('layouts.app')

@section('title')
    Create
@endsection

@section('content')
    <div class="container mb-5">
        <h2 class="mt-5 mb-4 text-center">
            Aggiungi un nuovo Prodotto
        </h2>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Progetti</a></li>
            <li class="breadcrumb-item active">Aggiungi</li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <form class="container" method="POST" action="{{ route('admin.products.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{-- Errors Section --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-2">

                            @error('name')
                                <p>{{ $message }}</p>
                            @enderror

                            @error('price')
                                <p>{{ $message }}</p>
                            @enderror

                            @error('image_link')
                                <p>{{ $message }}</p>
                            @enderror

                            @error('description')
                                <p>{{ $message }}</p>
                            @enderror

                            @error('old_id')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                    <!-- NAME & PRICE -->
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autofocus>
                                <label for="name">Nome del prodotto</label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input id="price" type="number" step="0.01"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required autofocus>
                                <label for="price">Prezzo (Esempio: 8.99)</label>
                            </div>
                        </div>
                    </div>
                    <!-- IMAGE -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating mb-3">
                                <input id="image_link" type="file"
                                    class="form-control @error('image_link') is-invalid @enderror" name="image_link"
                                    autofocus>
                                <label class="mb-5" for="image_link">Anteprima Immagine</label>
                            </div>
                        </div>
                    </div>
                    <!-- DESCRIPTION -->
                    <div class="form-floating mb-3">
                        <label for="description">Descrizione</label>
                        <textarea id="description" class="form-control h-100 @error('description') is-invalid @enderror" name="description"
                            rows="4" autofocus></textarea>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="old_id">id</label>
                        <input type="text" id="old_id"
                            class="form-control h-100 @error('old_id') is-invalid @enderror" name="old_id" rows="4"
                            autofocus>
                    </div>
                    <!-- SAVE and RESET -->
                    <div class="d-flex align-items-center justify-content-center mt-4 mb-0">
                        <button class="btn btn-secondary me-2" type="reset">Reset</button>
                        <button class="btn btn-primary ms-2" type="submit">Aggiungi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
