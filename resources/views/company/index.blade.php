@extends('layouts.dashboardapp')

@section('title', 'Company')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                List Company
            </div>
            <div class="card-body">
                <h4 class="card-title">Title</h4>
                <p class="card-text">Text</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                Add Company
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                      <label>Company Name</label>
                      <input type="text" class="form-control" name="" placeholder="Enter Company Name">
                    </div>
                    <div class="form-group">
                      <label>Company Location</label>
                      <input type="text" class="form-control" name="" placeholder="Enter Company Location">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
