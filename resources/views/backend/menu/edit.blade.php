<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <title>Edit</title>
</head>
<body style="background-color:aliceblue">
    <div class="container pt-5 pb-5">
    <div class="card shadow">
      <div class="mt-2 mx-2">
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
      </div>
      <div class="text-center">
        <img src="{{ asset('images/Logo.png') }}" alt="logo">
        <p class="h3">Edit Menu</p>
      </div>
        <div class="card-body">
          <form action="{{ route('menu.update', Crypt::encrypt($menu->id)) }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
              <!-- Modal content goes here -->
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Masukkan Nama Menu</label>
                <input type="text" class="form-control" placeholder="contoh: Ayam Geprek" aria-label="title" aria-describedby="basic-addon1" name="title" value="{{ $menu->title }}">
            </div>
    
            <div class="input-group mb-3">
                <textarea name="description" id="description" cols="180" rows="7" placeholder="Masukkan Deskripsi Menu">{{ $menu->description }}</textarea>
            </div>
    
            <div class="mb-3">
                <select name="category" id="category">
                    <option value="kategori">Pilih Kategori</option>
                    @if ($menu->category == 'food')
                      <option value="food" selected>Makanan</option>
                    @else
                      <option value="drink" selected>Minuman</option>
                    @endif
                </select>
            </div>
    
            <div class="mb-3">
                <label for="price">Masukkan Harga Menu</label>
                <input type="number" class="form-control" placeholder="contoh: 10000" aria-label="price" aria-describedby="basic-addon1" name="price" value="{{ $menu->price }}">
            </div>
    
            <div class="mb-3">
                <label for="image">Unggah Gambar Menu:</label>
                <input type="file" class="form-control-file" aria-label="image" aria-describedby="basic-addon1" name="image">
            </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
      </div>
    </div>

      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>