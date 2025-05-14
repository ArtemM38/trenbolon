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
    .nav-link {
      margin-left: 60px; 
    }
    .first-link {
      margin-left: 20px; 
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
    .basket{
      margin-top: 195px;
    }
    .but-app{
      margin-top: 212px;
    }
    .checkout-btn {
      transition: all 0.3s ease;
    }
    .checkout-btn:hover {
      background-color: rgba(255,255,255,0.2);
      transform: translateY(-2px);
    }
  </style>
</head>
<body class="bg-neutral-700">
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
  <main class="bg-neutral-700 pb-20">
    <div class="container mx-auto px-4">
      <h2 class="text-xl font-semibold text-white text-center mt-10 md:mt-20">Корзина</h2>

      <div class="basket container mx-auto px-4">
      <h2 class=" text-xl font-semibold text-white text-center mt-160 md:mt-20">Корзина пуста, добавьте товары</h2>

   

      <!-- Кнопка оформления -->
      <div class="but-app flex justify-center mt-40">
        <button class="checkout-btn px-6 py-4 text-base mt-10 font-semibold text-white rounded-md bg-zinc-600 bg-opacity-70 w-full md:w-40"
        onclick="window.location.href='/cart'">
          Добавить
        </button>
      </div>
    </div>
  </main>

  <!-- Подвал -->
  <footer class="bg-neutral-700">
    <hr class="w-full border border-neutral-600 max-md:mt-10 max-md:max-w-full" />

    <div class="footer-link flex items-center mt-8 w-[912px] max-w-full text-xl text-white">
      <h2 class="text-5xl font-bold mr-[110px]">PROFI</h2>
      <a href="https://t.me/aksler30" class="mr-[110px]">Наш тг</a>
      <a href="#vk" class="mr-[110px]">Вконтакте</a>
      <a href="mailto:profi38@mail.ru">profi38@mail.ru</a>
    </div>

    <hr class="w-full mt-7 border border-neutral-600 max-md:max-w-full" />
  </footer>

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
  </script>
</body>
</html>