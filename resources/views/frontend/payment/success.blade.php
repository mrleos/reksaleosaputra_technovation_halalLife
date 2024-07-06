@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Status Pembayaran</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <h1>Pembayaran Berhasil</h1>
    <p>Pembayaran Berhasil di Proses!</p>
</div>

<script>
    Swal.fire({
        title: 'Success!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endsection