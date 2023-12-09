@php
    use App\Http\Controllers\ProductsController;
    $productsController = new ProductsController;
@endphp


<div class="container">

    <div class="section-title">
      <h2>Our Products</h2>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          {{-- <li data-filter=".filter-app">App</li>
          <li data-filter=".filter-card">Card</li>
          <li data-filter=".filter-web">Web</li> --}}
          @foreach ($productsController->getProductTypes() as $item)
            <li data-filter=".filter-{{ $loop->iteration }}">{{ $item }}</li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row portfolio-container">
      @if (count($productsController->index()) > 0)
        @foreach ($productsController->index() as $item)
          <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $item->type }}">
            <div class="portfolio-wrap">
              <img src="{{ $item->image }}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h3><a href="{{ $item->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ ucwords($item->name) }}">{{ ucwords($item->name) }}</a></h3>
                <div>
                  <a href="{{ $item->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ ucwords($item->name) }}"><i class="bi bi-plus"></i></a>
                  {{-- <a href="portfolio-details.html" title="Details"><i class="bi bi-link"></i></a> --}}
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @else
          <div class="row justify-content-center">
            <h1 class="text-center">No posted products yet!</h1>
          </div>
      @endif

    </div>

  </div>