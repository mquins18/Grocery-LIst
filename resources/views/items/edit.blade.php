@extends('layouts.app')

@section('title', 'Edit')

@section('content')

<form action="{{ route('items.update', $item->id)}}" method="POST"
    class="bg-white w-1/3 p-4 border-gray-100 shadow-xl rounded-lg">
    @csrf
    @method('PUT')
    <h2 class="text-2xl text-center py-4 mb-4 font-semibold">
        Edit Grocery Item {{ $item->id }}
    </h2>

    <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
    placeholder="Item Name" name="itemname" value="{{ $item->itemname }}">

    <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
    placeholder="Category" name="category" value="{{ $item->category }}">

    <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
    placeholder="Quantity" name="quantity" value="{{ $item->quantity }}">

    <button type="submit" class="my-3 w-full bg-green-500 p-2 font-semibold
    rounded text-white hover:bg-green-600">Create</button>
</form>

@endsection