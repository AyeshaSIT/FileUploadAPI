<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <form method="POST" action="{{route('customer.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="form-group col-5">
              <label for="">File Upload</label>
              <input type="file" class="form-control-file" name="audiofile" id="" accept="audio/*">
              {{-- @error('audiofile') --}}
              {{-- Validation errors are displayed using the @error directive --}}
                {{-- <div class="alert alert-danger mt-2">{{$message}}</div>  --}}
              {{-- @enderror --}}
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            </div>
      </form>
        <div class="row">
          <div class="col-4 ml-4">
            @if(session('status'))
              <div class="alert alert-success">{{ session('status') }}</div>
            @endif
          </div>
        </div>
        <div class="row">
          @foreach($customers as $customer)
          <div class="col-8"> 
            <audio controls>
            <source src="{{ asset('storage/'.$customer->file_path) }}" type="audio/mpeg"> Your browser does not support the audio element.</audio>
            <form method="POST" action="{{route('customer.destroy',$customer->id)}}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm mb-3" type="submit">Delete</button>
            </form>          
          </div>
          @endforeach
        </div>


      
    
  </body>
</html>