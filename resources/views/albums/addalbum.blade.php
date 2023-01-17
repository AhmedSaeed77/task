<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<title>Add New albums</title>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

<style>
  .bar{ background-color: #00ff00; }
  .precent { position: absolute; left: 50%; color: black;}
</style>



<br>

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




<center class="fs-1">Add New Album</center>

<form id="uploadFile" class="container " method="post" action = "{{route('album.albumstore')}}"
      enctype="multipart/form-data" id="dropzone">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1"> Name </label>
    <input type="text" class="form-control" value="{{old('name')}}" 
    aria-describedby="emailHelp" name="name"
    placeholder="Enter title English" required> 
      @if ($errors->any())
        <div class="error" style="color:red">{{ $errors->first('title_en') }}</div>
      @endif
  </div>
  <div class="form-group dropzone">
    <label for="exampleInputPassword1">images</label>
    <input type="file" class="form-control"  name="images[]" multiple required>
    @if ($errors->any())
        <div class="error" style="color:red">{{ $errors->first('images') }}</div>
    @endif
  </div>
  <br>

  <button type="submit" class="btn btn-primary">Add</button>
</form>
<br>
<a class="btn btn-dark" href="{{route('album.index')}}" role="button">Back</a>
</body>

<script type="tyext/javascript">


  new Dropzone("dropzone",{
    thumbnailWidth:200,
    maxFilesize:1,
    acceptFiles:".jpg,.jpeg,.png",
  })

  </script>
</html>
      