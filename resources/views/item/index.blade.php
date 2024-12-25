@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endsession
            <div class="d-flex justify-content-between">
                <div class="dashboard-header">
                    <h1 class="mb-0">Items</h1>
                </div>
                <div class="d-flex">
                    <div class="input-group me-3" style="width: 200px"> 
                        <input id="search" type="text" 
                            autocomplete="off"
                            placeholder="Search by name"
                            class="form-control"
                            onkeyup="filterItems()">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                    <a href="{{ url('item/create') }}" class="btn btn-primary d-flex justify-content-center align-items-center">Add Item</a>
                </div>
            </div> 

                <table class="table table-stiped table-bordered my-5">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th> 
                            <th>Category</th> 
                            <th style="width: 200px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="itemTable">
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td> 
                            <td>{{ $item->category }}</td> 
                            <td>
                                <a href="{{ route('item.show', $item->id) }}" class="btn btn-info">Show</a>

                                <form action="{{ route('item.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>

@endsection