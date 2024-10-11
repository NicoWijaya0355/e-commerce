<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include ('home.css')

    <style type="text/css">

        .div_center{
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table{
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th{
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 19;
            font-weight: bold;
            text-align: center;
        }

        td{
            border:1px solid skyblue;
            padding:10px;
        }
    </style>
</head>
<body>
    

    <div class="hero_area">
        <!-- header section strats -->
        @include ('home.header')

        <div class="div_center">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>

                @foreach ($order as $item)
                
              
                <tr>
                    <td>{{$item->product->title}}</td>
                    <td>{{$item->product->price}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <img heigh="200" width="300" src="products/{{$item->product->image}}">
                    </td>
                </tr>
                @endforeach
            </table>
        </div>

    </div>

      <!-- info section -->
  @include ('home.footer')
</body>
</html>