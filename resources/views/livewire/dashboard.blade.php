<div>
    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <div class="grid auto-rows-min gap-6 md:grid-cols-3">
            <!-- Tarjeta de Total de Productos -->
            <div
                x-data="{ count: 0, total: {{ $totalProducts ?? 0 }} }"
                x-init="() => {
                    setTimeout(() => {
                        const interval = setInterval(() => {
                            count = Math.min(count + Math.ceil(total / 20), total);
                            if (count >= total) clearInterval(interval);
                        }, 30);
                    }, 300);
                }"
                class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 p-6 shadow-md transition-all duration-300 hover:scale-[1.02] hover:shadow-lg dark:from-blue-700 dark:to-indigo-900"
            >
                <div class="relative z-10 flex items-center text-white">
                    <div class="mr-5 flex h-14 w-14 items-center justify-center rounded-full bg-white/20 p-3 shadow backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.91 8.84 8.56 2.23a1.93 1.93 0 0 0-1.81 0L3.1 4.13a2.12 2.12 0 0 0-.05 3.69l12.22 6.93a2 2 0 0 0 1.94 0L21 12.51a2.12 2.12 0 0 0-.09-3.67Z"></path>
                            <path d="m3.09 8.84 12.35-6.61a1.93 1.93 0 0 1 1.81 0l3.65 1.9a2.12 2.12 0 0 1 .1 3.69L8.73 14.75a2 2 0 0 1-1.94 0L3 12.51a2.12 2.12 0 0 1 .09-3.67Z"></path>
                            <line x1="12" y1="22" x2="12" y2="13"></line>
                            <path d="M20 13.5v3.37a2.06 2.06 0 0 1-1.11 1.83l-6 3.08a1.93 1.93 0 0 1-1.78 0l-6-3.08A2.06 2.06 0 0 1 4 16.87V13.5"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white/80">Total de Productos</p>
                        <h3 class="text-3xl font-bold" x-text="count"></h3>
                    </div>
                </div>
                <div class="absolute -right-5 -top-5 h-24 w-24 rounded-full bg-white/10 backdrop-blur-sm"></div>
                <div class="absolute -bottom-10 -left-10 h-40 w-40 rounded-full bg-white/10 backdrop-blur-sm"></div>
            </div>

            <!-- Tarjeta de Total de Categorías -->
            <div
                x-data="{ count: 0, total: {{ $totalCategories ?? 0 }} }"
                x-init="() => {
                    setTimeout(() => {
                        const interval = setInterval(() => {
                            count = Math.min(count + Math.ceil(total / 20), total);
                            if (count >= total) clearInterval(interval);
                        }, 30);
                    }, 300);
                }"
                class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 p-6 shadow-md transition-all duration-300 hover:scale-[1.02] hover:shadow-lg dark:from-emerald-700 dark:to-teal-900"
            >
                <div class="relative z-10 flex items-center text-white">
                    <div class="mr-5 flex h-14 w-14 items-center justify-center rounded-full bg-white/20 p-3 shadow backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white/80">Total de Categorías</p>
                        <h3 class="text-3xl font-bold" x-text="count"></h3>
                    </div>
                </div>
                <div class="absolute -right-5 -top-5 h-24 w-24 rounded-full bg-white/10 backdrop-blur-sm"></div>
                <div class="absolute -bottom-10 -left-10 h-40 w-40 rounded-full bg-white/10 backdrop-blur-sm"></div>
            </div>

            <!-- Tarjeta de Total de Proveedores -->
            <div
                x-data="{ count: 0, total: {{ $totalSuppliers ?? 0 }} }"
                x-init="() => {
                    setTimeout(() => {
                        const interval = setInterval(() => {
                            count = Math.min(count + Math.ceil(total / 20), total);
                            if (count >= total) clearInterval(interval);
                        }, 30);
                    }, 300);
                }"
                class="group relative overflow-hidden rounded-xl bg-gradient-to-br from-purple-500 to-fuchsia-600 p-6 shadow-md transition-all duration-300 hover:scale-[1.02] hover:shadow-lg dark:from-purple-700 dark:to-fuchsia-900"
            >
                <div class="relative z-10 flex items-center text-white">
                    <div class="mr-5 flex h-14 w-14 items-center justify-center rounded-full bg-white/20 p-3 shadow backdrop-blur-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 9V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v3"></path>
                            <path d="M21 15v3a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-3"></path>
                            <path d="M19 9H2"></path>
                            <path d="M22 15H5"></path>
                            <path d="M15 5v14"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white/80">Total de Proveedores</p>
                        <h3 class="text-3xl font-bold" x-text="count"></h3>
                    </div>
                </div>
                <div class="absolute -right-5 -top-5 h-24 w-24 rounded-full bg-white/10 backdrop-blur-sm"></div>
                <div class="absolute -bottom-10 -left-10 h-40 w-40 rounded-full bg-white/10 backdrop-blur-sm"></div>
            </div>
        </div>

        <!-- Tabla de Productos Recientes -->
        <div class="relative flex-1 overflow-hidden rounded-xl border border-neutral-200 bg-white p-6 shadow-md dark:border-neutral-700 dark:bg-neutral-800">
            <div class="mb-6 flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Productos Recientes</h2>
                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-800 dark:bg-gray-700 dark:text-gray-200">
                    Últimos 5
                </span>
            </div>
            <div class="overflow-x-auto rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-800">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Categoría</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Descripción</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Imagen</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">Añadido</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-900">
                        @forelse($recentProducts ?? [] as $product)
                            <tr class="transition-colors hover:bg-gray-50 dark:hover:bg-gray-800">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->nombre ?? 'N/A' }}</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ $product->category->nombre?? 'Sin categoría' }}</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($product->descripcion ?? 'Sin descripción', 30) }}</div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if($product->imagen)
                                        <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="h-10 w-10 rounded-lg object-cover shadow-sm transition-transform hover:scale-110">
                                    @else
                                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-gray-200 text-xs text-gray-500 dark:bg-gray-700 dark:text-gray-400">
                                            N/A
                                        </div>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $product->created_at?->diffForHumans() ?? 'N/A' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-sm font-medium text-gray-500 dark:text-gray-400">
                                    No hay productos recientes
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
