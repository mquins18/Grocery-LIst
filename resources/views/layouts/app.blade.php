<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Grocery App</title>
    
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <!-- Fontawesome Link -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

    <style>
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
  <nav class="h-16 flex justify-start py-4 px-16 mt-10">
      <a href="{{ route('items.index')}}" class="border border-black rounded px-4 pt-1 h-10 bg-white text-black-500 font-semibold mx-2">
          Grocery Items
      </a>
      <!-- Open the modal when this link is clicked -->
      <a href="#" id="openModalLink" class="text-white rounded px-4 pt-1 h-10 bg-black font-semibold mx-2 hover:bg-gray-600">
          Create
      </a>
  </nav>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- You can include your create form or any content for the modal here -->
        <div class="modal-content bg-white p-4 border-gray-100 shadow-xl rounded-lg">
            <form action="{{ route('items.store')}}" method="POST">
                @csrf
                <h2 class="text-2xl text-center py-4 mb-4 font-semibold">Create Grocery Item</h2>

                <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" placeholder="Item Name" name="itemname">
                <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" placeholder="Category" name="category">
                <input class="my-2 w-full bg-gray-200 p-2 text-lg rounded placeholder-gray-900" placeholder="Quantity" name="quantity">

                 <div class="flex justify-end">
                    <button type="submit" class="text-white rounded px-4 pt-1 h-10 bg-black font-semibold mx-2 hover:bg-gray-600">Create</button>

                    <!-- Close the modal when this link is clicked -->
                    <a href="#" id="closeModalLink" class="border border-black rounded px-4 pt-1 h-10 bg-white text-black-500 font-semibold mx-2">Close</a>
                </div>
            </form>
        </div>
    </div>

    <main class="p-16 flex justify-center">
        @yield('content')
    </main>

    <!-- JavaScript to handle modal behavior -->
    <script>
        // Get modal element
        var modal = document.getElementById('myModal');

        // Get open modal link
        var openModalLink = document.getElementById('openModalLink');

        // Get close modal link
        var closeModalLink = document.getElementById('closeModalLink');

        // Open modal
        openModalLink.addEventListener('click', function() {
            modal.style.display = 'flex';
        });

        // Close modal
        closeModalLink.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    </script>
</body>
</html>
