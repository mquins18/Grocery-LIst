@extends('layouts.app')

@section('title', 'Home')

@section('content')



<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
    <table class="table-fixed w-full">
        <thead>
            <tr class="bg-black text-white">
                <th class="w-20 py-4 ...">ID</th>
                <th class="w-1/8 py-4 ...">Item Name</th>
                <th class="w-1/16 py-4 ...">Category</th>
                <th class="w-1/16 py-4 ...">Quantity</th>
                <th class="w-1/16 py-4 ...">Created</th>
                <th class="w-1/16 py-4 ...">Updated</th>
                <th class="w-28 py-4 ...">Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($items as $row)
                <tr>
                    <td class="py-3 px-6">{{ $row->id }}</td>
                    <td class="p-3 text-center">{{ $row->itemname }}</td>
                    <td class="p-3 text-center">{{ $row->category }}</td>
                    <td class="p-3 text-center">{{ $row->quantity }}</td>
                    <td class="p-3 text-center">{{ $row->created_at }}</td>
                    <td class="p-3 text-center">{{ $row->updated_at }}</td>
                    <td class="p-3 flex justify-center">
                        <form id="deleteForm_{{ $row->id }}" action="{{ route('items.destroy', $row->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" class="bg-red-500 text-white px-3 py-1 rounded-sm mx-1" onclick="confirmDelete({{ $row->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <button onclick="openEditModal({{ $row->id }}, '{{ $row->itemname }}', '{{ $row->category }}', {{ $row->quantity }})"
                            class="bg-green-500 text-white px-3 py-1 rounded-sm">
                            <i class="fas fa-pen"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for Edit -->
<div id="editModal" class="modal" style="display: none;">
    <div class="modal-content bg-white p-4 border-gray-100 shadow-xl rounded-lg" style="width: 400px; max-width: 80vw; text-align: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <form id="editForm" action="{{ route('items.update', ':itemId') }}" method="POST">
            @csrf
            @method('put')
            <h2 class="text-2xl text-center py-4 mb-4 font-semibold" id="modalTitle">Edit Grocery Item</h2>

            <input type="hidden" name="itemId" id="itemId">

            <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
                placeholder="Item Name" name="itemname" id="itemname">

            <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
                placeholder="Category" name="category" id="category">

            <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900"
                placeholder="Quantity" name="quantity" id="quantity">


            <div class="flex justify-end mt-4">
                <button type="submit" class="mr-2 bg-green-500 p-2 font-semibold rounded text-white hover:bg-green-600">Update</button>

                <!-- Close the modal when this link is clicked -->
                <a href="#" onclick="closeEditModal()" class="text-green-500 border border-green-500 rounded p-2 hover:bg-green-100">Close</a>
            </div>
        </form>

  
    </div>
</div>


<!-- Modal for Delete Confirmation -->
<div id="deleteModal" class="modal" style="display: none;">
    <div class="modal-content bg-white p-4 border-gray-100 shadow-xl rounded-lg" style="width: 400px; max-width: 80vw; text-align: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">
        <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Delete Confirmation</h2>
        <p>Are you sure you want to delete this item?</p>
        <div class="flex justify-end mt-4">
            <button onclick="deleteItem()" class="mr-2 bg-red-500 p-2 font-semibold rounded text-white hover:bg-red-600">Delete</button>
            <a href="#" onclick="closeDeleteModal()" class="text-red-500 border border-red-500 rounded p-2 hover:bg-red-100">Cancel</a>
        </div>
    </div>
</div>


<script>
    var editModal = document.getElementById('editModal');
    var deleteModal = document.getElementById('deleteModal');
    var deleteItemId;

    function openEditModal(itemId, itemname, category, quantity) {
        // Set form action with the correct item ID
        document.getElementById('editForm').action = '{{ route("items.update", ":itemId") }}'.replace(':itemId', itemId);

        // Set input values
        document.getElementById('itemId').value = itemId;
        document.getElementById('itemname').value = itemname;
        document.getElementById('category').value = category;
        document.getElementById('quantity').value = quantity;

        // Set modal title
        document.getElementById('modalTitle').textContent = 'Edit Grocery Item ' + itemId;

        // Open the modal
        editModal.style.display = 'block';
    }

    function closeEditModal() {
        editModal.style.display = 'none';
    }

    function confirmDelete(itemId) {
        deleteItemId = itemId;
        deleteModal.style.display = 'block';
    }

    function deleteItem() {
        document.getElementById('deleteForm_' + deleteItemId).submit();
    }

    function closeDeleteModal() {
        deleteModal.style.display = 'none';
    }
</script>

@endsection
