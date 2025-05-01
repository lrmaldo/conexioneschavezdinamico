<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimonio - {{ $testimonial->cliente }} | Conexiones Chávez</title>
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
    /* Estilos para la galería y lightbox */
    .gallery-item {
      transition: transform 0.3s ease, opacity 0.3s ease;
    }
    .gallery-item:hover {
      transform: scale(1.05);
      opacity: 0.9;
    }
    .lightbox {
      display: none;
      position: fixed;
      z-index: 999;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
      justify-content: center;
      align-items: center;
    }
    .lightbox-content {
      position: relative;
      max-width: 90%;
      max-height: 90%;
    }
    .lightbox-img {
      max-width: 100%;
      max-height: 90vh;
      object-fit: contain;
    }
    .lightbox-close {
      position: absolute;
      top: -30px;
      right: -30px;
      color: white;
      font-size: 24px;
      cursor: pointer;
      transition: transform 0.2s;
    }
    .lightbox-close:hover {
      transform: scale(1.2);
    }
    .lightbox-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: white;
      font-size: 24px;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .lightbox-nav:hover {
      background-color: rgba(250, 204, 21, 0.7);
    }
    .lightbox-prev {
      left: 10px;
    }
    .lightbox-next {
      right: 10px;
    }
    .testimonial-card {
      position: relative;
      overflow: hidden;
      border-left: 4px solid #facc15;
    }
    .testimonial-card::before {
      content: '"';
      position: absolute;
      top: -20px;
      left: 20px;
      font-size: 120px;
      color: rgba(250, 204, 21, 0.1);
      font-family: 'Georgia', serif;
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
          <a href="{{ url('/#quienes-somos') }}" class="hover:text-yellow-400 transition-colors font-medium">Quiénes Somos</a>
          <a href="{{ url('/#productos') }}" class="hover:text-yellow-400 transition-colors font-medium">Productos</a>
          <a href="{{ route('testimonials.index') }}" class="hover:text-yellow-400 transition-colors font-medium">Testimonios</a>
          <a href="{{ url('/#proveedores') }}" class="hover:text-yellow-400 transition-colors font-medium">Proveedores</a>
          <a href="{{ url('/#contacto') }}" class="hover:text-yellow-400 transition-colors font-medium">Contacto</a>
        </div>
        <button class="md:hidden">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mx-auto px-4 pt-24 pb-12">
      <!-- Encabezado -->
      <div class="flex flex-col items-center justify-center mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2 text-center" data-aos="fade-down">Testimonio de Cliente</h1>
        <div class="h-1 w-24 bg-yellow-500 rounded"></div>
      </div>

      <!-- Tarjeta principal de testimonio -->
      <div class="bg-gray-900/80 rounded-lg shadow-xl overflow-hidden mb-10" data-aos="fade-up" data-aos-delay="100">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Imagen principal del testimonio -->
          <div class="flex items-center justify-center p-6">
            <div class="w-full max-w-md overflow-hidden rounded-lg shadow-lg border-2 border-yellow-500/30">
              <img src="{{ asset('storage/' . $testimonial->imagen) }}" alt="Imagen de {{ $testimonial->cliente }}"
                class="w-full h-auto object-cover transform transition-transform hover:scale-105 duration-300">
            </div>
          </div>

          <!-- Información del testimonio -->
          <div class="p-6 testimonial-card">
            <div class="mb-6">
              <h2 class="text-2xl font-bold text-white">{{ $testimonial->cliente }}</h2>
              <p class="text-yellow-400 font-medium">{{ $testimonial->empresa }}</p>
            </div>

            <div class="text-gray-200 leading-relaxed">
              <p class="text-lg">{{ $testimonial->mensaje }}</p>
            </div>

            <div class="mt-8 flex items-center">
              <div class="flex text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <span class="ml-2 text-gray-300 text-sm">Cliente verificado</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Galería de imágenes adicionales -->
      <div class="mb-10" data-aos="fade-up" data-aos-delay="200">
        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
          <i class="fas fa-images text-yellow-500 mr-3"></i>
          Galería de imágenes
        </h3>

        @if($testimonial->images && $testimonial->images->count() > 0)
          <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach($testimonial->images as $index => $image)
              <div class="gallery-item cursor-pointer rounded-lg overflow-hidden"
                  onclick="openLightbox({{ $index }})"
                  data-image="{{ asset('storage/' . $image->url) }}">
                <img src="{{ asset('storage/' . $image->url) }}"
                    alt="Imagen adicional {{ $index + 1 }}"
                    class="w-full h-44 object-cover hover:brightness-110 transition">
              </div>
            @endforeach
          </div>
        @else
          <div class="bg-gray-800/50 rounded-lg p-6 text-center text-gray-400">
            <i class="far fa-images text-4xl mb-3 text-gray-500"></i>
            <p>No hay imágenes adicionales disponibles.</p>
          </div>
        @endif
      </div>

      <!-- Botón para volver -->
      <div class="flex justify-center my-8">
        <a href="{{ route('testimonials.index') }}" class="px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-black font-bold rounded-md transition-all flex items-center">
          <i class="fas fa-chevron-left mr-2"></i>
          Ver todos los testimonios
        </a>
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

  <!-- Lightbox para las imágenes -->
  <div id="lightbox" class="lightbox">
    <div class="lightbox-content">
      <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
      <img id="lightbox-img" class="lightbox-img" src="" alt="Imagen ampliada">
      <span class="lightbox-nav lightbox-prev" onclick="changeImage(-1)">&#10094;</span>
      <span class="lightbox-nav lightbox-next" onclick="changeImage(1)">&#10095;</span>
    </div>
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
    });

    // Funcionalidad del Lightbox
    let currentImageIndex = 0;
    let galleryImages = [];

    document.addEventListener('DOMContentLoaded', function() {
      // Recoger todas las imágenes de la galería
      const galleryItems = document.querySelectorAll('.gallery-item');
      galleryImages = Array.from(galleryItems).map(item => item.dataset.image);
    });

    function openLightbox(index) {
      currentImageIndex = index;
      const lightbox = document.getElementById('lightbox');
      const lightboxImg = document.getElementById('lightbox-img');

      lightboxImg.src = galleryImages[index];
      lightbox.style.display = 'flex';
      document.body.style.overflow = 'hidden'; // Prevenir scroll
    }

    function closeLightbox() {
      document.getElementById('lightbox').style.display = 'none';
      document.body.style.overflow = 'auto'; // Restaurar scroll
    }

    function changeImage(direction) {
      currentImageIndex = (currentImageIndex + direction + galleryImages.length) % galleryImages.length;
      document.getElementById('lightbox-img').src = galleryImages[currentImageIndex];
    }

    // Cerrar el lightbox con la tecla ESC
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeLightbox();
      }
      // Navegar con flechas izquierda y derecha
      if (e.key === 'ArrowLeft') {
        changeImage(-1);
      }
      if (e.key === 'ArrowRight') {
        changeImage(1);
      }
    });
  </script>
  @livewireScripts
</body>
</html>
