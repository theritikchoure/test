@extends('backend.layout')

@section('title', 'Admin Category Edit Section')
@section('page_title', 'Category Edit')

@section('container')
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Category</h4>
            @if (Session::has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group">
                    <label for="exampleInputUsername1">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputUsername1" value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Details</label>
                    <input type="text" name="detail" class="form-control" id="exampleInputEmail1" value="{{$data->detail}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="hidden" name="image" value="{{$data->image}}">
                    <input type="file" name="image" class="form-control" id="exampleInputPassword1" value="{{$data->image}}">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
        </div>
    </div>
@endsection