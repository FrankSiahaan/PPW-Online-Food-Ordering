<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Makanan</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <header>
        <h1>Daftar Menu Makanan</h1>
        <a href="/checkout" class="cart-btn">Checkout</a>
    </header>

    <main class="menu-container">
        @foreach ($menus as $menu)
            <div class="menu-item">
                <img src="{{ asset('images/' . $menu->gambar) }}" alt="{{ $menu->nama }}">
                <h3>{{ $menu->nama }}</h3>
                <p>Rp {{ $menu->harga }}</p>
                <button onclick="addToCart('{{ addslashes($menu->nama) }}', {{ $menu->harga }})">Tambah</button>

            </div>
        @endforeach
    </main>

    <script>
        function addToCart(name, price) {
            let cart = JSON.parse(sessionStorage.getItem('cart')) || [];
            cart.push({
                name,
                price
            });
            sessionStorage.setItem('cart', JSON.stringify(cart));
            alert(`${name} ditambahkan ke keranjang!`);
        }
    </script>
</body>

</html>
