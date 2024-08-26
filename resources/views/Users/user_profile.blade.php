<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
    <div class="profile-container">
        <div class="profile-block">
            <div class="avatar">
              <img src="https://html5css.ru/w3css/img_avatar3.png" class="rounded-circle">
            </div>
            <div class="user-info">
              <h2 class="username" >{{$user->login}}</h2>
              <p class="full-name">{{$user->last_name}} {{$user->name}} {{$user->patr}}</p>
              <p class="full-name">{{$user->role}}</p>
              <button class="btn btn-primary">Редактировать профиль</button>
            </div>
          </div>
          <div class="order-history">
            <div class="order-tabs">
              <button class="switchbtn active" id="stat_btn" data-target="all">Статистика</button>
              <button class="switchbtn" id="history_btn" data-target="pending">История Заказов</button>
            </div>
            <div class="order-list">
              <div class="cart hidden" id="cart_cont">
                @if(count($orders)>0)
                    @foreach($orders as $order)
                        <a href="{{route('order.show',$order->id)}}" class="order_link">
                            <div class="cart-item" id="cart_item">
                                <div class="image">
                                    <img src="{{ asset('img/pagelogo (2).png')}}">
                                </div>
                                <div class="product-info">
                                    <p>Заказ #{{$order->id}}</p>
                                </div>
                                <div class="price">
                                    <h3>{{$order->total_price}}₽</h3>
                                </div>
                                <div class="price">
                                    <h3>{{$order->status}}</h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @else
                    <h1 class="no_records_title">У вас пока что нет активных заказов</h1>
                @endif
                </div>
                <div class="stats-container" id="stats_cont">
                  <div class="stat-item">
                      <h3>Сумма выкупа</h3>  
                      <h3>{{ $totalAmount }}₽</h3>  
                  </div>
                  <div class="stat-item">
                      <h3>Общее количество заказов</h3>  
                      <h3>{{ $totalOrders }}</h3>  
                  </div>
                  <div class="stat-item">
                      <h3>Средний чек</h3>  
                      <h3>{{ $averageCheck ?? 0 }}₽</h3>  
                  </div>
              </div>
              
            </div>
          </div>
    </div>
    <script src="{{asset('js/profile.js')}}"></script>
</body>
</html>