<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ПYШКА</title>
</head>
<body>
    <header class="header">
        <a href="index.html" class="logo"><img src="{{ asset('img/pagelogo (2).png')}}"></a>
        <nav class="navbar">
         <a href="#home">Главная</a>
         <a href="#usl">Услуги</a>
         <a href="#cosm">Косметика</a>
         <a href="#coffee">Кофе</a>
         <a href="#contacts">Контакты</a>  
       </nav>
       <a href="https://vk.com/pushkamso" class="social-media" target="_blank"><i class='bx bxl-vk' ></i></a>
     </header>     
     <section class="home" id="home">
       <div class="content" data-aos="fade-up">
         <h3>ПYШКА</h3>
         <p>ПYШКА - самая современная мойка самообслуживания в Лесном.
           Ежедневно с 07:00 до 23:00 ПYШКА ждёт тебя и твой автомобиль , чтобы помыться комфортно, быстро и выгодно</p>
       </div>
     </section>

       <section class="services" id="usl" data-aos="zoom-in">
         <div class="heading">
           <h1>Услуги</h1>
         </div>
   
         <div class="box-container">
             <div class="box" data-aos="zoom-in-up" data-aos-delay="150">
               <h3>Вода</h3>
               <p>29₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="300">
               <h3>Пена</h3>
               <p>39₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="450">
               <h3>Воск</h3>
               <p>37₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="600">
               <h3>Ополаскивание</h3>
               <p>29₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="750">
               <h3>Воздух</h3>
               <p>10₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="900">
               <h3>Теплая Вода</h3>
               <p>35₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="1050">
               <h3>Активная пена</h3>
               <p>37₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="1200">
               <h3>Турбо-Вода</h3>
               <p>35₽/мин</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="1350">
               <h3>Пауза</h3>
               <p>Бесплатно</p>
             </div>
             <div class="box" data-aos="zoom-in-up" data-aos-delay="1500">
               <h3>Пауза после 5 минут</h3>
               <p>10₽/мин</p>
             </div>
         </div>
       </section>
   
       <section class="cosmetics" id="cosm">
         <div class="cosm-img" data-aos="fade-right">
           <img src="img/cosm.png" class="imgages">
         </div>
         <span class="blur" data-aos="zoom-in"></span>
       <span class="blur" data-aos="zoom-in"></span>
         <div class="content" data-aos="fade-left">
           <h3>Косметика</h3>
           <p>Магазин средств для ухода за автомобилем на ПYШКЕ! Большой спектр качественной автокосметики от известного Российского бренда «VORTEX».
             Вы можете познакомиться с нашим каталогом косметики в комнате ожидания или прямо сейчас оформить заказ у нас на сайте.</p>
           <a href="Product/index" class="btn" data-aos="zoom-in">Каталог</a>
           </div>
       </section>
   
       <section class="coffee" id="coffee">
         <div class="coffee-img" data-aos="zoom-in">
           <img src="img/cup.png" class="imgages">
         </div>
         <div class="content" data-aos="fade-right">
           <h3>ПYШКА-КОФЕ</h3>
           <p>Ароматный кофе и чистейший автомобиль на автомойке «ПYШКА» - это гарантия хорошего настроения на целый день!
             Комфортабельная комната ожидания с первой кофейней самообслуживания, в которой можно отдохнуть за чашкой ароматного кофе, любуясь своим чистым автомобилем через панорамное остекление.</p>
         </div>
       </section>
       <section class="contacts" id="contacts">
         <div class="heading" data-aos="fade-down" >
           <h1>Контакты</h1>
         </div>
         <div class="box-container">
           <div class="box" data-aos="fade-left">
             <div class="image">
               <i class='bx bx-phone'></i>
             </div>
             <div class="content" data-aos="fade-down" data-aos-delay="300">
               <h3>Наш телефон</h3>
               <a href="tel:+7 (963) 040-09-20">+7 (963) 040-09-20</a>
             </div>
           </div>
           <div class="box" data-aos="fade-down" data-aos-delay="150">
             <div class="image">
               <i class='bx bxs-watch'></i>>
             </div>
             <div class="content">
               <h3>График</h3>
               <p>Мы работаем ежедневно <span>7:00-23:00</span></p>
             </div>
           </div>
           <div class="box" data-aos="fade-right">
             <div class="image">
               <i class='bx bx-notepad'></i>
             </div>
             <div class="content">
               <h3>ИП Кудрявцев Степан Олегович</h3>
               <p>ИНН: 662402530687</p>
               <p>ОГРИП: 3200665800065501</p>
             </div>
           </div>
           <div class="box-geo" data-aos="fade-right" data-aos="fade-down">
             <div class="image">
               <i class='bx bx-location-plus'></i>
             </div>
             <div class="content">
               <h3>Наш адрес</h3>
               <p>г.Лесной Технический проезд 6а</p>
               <a href="https://yandex.ru/maps/org/pushka/141836531774/?from=mapframe&ll=59.676944%2C58.602018&z=11" target="_blank">Как добраться</a>
             </div>
           </div>
           </div>
         </div>
         <div class="contact-map">
           <div style="position:relative;overflow:hidden;">
               <a href="https://yandex.ru/maps/org/pushka/141836531774/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:5px;">Пушка</a><a href="https://yandex.ru/maps/11167/lesnoy/category/car_wash/184105244/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Автомойка в Лесном</a>
               <iframe src="https://yandex.ru/map-widget/v1/?ll=59.804636%2C58.644487&mode=poi&poi%5Bpoint%5D=59.803528%2C58.644944&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D141836531774&z=17.08" width="100%" height="500px" frameborder="1" allowfullscreen="true" style="position:relative;">
               </iframe></div>
          </div>
       </section>
   
   <script src="js/app.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
     <script>
       AOS.init({
         duration: 800,
         offset:150,
       });
     </script>
</body>
</html>