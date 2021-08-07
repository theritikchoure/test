@extends('backend.layout')

@section('title', 'Admin Comment Section')
@section('page_title', 'Comment')

@section('container')
<div class="content-wrapper">
    <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">All Comments</h4>
              <div class="table-responsive">
                <table class="table comment-table">
                  <thead>
                    <tr>
                      <th> User Name </th>
                      <th> Post Name </th>
                      <th> Comment </th>
                      <th> Status</th>
                      <th> Delete </th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($comment as $item)
                    <tr>
                        <td>{{$item->user->name}}</td>
                        <td> {{$item->post->title}} </td>
                        <td>{{$item->comment}}</td>
                        <td>
                            @if($item->status == 1)
                            <a href="/admin/comment/status/{{$item->id}}/0">
                                <div class="badge badge-outline-success">Approved</div>
                            </a>
                            @else
                            <a href="/admin/comment/status/{{$item->id}}/1">
                                <div class="badge badge-outline-warning">Disapproved</div>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="/admin/comment/delete/{{$item->id}}">
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
      </div>
</div>
@endsection