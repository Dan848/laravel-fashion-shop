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
            <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->name }}">
        </div>
        <p>{{ $product->description }}</p>
        <div class="row mt-5">
            <div class="col">
                <p>Nome Repository: <span class="fw-medium">{{ $product->repo_name }}</span></p>
                <p>Link Repository: <a href="{{ $product->repo_link }}"
                        class="fw-medium text-secondary">{{ $product->repo_link }}</a>
                <p>
            </div>
            <div class="col text-end">
                <p>Realizzato il: <span class="fw-medium">{{ $product->created_on }}</span></p>
            </div>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <a class="btn btn-secondary" href="{{ route('admin.products.edit', $product) }}"><i
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
