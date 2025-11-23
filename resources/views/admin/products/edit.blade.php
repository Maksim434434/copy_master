<x-layout title="Редактировать товар">
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-sm border-r border-gray-200">
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-800">Админ панель</h1>
            </div>
            
            <nav class="mt-6">
                <div class="px-6 py-3 hover:bg-gray-50">
                    <a href="{{ route('admin.products.index') }}" class="flex items-center text-gray-600 hover:text-gray-800">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        Товары
                    </a>
                </div>
                
                <div class="px-6 py-3 bg-blue-50 border-r-2 border-blue-500">
                    <a href="{{ route('admin.products.create') }}" class="flex items-center text-blue-600 font-medium">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Добавить товар
                    </a>
                </div>
                
                <div class="px-6 py-3 hover:bg-gray-50">
                    <a href="/" class="flex items-center text-gray-600 hover:text-gray-800">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
                        </svg>
                        На главную
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <div class="container mx-auto px-6 py-8">
                <div class="max-w-4xl mx-auto">
                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Редактировать товар</h1>
                            <p class="text-gray-600 mt-1">Обновите информацию о товаре</p>
                        </div>
                        <a href="{{ route('admin.products.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-sm">
                            Назад к списку
                        </a>
                    </div>

                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Поле для изображения -->
                                <div class="md:col-span-2">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Изображение товара</label>
                                    
                                    @if($product->image)
                                        <div class="mb-3 flex items-center space-x-4">
                                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}"  
                                                 class="w-32 h-32 object-cover rounded-lg border shadow-sm">
                                            <div>
                                                <p class="text-sm text-gray-600">Текущее изображение</p>
                                                <label class="flex items-center mt-2 text-sm text-gray-600">
                                                    <input type="checkbox" name="remove_image" value="1" class="mr-2">
                                                    Удалить изображение
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    <input type="file" name="image" id="image" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           accept="image/*" onchange="previewImage(this)">
                                    @error('image')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                    
                                    <!-- Предпросмотр нового изображения -->
                                    <div id="image-preview" class="mt-3 hidden">
                                        <p class="text-sm text-gray-600 mb-2">Новое изображение:</p>
                                        <img id="preview" class="w-32 h-32 object-cover rounded-lg border shadow-sm">
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Название товара *</label>
                                    <input type="text" name="name" id="name" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           value="{{ old('name', $product->name) }}" required>
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Бренд *</label>
                                    <input type="text" name="brand" id="brand" 
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           value="{{ old('brand', $product->brand) }}" required>
                                    @error('brand')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Категория *</label>
                                    <select name="category" id="category" 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" required>
                                        <option value="">Выберите категорию</option>
                                        <option value="Смартфоны" {{ old('category', $product->category) == 'Смартфоны' ? 'selected' : '' }}>Смартфоны</option>
                                        <option value="Ноутбуки" {{ old('category', $product->category) == 'Ноутбуки' ? 'selected' : '' }}>Ноутбуки</option>
                                        <option value="Телевизоры" {{ old('category', $product->category) == 'Телевизоры' ? 'selected' : '' }}>Телевизоры</option>
                                        <option value="Планшеты" {{ old('category', $product->category) == 'Планшеты' ? 'selected' : '' }}>Планшеты</option>
                                        <option value="Наушники" {{ old('category', $product->category) == 'Наушники' ? 'selected' : '' }}>Наушники</option>
                                        <option value="Фотоаппараты" {{ old('category', $product->category) == 'Фотоаппараты' ? 'selected' : '' }}>Фотоаппараты</option>
                                        <option value="Игровые консоли" {{ old('category', $product->category) == 'Игровые консоли' ? 'selected' : '' }}>Игровые консоли</option>
                                        <option value="Аксессуары" {{ old('category', $product->category) == 'Аксессуары' ? 'selected' : '' }}>Аксессуары</option>
                                    </select>
                                    @error('category')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Цена (₽) *</label>
                                    <input type="number" name="price" id="price" step="0.01" min="0"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           value="{{ old('price', $product->price) }}" required>
                                    @error('price')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Количество на складе *</label>
                                    <input type="number" name="stock" id="stock" min="0"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                           value="{{ old('stock', $product->stock) }}" required>
                                    @error('stock')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="md:col-span-2">
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Описание</label>
                                    <textarea name="description" id="description" rows="4"
                                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">{{ old('description', $product->description) }}</textarea>
                                    @error('description')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-8 flex justify-end space-x-4">
                                <a href="{{ route('admin.products.index') }}" 
                                   class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-sm">
                                    Отмена
                                </a>
                                <button type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-medium transition-colors shadow-sm flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Обновить товар
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }
                
                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
</x-layout>