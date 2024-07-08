@extends('backend.app')
@section('content')
<div class="col-lg-12">
    <!--begin::Advance Table Widget 4-->
    <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5 text-center flex-column">
            <span class="font-weight-bolder text-dark">Daftar Pengguna</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Rincian Pengguna</span>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <button class="btn btn-light-primary mb-1" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></button>
            <div class="tab-content">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-bg table-bordered table-vertical-center">
                        <thead class="text-center">
                            <tr class="text-uppercase">
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($users as $item)
                            <tr>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->name }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->email }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->role->name }}</span>
                                </td>
                                <td class="pr-0 text-center">
                                <form action="{{ route('user.destroy', Crypt::encrypt($item->id)) }}" method="post">
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
                    {{-- {{ $menu->links() }} --}}
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
        <form action="{{ route('user.add') }}" method="post">
        @method('POST')
        @csrf
        <div class="modal-body">
        <div class="mb-3">
            <label for="name">Masukkan Nama Pengguna</label>
            <input type="text" class="form-control" placeholder="min:3" aria-label="name" aria-describedby="basic-addon1" name="name">
        </div>

        <div class="mb-3">
            <label for="email">Masukkan Email Pengguna</label>
            <input type="text" class="form-control" placeholder="contoh: example@gmail.com" aria-label="email" aria-describedby="basic-addon1" name="email">
        </div>
        
        <div class="mb-3">
            <label for="password">Masukkan Password</label>
            <input type="password" class="form-control" placeholder="min:8" aria-label="password" aria-describedby="basic-addon1" name="password">
        </div>

        <div class="mb-3">a
            <select name="role_id" id="role_id">
                <option value="2">Pilih Role</option>
                <option value="1">Admin</option>
                <option value="2">User</option>
                <option value="3">Operator</option>
            </select>
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