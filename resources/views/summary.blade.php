<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pesanan</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <header>
        <h1>Ringkasan Pesanan</h1>
        <a href="/home" class="cart-btn">Kembali ke Menu</a>
    </header>

    <main class="summary">
        <div class="summary-container">
            <div class="info-card">
                <h2>Info Pemesan</h2>
                <div class="info-item">
                    <span class="label">Nama:</span>
                    <span class="value">{{ $order['nama'] }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Alamat:</span>
                    <span class="value">{{ $order['alamat'] }}</span>
                </div>
                <div class="info-item">
                    <span class="label">Metode Pembayaran:</span>
                    <span class="value">{{ $order['metode'] }}</span>
                </div>
            </div>

            <div class="order-card">
                <h2>Detail Pesanan</h2>
                @if (empty($order['cart']))
                    <div class="empty-cart">
                        <p>Keranjang kosong</p>
                    </div>
                @else
                    <div class="order-items">
                        @php $total = 0; @endphp
                        @foreach ($order['cart'] as $item)
                            <div class="order-item">
                                <span class="item-name">{{ $item['name'] }}</span>
                                <span class="item-price">Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
                            </div>
                            @php $total += $item['price']; @endphp
                        @endforeach
                    </div>
                    <div class="order-total">
                        <span class="total-label">Total Pembayaran:</span>
                        <span class="total-amount">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="summary-actions">
            <p class="success-message">Pesanan berhasil diterima! Terima kasih atas pesanan Anda.</p>
        </div>

    </main>
</body>

</html>
