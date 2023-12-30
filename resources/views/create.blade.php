<html>
<head>
    <title>Create Data Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head> 
<body>
    @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="container mt-4">
    @if (session('status'))
        <div class="alert alert-success"> 
            {{ session ('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Create Data Mahasiswa 
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" enctype="multipart/form-data" action="{{url('save')}}">
        @csrf
            <div class="form-group">
                NIM
                <input type="text" id="nim" name="nim" class="form-control" required=""> 
            </div>
            <div class="form-group">
                NAMA
                <input type="text" id="nama" name="nama" class="form-control" required="">
            </div>
            <div class="form-group">
                GAMBAR
                <input type="file" id="gambar" name="gambar" class="form-control" accept="image/*">
            </div>
            <div class="form-group">
                UMUR
                <input type="text" id="umur" name="umur" class="form-control" required="">
            </div>
            <div class="form-group">
                EMAIL
                <input type="text" id="email" name="email" class="form-control" required="">
            </div>
            <div class="form-group">
                ALAMAT
                <textarea name="alamat" class="form-control" required=""></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> 
</div>
</body> 
</html>