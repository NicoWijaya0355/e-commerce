<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css')

    <style type="text/css">

        .div_deg{

            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .table_deg{
            border: 2px solid greenyellow;
        }

        th{
            background-color: skyblue;
            text-align: center;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding:15px;
        }

        td{
            border: 1px solid skyblue;
            text-align: center;
            color:white;
        }

        input[type="search"]{
            
            width: 500px;
            height: 60px;
            margin-right: 10px;
        }
        
    </style>
  </head>
  <body>
   @include ('admin.header')
    
   @include ('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          
            <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search">
                <input type="submit" class="btn btn-success" value="search">
            </form>
     
            <br>
            <form action="{{ url('products_import') }}" method="POST" enctype="multipart/form-data">
                @csrf
  
                <input type="file" name="file" class="form-control">

                <br>
                <button class="btn btn-success"><i class="fa fa-file"></i> Import Excel Product Data</button>
            </form>
            <br>
            <h3>Print Product: 
                    <a class="btn btn-secondary" href="{{url('print_product')}}">Print PDF </a>
            </h3>
            <h3>Print Product: 
                    <a class="btn btn-secondary" href="{{url('products_export')}}">Print Excel </a>
            </h3>
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                     @foreach ($product as $products)
                     
                 
                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{!!Str::limit($products->description, 50)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td> 
                            <img height="120" width="120" src="products/{{$products->image}}">
                        </td>
                        <td><a class="btn btn-success" href="{{url('update_product', $products->slug)}}">Edit</a></td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a>
                        </td>
                    </tr>

                    @endforeach
                </table>

                
            </div>
                <div class="div_deg">
                    {{$product->onEachSide(1)->links()}}
                </div>
                
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
     @include ('admin.js')
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>