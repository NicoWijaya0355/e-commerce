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
                <h3>All Message</h3>
                <br>
                <br>
              
            <div class="table_center">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Send Mail</th>
       
                  
                </tr>
                @foreach( $message as $messages)
                <tr>
                    <td>{{$messages->name}}</td>
                    <td>{{$messages->email}}</td>
                    <td>{{$messages->phone}}</td>
                    <td>{{$messages->Message}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('response',$messages->id)}}">Send Mail</a>
                    </td>

              
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