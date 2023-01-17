
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<title>{{ trans('News_trans.The Comments') }}</title>


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
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                @endforeach
            </div>
        </div>
        </ul>
</nav>



<br>

</head>
<body>

<br>
<center class="fs-1">{{ trans('News_trans.News Data') }}</center>
<table class="table" class = "cotainer">
  <thead class="table-dark">
    <tr >
      <th scope="col">{{ trans('News_trans.ID') }}</th>
      <th scope="col">{{ trans('News_trans.News Title English') }}</th>
      <th scope="col">{{ trans('News_trans.News Title Arabic') }}</th>
      <th scope="col">{{ trans('News_trans.Description') }}</th>
      <th scope="col">{{ trans('News_trans.AddBy') }}</th>
      
    </tr>

  </thead>
  <tbody class = "table-warning" >     
    <tr>
        <td>{{ $usernews -> id }}</td>
        <td>{{ $usernews->getTranslation('title', 'en') }}</td>
        <td>{{ $usernews->getTranslation('title', 'ar') }}</td>
        <td>{{ $usernews -> desc }}</td>
        <td>{{ $usernews -> user -> name }}</td>
      
    </tr>
  </tbody>
</table>
<br>
<center class="fs-1">{{ trans('News_trans.The Comments') }}</center>
<div class="form-group">
<table class="table" class = "cotainer">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">{{ trans('News_trans.AddBy') }}</th>
      <th scope="col">{{ trans('News_trans.Comment') }}</th>
      <th scope="col">{{ trans('News_trans.Delete Comment') }}</th>
    </tr>
  </thead>
  <tbody class = "table-info" >
  <?php $i = 0; ?>
  @foreach($usernews->comments as $comment)
    <tr>
        <?php $i++; ?>
        <td>{{ $i }}</td>
        <td> {{ $comment -> user -> name }} </td>
        <td> {{ $comment -> body }} </td>
        <td>
          <a href="{{route('news.comment',$comment -> id)}}" class="btn btn-danger">{{ trans('News_trans.Delete') }}</a>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<br>
<center class="fs-1">{{ trans('News_trans.Add Comment') }}</center> 
<br>
<form class="container" method="get" action = "{{url('addcomment/'.$usernews -> id)}}" >
@csrf
<label for="exampleInputEmail1">{{ trans('News_trans.Enter Your Comment') }}</label>
  <div class="form-floating">
    <textarea class="form-control"  placeholder="Leave a comment here" name = "body"  id="floatingTextarea"></textarea>
    @if ($errors->any())
        <div class="error" style="color:red">{{ $errors->first('body') }}</div>
    @endif
  </div>
  <br>
  <button type="submit" class="btn btn-primary">{{ trans('News_trans.Add Comment') }}</button>
</form>
<br>
<a class="btn btn-dark" href="{{route('news.index')}}" role="button">{{ trans('News_trans.Back') }}</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>