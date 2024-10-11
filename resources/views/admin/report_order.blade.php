<!DOCTYPE html>
<html>
  <head> 

    <style type="text/css">

        table{

            border: 2px solid skyblue;
            text-align: center;
        }

        th{
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            color: black;
            font-weight: bold;
            text-align: center;
        }
        td{
            color:black;
            padding: 10px;
            border: 1px solid skyblue;
        }
        .table_center{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
  </head>
  <body>
 
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
                <h3 style="color:black">All Orders</h3>
                <br>
                <br>
                @php
                $value = 0;
                @endphp

                @foreach ($data as $datas)
                
                @php
                $value += $datas->product->price;
                @endphp
                @endforeach
                <h1 style="color:black;">Total Turnover : ${{$value}}</h1>
            <div class="table_center">
                
               
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Status</th>
                   
                    
                </tr>
                @foreach( $data as $datas)
                <tr>
                    <td>{{$datas->name}}</td>
                    <td>{{$datas->rec_address}}</td>
                    <td>{{$datas->phone}}</td>
                    <td>{{$datas->product->title}}</td>
                    <td>${{$datas->product->price}}</td>
                    
                    <td>
                        <img width="150" src="products/{{$datas->product->image}}">
                    </td>

                    <td>{{$datas->payment_status}}</td>
                    <td>
                        @if($datas->status =='in progress')

                        <span style="color:red">{{$datas->status}}</span>

                        @elseif($datas->status =='On The Way')

                        <span style="color:skyblue">{{$datas->status}}</span>

                        @else

                        <span style="color:yellow">{{$datas->status}}</span>

                        @endif

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