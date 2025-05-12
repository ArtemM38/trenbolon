<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROFI - Спортивные товары</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background-color: #404040;
      color: white;
    }
    .product-item {
      transition: all 0.3s ease;
    }
    .product-item:hover {
      background-color: rgba(255,255,255,0.05);
    }
    .quantity-control {
      background-color: rgba(255,255,255,0.1);
      border-radius: 6px;
    }
    .checkout-btn {
      transition: all 0.3s ease;
    }
    .checkout-btn:hover {
      background-color: rgba(255,255,255,0.2);
      transform: translateY(-2px);
    }
    .nav-link {
      margin-left: 40px; 
    }
    .first-link {
      margin-left: 40px; 
    }
    .first-link1 {
      margin-left: 220px; 
    }
    .my-auto{
      margin-left: 10px;
    }
    .footer-link{
      margin-left: 495px;
    }
    .mr-count{
      margin-right: 120px;
    }
    .product-image {
      border: 2px solid rgba(255, 255, 255, 0.1);
      border-radius: 8px;
      padding: 4px;
      background-color: rgba(255, 255, 255, 0.05);
      transition: all 0.3s ease;
    }
    .product-image:hover {
      border-color: rgba(255, 255, 255, 0.3);
      box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }
  </style>
</head>
<body class="bg-neutral-700 pt-5 ">
<header class="w-full flex flex-col items-center">
        <p class="text-sm text-white underline max-md:max-w-full">
            Многие люди терпят неудачу только потому, что сдаются в двух шагах от
            успеха.
        </p>

        <hr class="self-stretch mt-6 w-full border border-solid border-neutral-600 min-h-px max-md:max-w-full"/>

        <nav class="flex flex-wrap gap-5 justify-between mt-8 max-w-full text-xl text-white">
            <div class="flex gap-10 items-center max-md:max-w-full">
                <a href="/" class="self-stretch text-5xl font-bold basis-auto max-md:text-4xl">
                    PROFI
                </a>
                <a href="/map" class="first-link">Контакты</a>
                <a href="/katalog" class="nav-link">Каталог</a>
                <a href="/cart" class="nav-link">Корзина</a>
            </div>

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="nav-link mt-2.5 hover:text-gray-300">Выйти</button>
                </form>
                <a href="{{ route('profile.edit') }}" class="mt-2.5 hover:text-gray-300">Профиль</a>
            @else
                <a href="{{ route('login') }}" class="nav-link mt-2.5 hover:text-gray-300">Войти</a>
                <a href="{{ route('register') }}" class="mt-2.5 hover:text-gray-300">Зарегистрироваться</a>
            @endauth
        </nav>

        <hr class="self-stretch mt-7 w-full border border-solid border-neutral-600 min-h-px max-md:max-w-full"/>
    </header>

  <!-- Основное содержимое -->
  <section class="w-full flex flex-col items-center">
            <h2 class="mt-10 text-xl font-semibold text-white max-md:mt-10">
                Личный кабинет
            </h2>


  <hr class="mt-12 w-full border border-solid border-neutral-600 min-h-px max-md:mt-10 max-md:max-w-full"/>

  <main  class="flex flex-col items-start self-start mt-20 ml-96 font-semibold max-md:mt-10 max-md:ml-2.5" >
    <section class="self-stretch">
      <p>Имя:Темик</p>
      <p class="mt-8">emal: artem9034artem@mail.ru</p>
      <p class="mt-8">Номер телефона: 89149521050</p>
    </section>
  </main>

  <hr
    class="mt-80 w-full border border-solid border-neutral-600 min-h-px max-md:mt-10 max-md:max-w-full"
  />

  <section class="text-center">
    <h3
      class="self-center mt-12 text-2xl font-semibold max-md:mt-10 max-md:max-w-full"
    >
      Мечты - это характеристики нашей личности....
    </h3>

    <img
      src="https://i.ibb.co/XZTXVY9Q/image-3.png"
      alt="Decorative image"
      class="first-link1 object-contain  self-center mt-11 max-w-full rounded-md aspect-[1.59] w-[201px] max-md:mt-10"
    />
  </section>
  <!-- Подвал -->
 
    <hr class="w-full border mt-12 border-neutral-600 max-md:mt-10 max-md:max-w-full" />

    <footer class="flex items-center mt-8 w-[912px] max-w-full text-xl text-white">
      <h2 class="text-5xl font-bold mr-[110px]">PROFI</h2>
      <a href="https://t.me/aksler30" class="mr-[110px] hover:text-gray-300">Наш тг</a>
      <a href="#vk" class="mr-[110px] hover:text-gray-300">Вконтакте</a>
      <a href="mailto:profi38@mail.ru" class="hover:text-gray-300">profi38@mail.ru</a>
    </footer>
    
    <hr class="w-full mt-7 border border-neutral-600 max-md:max-w-full" />
 

  <script>
    function changeQuantity(button, delta) {
      const input = button.parentElement.querySelector('input');
      let value = parseInt(input.value);
      value += delta;
      if (value < 1) value = 1;
      input.value = value;
    }

    function validateQuantity(input) {
      let value = parseInt(input.value);
      if (isNaN(value) || value < 1) {
        input.value = 1;
      }
    }

    // Сохранение данных корзины перед переходом
    document.querySelector('.checkout-btn').addEventListener('click', function() {
      // Здесь можно добавить логику сохранения данных корзины
      // Например, в localStorage или отправить на сервер
      console.log('Товары в корзине сохранены');
    });
  </script>
</body>
</html>