@extends('backend.layout')

@section('title', 'Admin Post Edit Section')
@section('page_title', 'Post Edit')

@section('container')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Post</h4>
        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
            @method('PUT')
          @if (Session::has('success'))
          <div class="alert alert-success mb-5">{{session('success')}}</div>
          @endif
          @if (Session::has('error'))
          <div class="alert alert-danger mb-5">{{session('error')}}</div>
          @endif
        @csrf
        
          <div class="form-group">
            <label for="exampleInputName1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="" value="{{$data->title}}">
            <div class="text-danger">@error('title') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Category</label>
            <select name="category_id" id="cars" class="form-control">
                @foreach ($cat as $item)
                    @if ($data->category_id == $item->id)
                    <option selected value="{{$item->id}}">
                    @else
                    <option value="{{$item->id}}">
                    @endif
                    {{$item->title}}</option>
                @endforeach
            </select>
            <div class="text-danger">@error('category_id') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Detail</label>
            <textarea name="detail" class="form-control" id="exampleTextarea1" rows="4">{{$data->detail}}</textarea>
            <div class="text-danger">@error('detail') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Tags</label>
            <textarea name="tags" class="form-control" id="exampleTextarea1" rows="3">{{$data->tags}}</textarea>
            <div class="text-danger">@error('tags') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Old Image</label>
            <div class="preview-list">
                <div class="preview-item">
                    <div class="preview-thumbnail">
                        <img src="/images/thumb/{{$data->thumb}}" alt="" class="rounded-circle">
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">New Thumb Image</label>
            <input type="file" name="thumb" class="form-control">
            <div class="text-danger">@error('thumb') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label>Old Post Image</label>
            <div class="preview-list">
                <div class="preview-item">
                    <div class="preview-thumbnail">
                        <img src="/images/full_img/{{$data->full_img}}" alt="" class="rounded-circle">
                    </div>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label>New Post Image</label>
            <input type="file" name="full_img" id="" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
</div>
@endsection