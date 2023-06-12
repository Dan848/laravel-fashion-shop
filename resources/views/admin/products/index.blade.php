@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Lista Prodotti</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Prodotti</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fa-solid fa-gem me-1"></i>Prodotti</div>
            <a class="btn btn-primary fw-medium d-flex align-items-center" href="{{ route("admin.products.create") }}"><i class="fa-regular fa-plus me-1 text-danger fs-5 vertical-center fw-bolder"></i>Aggiungi</a>
        </div>
        <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Anteprima</th>
                <th scope="col">Realizzato il</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->name }}</th>
                    <td>
                        <div class="img-preview"><img class="img-fluid" src="{{ $product->image_link }}" alt=""></div>
                    </td>
                    @php

                    @endphp
                    <td>{{ $product->created_at }}</td>
                    <td class="gap-2">
                        <a class="btn btn-primary" href="{{ route('admin.products.show', $product->slug) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-secondary" href="{{ route('admin.products.edit', $product->slug) }}"><i
                                class="fa-solid fa-pencil"></i></a>
                        <form class="d-inline" action="{{ route('admin.products.destroy', $product) }}"
                            method="POST">
                            @method("DELETE")
                            @csrf
                            <button class="btn btn-danger delete-button" data-item-title="{{ $product->name }}"
                                type="submit"><i class="fa-solid fa-eraser"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links("vendor.pagination.bootstrap-5")}}
</div>
</div>
</div>
    @include("partials.delete-modal")
@endsection
