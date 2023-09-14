<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white absolute-top">
      <div class="container">

        <button class="navbar-toggler order-2 order-md-1" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbar-left navbar-right" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3 order-md-2" id="navbar-left">
          <ul class="navbar-nav me-auto">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="{{ route('home-onecolumn') }}" wire:navigate>One column</a>
                <a class="dropdown-item" href="{{ route('home-twocolumn') }}" wire:navigate>Two column</a>
                <a class="dropdown-item" href="{{ route('home-threecolumn') }}" wire:navigate>Three column</a>
                <a class="dropdown-item" href="{{ route('home-fourcolumn') }}" wire:navigate>Four column</a>
                <a class="dropdown-item" href="{{ route('home-featured') }}" wire:navigate>Featured posts</a>
                <a class="dropdown-item" href="{{ route('home-fullwidth') }}" wire:navigate>Full width</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
              <div class="dropdown-menu" aria-labelledby="dropdown02">
                <a class="dropdown-item" href="#" wire:navigate >Image</a>
                <a class="dropdown-item" href="{{ route('post-video') }}" wire:navigate >Video</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Components</a>
              <div class="dropdown-menu" aria-labelledby="dropdown03">
                <a class="dropdown-item" href="{{ route('components.alert') }}" wire:navigate>Alerts</a>
                <a class="dropdown-item" href="{{ route('components.button') }}" wire:navigate>Buttons</a>
                <a class="dropdown-item" href="{{ route('components.card') }}" wire:navigate>Cards</a>
                <a class="dropdown-item" href="{{ route('components.carousel') }}" wire:navigate>Carousel</a>
                <a class="dropdown-item" href="{{ route('components.form') }}" wire:navigate>Forms</a>
                <a class="dropdown-item" href="{{ route('components.icon') }}" wire:navigate>Icons</a>
                <a class="dropdown-item" href="{{ route('components.modal') }}" wire:navigate>Modals</a>
                <a class="dropdown-item" href="{{ route('components.offcanvas') }}" wire:navigate>Offcanvas</a>
                <a class="dropdown-item" href="{{ route('components.pagination') }}" wire:navigate>Pagination</a>
                <a class="dropdown-item" href="{{ route('components.table') }}" wire:navigate>Tables</a>
                <a class="dropdown-item" href="{{ route('components.typography') }}" wire:navigate>Typography</a>
              </div>
            </li>
          </ul>
        </div>

        <a class="navbar-brand mx-auto order-1 order-md-3" href="/" wire:navigate>Milø</a>

        <div class="collapse navbar-collapse order-4 order-md-4" id="navbar-right">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('about') }}" wire:navigate>About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('post-category') }}" wire:navigate>Blogs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('contact') }}" wire:navigate>Contact</a>
            </li>
          </ul>
          <form class="form-inline" role="search">
            <input class="search js-search form-control form-control-rounded me-sm-2" type="text" title="Enter search query here.." placeholder="Search.." aria-label="Search">
          </form>
        </div>
      </div>
    </nav>
  </header>