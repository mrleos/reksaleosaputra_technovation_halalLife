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
        <a href="{{ route('user.index') }}" class="btn btn-secondary">
          <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
      </div>
      <div class="text-center">
        <img src="{{ asset('images/Logo.png') }}" alt="logo">
        <p class="h3">Edit User</p>
      </div>
        <div class="card-body">
          <form action="{{ route('user.update', $user->id) }}" method="POST">
            <div class="modal-body">
              <!-- Modal content goes here -->
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Masukkan Username</label>
                <input type="text" class="form-control" placeholder="contoh: Panto" aria-label="name" aria-describedby="basic-addon1" name="name" value="{{ $user->name }}">
            </div>
    
            <div class="mb-3">
                <label for="email">Masukkan Email</label>
                <input type="text" class="form-control" placeholder="contoh: a@gmail.com" aria-describedby="basic-addon1" name="email" value="{{ $user->email }}">
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