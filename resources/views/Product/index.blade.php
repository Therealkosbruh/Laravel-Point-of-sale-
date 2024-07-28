<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/prod.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ПYШКА</title>
</head>
<body>
    <header>
        <div class="nav">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('img/pagelogo (2).png')}}" alt="">
                </a>
            </div>
            <div class="user-nav">
                <a href="#" id="filters"><i class='bx bx-filter-alt'></i></a>
                <a href="{{route('user.cart')}}" id="cart"><i class='bx bx-cart'></i></a>
                <a href="{{route('user.profile')}}" id="profile"><i class='bx bxs-user-circle'></i></a>

                @if(Auth::check())
                <span class="user-name">{{ Auth::user()->name }}</span>
                <span class="user-role">{{ Auth::user()->role }}</span>
                {{-- <a href="{{ route('logout') }}">Выйти</a> --}}
            @else
                <a href="{{ route('user.authentification') }}">Войти</a>
            @endif
            </div>
        </div>
        <div class="filters">
            <h2 class="section-title">Фильтры</h2>
            <div class="filter-content">
                <i class='bx bx-x' id="close-cart"></i>
                <div class="filter-block">
                    <form id="filterForm" method="GET" action="">
                        <div class="filter-item">
                            <label for="suppliers">Поставщики</label>
                            <select id="suppliers" name="supplier_id" onchange="document.getElementById('filterForm').submit();">
                                <option value="">Все</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ session('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="types">Типы средств</label>
                            <select id="types" name="type_id" onchange="document.getElementById('filterForm').submit();">
                                <option value="">Все</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ session('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="price">По цене</label>
                            <select id="price" name="price" onchange="document.getElementById('filterForm').submit();">
                                <option value="">Все</option>
                                <option value="low" {{ session('price') == 'low' ? 'selected' : '' }}>Сначала дешевые</option>
                                <option value="high" {{ session('price') == 'high' ? 'selected' : '' }}>Сначала дорогие</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <section class="product-container">
        <div class="title">
            <h2 class="section-title">Наш асортимент</h2>
        </div>
        <div class="search">
            <form action="{{route('product.index')}}" method="GET">
                <input type="text" name="search" id="search" class="searchTerm" placeholder="Что бы вы хотели найти?">
                <button type="submit" class="searchButton">
                    <i class='bx bx-search'></i>
               </button>
            </form>
         </div>
        <div class="product-section">
            @foreach ($products as $product)
                <a href="{{route('product.show', $product->id)}}">
                    <div class="card">
                        <div class="imgBox">
                            <img src="{{$product->img}}" 
                            class="prod-img">
                        </div>
                        <div class="contentBox">
                        <h3 class="product-title">{{$product->name}}</h3>
                        <h2 class="price">{{$product->price}}₽</h2>
                        <button class="buy">Подробнее</button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        </div>
        <ul class="pagination">
            @if ($products->currentPage() > 1)
                <li><a href="{{ $products->previousPageUrl() }}">«</a></li>
            @endif
        
            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <li>
                    <a href="{{ $products->url($i) }}" 
                       class="{{ $i === $products->currentPage() ? 'active' : '' }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor

            @if ($products->currentPage() < $products->lastPage())
                <li><a href="{{ $products->nextPageUrl() }}">»</a></li>
            @endif
        </ul>
    </section>
    <script src="{{asset('js/product.js')}}"></script>
</body>
</html>