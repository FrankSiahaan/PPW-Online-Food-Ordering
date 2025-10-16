<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <header>
        <h1>Checkout</h1>
        <a href="/home" class="cart-btn">Kembali ke Menu</a>
    </header>

    <main class="checkout">
        <section class="cart-list">
            <h2>Keranjang</h2>
            <div id="cartItems">(keranjang kosong)</div>
        </section>

        <section class="checkout-form">
            <h2>Formulir Checkout</h2>
            <form method="POST" action="{{ route('checkout.submit') }}" id="orderForm">
                @csrf
                <input type="hidden" name="cart" id="cartInput">

                <label>Nama</label>
                <input type="text" name="nama" required>

                <label>Alamat</label>
                <textarea name="alamat" rows="3" required></textarea>

                <label>Metode Pembayaran</label>
                <select name="metode" required>
                    <option value="Tunai">Tunai</option>
                    <option value="Transfer">Transfer</option>
                </select>

                <button type="submit">Pesan Sekarang</button>
            </form>
        </section>
    </main>
    



    <script>
        const cart = JSON.parse(sessionStorage.getItem('cart'));
        const cartDiv = document.getElementById('cartItems');
        const cartInput = document.getElementById('cartInput');

        function renderCart() {
            if (!cart.length) {
                cartDiv.textContent = '(keranjang kosong)';
                return;
            }
            cartDiv.innerHTML = '';
            let total = 0;
            cart.forEach((item, i) => {
                const el = document.createElement('div');
                el.className = 'cart-row';
                el.textContent = `${item.name} — Rp ${item.price}`;
                cartDiv.appendChild(el);
                total += Number(item.price || 0);
            });
            const tot = document.createElement('div');
            tot.className = 'cart-total';
            tot.textContent = `Total: Rp ${total}`;
            cartDiv.appendChild(tot);
            cartInput.value = JSON.stringify(cart);
        }

        renderCart();
    </script>
</body>     

</html>
