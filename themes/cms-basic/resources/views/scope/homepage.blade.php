@extends(theme_layout())
@section('content')
<main class="main">
    <div class="site-preview-intro">
      <div class="container">
        <div class="pt-4 pb-4 text-center">
          <h1 class="mb-3">Choose any of these & create your own beautiful blog.</h1>
          <p class="mb-4">All of the sample layouts are included with your download. Select an example layout below to preview!</p>
          <a href="https://themes.getbootstrap.com/product/milo-magazineblog-theme/" target="_blank" class="btn btn-success btn-lg">Purchase theme</a>
        </div>
      </div>
    </div>

    <div class="site-preview-choices">
      <div class="container">
        <div class="row">

          <div class="col-md-11 col-lg-12 mx-auto">
            <div class="row">
              <div class="col-md-6 col-xl-4">
                <article class="card mb-4">
                  <header class="card-header">
                    <a href="home-onecolumn.html">
                      <h4 class="card-title">One column & Sidebar</h4>
                    </a>
                  </header>
                  <a href="home-onecolumn.html">
                    <img class="card-img card-img-border" src="/platform/themes/Cms/img/screenshots/onecolumn.jpg" alt="One column Bootstrap blog template" />
                  </a>
                  <div class="card-body">
                    <p class="card-text">One column magazine/blog layout with a sidebar on the right.</p>
                  </div>
                </article><!-- /.card -->
              </div>

              <div class="col-md-6 col-xl-4">
                <article class="card mb-4">
                  <header class="card-header">
                    <a href="home-twocolumn.html">
                      <h4 class="card-title">Two columns & Sidebar</h4>
                    </a>
                  </header>
                  <a href="home-twocolumn.html">
                    <img class="card-img card-img-border" src="/platform/themes/Cms/img/screenshots/twocolumn.jpg" alt="Two column Bootstrap blog template" />
                  </a>
                  <div class="card-body">
                    <p class="card-text">Two column magazine/blog layout with a sidebar on the right.</p>
                  </div>
                </article><!-- /.card -->
              </div>

              <div class="col-md-6 col-xl-4">
                <article class="card mb-4">
                  <header class="card-header">
                    <a href="home-threecolumn.html">
                      <h4 class="card-title">Three columns</h4>
                    </a>
                  </header>
                  <a href="home-threecolumn.html">
                    <img class="card-img card-img-border" src="/platform/themes/Cms/img/screenshots/threecolumn.jpg" alt="Three column Bootstrap blog template" />
                  </a>
                  <div class="card-body">
                    <p class="card-text">Three column magazine/blog layout without sidebar.</p>
                  </div>
                </article><!-- /.card -->
              </div>

              <div class="col-md-6 col-xl-4">
                <article class="card mb-4">
                  <header class="card-header">
                    <a href="home-fourcolumn.html">
                      <h4 class="card-title">Four columns</h4>
                    </a>
                  </header>
                  <a href="home-fourcolumn.html">
                    <img class="card-img card-img-border" src="/platform/themes/Cms/img/screenshots/fourcolumn.jpg" alt="Four column Bootstrap blog template" />
                  </a>
                  <div class="card-body">
                    <p class="card-text">Four column magazine/blog layout without sidebar.</p>
                  </div>
                </article><!-- /.card -->
              </div>

              <div class="col-md-6 col-xl-4">
                <article class="card mb-4">
                  <header class="card-header">
                    <a href="home-featured.html">
                      <h4 class="card-title">Featured posts</h4>
                    </a>
                  </header>
                  <a href="home-featured.html">
                    <img class="card-img card-img-border" src="/platform/themes/Cms/img/screenshots/featured.jpg" alt="Bootstrap blog template with featured post" />
                  </a>
                  <div class="card-body">
                    <p class="card-text">Two column magazine/blog layout with featured posts and a sidebar.</p>
                  </div>
                </article><!-- /.card -->
              </div>

              <div class="col-md-6 col-xl-4">
                <article class="card mb-4">
                  <header class="card-header">
                    <a href="home-fullwidth.html">
                      <h4 class="card-title">Full width</h4>
                    </a>
                  </header>
                  <a href="home-fullwidth.html">
                    <img class="card-img card-img-border" src="/platform/themes/Cms/img/screenshots/fullwidth.jpg" alt="Full width Bootstrap blog template" />
                  </a>
                  <div class="card-body">
                    <p class="card-text">Full width magazine/blog layout with four columns.</p>
                  </div>
                </article><!-- /.card -->
              </div>
            </div><!-- /.row -->
          </div>

        </div><!-- /.row -->
      </div>
    </div>
  </main>
@endsection
