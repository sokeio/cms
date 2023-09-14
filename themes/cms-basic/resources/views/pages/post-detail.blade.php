<div>
    <main class="main pt-4">

        <div class="container">
    
          <div class="row">
            <div class="col-md-9">
    
              <article class="card mb-4">
                <header class="card-header text-center">
                  <div class="card-meta">
                    <a href="#"><time class="timeago" datetime="{{ $post->createdAt}}">26 october 2021</time></a>
                  </div>
                  <h1 class="card-title">{{ $post->name }}</h1>
                </header>
                <img class="card-img" src="{{ $post->image }}" alt="{{ $post->name }}" />
                <div class="card-body">

                  {!! $post->content !!}
                  <hr />
    
                  <h3>4 comments</h3>
    
                  <div class="d-flex mb-3 p-3 bg-light">
                    <div class="text-center">
                      <img class="me-3 rounded-circle" src="/platform/themes/Cms/img/avatars/3.png" alt="Lucy" width="100" height="100">
                      <h6 class="mt-1 mb-0 me-3">Lucy</h6>
                    </div>
                    <div class="flex-grow-1 d-block">
                      <p class="mt-3 mb-2">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                      <time class="timeago text-muted" datetime="2021-09-03 20:00">3 december 2021</time>
                      <a class="float-end" href="#"><span class="fa fa-reply"></span> Reply</a>
    
                      <div class="d-flex mt-3 p-0">
                        <div class="pe-3 text-center">
                          <img class="me-3 rounded-circle" src="/platform/themes/Cms/img/avatars/2.png" alt="John" width="100" height="100">
                          <h6 class="mt-1 mb-0 me-3">John</h6>
                        </div>
                        <div class="flex-grow-1">
                          <p class="mt-3 mb-2">Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                          <time class="timeago text-muted" datetime="2021-09-14 19:00">14 december 2021</time>
                          <a class="float-end" href="#"><span class="fa fa-reply"></span> Reply</a>
                        </div>
                      </div>
                    </div>
                  </div>
    
                  <div class="d-flex mb-3 p-3 bg-light">
                    <div class="text-center">
                      <img class="me-3 rounded-circle" src="/platform/themes/Cms/img/avatars/1.png" alt="Kim" width="100" height="100">
                      <h6 class="mt-1 mb-0 me-3">Kim</h6>
                    </div>
                    <div class="flex-grow-1">
                      <p class="mt-3 mb-2">Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis.</p>
                      <time class="timeago text-muted" datetime="2021-09-20 20:00">20 november 2021</time>
                      <a class="float-end" href="#"><span class="fa fa-reply"></span> Reply</a>
                    </div>
                  </div>
    
                  <div class="d-flex mb-3 p-3 bg-light">
                    <div class="text-center">
                      <img class="me-3 rounded-circle" src="/platform/themes/Cms/img/avatars/4.png" alt="Paula" width="100" height="100">
                      <h6 class="mt-1 mb-0 me-3">Paula</h6>
                    </div>
                    <div class="flex-grow-1">
                      <p class="mt-3 mb-2">Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc. Nunc nonummy metus.</p>
                      <time class="timeago text-muted" datetime="2021-09-05 20:00">5 november 2021</time>
                      <a class="float-end" href="#"><span class="fa fa-reply"></span> Reply</a>
                    </div>
                  </div>
    
                  <div class="mt-5">
                    <h5>Write a response</h5>
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your name">
                      </div>
                      <div class="col-md-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email">
                      </div>
                    </div>
                    <textarea class="form-control mt-3" rows="3" placeholder="Write a response.."></textarea>
                    <a href="#" class="btn btn-success mt-3">Publish</a>
                  </div>
    
                </div>
              </article><!-- /.card -->
    
            </div>
            <div class="col-md-3 ms-auto">
    
              <aside class="sidebar">
                <div class="card mb-4">
                  <div class="card-body">
                    <h4 class="card-title">About</h4>
                    <p class="card-text">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam <a href="#">semper libero</a>, sit amet adipiscing sem neque sed ipsum. </p>
                  </div>
                </div><!-- /.card -->
              </aside>
    
              <aside class="sidebar sidebar-sticky">
                <div class="card mb-4">
                  <div class="card-body">
                    <h4 class="card-title">Tags</h4>
                    <a class="btn btn-light btn-sm mb-1"  href="{{ route('post-category') }}" wire:navigate>Journey</a>
                    <a class="btn btn-light btn-sm mb-1"  href="{{ route('post-category') }}" wire:navigate>Work</a>
                    <a class="btn btn-light btn-sm mb-1"  href="{{ route('post-category') }}" wire:navigate>Lifestype</a>
                    <a class="btn btn-light btn-sm mb-1"  href="{{ route('post-category') }}" wire:navigate>Photography</a>
                    <a class="btn btn-light btn-sm mb-1"  href="{{ route('post-category') }}" wire:navigate>Food & Drinks</a>
                  </div>
                </div><!-- /.card -->
                <div class="card mb-4">
                  <div class="card-body">
                    <h4 class="card-title">Popular stories</h4>
    
                    <a href="post-image.html" class="d-inline-block">
                      <h4 class="h6">The blind man</h4>
                      <img class="card-img" src="/platform/themes/Cms/img/articles/2.jpg" alt="" />
                    </a>
                    <time class="timeago" datetime="2021-09-03 20:00">3 october 2021</time> in Lifestyle
    
                    <a href="post-image.html" class="d-inline-block mt-3">
                      <h4 class="h6">Crying on the news</h4>
                      <img class="card-img" src="/platform/themes/Cms/img/articles/3.jpg" alt="" />
                    </a>
                    <time class="timeago" datetime="2021-07-16 20:00">16 july 2021</time> in Work
    
                  </div>
                </div><!-- /.card -->
              </aside>
    
            </div>
          </div>
        </div>
    
      </main>
    
      <div class="site-newsletter">
        <div class="container">
          <div class="text-center">
            <h3 class="h4 mb-2">Subscribe to our newsletter</h3>
            <p class="text-muted">Join our monthly newsletter and never miss out on new stories and promotions.</p>
    
            <div class="row">
              <div class="col-xs-12 col-sm-9 col-md-7 col-lg-5 ms-auto me-auto">
                <div class="input-group mb-3 mt-3">
                  <input type="text" class="form-control" placeholder="Email address" aria-label="Email address">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Subscribe</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="site-instagram">
        <div class="action">
          <a class="btn btn-light" href="#">
            Follow us @ Instagram
          </a>
        </div>
        <div class="row g-0">
          <div class="col-sm-6">
            <div class="row g-0">
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/1.jpg" alt="" />
                </a>
              </div>
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/2.jpg" alt="" />
                </a>
              </div>
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/3.jpg" alt="" />
                </a>
              </div>
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/4.jpg" alt="" />
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row g-0">
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/5.jpg" alt="" />
                </a>
              </div>
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/6.jpg" alt="" />
                </a>
              </div>
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/7.jpg" alt="" />
                </a>
              </div>
              <div class="col-3">
                <a class="photo" href="#">
                  <img class="img-fluid" src="/platform/themes/Cms/img/instagram/8.jpg" alt="" />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>