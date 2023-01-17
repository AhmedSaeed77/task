<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<title>{{ trans('News_trans.The News') }}</title>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="nav nav-tabs">
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Language</a>
    <ul class="dropdown-menu">
       @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item active">
        <a class="nav-link" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }} <span class="sr-only"></span></a>
        </li>
        @endforeach
    </ul>
  </li>
</ul>

<ul class="nav navbar-nav ml-auto">

        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              @if (App::getLocale() == 'ar')
              {{ LaravelLocalization::getCurrentLocaleName() }}
             <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
              @else
              {{ LaravelLocalization::getCurrentLocaleName() }}
              <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
              @endif
              </button>
        </div>
        </ul>
</nav>



<br>
<a class="btn btn-primary" href="{{route('news.add')}}" role="button">{{ trans('News_trans.Add New News') }}</a><br>

<center class="fs-1">{{ trans('News_trans.The News') }}</center>
<br><br>
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <table class="table" class = "cotainer">
    <thead class="table-dark">
      <tr >
        <th scope="col">#</th>
        <th scope="col">{{ trans('News_trans.News Title English') }}</th>
        <th scope="col">{{ trans('News_trans.News Title Arabic') }}</th>
        <th scope="col">{{ trans('News_trans.Description') }}</th>
        <th scope="col">{{ trans('News_trans.AddBy') }}</th>
        <th scope="col">{{ trans('News_trans.Photo') }}</th>
        <th scope="col">{{ trans('News_trans.Processes') }}</th>
      </tr>
    </thead>
    <tbody class = "table-info" >
    <?php $i = 0; ?>
    @foreach($usernews as $usernew)
      <tr>            
          <?php $i++; ?>
          <td>{{$i}}</td>
          
          <td><a href="{{ route('news.show',$usernew -> id) }}" class="btn btn-secondary">{{ $usernew->getTranslation('title', 'en') }}</a></td>
          <td>{{ $usernew->getTranslation('title', 'ar') }}</td>
          <td>{{ $usernew -> desc }}</td>
          <td>{{ $usernew -> user -> name }}</td>
          <td><img src = "{{ asset('/images/news/' . $usernew -> photo ) }} "
                  class = "img-thumnail" width = "75"
                  style="width:100px;height: 100px;" alt="image"/></td>
          <td>
            <a href="{{ route('news.edit',$usernew -> id) }}" class="btn btn-primary">{{ trans('News_trans.Edit') }}</a>
             <a href="{{route('news.delete',$usernew -> id)}}" class="btn btn-danger">{{ trans('News_trans.Delete') }}</a>
          </td>

        </tr>
      @endforeach
    </tbody>

  </table>
</body>

</html>





