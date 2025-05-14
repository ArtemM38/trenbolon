<!DOCTYPE html>
<html lang="en">
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
    }
    .product-card {
      transition: all 0.3s ease;
      cursor: pointer;
    }
    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      border-color: white;
      background-color: rgba(255,255,255,0.1);
    }
    .checkbox-container {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 12px;
      border-radius: 6px;
      transition: all 0.2s ease;
      cursor: pointer;
    }
    .checkbox-container:hover {
      background-color: rgba(255,255,255,0.1);
    }
    .custom-checkbox {
      width: 18px;
      height: 18px;
      border: 1px solid #737373;
      border-radius: 4px;
      appearance: none;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .custom-checkbox:checked {
      background-color: white;
      border-color: white;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23212121' stroke-width='3' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='20 6 9 17 4 12'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: center;
    }
    .nav-link {
      margin-left: 40px; 
    }
    .first-link {
      margin-left: 40px; 
    }
    .my-auto{
      margin-left: 10px;
    }
    .filter-section {
      transition: all 0.3s ease;
      overflow: hidden;
    }
    .filter-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px;
      cursor: pointer;
    }
    .filter-arrow {
      transition: transform 0.3s ease;
    }
    .filter-arrow.open {
      transform: rotate(180deg);
    }
    .hidden {
      display: none;
    }
    .no-results {
      grid-column: 1 / -1;
      text-align: center;
      padding: 40px;
      font-size: 1.2rem;
    }
    .price-range-input {
      width: 100%;
      -webkit-appearance: none;
      height: 4px;
      background: #737373;
      border-radius: 2px;
      outline: none;
    }
    .price-range-input::-webkit-slider-thumb {
      -webkit-appearance: none;
      width: 16px;
      height: 16px;
      background: white;
      border-radius: 50%;
      cursor: pointer;
    }
  </style>
