<!DOCTYPE html>
<html>
  <head>
    <title>Laravel Multiple Images Upload Using Dropzone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css">
  </head>
  <body>

    <div class="container">
      <form  method="post" action = "{{route('album.albumstoredata')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1"> Name </label>
          <input type="text" class="form-control"  name="name" placeholder="Enter title English" required>  
        </div> <br>
        <button type="submit" class="btn btn-primary">Add</button>
      </form>
      <h3 class="jumbotron">Laravel Multiple Images Upload Using Dropzone</h3>
      <form method="post" action="{{route('album.albumstoredata')}}" enctype="multipart/form-data" class="dropzone" id="dropzone" >
        @csrf
      </form>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
  </body>
</html>