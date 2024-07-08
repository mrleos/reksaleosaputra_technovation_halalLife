@extends('backend.app')
@section('content')
<div class="col-lg-12">
    <!--begin::Advance Table Widget 4-->
    <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 py-5 text-center flex-column">
            <span class="font-weight-bolder text-dark">Daftar Pesanan</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Dalam Status Pending</span>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-0 pb-3">
            <div class="tab-content">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-head-bg table-bordered table-vertical-center">
                        <thead class="text-center">
                            <tr class="text-uppercase">
                                <th style="min-width: 250px" class="pl-7">
                                    <span class="text-dark-75">Gambar</span>
                                </th>
                                <th>Nama User</th>
                                <th>Nama Produk</th>
                                <th>Jumlah Pesan</th>
                                <th>Total Harga</th>
                                <th>Status Bayar</th>
                                <th>Status Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($order as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/'.$item->menu->image) }}" alt="image" width="150px">
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->user->name }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->menu->title }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->quantity }}</span>
                                </td>
                                <td>
                                    <span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rp. {{ $item->total_price }}</span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success rounded-pill text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->status ?? 'Belum di Bayar' }}</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary rounded-pill text-dark-75 font-weight-bolder d-block font-size-lg">{{ $item->order_status ?? 'Dalam Proses' }}</a>
                                </td>
                                <td class="pr-0 text-center">
                                <form action="{{ route('order', Crypt::encrypt($item->id)) }}" method="post">
                                @csrf
                                @method('POST')
                                <div class="d-flex">
                                <select name="order_status" id="order_status">
                                    <option value="">Status Pesanan</option>
                                    <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                                    <option value="Sampai">Sampai</option>
                                </select>
                                    <button type="submit" class="btn btn-primary font-weight-bolder font-size-sm"><i class="fa fa-paper-plane"></i></button>
                                </div>
                                </form>
                                </td>

                            @empty
                            <div class="alert alert-danger" role="alert">
                                Data Pesanan Tidak Tersedia!
                            </div>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $order->links() }}
                </div>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Body-->
    </div>
    <!--end::Advance Table Widget 4-->
</div>

@endsection