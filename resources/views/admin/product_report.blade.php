<!DOCTYPE html>
<html>
  <head> 
   

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
            color: black;
            font-size: 19px;
            font-weight: bold;
            padding:15px;
        }

        td{
            border: 1px solid skyblue;
            text-align: center;
            color:black;
        }

        input[type="search"]{
            
            width: 500px;
            height: 60px;
            margin-right: 10px;
        }
        
    </style>
  </head>
  <body>

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          
            <h1 style="color:black"> All Products</h1>
        
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        

                    </tr>
                     @foreach ($data as $products)
                     
                 
                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{{($products->description)}}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td> 
                            <img height="120" width="120" src="products/{{$products->image}}">
                        </td>
                       
                    </tr>

                    @endforeach
                </table>

                
            </div>
                
                
          </div>
      </div>
    </div>
    <!-- JavaScript files-->
 
  </body>
</html>