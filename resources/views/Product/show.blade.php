<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/single_prod.css') }}">
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
            <a href="#" id="profile"><i class='bx bxs-user-circle'></i></a>
        </div>
    </div>
</header>
    <section class="Product inline-center-center gap-4" id="prodsec">
        <a href="#" class="Visual block-center-center">
          <picture>
            <img
              src="{{$product->img}}"
            />
          </picture>
        </a>
        <form action="{{route('cart.add')}}" method="POST" class="Form block-start-start gap-4">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <h3>{{$product->name}}</h3>
          <div class="Price">Цена: {{$product->price}}₽</div>
          <fieldset class="TagList inline-wrap gap-2">
            <legend><b>Описание:</b></legend>
            <p>{{$product->description}}</p>
          </fieldset>
          <legend><b>Применение:</b></legend>
          <p>{{$product->useage}}</p>
          <div class="block-start-start gap-2">
            <button class="Button Primary" type="submit">В корзину</button>
            <small>Доставка сегодня до 20:00</small>
          </div>
        </form>
      </section>
</body>
</html>