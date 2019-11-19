<div class="product">
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
            <div class="col-lg-2 col-sm-12">
                <article class="single_product" style="margin-bottom:3px;">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                            <a class="secondary_img" href="{{$item->url}}"><img
                                    src="{{$item->image}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            
                        </div>
                        <div class="product_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                <div class="price_box">
                                    <span class="old_price">{{$item->price}}</span>
                                    <span class="current_price">{{$item->price}}</span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="Add to cart">Add to cart</a>
                            </div>
                        </div>
                    </figure>
                </article>

            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="shop_toolbar t_bottom">{{$product->render()}}</div>