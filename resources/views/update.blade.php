<html>
<head>
    <title>Create Data Mahasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head> 
<body>
    <div class="container mt-4">
    @if (session('status'))
        <div class="alert alert-success"> 
            {{ session ('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Update Data Mahasiswa 
        </div>
        <div class="card-body">
            <form name="update-mahasiswa-form" id="update-mahasiswa-form" method="post" action="{{url('edit')}}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" required="" value="{{ $data->nim }}" readonly> 
            </div>
            <div class="form-group">
                <label for="nim">NAMA</label>
                <input type="text" id="nama" name="nama" class="form-control" required="" value="{{ $data->nama }}">
            </div>
            <div class="form-group">
                <label for="nim">GAMBAR</label>
                <input type="file" id="gambar" name="gambar" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="nim">UMUR</label>
                <input type="text" id="umur" name="umur" class="form-control" required="" value="{{ $data->umur }}">
            </div>
            <div class="form-group">
                <label for="nim">EMAIL</label>
                <input type="text" id="email" name="email" class="form-control" required="" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="nim">ALAMAT</label>
                <textarea name="alamat" class="form-control" required=""> {{ $data->alamat }} </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div> 
</div>
</body> 
</html>