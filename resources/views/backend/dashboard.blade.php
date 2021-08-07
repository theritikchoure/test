  @extends('backend.layout')
@section('title', 'Admin Dashboard')
@section('page_title', 'Dashboard')

@section('container')
<div class="content-wrapper">
  <div class="row">
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Total Post</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{App\Models\Post::count()}}</h2>
              </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Total Categories</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{App\Models\Category::count()}}</h2>
              </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 grid-margin">
      <div class="card">
        <div class="card-body">
          <h5>Total Comments</h5>
          <div class="row">
            <div class="col-8 col-sm-12 col-xl-8 my-auto">
              <div class="d-flex d-sm-block d-md-flex align-items-center">
                <h2 class="mb-0">{{App\Models\Comment::count()}}</h2>
              </div>
            </div>
            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
              <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">Messages</h4>
            <p class="text-muted mb-1 small">View all</p>
          </div>
          <div class="preview-list">
            @foreach ($msg as $item)
            <div class="preview-item border-bottom">
              <div class="preview-thumbnail">
                <img src="assets/images/faces-clipart/pic-4.png" alt="image" class="rounded-circle" />
              </div>
              <div class="preview-item-content d-flex flex-grow">
                <div class="flex-grow">
                  <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="preview-subject">{{$item->name}}</h6>
                    {{-- <p class="text-muted text-small">5 minutes ago</p> --}}
                  </div>
                  <p class="text-muted">{{$item->message}}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    @foreach ($data as $item)
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Latest Post</h4>
          <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
            <div class="item">
              <img src="/images/thumb/{{$item->thumb}}" alt="">
            </div>
            <div class="item">
              <img src="/images/full_img/{{$item->full_img}}" alt="">
            </div>
          </div>
          <div class="d-flex py-4">
            <div class="preview-list w-100">
              <div class="preview-item p-0">
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject">{{$item->title}}</h6>
                    </div>
                    <p class="text-muted">{{$item->detail}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="col-md-12 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">To do list</h4>
          <form action="" method="post">
            @csrf
          <div class="add-items d-flex">
            <input name="todo" type="text" class="form-control todo-list-input" placeholder="enter task..">
            <input type="submit" value="Add" class="btn btn-primary">
            {{-- <button class="add btn btn-primary todo-list-add-btn">Add</button> --}}
          </div>
        </form>
          <div class="list-wrapper">
            <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
              @foreach ($todo as $item)
                <li>
                  <div class="form-check form-check-primary">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> {{$item->todo}} </label>
                  </div>
                  <a href="/admin/todo/delete/{{$item->id}}" style="margin-left: auto!important">
                    <i class="mdi mdi-close-box remove" ></i>
                  </a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection