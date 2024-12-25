@extends('layouts.frontend')

@section('content')
<div class="main-content"> 
    <div class="dashboard-header">
        <h1>Dashboard</h1>
    </div>
    <div class="dcards my-5"> 
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h2>16</h2>
                    <p>REQUEST STATUS</p> 
                    <a class="btn" href="#" role="button">Learn More</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h2>0</h2>
                    <p>BORROWED ITEMS</p> 
                    <a class="btn" href="#" role="button">Learn More</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h2>0</h2>
                    <p>ITEMS</p> 
                    <a class="btn" href="/item" role="button">Learn More</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h2>0</h2>
                    <p>Generated Reports</p> 
                    <a class="btn" href="#" role="button">Learn More</a>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection