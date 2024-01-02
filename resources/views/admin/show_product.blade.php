<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <style>

    
        .show_products{
            margin: auto;
            margin-top: auto;
            width: 50%;
            border: 3px solid white;
            text-align: center;
        }
        td, th{
          border: 2px solid white;

        }
        th{
            color: green;
            padding: 20px;
        }
        h2{
            text-align: center;
        }
        .img_size{
            width: 100px;
            height:100px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            
          </div>
          @endif
            <h2>All Products</h2>
            <table class="show_products">
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discounted Price</th>
                    <th>Product Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
               @foreach($product as $product)
                <tr>
                    <td>{{$product->product_title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img class="img_size" src="/product/{{$product->image}}">
                    </td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')"href="{{url('delete_product', $product->id)}}">Delete</td>
                    <td><a class="btn btn-success" href="">Edit</td>
                </tr>
                @endforeach
            </table>












          </div>
        </div>
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
   
    <!-- End custom js for this page -->
  </body>
</html>