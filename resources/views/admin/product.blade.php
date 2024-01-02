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
        .div_center{
            text-align: center;
            padding-top:40px;
        }
        .h1_font{
            padding-bottom: 40px;
            font-size: 40px;
        }
        .btn{
          width: auto;
        }
        .category_table{
          margin:auto;
          width:50%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid white;
        }
        td, th{
          border: 2px solid white;
        }
        label{
          display: inline-block;
          text-align: justify;
          width: 200px;
        }
        .div_design{
          padding-bottom: 5px;

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

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

          @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            
          </div>
          @endif
          <div class="div_center">
            <h1 class="h1_font">Add Product</h1>
            <form action="/add_product" method="POST" enctype="multipart/form-data">
              @csrf
              

              <div class="div_design">
            <label>Product Title</label>
            <input type="text" name="product_title" placeholder="Write Product Title" required>
            </div>

            <div class="div_design">
            <label>Product Description</label>
            <input type="text" name="product_description" placeholder="Write Product Description" required>
            </div>

            <div class="div_design">
            <label>Product Category</label>
            <select name="category" required>
                <option value="" selected="">Add a category here</option>
                @foreach($category as $category)

                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
            </select>
            </div>
            <div class="div_design">
            <label>Quantity</label>
            <input type="number" name="quantity" placeholder="Write Quantity" required>
            </div>

            <div class="div_design">
            <label>Price</label>
            <input type="number" name="price" placeholder="Write Price">
            </div>
            
            <div class="div_design">
            <label>Discounted Price</label>
            <input type="number" name="discounted_price" placeholder="Write Discounted Price">
            </div>

            <div class="div_design">
            <label>Product Image</label>
            <input type="file" name="product_image" required>
            </div>

            <div class="div_design">
              <button type="submit">Add Product</button>
            </div>
            </form>





          </div>








                     <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!--@include('admin.footer') -->
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