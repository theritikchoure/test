@extends('backend.layout')

@section('title', 'Admin Post Section')
@section('page_title', 'Post')

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
                    <th>Details</th>
                    <th>Thumbnail Image</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($post as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->detail}}</td>
                        <td>
                            <div class="preview-list">
                                <div class="preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="/images/thumb/{{$item->thumb}}" alt="" class="rounded-circle">
                                    </div>
                                </div>
                            </div>
                        </td>
                        @if ($item->status == '1')
                        <td>
                            <a href="/admin/post/status/{{$item->id}}/0">
                                <div class="badge badge-outline-success">Activated</div>
                            </a>
                        </td>
                        @else
                        <td>
                            <a href="/admin/post/status/{{$item->id}}/1">
                                <div class="badge badge-outline-warning">Deactiveted</div>
                            </a>
                        </td>
                        @endif
                        <td>
                            <a href="/admin/post/edit/{{$item->id}}">
                                <div class="badge badge-outline-warning">Edit</div>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/post/delete/{{$item->id}}">
                                <div class="badge badge-outline-danger">Delete</div>
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