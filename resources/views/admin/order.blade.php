<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css')
    <style type="text/css">

        table{

            border: 2px solid skyblue;
            text-align: center;
        }

        th{
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }
        td{
            color:white;
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
   @include ('admin.header')
    
   @include ('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
                <h3>All Orders</h3>
                <br>
                <br>
                <h3>Print Report: 
                    <a class="btn btn-secondary" href="{{url('print_report')}}">Print PDF </a>
                </h3>
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
                    <th>Change Status</th>
                    <th>Print PDF</th>
                </tr>
                @foreach( $data as $datas)
                <tr>
                    <td>{{$datas->name}}</td>
                    <td>{{$datas->rec_address}}</td>
                    <td>{{$datas->phone}}</td>
                    <td>{{$datas->product->title}}</td>
                    <td>{{$datas->product->price}}</td>
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
                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way',$datas->id)}}">On the way</a>
                        <a class="btn btn-success" href="{{url('delivered',$datas->id)}}">Delivered</a>
                    </td>

                    <td>
                        <a class="btn btn-secondary" href="{{url('print_pdf',$datas->id)}}">Print PDF</a>
                    </tdc>
                </tr>

                @endforeach
            </table>
            </div>


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
   @include ('admin.js')
  </body>
</html>