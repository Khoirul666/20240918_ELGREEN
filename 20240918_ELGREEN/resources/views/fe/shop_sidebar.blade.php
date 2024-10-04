<div id="sidebar">
    <h2>
        <span>Browse by</span>
    </h2>
    <nav class="nav flex-column">
        <a style="padding-top:10px" href="{{route('shop')}}">All Products</a>
        <a style="padding-top:10px" href="{{route('shop_category','best_seller')}}">Best Sellers</a>
        <a style="padding-top:10px" href="{{route('shop_category','new_arrivals')}}">New Arrivals</a>
        @foreach(App\Models\Cat_Product::all() as $category_product)
        <a style="padding-top:10px" href="{{route('shop_category',$category_product->name)}}">{{$category_product->show}}</a>
        @endforeach
    </nav>
    <hr>
    <h2>
        <span>Filter by</span>
    </h2>
    <div style="display:flex;flex-direction:column">
        <span data-bs-toggle="collapse" data-bs-target="#priceOp" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Price</span>
        <div class="collapse" id="priceOp">
            <input type="range" id="vol" name="vol" min="0" max="50">
        </div>
        <span data-bs-toggle="collapse" data-bs-target="#coloOp" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Color</span>
        <div class="collapse" id="coloOp">
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
        </div>
        <span data-bs-toggle="collapse" data-bs-target="#sizeOp" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Size</span>
        <div class="collapse" id="sizeOp">
            <nav class="nav flex-column">
                <a class="nav-link" href="#">Large</a>
                <a class="nav-link" href="#">Small</a>
                <a class="nav-link" href="#">Medium</a>
            </nav>
        </div>
    </div>
</div>