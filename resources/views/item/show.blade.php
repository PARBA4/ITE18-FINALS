@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Show Item Detail</h4>
                        <div>
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-success me-2">Edit</a>
                            <a href="{{ url('item') }}" class="btn btn-danger float-end">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="fw-bold">Name</label>
                            <p>
                                {{ $item->name }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Description</label>
                            <p>
                                {!! $item->description !!}
                            </p>
                        </div>  

                        <div class="mb-3">
                            <label class="fw-bold">Category</label>
                            <p>
                                {!! $item->category !!}
                            </p>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection