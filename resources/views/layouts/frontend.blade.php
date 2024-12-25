<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inventory</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    </head>
    <body>  

        <nav class="navbar navbar-expand-lg navbar-dark bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="{{ asset('img/Logo.png') }}" alt="" width="40" height="34" class="d-inline-block align-text-top"> 
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 mview m-menu"> 
                    <li class="nav-item"><a href="/" class="active">Dashboard</a></li>
                    <li class="nav-item"><a href="/item">Items</a></li>
                    <li class="nav-item"><a href="#">Setting</a></li>
                    <li class="nav-item"><a href="#">Profile</a></li>
                    <li class="nav-item"><a href="/login">Logout</a></li>
                </ul> 
              </div>
            </div>
          </nav>
        
        <div class="container-fluid layout">
            <div class="row">
                <div class="col-md-2 ps-0 pcview">
                     <!-- Sidebar -->
                    <aside class="sidebar">
                        <ul>
                            <li><a href="/" class="active">Dashboard</a></li>
                            <li><a href="/item">Items</a></li>
                            <li><a href="#">Setting</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="/login">Logout</a></li>
                        </ul>
                    </aside>
                </div>
    
                <div class="col-md-8">
                    <div class="my-5">
                        @yield('content')
                    </div>
                </div>
            </div> 
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            function filterItems() { 
                const query = document.getElementById('search').value;
        
                // Perform an AJAX request to fetch filtered items
                fetch(`/filter-items?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const tableBody = document.getElementById('itemTable');
                        tableBody.innerHTML = ''; // Clear previous items
        
                        // Populate table with new items
                        data.forEach(item => {
                            tableBody.innerHTML += `
                                <tr>
                                    <td>${item.id}</td>
                                    <td>${item.name}</td>
                                    <td>${item.category}</td>
                                    <td>
                                        <a href="/item/${item.id}" class="btn btn-info">Show</a>

                                        <form action="/item/${ item.id}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>`;
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>
        
    </body>
</html>
