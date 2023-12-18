@extends('layouts.app')

@section('title', 'Create')

@section('content')

<!-- Modal Trigger Link -->
<a href="#" id="openModalLink" class="text-white rounded px-4 pt-1 h-10 bg-indigo-500 font-semibold mx-2 hover:bg-indigo-600">
    Create
</a>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content bg-white p-4 border-gray-100 shadow-xl rounded-lg">
        <form action="{{ route('items.store')}}" method="POST">
            @csrf
            <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Create Grocery Item</h2>

            <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" placeholder="Item Name" name="itemname">

            <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" placeholder="Category" name="category">

            <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" placeholder="Quantity" name="quantity">

            <button type="submit" class="my-3 w-full bg-indigo-500 p-2 font-semibold rounded text-white hover:bg-indigo-600">Create</button>
        </form>

        <!-- Close the modal when this link is clicked -->
        <a href="#" id="closeModalLink" class="block text-center mt-4 text-indigo-500 hover:text-indigo-700">Close</a>
    </div>
</div>

<script>
    // Get modal element
    var modal = document.getElementById('myModal');

    // Get open modal link
    var openModalLink = document.getElementById('openModalLink');

    // Get close modal link
    var closeModalLink = document.getElementById('closeModalLink');

    // Open modal
    openModalLink.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    // Close modal
    closeModalLink.addEventListener('click', function() {
        modal.style.display = 'none';
    });
</script>

@endsection
