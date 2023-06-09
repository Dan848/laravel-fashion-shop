@extends('layouts.app')

@section('content')
    <h1>Ecco i prodotti </h1>

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
                        <a class="btn btn-primary" href="{{ route('admin.products.show', $product) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-secondary" href="{{ route('admin.products.edit', $product) }}"><i
                                class="fa-solid fa-pencil"></i></a>
                        <form class="d-inline" action="{{ route('admin.products.destroy', $product) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger delete-button" data-item-title="{{ $product->name }}"
                                type="submit"><i class="fa-solid fa-eraser"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-5') }}
@endsection
