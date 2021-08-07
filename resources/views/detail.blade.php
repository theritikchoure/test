@extends('layout')

@section('container')
    <div class="heading-page header-text">
        <section class="page-heading">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="text-content">
                <h4>{{$detail->category->title}}</h4>
                <h2>{{$detail->title}}</h2>
                </div>
            </div>
            </div>
        </div>
        </section>
    </div>

  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          @if (Session::has('success'))
            <div class="alert alert-success">
              {{session('success')}}
            </div>
          @endif
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img src="/images/thumb/{{$detail->thumb}}" alt="">
                  </div>
                  <div class="down-content">
                    <span>{{$detail->category->title}}</span>
                    <a href="/detail/{{$detail->id}}"><h4>{{$detail->title}}</h4></a>
                    <ul class="post-info">
                      <li><a href="#">Admin</a></li>
                      <li><a href="#">May 12, 2020</a></li>
                      <li><a href="#">10 Comments</a></li>
                    </ul>
                    <p>You can browse different tags such as <a rel="nofollow" href="https://templatemo.com/tag/multi-page" target="_parent">multi-page</a>, <a rel="nofollow" href="https://templatemo.com/tag/resume" target="_parent">resume</a>, <a rel="nofollow" href="https://templatemo.com/tag/video" target="_parent">video</a>, etc. to see more CSS templates. Sed hendrerit rutrum arcu, non malesuada nisi. Sed id facilisis turpis. Donec justo elit, dapibus vel ultricies in, molestie sit amet risus. In nunc augue, rhoncus sed libero et, tincidunt tempor nisl. Donec egestas, quam eu rutrum ultrices, sapien ante posuere nisl, ac eleifend eros orci vel ante. Pellentesque vitae eleifend velit. Etiam blandit felis sollicitudin vestibulum feugiat.
                    <br><br>Donec tincidunt leo nec magna gravida varius. Suspendisse felis orci, egestas ac sodales quis, venenatis et neque. Vivamus facilisis dignissim arcu et blandit. Maecenas finibus dui non pulvinar lacinia. Ut lacinia finibus lorem vel porttitor. Suspendisse et metus nec libero ultrices varius eget in risus. Cras id nibh at erat pulvinar malesuada et non ipsum. Suspendisse id ipsum leo.</p>
                    <div class="post-options">
                      <div class="row">
                        <div class="col-6">
                          <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            <li><a href="#">Best Templates</a>,</li>
                            <li><a href="#">TemplateMo</a></li>
                          </ul>
                        </div>
                        <div class="col-6">
                          <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="sidebar-item comments">
                  <div class="sidebar-heading">
                    <h2>{{count($detail->comments)}} comments</h2>
                  </div>
                  <div class="content">
                    <ul>
                      @if($detail->comments)
                      @foreach($detail->comments as $comment)
                      <li>
                        {{-- <div class="author-thumb">
                          <img src="/front/assets/images/comment-author-01.jpg" alt="">
                        </div> --}}
                        <div class="right-content" style="margin-left:0px; ">
                          <h4 class="comment_user_name">{{$comment->user->name}}<span>May 16, 2020</span></h4><br>
                          <p>{{$comment->comment}}</p>
                        </div>
                      </li>
                      @endforeach
                      @endif
                    </ul>
                  </div>
                </div>
              </div>
              @auth
              <div class="col-lg-12">
                <div class="sidebar-item submit-comment">
                  <div class="sidebar-heading">
                    <h2>Your comment</h2>
                  </div>
                  <div class="content">
                    <form id="comment" action="/save-comment/{{$detail->id}}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-lg-12">
                          <fieldset>
                            <textarea name="comment" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                          </fieldset>
                        </div>
                        <div class="col-lg-12">
                          <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                          </fieldset>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endauth
            </div>
          </div>
        </div>
        <x-sidebar/>
      </div>
    </div>
</section>

  <!-- Page Content (End) -->
@endsection