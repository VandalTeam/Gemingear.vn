<div class="product">
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
            <div class="col-lg-3 col-sm-12">
                <article class="single_product" >

                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                            <a class="secondary_img" href="{{$item->url}}"><img src="{{$item->image}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>

                        </div>
                        <div class="product_content">
                            <div class="product_content_inner" ">
                                <h4 class="product_name" style="height:30%; text-overflow: clip;"><a href="{{$item->url}}">{{$item->name}}</a></h4>
                                <div class="price_box">
                                    <span class="old_price">{{number_format($item->price)}} đ</span>
                                    <span class="current_price">{{number_format($item->price_sale)}} đ</span>
                                </div>
                            </div>
                            <div class="add_to_cart" data-id="{{$item->id}}"
                                data-price="<?php if($item->price==null){echo "0";}else{echo $item->price;}?>"
                                data-name="{{$item->name}}" data-image="{{$item->image}}">
                                <a style="font-family:arial;">Thêm sản phẩm</a>
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

<script>
    $(document).ready(function () {
        $('.add_to_cart').click(function (e) { 
            e.preventDefault();
            var id = $(this).attr('data-id');
			var name = $(this).attr('data-name');
			var image = $(this).attr('data-image');
			var price = $(this).attr('data-price');
			var qty = 1;
			$.ajax({
				type: "post",
				url: "/addcart",
				data: {
					'id': id,
					'name':name,
					'image': image,
					'price': price,	
					'qty': qty
				},
                dataType: "json",
				success: function(data) {
                    $('.cart_price').text(data.total);
                    $('.cart_count').text(data.total_item);
                    var str="";
                    $.each(data.product, function(i, item) {
                        str +=`<div class="cart_item">
                                            <div class="cart_img">
                                                <a href="#"><img src="${item.options.size}" alt=""></a>
                                            </div>
                                            <div class="cart_info">
                                                <a href="#">${item.name}</a>
                                                <p>Qty: ${item.qty} X <span>${item.price}</span></p>
                                            </div>
                                            <div class="cart_remove remove_cart" data-id="${item.rowId}">
                                                <a><i class="ion-android-close"></i></a>
                                            </div>
                                        </div>`
                    });
                    $('.mini_cart_inner').html(str+`<div class="mini_cart_table">
                                            <div class="cart_total">
                                                <span>Tổng tiền:</span>
                                                <span class="price">${data.total}</span>
                                            </div>
                                            <div class="cart_total mt-10">
                                                <span>Thành tiền:</span>
                                                <span class="price">${data.total}</span>
                                            </div>
                                        </div>`);
                    // location.reload(true);
				}
			});
        });
    });
</script>