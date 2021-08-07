@extends('backend.layout')

@section('title', 'Admin Category Create Section')
@section('page_title', 'Add Category')

@section('container')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Category</h4>
            @if (Session::has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form class="forms-sample" action="{{url('admin/category')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Details</label>
                    <input type="text" name="detail" class="form-control" id="exampleInputEmail1" placeholder="Detailss">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
        </div>
    </div>
@endsection