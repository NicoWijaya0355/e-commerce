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
                <h3>All Audits</h3>
                <br>
                <br>
              
            <div class="table_center">
            <table>
                <tr>
                    <th>User</th>
                    <th>Event</th>
                    <th>Auditable Type</th>
                    <th>Auditable Id</th>
                    <!-- <th>Old Value</th>
                    <th>New Value</th> -->
                    <th>Created At</th>
                    <th>Updated At</th>
                  
                </tr>
                @foreach( $audit as $audits)
                <tr>
                    <td>{{$audits->user->name}}</td>
                    <td>{{$audits->event}}</td>
                    <td>{{$audits->auditable_type}}</td>
                    <td>
                    {{$audits->auditable_id}}
                    @if(optional($audits->product)->title)
                        ({{ optional($audits->product)->title }})
                    @endif

                            
                    </td>
                    <!-- <td>{{$audits->old_values}}</td>
                    <td>{{$audits->new_values}}</td> -->
                    <td>{{$audits->created_at}}</td>
                    <td>{{$audits->updated_at}}</td>

              
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