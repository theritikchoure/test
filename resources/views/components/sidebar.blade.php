<div class="col-lg-4">
    <div class="sidebar">
      <div class="row">
        <div class="col-lg-12">
          <div class="sidebar-item search">
            <form id="search_form" name="gs" method="GET" action="">
              <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
              <h2>Recent Posts</h2>
            </div>
            <div class="content">
              <ul>
                @if($recent_posts)
                    @foreach ($recent_posts as $item)
                        <li><a href="#">
                        <h5>{{$item->title}}</h5>
                        {{-- <span>May 31, 2020</span> --}}
                        </a></li>
                    @endforeach 
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item recent-posts">
            <div class="sidebar-heading">
              <h2>Popular Posts</h2>
            </div>
            <div class="content">
              <ul>
                @if($popular_posts)
                    @foreach ($popular_posts as $item)
                        <li><a href="#">
                        <h5>{{$item->title}}</h5>
                        {{-- <span>Views : {{$item->views}}</span> --}}
                        </a></li>
                    @endforeach 
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item categories">
            <div class="sidebar-heading">
              <h2>Categories</h2>
            </div>
            <div class="content">
              <ul>
                @if($categories)
                  @foreach ($categories as $item)
                    <li><a href="#">{{$item->title}}</a></li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sidebar-item tags">
            <div class="sidebar-heading">
              <h2>Tag Clouds</h2>
            </div>
            <div class="content">
              <ul>
                @if($categories)
                  @foreach ($categories as $item)
                    <li><a href="/category/{{$item->id}}">{{$item->title}}</a></li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>