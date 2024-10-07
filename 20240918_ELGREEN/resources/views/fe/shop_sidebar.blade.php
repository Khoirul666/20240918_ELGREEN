<div id="sidebar">
    <h2>
        <span>Browse by</span>
    </h2>
    <nav class="nav flex-column">
        <a style="padding-top:10px" href="{{ route('shop') }}">All Products</a>
        <a style="padding-top:10px" href="{{ route('shop_category', 'best_seller') }}">Best Sellers</a>
        <a style="padding-top:10px" href="{{ route('shop_category', 'new_arrivals') }}">New Arrivals</a>
        @foreach (App\Models\Cat_Product::all() as $category_product)
            <a style="padding-top:10px" href="{{ route('shop_category', $category_product->name) }}">{{ $category_product->show }}</a>
        @endforeach
    </nav>
    <hr>
    <h2 class="mb-3">
        <span>Filter by</span>
    </h2>
    <div style="display:flex;flex-direction:column">
        <span data-bs-toggle="collapse" data-bs-target="#priceOp" aria-controls="navbarToggleExternalContent"
            aria-expanded="false" aria-label="Toggle navigation">Price</span>
        <div class="collapse mb-3" id="priceOp">
            <div id="slider-range"></div>

            <div class="value-labels">
                <span>Rp <span id="slider-range-value1"></span></span>
                <span>Rp <span id="slider-range-value2"></span></span>
            </div>
        </div>
        <span class="mt-3" data-bs-toggle="collapse" data-bs-target="#coloOp"
            aria-controls="navbarToggleExternalContent" aria-expanded="false"
            aria-label="Toggle navigation">Color</span>
        <div class="collapse mt-3" id="coloOp">
            <ul id="checkbox_color">
                @foreach ($color as $color)
                    <li class="custom_checkbox" data-value="{{ $color['id'] }}"
                        style="background-color: {{ $color['color'] }};">
                        <input type="radio" value="{{ $color['name'] }}" id="color{{ $color['id'] }}"
                            name="color_check[]" class="checkbox_input" hidden>
                    </li>
                @endforeach
            </ul>
        </div>
        <span class="mt-3" data-bs-toggle="collapse" data-bs-target="#sizeOp"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Size</span>
        <div class="collapse mb-3" id="sizeOp">
            <div class="d-flex flex-column mb-3">
                @foreach ($size as $size)
                    <div class="p-2 custom_checkbox_size" data-value="{{ $size['id'] }}">
                        <input type="checkbox" value="{{ $size['id'] }}" id="size{{ $size['id'] }}"
                            name="size_check[]" class="checkbox_size" hidden>
                        <div class="d-flex">
                            <div>
                                <span class="check_icon"><i class="fa-solid fa-check"></i></span>
                            </div>
                            <div class="flex-fill"><span> {{ $size['show'] }}</span></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav class="nav flex-column">
            </nav>
        </div>
    </div>
</div>
