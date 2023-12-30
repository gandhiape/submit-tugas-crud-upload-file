<html>
    <head>
        <title>Data Mahasiswa</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    </head>
<body>
    <div class="container mt-4">
     @if(session('status'))
     <div class="alert alert-success">
        {{session('status')}}
    </div> 
@endif
<div class="card">
    <div class="card-header text-center font-weight-bold">
        Data Mahasiswa 
    </div>
    <div class="card-body" >
        <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{url('tampilkan')}}">
@csrf
    <div class="form-group">
        NIM
    <input type="text" id="nim" name="nim" class="form-control" required="">
    </div>
        NAMA
    <div class="form-group">
        <input type="text" id="nama" name="nama" class="form-control" required**>
    </div>


    <div class="form-group">
        ALAMAT
        <textarea name="alamat" class="form-control" required=""></textarea>
    </div>
    <button types="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</body>
</html>