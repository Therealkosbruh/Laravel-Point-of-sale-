<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTk_YVFhrmGIHOl5zbB0w7rbxR5WypU98C6FA&s" class="rounded-circle">
            </div>
            <div class="user-info">
              <h2 class="username" >Bobby</h2>
              <p class="full-name">New Bob Bobson</p>
              <p class="full-name">User</p>
              <button class="btn btn-secondary">Выйти</button>
              <button class="btn btn-primary">Редактировать профиль</button>
            </div>
          </div>
          <div class="order-history">
            <div class="order-tabs">
              <button class="btn" data-target="all">Статистика</button>
              <button class="btn" id="nonactive" data-target="pending">История Заказов</button>
            </div>
            <div class="order-list">
              
            </div>
          </div>
    </div>
</body>
</html>