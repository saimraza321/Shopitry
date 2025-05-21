@extends('Front-end.layouts.master')
@section('main-content')


	

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
				<div id="aside" class="col-md-3">
    <!-- Filter Form -->
   <!-- Filter Form -->
<form id="filter-form" action="{{ route('products.filter') }}" method="GET">
    <!-- Categories Filter -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">
            @foreach($categories as $category)
                <div class="input-checkbox">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}">
                    <label for="category-{{ $category->id }}">
                        <span></span>
                        {{ $category->name }}
                        <small>({{ $category->products_count }})</small>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Price Filter -->
    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="price-inputs">
                <div class="input-group">
                    <span>Min Price:</span>
                    <input type="text" id="price-min-display" class="form-control small-input" readonly>
                </div>
                <div class="input-group">
                    <span>Max Price:</span>
                    <input type="text" id="price-max-display" class="form-control small-input" readonly>
                </div>
            </div>
            <input type="hidden" name="price_min" id="price-min" value="1">
            <input type="hidden" name="price_max" id="price-max" value="999">
        </div>
    </div>

    <!-- Brands Filter -->
    <div class="aside">
        <h3 class="aside-title">Brand</h3>
        <div class="checkbox-filter">
            @foreach($brands as $brand)
                <div class="input-checkbox">
                    <input type="checkbox" name="brands[]" value="{{ $brand->id }}" id="brand-{{ $brand->id }}">
                    <label for="brand-{{ $brand->id }}">
                        <span></span>
                        {{ $brand->name }}
                        <small>({{ $brand->products_count }})</small>
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Filter and Clear Buttons -->
    <button type="submit" class="btn btn-primary">Filter</button>
    <button type="button" id="clear-filters" class="btn btn-secondary">Clear Filters</button>
</form>

</div>


					<!-- resources/views/store/index.blade.php -->

<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 col-xs-6">
        <div class="product">
            <div class="product-img">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="product-body">
                <p class="product-category">{{ $product->category }}</p>
                <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                <h4 class="product-price">${{ $product->price }}</h4>
                <div class="product-btns">
                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                </div>
            </div>
            <div class="add-to-cart">
												<a href="{{route('singleproduct',$product->id)}}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
        </div>
    </div>
    @endforeach
</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>
		<script>
    var priceSlider = document.getElementById('price-slider');
    noUiSlider.create(priceSlider, {
        start: [1, 999],
        connect: true,
        range: {
            'min': 1,
            'max': 999
        },
        format: {
            to: function (value) {
                return Math.round(value);
            },
            from: function (value) {
                return value;
            }
        }
    });

    // Update both the hidden form inputs and the display inputs
    priceSlider.noUiSlider.on('update', function (values, handle) {
        if (handle === 0) {
            document.getElementById('price-min').value = values[0];
            document.getElementById('price-min-display').value = values[0];
        } else {
            document.getElementById('price-max').value = values[1];
            document.getElementById('price-max-display').value = values[1];
        }
    });

    // Clear Filter Button Functionality
    document.getElementById('clear-filters').addEventListener('click', function() {
        // Reset checkboxes for categories and brands
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });

        // Reset the price slider to the default values
        priceSlider.noUiSlider.set([1, 999]);

        // Reset the hidden input fields for the price range
        document.getElementById('price-min').value = 1;
        document.getElementById('price-max').value = 999;

        // Reset the displayed price values
        document.getElementById('price-min-display').value = 1;
        document.getElementById('price-max-display').value = 999;

        // Redirect to the base product listing route without query parameters
        window.location.href = "{{ route('front.products') }}";
    });
</script>



@endsection