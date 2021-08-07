@extends('backend.layout')

@section('title', 'Admin Setting Section')
@section('page_title', 'Setting')

@section('container')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Manage Setting</h4>
        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
          @if (Session::has('success'))
          <div class="alert alert-success mb-5">{{session('success')}}</div>
          @endif
          @if (Session::has('error'))
          <div class="alert alert-danger mb-5">{{session('error')}}</div>
          @endif
        @csrf
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Comment Auto Approve</label>
            @if($data->comment_auto == 1)
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="comment_auto" id="membershipRadios1" value="1" checked> Yes </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="comment_auto" id="membershipRadios2" value="0"> No </label>
                </div>
              </div>   
            @else
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="comment_auto" id="membershipRadios1" value="1"> Yes </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="comment_auto" id="membershipRadios2" value="0" checked> No </label>
                </div>
              </div>   
            @endif
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">User Auto Approve</label>
            @if($data->user_auto == 1)
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="user_auto" id="membershipRadios1" value="1" checked> Yes </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="user_auto" id="membershipRadios2" value="0"> No </label>
                </div>
              </div>   
            @else
              <div class="col-sm-4">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="user_auto" id="membershipRadios1" value="1"> Yes </label>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="user_auto" id="membershipRadios2" value="0" checked> No </label>
                </div>
              </div>   
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Recent Posts Limit</label>
            <input type="text" @if($data) value="{{$data->recent_post_limit}}" @endif name="recent_post_limit" class="form-control" id="exampleInputName1" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Popular Post Limit</label>
            <input type="text" @if($data) value="{{$data->popular_post_limit}}" @endif name="popular_post_limit" class="form-control" id="exampleInputName1" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="exampleInputName1">Recent Comment Limit</label>
            <input type="text" @if($data) value="{{$data->recent_comment_limit}}" @endif name="recent_comment_limit" class="form-control" id="exampleInputName1" placeholder="Title">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
</div>
@endsection