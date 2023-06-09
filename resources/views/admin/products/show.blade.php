@extends('layouts.admin')

@section('title')
    Show
@endsection

@section('content')
    <div class="container mt-5 mb-3">

        <h1 class="mb-4n text-center">{{ $product->name }}</h1>
        <ol class="breadcrumb mb-4" style="order: -1;">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Progetti</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
        <div class="img-show d-flex justify-content-center mb-4">
            <img class="img-fluid" src="{{ $product->image_link }}" alt="{{ $product->name }}">
        </div>
        <p>{{ $product->description }}</p>
        <div class="row mt-5">
            {{-- <div class="col">
                <p>Prezzo: <span class="fw-medium">{{ $product->price }}</span></p>
                <p>Brand: <span class="fw-medium text-secondary">{{ $product->brand->name }}</span>
                <p>
            </div> --}}
            <div class="col text-end">
                {{-- <p>Categoria: <span class="fw-medium">{{ $product->category->name }}</span></p> --}}
            </div>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <a class="btn btn-secondary" href="{{ route('admin.products.edit', $product->slug) }}"><i
                    class="fa-solid fa-pencil"></i></a>
            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger delete-button" data-item-title="{{ $product->name }}" type="submit"><i
                        class="fa-solid fa-eraser"></i></button>
            </form>
        </div>
    </div>
    @include('partials.delete-modal')
@endsection
