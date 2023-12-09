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
                  @guest
                    <a href="{{ $item->image }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ ucwords($item->name) }}"><i class="bi bi-plus"></i></a>

                  @else
                    <a href="{{ route('buyProduct', ['id' => $item->id]) }}" title="{{ ucwords($item->name) }}"><i class="bi bi-cart-fill"></i></a>
                  @endguest
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