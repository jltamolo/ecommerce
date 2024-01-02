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
        .h2_font{
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
                <h2 class="h2_font">Add Category</h2>
                <form action="/category" method="POST">
                @csrf
                    
                    <input type="text" name="category_name" placeholder="Write category name"></input>
                    <button type="submit" class="btn btn-primary" name="Submit" value="Add Category">Add Category</button>
                </form>
            </div>

            <table class="category_table">
              <tr>
                <td>Category Name</td>
                <td>Action</td>
              </tr>

              @foreach($category as $category)
              <tr>
                <td>{{$category->category_name}}</td>
                <td><a href="{{url('delete_category', $category->id)}}" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">Delete</a></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <@include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>