<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Itech Test</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        *{
            box-sizing: border-box;
        }
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
            height: 100vh;
            margin: 0;
            padding: 0px;
            width: auto;
            direction: ltr;
            z-index: 1;
        }
        table{
            margin-left: 45px;
        }
        td{
            border: 1px solid #eee;
            padding: 3px;
            text-align: center;
        }
        code{
            color: #007b00;
        }
        a{
            color: red;
        }
        .text-danger{
          color: red;
        }
        .text-success{
          color: green;
        }
        .right-float {
          position: fixed;
          right: 5%;
        }
        .container{
          padding: 50px 150px 0px 150px;
        }
        #bar{
            position: relative;
            top: 0px;
            left: 0px;
            width: 150px;
            height: 150px;
            background-color: #3b5598;
            display: block;
            -webkit-animation: bar 7s ease;
        }
        @keyframes bar{
          0% {
            top: 0%;
            left: 0%;
          }
          50% {
            top: 85%;
            left: 92%;
          }
          100% {
            top: 0%;
            left: 0%;
          }
        }
    </style>
</head>
<body>  
  @if(\Route::current()->uri == "animation")
    <h1 class="text-danger right-float">Ans for 5: Animation</h1>
    <div id="bar"></div>
    
  @else    
    <div class="content container">
        
      @if(\Route::current()->uri == "second-buyer-eloquent")
        <div class="solution_1_a">
          <h1 class="text-danger">Ans for 1(A): Second Buyer Eloquent</h1><hr>
          <table>
            <tbody>
              <tr>
                <td>Buyer id</td>
                <td>Buyer Name</td>
                <td>Total Diary Taken</td>
                <td>Total Pen Taken</td>
                <td>Total Eraser Taken</td>
                <td>Total items Taken</td>
              </tr>

              <tr>
                <td>{{$data->buyer_id}}</td>
                <td>{{$data->buyer_name}}</td>
                <td>{{$data->total_diary_taken}}</td>
                <td>{{$data->total_pen_taken}}</td>
                <td>{{$data->total_eraser_taken}}</td>
                <td>{{$data->total_items_taken}}</td>
              </tr>        
            </tbody>
          </table>
        </div>
      

      @elseif(\Route::current()->uri == "second-buyer-no-eloquent")
        <div class="solution_1_a">
          <h1 class="text-danger">Ans for 1(A): Second Buyer No Eloquent</h1><hr>
          <table>
            <tbody>
              <tr>
                <td>Buyer id</td>
                <td>Buyer Name</td>
                <td>Total Diary Taken</td>
                <td>Total Pen Taken</td>
                <td>Total Eraser Taken</td>
                <td>Total items Taken</td>
              </tr>

              <tr>
                <td>{{$data->buyer_id}}</td>
                <td>{{$data->buyer_name}}</td>
                <td>{{$data->total_diary_taken}}</td>
                <td>{{$data->total_pen_taken}}</td>
                <td>{{$data->total_eraser_taken}}</td>
                <td>{{$data->total_items_taken}}</td>
              </tr>        
            </tbody>
          </table>
        </div>

      @elseif(\Route::current()->uri == "purchase-list-eloquent")
        <div class="solution_1_b">
          <h1 class="text-danger">Ans for 1(B): Purchase List Eloquent</h1><hr>
          <table>
            <tbody>
              <tr>
                <td>Buyer id</td>
                <td>Buyer Name</td>
                <td>Total Diary Taken</td>
                <td>Total Pen Taken</td>
                <td>Total Eraser Taken</td>
                <td>Total items Taken</td>
              </tr>

              @foreach($data as $row)
              <tr>
                <td>{{$row->buyer_id}}</td>
                <td>{{$row->buyer_name}}</td>
                <td>{{$row->total_diary_taken}}</td>
                <td>{{$row->total_pen_taken}}</td>
                <td>{{$row->total_eraser_taken}}</td>
                <td>{{$row->total_items_taken}}</td>
              </tr>
              @endforeach        
            </tbody>
          </table>
        </div>

      @elseif(\Route::current()->uri == "purchase-list-no-eloquent")
        <div class="solution_1_b">
          <h1 class="text-danger">Ans for 1(B): Purchase List No Eloquent</h1><hr>
          <table>
            <tbody>
              <tr>
                <td>Buyer id</td>
                <td>Buyer Name</td>
                <td>Total Diary Taken</td>
                <td>Total Pen Taken</td>
                <td>Total Eraser Taken</td>
                <td>Total items Taken</td>
              </tr>

              @foreach($data as $row)
              <tr>
                <td>{{$row->buyer_id}}</td>
                <td>{{$row->buyer_name}}</td>
                <td>{{$row->total_diary_taken}}</td>
                <td>{{$row->total_pen_taken}}</td>
                <td>{{$row->total_eraser_taken}}</td>
                <td>{{$row->total_items_taken}}</td>
              </tr>
              @endforeach        
            </tbody>
          </table>
        </div>

      @elseif(\Route::current()->uri == "record-transfer")
        <div class="solution_2">
          <h1 class="text-danger">Ans for 2: record-transfer</h1><hr>
          <h3 class="">***We could have put this in Queue Too !***</h3>
          <h2 class="{{$insertionStatus->success ? 'text-success' : 'text-danger'}}">
            Insertion Success: {{$insertionStatus->success ? 'True' : 'False'}}
          </h2>
          <p>Message: </p>
          <hr>
          <small>{{$insertionStatus->message}}</small>
        </div>

      @elseif(\Route::current()->uri == "define-callback-js")
        <div class="solution_3">
          <h1 class="text-danger">Ans for 3: Define-Callback-Js: </h1><hr>
          <h2>{!! Illuminate\Mail\Markdown::parse($data) !!}</h2>
        </div>

      @elseif(\Route::current()->uri == "sort-js")
        <div class="solution_4">
          <h1 class="text-danger">Ans for 3: sort-js(array sort): </h1><hr>
          <h2>{!! Illuminate\Mail\Markdown::parse($data) !!}</h2>
        </div>

      @elseif(\Route::current()->uri == "foreach-js")
        <div class="solution_4">
          <h1 class="text-danger">Ans for 3: sort-js(foreach): </h1><hr>
          <h2>{!! Illuminate\Mail\Markdown::parse($data) !!}</h2>
        </div>

      @elseif(\Route::current()->uri == "filter-js")
        <div class="solution_4">
          <h1 class="text-danger">Ans for 3: filter-js(array filter)</h1><hr>
          <h2>{!! Illuminate\Mail\Markdown::parse($data) !!}</h2>
        </div>

      @elseif(\Route::current()->uri == "map-js")
        <div class="solution_4">
          <h1 class="text-danger">Ans for 3: map-js(array map)</h1><hr>
          <h2>{!! Illuminate\Mail\Markdown::parse($data) !!}</h2>
        </div>

      @elseif(\Route::current()->uri == "reduce-js")
        <div class="animation">
          <h1 class="text-danger">Ans for 3: reduce-js(array reduce)</h1><hr>
          <h2>{!! Illuminate\Mail\Markdown::parse($data) !!}</h2>
        </div>

      @elseif(\Route::current()->uri == "i-m-funny")
        <div class="i-m-funny">
          <h1 class="text-danger">Ans for 6(A)</h1><hr>
          <p>{{$data->a->part_1}}</p>
          <p>{{$data->a->part_2}}</p>
          <p>{{$data->a->part_3}}</p>

          <h1 class="text-danger">Ans for 6(B)</h1><hr>
          <p>{{$data->b}}</p>
        </div>

      @endif

    </div>
  @endif
</body>
</html>
