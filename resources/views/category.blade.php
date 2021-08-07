@extends('layout')

@section('container')
        <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
        <section class="page-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="text-content">
                  {{-- <h4>Recent Posts</h4> --}}
                  <h2>All Blog Blog Entries</h2>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
      <!-- Banner Ends Here -->
  
      {{-- <section class="call-to-action">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="main-content">
                <div class="row">
                  <div class="col-lg-8">
                    <span>Stand Blog HTML5 Template</span>
                    <h4>Creative HTML Template For Bloggers!</h4>
                  </div>
                  <div class="col-lg-4">
                    <div class="main-button">
                      <a href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
  
  
      <section class="blog-posts grid-system">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                @foreach ($post as $item)
                    <div class="col-lg-6">
                        <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="/images/thumb/{{$item->thumb}}" alt="">
                        </div>
                        <div class="down-content">
                            <span>{{$item->category->title}}</span>
                            <a href="post-details.html"><h4>{{$item->title}}</h4></a>
                            <ul class="post-info">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">May 31, 2020</a></li>
                            <li><a href="#">12 Comments</a></li>
                            </ul>
                            <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>
                            <div class="post-options">
                            <div class="row">
                                <div class="col-lg-12">
                                <ul class="post-tags">
                                    <li><i class="fa fa-tags"></i></li>
                                    <li><a href="#">Best Templates</a>,</li>
                                    <li><a href="#">TemplateMo</a></li>
                                </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                @endforeach
                  <div class="col-lg-12">
                    <ul class="page-numbers">
                      <li><a href="#">1</a></li>
                      <li class="active"><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <x-sidebar/>
          </div>
        </div>
      </section>
@endsection