</head>
<body class="bg-neutral-700">
  <div class="flex flex-col items-center pt-5">
    <p class="text-sm text-white underline max-md:max-w-full">
      Многие люди терпят неудачу только потому, что сдаются в двух шагах от успеха.
    </p>

    <hr class="w-full mt-6 border border-neutral-600 max-md:max-w-full" />

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

    <hr class="w-full mt-7 border border-neutral-600 max-md:max-w-full" />

    <h2 class="mt-20 text-xl font-semibold text-white max-md:mt-10">Каталог</h2>

    <main class="mt-12 w-full max-w-[1502px] max-md:max-w-full text-white">
      <div class="flex gap-5 max-md:flex-col">
        <!-- Боковая панель с фильтрами -->
        <aside class="w-[25%] max-md:w-full">
          <div class="flex flex-col border border-stone-500 rounded-md p-4">
            <!-- Фильтр по категориям -->
            <div class="filter-section mb-4">
              <div class="filter-header" onclick="toggleFilter('categories')">
                <h3 class="font-semibold">Категории</h3>
                <svg class="filter-arrow w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div id="categories-filters" class="mt-2">
                <!-- Категория ВЕТРОВКИ -->
                <label class="checkbox-container">
                  <input type="checkbox" class="custom-checkbox category-filter" value="ветровки">
                  <img src="https://i.ibb.co/xSJN9V1C/Vector.png" 
                       class="w-6 h-6 object-contain" alt="Ветровки">
                  <span>ВЕТРОВКИ</span>
                </label>

                <!-- Категория КОФТЫ -->
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox category-filter" value="кофты">
                  <img
                  src="https://i.ibb.co/BKscrw3Q/Group.png"
                  alt="Кофты"
                  class="w-6 h-10 object-contain"
                />
                  <span>КОФТЫ И ФУТБОЛКИ</span>
                </label>

                <!-- Категория ШТАНЫ И ШОРТЫ -->
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox category-filter" value="штаны">
                  <img
                  src="https://i.ibb.co/Mx7Z3CMC/Group-1.png"
                  alt="Штаны и шорты"
                  class="w-6 h-10 object-contain"
                />
                  <span>ШТАНЫ И ШОРТЫ</span>
                </label>

                <!-- Категория ОБУВЬ -->
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox category-filter" value="обувь">
                  <img
                  src="https://i.ibb.co/VckXFkDT/Group-2.png"
                  alt="Обувь"
                  class="w-8 h-10 object-contain"
                />
                  <span>ОБУВЬ</span>
                </label>

                <!-- Категория ГОЛОВНЫЕ УБОРЫ -->
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox category-filter" value="головные уборы">
                  <img src="https://i.ibb.co/FkJ6PcrG/Vector-1.png" 
                       class="w-6 h-6 object-contain" alt="Головные уборы">
                  <span>ГОЛОВНЫЕ УБОРЫ</span>
                </label>
              </div>
            </div>

            <!-- Фильтр по брендам -->
            <div class="filter-section mb-4">
              <div class="filter-header" onclick="toggleFilter('brands')">
                <h3 class="font-semibold">Бренды</h3>
                <svg class="filter-arrow w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div id="brands-filters" class="mt-2">
                <label class="checkbox-container">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="redfox">
                  <span>RedFox</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="salomon">
                  <span>Salomon</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="puma">
                  <span>Puma</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="manto">
                  <span>Manto</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="hardtrain">
                  <span>HardTrain</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="hardcore">
                  <span>HardCore</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="reebok">
                  <span>Reebok</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="badboy">
                  <span>BadBoy</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="sitka">
                  <span>Sitka</span>
                </label>
                <label class="checkbox-container mt-2">
                  <input type="checkbox" class="custom-checkbox brand-filter" value="tyrtorf">
                  <span>Tyrtorf</span>
                </label>
              </div>
            </div>

            <!-- Фильтр по цене -->
            <div class="filter-section mb-4">
              <div class="filter-header" onclick="toggleFilter('price')">
                <h3 class="font-semibold">Цена</h3>
                <svg class="filter-arrow w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </div>
              <div id="price-filters" class="mt-2">
                <div class="flex justify-between mb-2">
                  <span id="min-price">1290р</span>
                  <span id="max-price">12000р</span>
                </div>
                <input type="range" id="price-range" class="price-range-input" min="1290" max="12000" value="12000">
                <div class="flex justify-between mt-4">
                  <input type="number" id="price-min-input" class="bg-neutral-600 text-white w-24 p-1 rounded" placeholder="Мин" min="1290" max="12000">
                  <input type="number" id="price-max-input" class="bg-neutral-600 text-white w-24 p-1 rounded" placeholder="Макс" min="1290" max="12000">
                </div>
              </div>
            </div>

            <!-- Кнопка сброса фильтров -->
            <button id="reset-filters" class="w-full mt-4 py-2 bg-neutral-600 hover:bg-neutral-500 rounded-md transition">
              Сбросить фильтры
            </button>
          </div>
        </aside>

        <!-- Основная сетка товаров -->
        <section class="w-[65%] max-md:w-full">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5" id="products-grid">
            <!-- Карточка товара 1 -->
            <a href="kyrredfox" class="product-item" data-category="ветровки" data-brand="redfox" data-price="10290">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/BHX2X4gm/redfox-no-bg-preview-carve-photos-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Куртка RedFox">
                <h3 class="mt-3 text-center">Куртка RedFox</h3>
                <p class="self-center mt-2">10290р</p>
              </article>
            </a>

            <!-- Карточка товара 2 -->
            <a href="krsolomon" class="product-item" data-category="обувь" data-brand="salomon" data-price="8700">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/xS0jbkX5/salomon-no-bg-preview-carve-photos-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Кроссовки salomon">
                <h3 class="mt-3 text-base text-center">Кроссовки salomon</h3>
                <p class="self-center mt-3 text-xl">8700р</p>
              </article>
            </a>

            <!-- Карточка товара 3 -->
            <a href="/shpumaM" class="product-item" data-category="штаны" data-brand="puma" data-price="3200">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/s9fYLWRR/puma-no-bg-preview-carve-photos-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Шорты puma">
                <h3 class="mt-3 text-center">Шорты puma</h3>
                <p class="self-center mt-2">3200р</p>
              </article>
            </a>

            <!-- Карточка товара 4 -->
            <a href="shsolomonJ" class="product-item" data-category="штаны" data-brand="salomon" data-price="3790">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/bRryw9hW/salomon-no-bg-preview-carve-photos-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Шорты salomon (ж)">
                <h3 class="mt-3 text-base text-center">Шорты salomon (ж)</h3>
                <p class="self-center mt-3 text-xl">3790р</p>
              </article>
            </a>

            <a href="/futmanto" class="product-item col-span-4 md:col-span-1" data-category="кофты" data-brand="manto" data-price="3200">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/vvjfSzGy/pr-22239-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Футболка manto">
                <h3 class="mt-3 text-center">Футболка manto</h3>
                <p class="self-center mt-2">3200р</p>
              </article>
            </a>

            <a href="/kepmanto" class="product-item" data-category="головные уборы" data-brand="manto" data-price="2100">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/4GcQpD3/pr-22768-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Кепка manto">
                <h3 class="mt-3 text-center">Кепка manto</h3>
                <p class="self-center mt-3 text-xl">2100р</p>
              </article>
            </a>

            <a href="/kofhard" class="product-item" data-category="кофты" data-brand="hardtrain" data-price="5800">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/dsVx06Q5/pr-20895-2.png"
                     class="mx-auto aspect-square w-[140px]" alt="Кофта HardTrain">
                <h3 class="mt-3 text-center">Кофта HardTrain</h3>
                <p class="self-center mt-2">5800р</p>
              </article>
            </a>

            <a href="/krtyr" class="product-item" data-category="обувь" data-brand="tyrtorf" data-price="12000">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/N26qBysV/pr-22721-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Кроссовки Tyr torf">
                <h3 class="mt-3 text-center">Кроссовки tyrtorf</h3>
                <p class="self-center mt-2">12000р</p>
              </article>
            </a>

            <a href="/kofhardcore" class="product-item" data-category="кофты" data-brand="hardcore" data-price="5800">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/8nBdz6Gz/pr-21606-2.png"
                     class="mx-auto aspect-square w-[140px]" alt="Кофта Hardcore">
                <h3 class="mt-3 text-base text-center">Кофта Hardcore</h3>
                <p class="self-center mt-3 text-xl">5800р</p>
              </article>
            </a>

            <a href="/shhard" class="product-item" data-category="штаны" data-brand="hardcore" data-price="5290">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/p6TWz3sz/pr-17494-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Штаны HardCore">
                <h3 class="mt-3 text-center">Штаны HardCore</h3>
                <p class="self-center mt-2">5290р</p>
              </article>
            </a>

            <a href="/shapmanto" class="product-item" data-category="головные уборы" data-brand="manto" data-price="2300">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/LXhr2LgF/pr-22767-1-no-bg-preview-carve-photos.png"
                     class="mx-auto aspect-square w-[140px]" alt="Шапка manto">
                <h3 class="mt-3 text-base text-center">Шапка manto</h3>
                <p class="self-center mt-3 text-xl">2300р</p>
              </article>
            </a>

            <a href="/shmanto" class="product-item" data-category="штаны" data-brand="manto" data-price="4600">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/spkpTmm8/pr-29644-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Штаны manto">
                <h3 class="mt-3 text-base text-center">Штаны manto</h3>
                <p class="self-center mt-3 text-xl">4600р</p>
              </article>
            </a>

            <a href="/shortmanto" class="product-item" data-category="штаны" data-brand="manto" data-price="3990">
              <article class="product-card flex flex-col p-3 text-xl text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/gLyFBj9P/pr-21558-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Шорты manto">
                <h3 class="mt-3 text-center">Шорты manto</h3>
                <p class="self-center mt-2">3990р</p>
              </article>
            </a>

            <a href="/tapufs" class="product-item" data-category="обувь" data-brand="reebok" data-price="1290">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/FbSSk8Ht/pr-9883-1.png"
                     class="mx-auto aspect-square w-[140px]" alt="Тапки reebok ufc">
                <h3 class="mt-3 text-base text-center">Тапки reebok ufc</h3>
                <p class="self-center mt-3 text-xl">1290р</p>
              </article>
            </a>

            <a href="/vetbadboy" class="product-item" data-category="ветровки" data-brand="badboy" data-price="4500">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/KxYQs4Py/pr-7085-1.png"
                     class="mx-auto aspect-square w-[140px]">
                <h3 class="mt-3 text-base text-center">Ветровка BadBoy</h3>
                <p class="self-center mt-3 text-xl">4500р</p>
              </article>
            </a>

            <a href="/vetsitka" class="product-item" data-category="ветровки" data-brand="sitka" data-price="12000">
              <article class="product-card flex flex-col p-3 text-white rounded-md border border-stone-500 h-full">
                <img src="https://i.ibb.co/tPJXjBfD/smallpr-21941-3.png"
                     class="mx-auto aspect-square w-[140px]">
                <h3 class="mt-3 text-base text-center">Ветровка sitka</h3>
                <p class="self-center mt-3 text-xl">12000р</p>
              </article>
            </a>
          </div>
        </section>
      </div>
    </main>

    <hr class="w-full mt-20 border border-neutral-600 max-md:mt-10 max-md:max-w-full" />

    <footer class="flex items-center mt-8 w-[912px] max-w-full text-xl text-white">
      <h2 class="text-5xl font-bold mr-[110px]">PROFI</h2>
      <a href="https://t.me/aksler30" class="mr-[110px]">Наш тг</a>
      <a href="#vk" class="mr-[110px]">Вконтакте</a>
      <a href="mailto:profi38@mail.ru">profi38@mail.ru</a>
    </footer>

    <hr class="w-full mt-7 border border-neutral-600 max-md:max-w-full" />
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Инициализация кастомных чекбоксов
      const checkboxes = document.querySelectorAll('.custom-checkbox');
      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
          filterProducts();
        });
      });

      // Инициализация фильтра по цене
      const priceRange = document.getElementById('price-range');
      const priceMinInput = document.getElementById('price-min-input');
      const priceMaxInput = document.getElementById('price-max-input');
      const minPriceDisplay = document.getElementById('min-price');
      const maxPriceDisplay = document.getElementById('max-price');

      // Установка начальных значений
      priceMinInput.value = 1290;
      priceMaxInput.value = 12000;

      priceRange.addEventListener('input', function() {
        priceMaxInput.value = this.value;
        maxPriceDisplay.textContent = this.value + 'р';
        filterProducts();
      });

      priceMinInput.addEventListener('change', function() {
        if (parseInt(this.value) > parseInt(priceMaxInput.value)) {
          this.value = priceMaxInput.value;
        }
        filterProducts();
      });

      priceMaxInput.addEventListener('change', function() {
        if (parseInt(this.value) < parseInt(priceMinInput.value)) {
          this.value = priceMinInput.value;
        }
        priceRange.value = this.value;
        filterProducts();
      });

      // Кнопка сброса фильтров
      document.getElementById('reset-filters').addEventListener('click', function() {
        // Сброс чекбоксов
        document.querySelectorAll('.custom-checkbox').forEach(checkbox => {
          checkbox.checked = false;
        });
        
        // Сброс цены
        priceRange.value = 12000;
        priceMinInput.value = 1290;
        priceMaxInput.value = 12000;
        minPriceDisplay.textContent = '1290р';
        maxPriceDisplay.textContent = '12000р';
        
        // Показать все товары
        document.querySelectorAll('.product-item').forEach(item => {
          item.style.display = 'block';
        });
        
        // Скрыть сообщение "Ничего не найдено", если оно было показано
        const noResults = document.getElementById('no-results');
        if (noResults) noResults.remove();
      });

      // Функция фильтрации товаров
      function filterProducts() {
        // Получаем выбранные категории
        const selectedCategories = Array.from(document.querySelectorAll('.category-filter:checked')).map(el => el.value);
        
        // Получаем выбранные бренды
        const selectedBrands = Array.from(document.querySelectorAll('.brand-filter:checked')).map(el => el.value);
        
        // Получаем диапазон цен
        const minPrice = parseInt(priceMinInput.value) || 0;
        const maxPrice = parseInt(priceMaxInput.value) || Infinity;
        
        // Получаем все товары
        const products = document.querySelectorAll('.product-item');
        let visibleProducts = 0;
        
        products.forEach(product => {
          const productCategory = product.getAttribute('data-category');
          const productBrand = product.getAttribute('data-brand');
          const productPrice = parseInt(product.getAttribute('data-price'));
          
          // Проверяем соответствие фильтрам
          const categoryMatch = selectedCategories.length === 0 || selectedCategories.includes(productCategory);
          const brandMatch = selectedBrands.length === 0 || selectedBrands.includes(productBrand);
          const priceMatch = productPrice >= minPrice && productPrice <= maxPrice;
          
          if (categoryMatch && brandMatch && priceMatch) {
            product.style.display = 'block';
            visibleProducts++;
          } else {
            product.style.display = 'none';
          }
        });
        
        // Если нет видимых товаров, показываем сообщение
        const productsGrid = document.getElementById('products-grid');
        let noResults = document.getElementById('no-results');
        
        if (visibleProducts === 0) {
          if (!noResults) {
            noResults = document.createElement('div');
            noResults.id = 'no-results';
            noResults.className = 'no-results';
            noResults.textContent = 'По вашему запросу ничего не найдено. Попробуйте изменить параметры фильтрации.';
            productsGrid.appendChild(noResults);
          }
        } else if (noResults) {
          noResults.remove();
        }
      }
    });

    // Функция для раскрытия/скрытия секций фильтров
    function toggleFilter(section) {
      const filterSection = document.getElementById(section + '-filters');
      const arrow = document.querySelector(`[onclick="toggleFilter('${section}')"] .filter-arrow`);
      
      filterSection.classList.toggle('hidden');
      arrow.classList.toggle('open');
    }

    // Изначально скрываем все секции фильтров
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('categories-filters').classList.add('hidden');
      document.getElementById('brands-filters').classList.add('hidden');
      document.getElementById('price-filters').classList.add('hidden');
    });
  </script>
</body>
</html>