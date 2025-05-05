<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product->nombre }} - Conexiones, Bandas y Mangueras Chávez</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  @livewireStyles
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
    .fade-in {
      animation: fadeIn 1.5s ease-in;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .bg-image {
      background-image: url('/img/portada.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
    .slide-in-left {
      animation: slideInLeft 1s ease-out;
    }
    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-50px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .slide-in-right {
      animation: slideInRight 1s ease-out;
    }
    @keyframes slideInRight {
      from { opacity: 0; transform: translateX(50px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .section-divider {
      height: 3px;
      background: linear-gradient(90deg, rgba(250,204,21,0.01) 0%, rgba(250,204,21,0.8) 50%, rgba(250,204,21,0.01) 100%);
      margin: 2rem auto;
      width: 80%;
    }
    .bg-industrial-gradient {
      background: linear-gradient(to right, #111 0%, #111 100%);
      position: relative;
      overflow: hidden;
    }
    .bg-industrial-gradient::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 5px;
      background: linear-gradient(to right, #facc15 0%, #eab308 100%);
    }
    .industrial-card {
      position: relative;
      overflow: hidden;
    }
    .industrial-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 5px;
      height: 100%;
      background-color: #facc15;
    }
    .logo-container {
      position: relative;
      width: 50px;
      height: 50px;
      background-color: #facc15;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 1.5rem;
      color: #000;
      transition: all 0.3s ease;
    }
    .logo-container:hover {
      transform: scale(1.05);
    }
    .scroll-indicator {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      animation: bounce 2s infinite;
    }
    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0) translateX(-50%);
      }
      40% {
        transform: translateY(-20px) translateX(-50%);
      }
      60% {
        transform: translateY(-10px) translateX(-50%);
      }
    }
    .animate-pulse-slow {
      animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    .animate-blob {
      animation: blob 7s infinite;
    }
    .animation-delay-2000 {
      animation-delay: 2s;
    }
    .animation-delay-4000 {
      animation-delay: 4s;
    }
    @keyframes blob {
      0% {
        transform: translate(0px, 0px) scale(1);
      }
      33% {
        transform: translate(30px, -50px) scale(1.1);
      }
      66% {
        transform: translate(-20px, 20px) scale(0.9);
      }
      100% {
        transform: translate(0px, 0px) scale(1);
      }
    }

    /* Estilos específicos para la página de detalle de producto */
    .gallery-item {
      overflow: hidden;
      transition: all 0.3s ease;
    }
    .gallery-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    .gallery-item img {
      transition: transform 0.5s ease;
    }
    .gallery-item:hover img {
      transform: scale(1.1);
    }
    .icon-pulse {
      animation: iconPulse 2s infinite;
    }
    @keyframes iconPulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.1); }
      100% { transform: scale(1); }
    }
    .border-glow {
      box-shadow: 0 0 15px rgba(250, 204, 21, 0.5);
    }
    .rotate-icon {
      transition: transform 0.5s ease;
    }
    .rotate-icon:hover {
      transform: rotate(15deg);
    }
  </style>
</head>
<body class="bg-image antialiased">
  <div class="min-h-screen bg-gradient-to-b from-black/90 to-black/80">
    <!-- Navegación -->
    <nav class="bg-black border-b border-yellow-500 text-white py-3 shadow-lg fixed w-full z-50">
      <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <!-- Logo placeholder -->
          <div class="logo-container">
            <img src="/img/marca de agua/color png2.png" alt="Conexiones Chávez Logo" class="w-10 h-10 object-contain">
          </div>
          <span class="font-bold text-xl md:text-2xl">Conexiones Chávez</span>
        </div>
        <div class="hidden md:flex space-x-8">
          <a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors font-medium">Inicio</a>
          <a href="{{ route('products.index') }}" class="hover:text-yellow-400 transition-colors font-medium">Productos</a>
          <a href="#detalles" class="hover:text-yellow-400 transition-colors font-medium">Detalles</a>
          <a href="#galeria" class="hover:text-yellow-400 transition-colors font-medium">Galería</a>
          <a href="#contacto" class="hover:text-yellow-400 transition-colors font-medium">Contacto</a>
        </div>
        <button class="md:hidden">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </nav>

    <!-- Contenido principal -->
    <div class="pt-24 pb-10">
      <!-- Hero section -->
      <div class="container mx-auto px-4 pt-10">
        <div class="flex flex-col md:flex-row gap-8 items-center">
          <!-- Imagen del producto -->
          <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
            <div class="relative overflow-hidden rounded-lg border-2 border-yellow-500 shadow-xl border-glow">
              @if($product->imagen)
                <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="w-full h-auto object-cover">
              @else
                <img src="{{ asset('images/default-product.jpg') }}" alt="Imagen por defecto" class="w-full h-auto object-cover">
              @endif
              <div class="absolute top-4 right-4 bg-yellow-500 text-black px-4 py-2 rounded-full font-bold slide-in-right">
                {{ $product->category->nombre }}
              </div>
            </div>
          </div>

          <!-- Detalles del producto -->
          <div id="detalles" class="w-full md:w-1/2" data-aos="fade-left" data-aos-duration="1000">
            <div class="industrial-card bg-black/80 p-6 rounded-lg shadow-xl backdrop-blur-sm">
              <div class="flex items-center mb-6">
                <div class="text-5xl text-yellow-500 icon-pulse rotate-icon mr-4">
                  <i class="{{ $product->icono }}"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-white">{{ $product->nombre }}</h1>
              </div>

              <div class="mb-8">
                <h2 class="text-xl font-semibold text-yellow-400 mb-3">Descripción</h2>
                <p class="text-gray-300 text-lg leading-relaxed fade-in">{{ $product->descripcion }}</p>
              </div>

              <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-black/60 p-4 rounded border-l-4 border-yellow-500 shadow-md">
                  <h3 class="text-yellow-400 text-lg font-semibold mb-2">Categoría</h3>
                  <p class="text-white">{{ $product->category->nombre }}</p>
                </div>
                <div class="bg-black/60 p-4 rounded border-l-4 border-yellow-500 shadow-md">
                  <h3 class="text-yellow-400 text-lg font-semibold mb-2">Código</h3>
                  <p class="text-white font-mono">{{ $product->codigo ?? 'PROD-' . str_pad($product->id, 4, '0', STR_PAD_LEFT) }}</p>
                </div>
              </div>

              <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('products.index') }}" class="py-3 px-6 bg-gray-800 hover:bg-gray-700 text-white rounded-lg transition-colors text-center">
                  <i class="fas fa-arrow-left mr-2"></i>Volver a productos
                </a>
                <a href="#contacto" class="py-3 px-6 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded-lg transition-colors text-center">
                  <i class="fas fa-envelope mr-2"></i>Solicitar información
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Estadísticas de la compañía -->
      <div class="container mx-auto px-4 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <div class="industrial-card bg-black/70 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="text-4xl text-yellow-500 mb-4 animate-pulse-slow">
              <i class="fas fa-calendar-check"></i>
            </div>
            <div class="text-3xl font-bold text-white mb-2">{{ $companyStats['experience'] }}</div>
            <div class="text-gray-400">Años de experiencia</div>
          </div>

          <div class="industrial-card bg-black/70 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="text-4xl text-yellow-500 mb-4 animate-pulse-slow">
              <i class="fas fa-users"></i>
            </div>
            <div class="text-3xl font-bold text-white mb-2">{{ number_format($companyStats['clients']) }}+</div>
            <div class="text-gray-400">Clientes satisfechos</div>
          </div>

          <div class="industrial-card bg-black/70 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="300">
            <div class="text-4xl text-yellow-500 mb-4 animate-pulse-slow">
              <i class="fas fa-project-diagram"></i>
            </div>
            <div class="text-3xl font-bold text-white mb-2">{{ number_format($companyStats['projects']) }}+</div>
            <div class="text-gray-400">Proyectos completados</div>
          </div>

          <div class="industrial-card bg-black/70 p-6 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="text-4xl text-yellow-500 mb-4 animate-pulse-slow">
              <i class="fas fa-headset"></i>
            </div>
            <div class="text-3xl font-bold text-white mb-2">{{ $companyStats['service'] }}</div>
            <div class="text-gray-400">Servicio de emergencia</div>
          </div>
        </div>
      </div>

      <!-- Galería de imágenes -->
      @if($product->images->count() > 0)
      <div id="galeria" class="container mx-auto px-4 py-10">
        <h2 class="text-3xl font-bold text-center text-white mb-10 relative" data-aos="fade-up">
          <span class="bg-yellow-500 px-2 -ml-2">Galería</span> de imágenes
          <div class="section-divider mt-4"></div>
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($product->images as $image)
          <div class="gallery-item rounded-lg overflow-hidden shadow-xl" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 }}">
            <img
              src="{{ asset('storage/' . $image->url) }}"
              alt="Imagen de {{ $product->nombre }}"
              class="w-full h-64 object-cover"
            >
            <div class="p-4 bg-black/80 text-white">
              <div class="flex justify-between">
                <span class="text-yellow-400">Vista #{{ $loop->iteration }}</span>
                <span><i class="fas fa-search-plus"></i></span>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endif

      <!-- Características y aplicaciones -->
      <div class="container mx-auto px-4 py-16">
        <div class="flex flex-col lg:flex-row gap-8">
          <div class="w-full lg:w-1/2 industrial-card bg-black/70 p-6 rounded-lg shadow-lg" data-aos="fade-right">
            <h2 class="text-2xl font-bold text-yellow-500 mb-6 flex items-center">
              <i class="fas fa-cogs mr-3 text-3xl"></i>Características
            </h2>
            <ul class="space-y-4">
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Diseño robusto y duradero para uso industrial</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Fabricado con materiales de la más alta calidad</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Compatible con sistemas estándar de la industria</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Rendimiento probado en condiciones extremas</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Fácil instalación y mantenimiento</span>
              </li>
            </ul>
          </div>

          <div class="w-full lg:w-1/2 industrial-card bg-black/70 p-6 rounded-lg shadow-lg" data-aos="fade-left">
            <h2 class="text-2xl font-bold text-yellow-500 mb-6 flex items-center">
              <i class="fas fa-industry mr-3 text-3xl"></i>Aplicaciones
            </h2>
            <ul class="space-y-4">
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Sector industrial y manufacturero</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Construcción y maquinaria pesada</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Sistemas hidráulicos y neumáticos</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Transporte y logística</span>
              </li>
              <li class="flex items-start">
                <i class="fas fa-check text-yellow-500 mt-1 mr-3"></i>
                <span class="text-gray-300">Proyectos de ingeniería especializada</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- CTA Contacto -->
      <div id="contacto" class="container mx-auto px-4 py-16">
        <div class="industrial-card bg-black/80 p-8 rounded-lg text-center shadow-xl border-2 border-yellow-500 backdrop-blur-sm" data-aos="zoom-in">
          <h2 class="text-3xl font-bold text-white mb-6">¿Interesado en este producto?</h2>
          <p class="text-gray-300 mb-8 max-w-2xl mx-auto">Contáctanos hoy mismo para obtener más información, solicitar una cotización o programar una demostración personalizada.</p>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-4xl mx-auto">
            <a href="tel:+123456789" class="flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition-colors">
              <i class="fas fa-phone-alt mr-2"></i>Llamar ahora
            </a>
            <a href="mailto:info@conexioneschavez.com" class="flex items-center justify-center bg-gray-800 hover:bg-gray-700 text-white py-3 px-4 rounded-lg transition-colors">
              <i class="fas fa-envelope mr-2"></i>Enviar correo
            </a>
            <a href="https://wa.me/123456789" class="flex items-center justify-center bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg transition-colors">
              <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="section-divider"></div>

    <!-- Pie de página -->
    <footer class="bg-black border-t border-yellow-500 text-white py-10">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-6 md:mb-0 flex items-center">
            <div class="logo-container mr-4 w-12 h-12 flex items-center justify-center">
              <img src="/img/marca de agua/color png2.png" alt="Conexiones Chávez Logo" class="w-10 h-10 object-contain">
            </div>
            <div>
              <h2 class="text-2xl font-bold mb-2">Conexiones, Bandas y Mangueras Chávez</h2>
              <p class="text-yellow-200">Soluciones de calidad para la industria desde {{ now()->year - $companyStats['experience'] }}</p>
            </div>
          </div>
          <div class="text-center md:text-right">
            <p class="text-gray-400">&copy; {{ date('Y') }} Conexiones Chávez. Todos los derechos reservados.</p>
            <p class="text-sm text-gray-500 mt-1">Diseñado para brindar soluciones industriales de <span class="text-yellow-400">alta calidad</span></p>
          </div>
        </div>
      </div>
    </footer>
  </div>

  <!-- Scripts adicionales para FontAwesome y AOS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Inicialización de AOS
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        once: false,
        mirror: true,
        offset: 120,
        easing: 'ease-in-out'
      });

      // Scroll suave para los enlaces internos
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          const targetId = this.getAttribute('href');
          const targetElement = document.querySelector(targetId);
          if (targetElement) {
            window.scrollTo({
              top: targetElement.offsetTop - 80,
              behavior: 'smooth'
            });
          }
        });
      });

      // Funcionalidad para la galería de imágenes
      document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
          // Aquí se podría implementar un lightbox para ver las imágenes ampliadas
          this.classList.toggle('scale-105');
        });
      });
    });
  </script>
  @livewireScripts
</body>
</html>
