@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Proses Pembayaran</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <h1>Complete Payment</h1>
    <div id="qris-container"></div>
    <button id="pay-button" class="btn btn-primary">Pay Now</button>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            // Optional
            onSuccess: function(result) {
                window.location.href = '{{ route('payment.success') }}';
            },
            // Optional
            onPending: function(result) {
                console.log(result);
            },
            // Optional
            onError: function(result) {
                console.log(result);
            }
        });
    };
</script>
@endsection