@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Item
                            <a href="{{ url('item') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('item.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label>Description</label><textarea name="description" rows="3" class="form-control"></textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div> 

                            <div class="mb-3">
                                <label>Category</label>
                                <select class="form-select" name="category" aria-label="Default select"> 
                                    @foreach($categories as $category)
                                        <option value="{{ $category }}">{{ $category }}</option>
                                    @endforeach
                                </select>
                                @error('category') 
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection