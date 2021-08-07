@extends('backend.layout')

@section('title', 'Admin Category Section')
@section('page_title', 'Category')

@section('container')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
        <div class="card-body">
            <h4 class="card-title">Basic Table</h4>
            <br>
            @if (Session::has('success'))
                <div class="alert alert-success mb-5">{{session('success')}}</div>
            @endif
            <br>
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Detail</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->detail}}</td>
                        <td>
                            <div class="preview-list">
                                <div class="preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="/images/{{$item->image}}" alt="" class="rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </td>
                        @if ($item->status == '1')
                        <td><label class="badge badge-primary">Active</label></td>
                        @else
                        <td><label class="badge badge-success">Deactive</label></td>
                        @endif
                        <td>
                            <a href="/admin/category/edit/{{$item->id}}">
                                <button class="badge badge-warning" style="border:none;">Edit</button>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/category/delete/{{$item->id}}">
                                <button class="badge badge-danger" style="border:none;">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
@endsection