<!DOCTYPE html>
<html>
<head>
	<title>ArkaShop</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('asset/css/custom.css') }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
	<div class="container">
   <a class="navbar-brand" href="#">
    <img src="./asset/logo.svg" height="61" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline col-11">
      <input class="form-point-nav mr-sm-2 col-12" type="search" placeholder="Search" aria-label="Search">
    </form>
      <ul class="navbar-nav">
      <li class="nav-item active">
        <button type="button" class="btn btn-ark shadow-sm text-white pl-4 pr-4" data-toggle="modal" data-target="#create-item">ADD</button>
      </li>
    </ul>
  </div>
</div>
</nav>
<div class="container justify-content-center pt-5">
<table class="table col-8 m-auto bg-white shadow" border="0">
  <thead class="tb-head shadow-sm text-white">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Cahier</th>
      <th scope="col">Product</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="tbody">
  </tbody>
</table>

  <nav aria-label="...">
  <ul id="pagination" class="pagination pagination-sm">
  </ul>
</nav>
    <!-- Modal Edit -->
    @include('edit')
    
    <!-- Create Item Modal -->
    @include('create')

    <!-- MOdal delete -->
    @include('delete')



</div>

<!-- Modal Delete -->
<!-- Modal -->
  <script type="text/javascript" src="{{ asset('asset/js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
  <script type="text/javascript">
    var url = "<?= route('posts.index') ?>";
  </script>
  <script type="text/javascript" src="{{ asset('asset/js/script.js') }}"></script>
</body>
</html>