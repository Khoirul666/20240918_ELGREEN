<div id="sidebar">
    <h2>
        <span>Browse by</span>
    </h2>
    <nav class="nav flex-column">
        <a style="padding-top:10px" href="{{ route('shop') }}">All Products</a>
        <a style="padding-top:10px" href="{{ route('shop_category', 'best_seller') }}">Best Sellers</a>
        <a style="padding-top:10px" href="{{ route('shop_category', 'new_arrivals') }}">New Arrivals</a>
        @foreach (App\Models\Cat_Product::all() as $category_product)
            <a style="padding-top:10px"
                href="{{ route('shop_category', $category_product->name) }}">{{ $category_product->show }}</a>
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
        <div class="" id="coloOp">
            <nav class="nav">
                <a style="background-color:rgb(51, 70, 174)"></a>
                <a style="background-color:rgb(98, 83, 63)"></a>
                <a style="background-color:rgb(222, 52, 109)"></a>
                <a style="background-color:rgb(54, 131, 81)"></a>
                <a style="background-color:rgb(67, 79, 95)"></a>
                <a style="background-color:rgb(250, 137, 40)"></a>
                <a style="background-color:rgb(159, 90, 242)"></a>
                <a style="background-color:rgb(174, 22, 22)"></a>
                <a style="background-color:rgb(45, 120, 213)"></a>
                <a style="background-color:rgb(119, 231, 200)"></a>
            </nav>
            <ul class="hstack gap-3">
                <li class="list-group-item">
                    <input type="checkbox" value="1" id="first_checkbox">
                    <label class="stretched-link" for="first_checkbox" style="background-color: aqua"> </label>
                </li>
                <li class="list-group-item">
                    <input type="checkbox" value="1" id="first_checkbox1">
                    <label class="stretched-link" for="first_checkbox1" style="background-color: aqua"> </label>
                </li>
                <li class="list-group-item">
                    <input type="checkbox" value="1" id="first_checkbox2">
                    <label class="stretched-link" for="first_checkbox2" style="background-color: aqua"> </label>
                </li>
            </ul>
        </div>
        <span class="mt-3" data-bs-toggle="collapse" data-bs-target="#sizeOp"
            aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Size</span>
        <div class="collapse mb-3" id="sizeOp">
            <nav class="nav flex-column">
                @foreach ($size as $size)
                    <a class="nav-link" href="{{ $size['name'] }}">{{ $size['show'] }}</a>
                @endforeach
            </nav>
        </div>
    </div>
</div>
