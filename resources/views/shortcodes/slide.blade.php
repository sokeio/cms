<div id="{{ $shortcodeAttrs['id'] }}" class="carousel carousel-dark slide {{ $shortcodeAttrs['id'] ?? '' }}" wire:carousel
    data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#{{ $shortcodeAttrs['id'] }}" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#{{ $shortcodeAttrs['id'] }}" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#{{ $shortcodeAttrs['id'] }}" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg d-block w-100" width="800" height="400"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide"
                preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#e5e5e5"></rect><text x="50%" y="50%" fill="#999"
                    dy=".3em">Third slide</text>
            </svg> --}}
            <img src="https://previews.customer.envatousercontent.com/files/353635822/coinflip_screenshots/01_Main_Preview_Coinflip.2.1.__large_preview.png"
                class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="https://modeltheme.com/TFIMGS/coinflip/casino-compare-feature.png" class="d-block w-100"
                alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://previews.customer.envatousercontent.com/files/353635822/coinflip_screenshots/01_Main_Preview_Coinflip.2.1.__large_preview.png"
                class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $shortcodeAttrs['id'] }}"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#{{ $shortcodeAttrs['id'] }}"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
