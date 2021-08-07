@extends('backend.layout')

@section('title', 'Admin Post Create Section')
@section('page_title', 'Post Create')

@section('container')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Post</h4>
        <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
          @if (Session::has('success'))
          <div class="alert alert-success mb-5">{{session('success')}}</div>
          @endif
          @if (Session::has('error'))
          <div class="alert alert-danger mb-5">{{session('error')}}</div>
          @endif
        @csrf
          <div class="form-group">
            <label for="exampleInputName1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title">
            <div class="text-danger">@error('title') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">Category</label>
            <select name="category_id" id="cars" class="form-control">
                @foreach ($cat as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
            <div class="text-danger">@error('category_id') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Detail</label>
            <textarea name="detail" class="form-control" id="detail" rows="4"></textarea>
            <div class="text-danger">@error('detail') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleTextarea1">Tags</label>
            <textarea name="tags" class="form-control" id="exampleTextarea1" rows="3"></textarea>
            <div class="text-danger">@error('tags') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Thumb Image</label>
            <input type="file" name="thumb" class="form-control">
            <div class="text-danger">@error('thumb') {{$message}} @enderror</div>
          </div>
          <div class="form-group">
            <label>Full Image</label>
            <input type="file" name="full_img" id="" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-dark">Cancel</button>
        </form>
      </div>
    </div>
</div>

<script>
  ClassicEditor
      .create( document.querySelector( '#detail1' ), {
          removePlugins: [ 'image']
      })
      .catch( error => {
          console.error( error );
      } );
</script>

@endsection