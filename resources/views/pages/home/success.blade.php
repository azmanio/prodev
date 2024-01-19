@extends('layouts.app')

@section('title', 'Sukses Checkout')

@section('content')
    <div class="container-fluid">
        <div class="text-center my-5">
            <img src="{{ asset('assets/img/success-payment.png') }}" alt="Success Payment" class="w-25 mt-5">
            <h2 style="color: #37517e;">Yeay, Pembayaran Anda Berhasil!</h2>
            <a href="{{ route('history-order') }}" class="btn btn-primary mt-4">Cek Pesanan</a>
        </div>
    </div>
@endsection
