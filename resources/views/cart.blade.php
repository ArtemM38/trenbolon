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
    .remove-btn {
      transition: all 0.2s ease;
      opacity: 0.7;
    }
    .remove-btn:hover {
      opacity: 1;
      color: #f87171;
    }
    .summary-item {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
    }
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    /* Для Firefox */
    input[type="number"] {
      -moz-appearance: textfield;
    }
    
    .quantity-btn {
      transition: background-color 0.2s ease;
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
                <a href="{{ route('cart') }}" class="nav-link">Корзина</a>
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
        
        @if($isEmpty)
            <!-- Сообщение о пустой корзине -->
            <div class="text-center mt-10 p-4 bg-neutral-600 rounded-lg">
                <p class="text-lg">Ваша корзина пуста</p>
                <a href="/katalog" class="inline-block mt-4 px-6 py-2 bg-zinc-600 bg-opacity-70 rounded-md hover:bg-opacity-80 transition">Перейти в каталог</a>
            </div>
        @else
            <!-- Заголовки таблицы -->
            <div class="flex justify-between mt-10 text-xs md:text-sm tracking-widest text-white">
                <span class="w-1/2 md:w-2/3">Товар</span>
                <div class="flex justify-between w-1/2 md:w-1/3">
                    <span class="w-1/3 text-center">Цена</span>
                    <span class="w-2/3 text-center">Количество</span>
                </div>
            </div>

            <hr class="w-full mt-1 border border-neutral-600">

            <!-- Список товаров -->
            <div id="cart-items">
                @foreach($cartItems as $item)
                <section class="product-item mt-5 p-4 rounded-lg" data-id="{{ $item->id }}">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="flex flex-col md:flex-row gap-4 w-full md:w-2/3">
                            <img
                                src="{{ $item->product->image }}"
                                alt="{{ $item->product->name }}"
                                class="product-image w-20 h-24 md:w-24 md:h-28 object-contain"
                            />
                            <div class="flex flex-col">
                                <h3 class="text-lg md:text-xl">{{ $item->product->name }}</h3>
                                <p class="mt-2 text-sm md:text-base">Размер: м</p>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-btn text-sm mt-2 text-left md:text-left w-max">Удалить</button>
                                </form>
                            </div>
                        </div>
                        <div class="flex justify-between items-center w-full md:w-1/3">
                            <span class="text-base font-semibold w-1/3 text-center">{{ number_format($item->product->price, 0, '', ' ') }} ₽</span>
                            <div class="mr-count flex items-center">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex">
                                    @csrf
                                    @method('PATCH')
                                    <button type="button" class="quantity-btn px-3 py-1 rounded-l-md bg-zinc-700 hover:bg-zinc-600 transition" 
                                        onclick="this.closest('form').submit()">-</button>
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                        class="w-12 text-center bg-zinc-600 bg-opacity-70" readonly>
                                    <button type="button" class="quantity-btn px-3 py-1 rounded-r-md bg-zinc-700 hover:bg-zinc-600 transition"
                                        onclick="this.closest('form').submit()">+</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <hr class="w-full mt-4 border border-neutral-600">
                @endforeach
            </div>

            <!-- Итоговая сумма -->
            <div class="mt-8 p-4 bg-neutral-600 bg-opacity-50 rounded-lg">
                <div class="summary-item">
                    <span>Товары ({{ $itemsCount }})</span>
                    <span>{{ number_format($total, 0, '', ' ') }} ₽</span>
                </div>
                <div class="summary-item">
                    <span>Доставка</span>
                    <span>Бесплатно</span>
                </div>
                <hr class="w-full my-2 border border-neutral-600">
                <div class="summary-item text-lg font-semibold">
                    <span>Итого</span>
                    <span>{{ number_format($total, 0, '', ' ') }} ₽</span>
                </div>
            </div>

            <!-- Кнопка оформления -->
            <div class="flex justify-center mt-10">
                <button class="checkout-btn px-6 py-4 text-base mt-10 font-semibold text-white rounded-md bg-zinc-600 bg-opacity-70 w-full md:w-40">
                    Оформить
                </button>
            </div>
        @endif
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
   
    // Функция для добавления товара в корзину (для демонстрации)
    function addSampleItem() {
      const cartItems = document.getElementById('cart-items');
      
      // Создаем новый элемент товара
      const itemHTML = `
        <section class="product-item mt-5 p-4 rounded-lg" data-id="1" data-price="10290">
          <div class="flex flex-col md:flex-row gap-4">
            <div class="flex flex-col md:flex-row gap-4 w-full md:w-2/3">
              <img
                src="https://i.ibb.co/Q70pCyhZ/redfox-no-bg-preview-carve-photos.png"
                alt="Куртка RedFox"
                class="product-image w-20 h-24 md:w-24 md:h-28 object-contain"
              />
              <div class="flex flex-col">
                <h3 class="text-lg md:text-xl">Куртка RedFox всесезонная</h3>
                <p class="mt-2 text-sm md:text-base">Размер: м</p>
                <button class="remove-btn text-sm mt-2 text-left md:text-left w-max" onclick="removeItem(this)">Удалить</button>
              </div>
            </div>
            <div class="flex justify-between items-center w-full md:w-1/3">
              <span class="text-base font-semibold w-1/3 text-center item-price">10 290 ₽</span>
              <div class="mr-count flex items-center">
                <button class="quantity-btn px-3 py-1 rounded-l-md bg-zinc-700 hover:bg-zinc-600 transition" onclick="changeQuantity(this, -1)">-</button>
                <input type="number" class="w-12 text-center bg-zinc-600 bg-opacity-70 quantity-input" value="1" min="1" oninput="updateQuantity(this)" style="-moz-appearance: textfield;">
                <button class="quantity-btn px-3 py-1 rounded-r-md bg-zinc-700 hover:bg-zinc-600 transition" onclick="changeQuantity(this, 1)">+</button>
              </div>
            </div>
          </div>
        </section>
        <hr class="w-full mt-4 border border-neutral-600">
      `;
      
      cartItems.innerHTML = itemHTML;
      
      // Обновляем итоги
      updateCartSummary();
      saveCartTo();
      
      // Показываем элементы корзины
      showCartContents();
    }

    // Изменение количества товара
    function changeQuantity(button, delta) {
      const input = button.parentElement.querySelector('.quantity-input');
      let value = parseInt(input.value);
      value += delta;
      if (value < 1) value = 1;
      input.value = value;
      updateQuantity(input);
    }

    // Обновление количества товара
    function updateQuantity(input) 
      let value = parseInt(input.value);
      if (isNaN(value) || value < 1) {
        input.value = 1;
        value = 1;
      }
      
      const itemElement = input.closest('.product-item');
      const price = parseInt(itemElement.dataset.price);
      const totalPrice = price * value;
      
      // Обновляем отображение цены
      itemElement.querySelector('.item-price').textContent = formatPrice(totalPrice);


    // Показать сообщение о пустой корзине
    function showEmptyCartMessage() {
      document.getElementById('empty-cart-message').classList.remove('hidden');
      document.getElementById('cart-headers').classList.add('hidden');
      document.getElementById('cart-header-line').classList.add('hidden');
      document.getElementById('cart-summary').classList.add('hidden');
      document.getElementById('checkout-btn').classList.add('hidden');
    }

    // Показать содержимое корзины
    function showCartContents() {
      document.getElementById('empty-cart-message').classList.add('hidden');
      document.getElementById('cart-headers').classList.remove('hidden');
      document.getElementById('cart-header-line').classList.remove('hidden');
      document.getElementById('cart-summary').classList.remove('hidden');
      document.getElementById('checkout-btn').classList.remove('hidden');
    }

    // Обновление итоговой суммы
    function updateCartSummary() {
      const items = document.querySelectorAll('.product-item');
      let subtotal = 0;
      let totalItems = 0;
      
      items.forEach(item => {
        const price = parseInt(item.dataset.price);
        const quantity = parseInt(item.querySelector('.quantity-input').value);
        subtotal += price * quantity;
        totalItems += quantity;
      });
      
      document.getElementById('subtotal').textContent = formatPrice(subtotal);
      document.getElementById('total').textContent = formatPrice(subtotal);
      document.getElementById('items-count').textContent = totalItems;
    }

    // Форматирование цены
    function formatPrice(price) {
      return new Intl.NumberFormat('ru-RU', { style: 'decimal' }).format(price) + ' ₽';
    }

    // Оформление заказа
    function checkout() {
      const items = [];
      document.querySelectorAll('.product-item').forEach(item => {
        items.push({
          id: item.dataset.id,
          name: item.querySelector('h3').textContent,
          price: parseInt(item.dataset.price),
          quantity: parseInt(item.querySelector('.quantity-input').value),
          size: item.querySelector('p').textContent.replace('Размер: ', '')
        });
      });
      
      // Здесь можно отправить данные на сервер или обработать их
      console.log('Оформление заказа:', items);
      alert('Заказ оформлен! Спасибо за покупку!');
      
      cart.forEach(item => {
        // Здесь должна быть логика создания элементов товаров на основе данных из корзины
        // Для примера просто добавляем один товар
        const itemHTML = `
          <section class="product-item mt-5 p-4 rounded-lg" data-id="${item.id}" data-price="10290">
            <div class="flex flex-col md:flex-row gap-4">
              <div class="flex flex-col md:flex-row gap-4 w-full md:w-2/3">
                <img
                  src="https://i.ibb.co/Q70pCyhZ/redfox-no-bg-preview-carve-photos.png"
                  alt="Куртка RedFox"
                  class="product-image w-20 h-24 md:w-24 md:h-28 object-contain"
                />
                <div class="flex flex-col">
                  <h3 class="text-lg md:text-xl">Куртка RedFox всесезонная</h3>
                  <p class="mt-2 text-sm md:text-base">Размер: ${item.size || 'м'}</p>
                  <button class="remove-btn text-sm mt-2 text-left md:text-left w-max" onclick="removeItem(this)">Удалить</button>
                </div>
              </div>
              <div class="flex justify-between items-center w-full md:w-1/3">
                <span class="text-base font-semibold w-1/3 text-center item-price">10 290 ₽</span>
                <div class="mr-count flex items-center">
                  <button class="quantity-btn px-3 py-1 rounded-l-md bg-zinc-700 hover:bg-zinc-600 transition" onclick="changeQuantity(this, -1)">-</button>
                  <input type="number" class="w-12 text-center bg-zinc-600 bg-opacity-70 quantity-input" value="${item.quantity}" min="1" oninput="updateQuantity(this)" style="-moz-appearance: textfield;">
                  <button class="quantity-btn px-3 py-1 rounded-r-md bg-zinc-700 hover:bg-zinc-600 transition" onclick="changeQuantity(this, 1)">+</button>
                </div>
              </div>
            </div>
          </section>
          <hr class="w-full mt-4 border border-neutral-600">
        `;
        
        cartItems.innerHTML += itemHTML;
      });
      
      // Показываем содержимое корзины
      showCartContents();
      updateCartSummary();
    }
  </script>
</body>
</html>