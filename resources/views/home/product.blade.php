<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @foreach($product as $product)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="" class="option1">
                           Men's Shirt
                           </a>
                           <a href="" class="option2">
                           Buy Now
                           </a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$product->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$product->product_title}}
                        </h5 style="color: red;">
                        @if($product->discount_price!=null)
                        <h6>Discount Price </br>
                        Ksh.{{$product->discount_price}}
                        </h6>

                        <h6 style="text-decoration:line-through; color: purple;">Price </br>
                        Ksh.{{$product->price}}
                        </h6>
                        @else
                        <h6 style="color: purple;">Price </br>
                        Ksh.{{$product->price}}
                        </h6>
                        @endif
                       
                     </div>
                  </div>
               </div>
               @endforeach
              
         </div>
      </section>