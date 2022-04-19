
<html lang="en">
<head>
<title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    
    <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ITI blog</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
      <a  class="nav-link active"href="{{route('posts.index')}}">All posts</a> 
      </li>
      </ul>
    </div>
  </nav>

   
</head>
<body>
<div class="container">
  @yield('content')
</div> 
</body>
</html>








