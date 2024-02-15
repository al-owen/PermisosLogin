@extends('products.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="mb-4">
            <h1 class="text-2xl font-bold text-gray-700">Productos</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
                    <p class="text-gray-600">{{ $product->description }}</p>
                    <p class="text-gray-800 font-bold">€{{ number_format($product->price, 2) }}</p>
                    <br>
                    {{-- rol locked --}}
                    <a href="{{ route('products.show', $product->id) }}" class="px-3 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Mostrar</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
