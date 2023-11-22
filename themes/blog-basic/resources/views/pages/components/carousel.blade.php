<main class="main pt-4">
    <div class="container">

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">Slides only</h4>
          </header>
          <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.w-100</code> on carousel images to prevent browser default image alignment.</p>

          <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="img/articles/3.jpg" alt="Unsplash">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/4.jpg" alt="Unsplash">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/2.jpg" alt="Unsplash">
              </div>
            </div>
          </div>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">With controls</h4>
          </header>
          <p>Adding in the previous and next controls.</p>

          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="img/articles/2.jpg" alt="Unsplash">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/3.jpg" alt="Unsplash">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/4.jpg" alt="Unsplash">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">With indicators</h4>
          </header>
          <p>You can also add the indicators to the carousel, alongside the controls, too.</p>

          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="img/articles/3.jpg" alt="Unsplash">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/4.jpg" alt="Unsplash">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/2.jpg" alt="Unsplash">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">With captions</h4>
          </header>
          <p>Add captions to your slides easily with the <code>.carousel-caption</code> element within any <code>.carousel-item</code>.</p>

          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="img/articles/1.jpg" alt="Unsplash">
                <div class="carousel-caption d-none d-md-block">
                  <h5>First slide label</h5>
                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/2.jpg" alt="Unsplash">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Second slide label</h5>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="img/articles/3.jpg" alt="Unsplash">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Third slide label</h5>
                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </article><!-- /.card -->

    </div>
  </main>