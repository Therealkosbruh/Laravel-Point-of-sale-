<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
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
        <div class="title">
            <h2 class="head-title">Ваша корзина</h2>
        </div>
            <div class="cart">
            @if(count($cartItems)>0)
                @foreach($cartItems as $item)
                <div class="cart-item">
                    <div class="image">
                        <img src="{{ $item->img }}">
                    </div>
                    <div class="product-info">
                        <h3>{{ $item->product_name }}</h3>
                        <p>{{ $item->type_name }}</p>
                    </div>
                    <div class="price">
                        <h3>{{$item->product_price}}₽</h3>
                    </div>
                    <div class="quantity">
                        <input type="number" class="qty-input" name="prod_qty" value="1" min="1" max="100">
                    </div>
                    <div class="delete-button">
                        <form action="{{ route('cart.destroy', $item->product_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="del_product"><i class='bx bx-trash-alt cart-remove'></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
                @else
                <h1 class="no_records_title">Ваша корзина пуста, добавьте товары в корзину</h1>
            @endif
            </div>
            <div class="cart-container">
            <div class="total-block">
                <form action="{{route('order.create')}}" method="POST">
                    @csrf
                    <input type="hidden" name="total" id="total" value="0">
                    @foreach($cartItems as $item)
                    <input type="hidden" name="cartItems[{{ $loop->index }}][product_id]" value="{{ $item->product_id }}">
                    <input type="hidden" name="cartItems[{{ $loop->index }}][quantity]" id="qty-{{ $loop->index }}">
                    @endforeach    
                    <h2 class="total-title" id="total_price">Итог: ₽</h2>
                    <h2 class="total-title">Заберите заказ <a class="link" href="https://yandex.ru/maps/org/pushka/141836531774/?from=mapframe&ll=59.676944%2C58.602018&z=12" target="_blank">у нас</a></h2>
                    <button class="checkout-button" type="submit" {{ count($cartItems) <= 0 ? 'disabled' : '' }}>Оформить заказ</button>
                </form>
            </div>
        </div>
    </section>
<script src="{{asset('js/cart.js')}}"></script>
</body>
</html>