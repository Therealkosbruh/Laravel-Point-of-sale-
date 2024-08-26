<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ПYШКА</title>
</head>
<body>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="{{route('product.index')}}">
                    <img src="{{ asset('img/pagelogo (2).png')}}" alt="">
                </a>
            </div>
            <div class="user-nav">
                <a href="{{route('user.cart')}}" id="cart"><i class='bx bx-cart'></i></a>
                <a href="{{route('user.profile')}}" id="profile"><i class='bx bxs-user-circle'></i></a>
            </div>
        </div>
    </header>
    <section>
        <div class="order-container">
            @foreach($products as $product)
                <div class="cart-item">
                    <div class="image">
                        <img src="{{ asset( $product->img) }}">
                    </div>
                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                    </div>
                    <div class="price">
                        <h3>{{ $product->price }}₽</h3>
                    </div>
                    <div class="quantity">
                        <h3>{{ $product->quantity }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="total-block">
            <h2 class="total-title" id="total_price">Итог: {{ $order->total_price }}₽</h2>
            <form action="{{ route('order.close', $order->id) }}" method="POST">
                @csrf
                <button class="checkout-button" type="submit">Закрыть</button>
            </form>
        </div>
    </section>
</body>
</html>