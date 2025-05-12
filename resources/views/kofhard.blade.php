<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PROFI - Sports Equipment Store</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      scroll-behavior: smooth;
    }
    .nav-link {
      margin-left: 40px; 
    }
    .first-link {
      margin-left: 40px; 
    }
    .my-auto{
      margin-left: 130px;
    }
    .my-bask{
      margin-left: 130px;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }
    .size-option {
      cursor: pointer;
      transition: all 0.2s ease;
      width: 50px;
      text-align: center;
    }
    .size-option.selected {
      background-color: #525252;
    }
    .buy-btn {
      transition: all 0.3s ease;
    }
    .buy-btn:hover {
      background-color: #3f3f3f;
      transform: scale(1.05);
    }
    .size-column {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .small-images {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .small-image {
      width: 100%;
      height: auto;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .small-image:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>
<header class="flex overflow-hidden flex-col items-center pt-5 bg-neutral-700">
  <p class="text-sm text-white underline max-md:max-w-full">
    Многие люди терпят неудачу только потому, что сдаются в двух шагах от успеха.
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

  <h2 class="mt-20 text-xl font-semibold text-white max-md:mt-10">Карточка товара</h2>

  <main class="mt-20 max-w-full w-[936px] max-md:mt-10">
    <article class="flex gap-5 max-md:flex-col">
      <section class="w-[56%] max-md:ml-0 max-md:w-full flex">
        <!-- Большая фотография слева -->
        <div class="w-full mr-4">
          <img
            src="https://i.ibb.co/dsVx06Q5/pr-20895-2.png" 
            class="object-cover w-full h-full rounded-md"
            id="main-image"
          />
        </div>
        
        <!-- Три маленькие фотографии справа -->
        <div class="small-images w-[30%]">
          <img
            src="https://i.ibb.co/dsVx06Q5/pr-20895-2.png" 
            class="small-image rounded-md"
            onclick="changeMainImage(this.src)"
          />
          <img
            src="https://i.ibb.co/p6G75Fy3/pr-20895-3.png"
            class="small-image rounded-md"
            onclick="changeMainImage(this.src)"
          />
          <img
            src="https://i.ibb.co/dwd7zJ86/pr-20895-4.png"
            class="small-image rounded-md"
            onclick="changeMainImage(this.src)"
          />
        </div>
      </section>

      <section class="ml-5 w-[44%] max-md:ml-0 max-md:w-full">
        <div class="w-full max-md:mt-10">
          <h3 class="text-2xl font-semibold text-white max-md:mr-1">
            Кофта HardTrain
          </h3>
          <hr class="shrink-0 mt-2 h-px border border-solid border-neutral-600" />

          <div class="flex gap-1.5 mt-2.5">
            <div class="flex flex-col items-start">
              <h4 class="text-xl font-semibold text-white">Размер</h4>
              
              <div class="size-column mt-3">
                <button class="size-option px-3 py-1 text-sm border text-white border-neutral-600 rounded-md" onclick="selectSize(this)">s</button>
                <button class="size-option px-3 py-1 text-sm border text-white border-neutral-600 rounded-md selected" onclick="selectSize(this)">m</button>
                <button class="size-option px-3 py-1 text-sm border text-white border-neutral-600 rounded-md" onclick="selectSize(this)">l</button>
                <button class="size-option px-3 py-1 text-sm border text-white border-neutral-600 rounded-md" onclick="selectSize(this)">xl</button>
                <button class="size-option px-3 py-1 text-sm border text-white border-neutral-600 rounded-md" onclick="selectSize(this)">xll</button>
              </div>

              <p class="self-stretch mt-24 text-3xl font-bold text-white max-md:mt-10">5800р</p>
            </div>

            <div class="flex flex-col grow shrink-0 text-white basis-0 w-fit">
              <p class="text-sm leading-5">
              
              Худи Hardcore Training х Ground Shark The Moment of Truth.
Коллаборация иллюстратора John Connell, автора проекта Ground Shark и производителя спортивной экипировки Hardcore Training.
Мир - это не солнышко с радугой, говорит нам бойцовский пёс с очередной футболки от НСТ.
              </p>

              <button
                class="buy-btn self-center px-10 py-4 mt-7 max-w-full text-base font-semibold whitespace-nowrap rounded-md bg-zinc-600 bg-opacity-70 w-[140px] max-md:px-5 hover:bg-opacity-90"
              >
                Купить
              </button>
            </div>
          </div>
        </div>
      </section>
    </article>
  </main>

  <section class="w-full flex flex-col items-center">
    <h2 class="mt-20 text-xl font-semibold text-white max-md:mt-10">
      Горячие предложения
    </h2>

    <div class="flex flex-wrap gap-10 mt-11 max-w-full text-white w-[1187px] max-md:mt-10">
      <!-- Карточка 1 -->
      <a href="/shortmanto" class="flex-1">
        <article class="product-card flex flex-col items-center p-3 text-xl rounded-md border border-solid border-stone-500 hover:border-white hover:bg-neutral-600 cursor-pointer h-full">
          <img
            src="https://i.ibb.co/gLyFBj9P/pr-21558-1.png"
            alt="Шорты salomon"
            class="object-contain mx-3.5 aspect-square w-[140px] max-md:mx-2.5"
          />
          <h3 class="mt-3 text-center">Шорты manto</h3>
          <p class="mt-2">3990р</p>
        </article>
      </a>

      <!-- Карточка 2 -->
      <a href="/kyrredfox" class="flex-1">
        <article class="product-card flex flex-col items-center px-6 py-3 text-xl rounded-md border border-solid border-stone-500 hover:border-white hover:bg-neutral-600 cursor-pointer h-full">
          <img
            src="https://i.ibb.co/BHX2X4gm/redfox-no-bg-preview-carve-photos-1.png"
            alt="Куртка RedFox"
            class="object-contain aspect-square w-[140px] max-md:mx-1.5"
          />
          <h3 class="mt-3 text-center">Куртка RedFox</h3>
          <p class="mt-2">10290р</p>
        </article>
      </a>

      <!-- Карточка 3 -->
      <a href="/krsolomon" class="flex-1">
        <article class="product-card flex flex-col items-center px-3.5 py-3 rounded-md border border-solid border-stone-500 hover:border-white hover:bg-neutral-600 cursor-pointer h-full">
          <img
            src="https://i.ibb.co/xS0jbkX5/salomon-no-bg-preview-carve-photos-1.png"
            alt="Кроссовки salomon"
            class="object-contain mx-3 aspect-square w-[140px] max-md:mx-2.5"
          />
          <h3 class="mt-3 text-base text-center">Кроссовки salomon</h3>
          <p class="mt-3 text-xl">8700р</p>
        </article>
      </a>

      <!-- Карточка 4 -->
      <a href="/shpumaM" class="flex-1">
        <article class="product-card flex flex-col items-center px-6 py-3 text-xl rounded-md border border-solid border-stone-500 hover:border-white hover:bg-neutral-600 cursor-pointer h-full max-md:px-5">
          <img
            src="https://i.ibb.co/s9fYLWRR/puma-no-bg-preview-carve-photos-1.png"
            alt="Шорты puma"
            class="object-contain aspect-square w-[140px]"
          />
          <h3 class="mt-3 text-center">Шорты puma</h3>
          <p class="mt-2">3200р</p>
        </article>
      </a>

      <!-- Карточка 5 -->
      <a href="/shsolomonJ" class="flex-1">
        <article class="product-card flex flex-col items-center px-4 py-3 rounded-md border border-solid border-stone-500 hover:border-white hover:bg-neutral-600 cursor-pointer h-full">
          <img
            src="https://i.ibb.co/bRryw9hW/salomon-no-bg-preview-carve-photos-1.png"
            alt="Шорты salomon (ж)"
            class="object-contain mx-2.5 aspect-square w-[140px]"
          />
          <h3 class="mt-3 text-base text-center">Шорты salomon (ж)</h3>
          <p class="mt-3 text-xl">3790р</p>
        </article>
      </a>
    </div>
  </section>
    </main>
<hr  class="mt-20 w-full h-px border border-solid border-neutral-600 max-md:mt-20 max-md:mr-1.5" />
<footer class="flex items-center mt-8 w-[912px] max-w-full text-xl text-white">
      <h2 class="text-5xl font-bold mr-[110px]">PROFI</h2>
      <a href="https://t.me/aksler30" class="mr-[110px] hover:text-gray-300">Наш тг</a>
      <a href="#vk" class="mr-[110px] hover:text-gray-300">Вконтакте</a>
      <a href="mailto:profi38@mail.ru hover:text-gray-300">profi38@mail.ru</a>
    </footer>
    <hr   class="w-full h-px mt-7 border border-solid border-neutral-600 max-md:mr-1.5" />
  </div>

  <script>
    // Выбор размера
    function selectSize(button) {
      // Убираем выделение у всех кнопок размера
      document.querySelectorAll('.size-option').forEach(btn => {
        btn.classList.remove('selected');
      });
      
      // Добавляем выделение выбранной кнопке
      button.classList.add('selected');
    }
    
    // Показ кнопок при наведении на карточки
    document.querySelectorAll('.product-card').forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px)';
        this.style.boxShadow = '0 10px 20px rgba(0,0,0,0.2)';
      });
      
      card.addEventListener('mouseleave', function() {
        this.style.transform = '';
        this.style.boxShadow = '';
      });
    });
    
    // Смена основной фотографии при клике на маленькую
    function changeMainImage(src) {
      document.getElementById('main-image').src = src;
    }
  </script>
</header>
</body>
</html>