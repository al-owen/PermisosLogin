@extends('products.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4 md:p-8">
                <h2 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h2>
                <p class="mt-2 text-gray-600 text-lg">{{ $product->description }}</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-2xl font-bold text-gray-900">€{{ number_format($product->price, 2) }}</span>
                    {{-- rol locked --}}
                    @can('edit')
                        <a href="{{ route('products.edit', $product->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Editar</a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
