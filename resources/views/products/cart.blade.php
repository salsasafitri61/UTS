@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Keranjang Belanja</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Kuantitas</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cart as $id => $item)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" style="width: 50px; height: 50px;" class="img-thumbnail">
                        <div class="ms-2">
                            <p class="mb-0">{{ $item['name'] }}</p>
                        </div>
                    </div>
                </td>
                <td>IDR {{ number_format($item['price'], 0, ',', '.') }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>IDR {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                <td>
                    <form method="POST" action="{{ route('keranjang.remove', $id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Keranjang kosong</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <h4>Total: IDR {{ number_format($total, 0, ',', '.') }}</h4>
        <a href="#" class="btn btn-success">Lanjutkan Pembayaran</a>
    </div>
</div>
@endsection
