@extends('backend.app')
@section('content')
<div class="col-lg-12">
    <!--begin::Advance Table Widget 4-->
    <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5 text-center flex-column">
            <span class="font-weight-bolder text-dark">Daftar Menu Ayam Geprek Borobudur</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Rincian Menu Terkini</span>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <div class="pb-2">
                <button type="button" class="btn btn-light-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="bi bi-plus-square"></i>
                  </button>
            </div>
            <div class="tab-content">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-bg table-bordered table-vertical-center">
                        <thead class="text-center">
                            <tr class="text-uppercase">
                                <th style="min-width: 250px" class="pl-7">
                                    <span class="text-dark-75">Gambar</span>
                                </th>
                                <th>Nama Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($menu as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="image" width="150px">
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->title }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->category }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rp. {{ $item->price }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->description }}</span>
                                </td>
                                <td class="pr-0 text-center">
                                    <a href="{{ route('menu.edit', Crypt::encrypt($item->id)) }}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('menu.destroy', Crypt::encrypt($item->id)) }}" method="post">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-light-danger font-weight-bolder font-size-sm"><i class="bi bi-trash-fill"></i></button>
                                </form>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger" role="alert">
                                Data Menu Belum di Tambahkan!
                              </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $menu->links() }}
                </div>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 4-->
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <!-- Modal content goes here -->
        @csrf
        <div class="mb-3">
            <label for="title">Masukkan Nama Menu</label>
            <input type="text" class="form-control" placeholder="contoh: Ayam Geprek" aria-label="title" aria-describedby="basic-addon1" name="title">
        </div>

        <div class="input-group mb-3">
            <textarea name="description" id="description" cols="180" rows="7" placeholder="Masukkan Deskripsi Menu"></textarea>
        </div>

        <div class="mb-3">
            <select name="category" id="category">
                <option value="kategori">Pilih Kategori</option>
                <option value="food">Makanan</option>
                <option value="drink">Minuman</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="price">Masukkan Harga Menu</label>
            <input type="number" class="form-control" placeholder="contoh: 10000" aria-label="price" aria-describedby="basic-addon1" name="price">
        </div>

        <div class="mb-3">
            <label for="image">Unggah Gambar Menu:</label>
            <input type="file" class="form-control-file" aria-label="image" aria-describedby="basic-addon1" name="image">
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection