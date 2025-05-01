<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conexiones, Bandas y Mangueras Chávez</title>
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
  </style>
</head>
<body class="bg-image antialiased">
  <div class="min-h-screen bg-gradient-to-b from-black/90 to-black/80">
    <!-- Navegación -->
    <nav class="bg-black border-b border-yellow-500 text-white py-4 shadow-lg fixed w-full z-50 top-0 left-0">
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

    <!-- Espaciador para compensar el nav fijo -->
    <div class="h-20"></div>

    <!-- Contenido principal -->

    <!-- Sección de Testimonios -->
    <section id="testimonios" class="py-20 relative">
      <!-- Elementos decorativos para el fondo -->
      <div class="absolute inset-0 overflow-hidden z-0">
        <div class="absolute top-1/4 -left-20 w-40 h-40 bg-yellow-500 rounded-full opacity-5 animate-blob"></div>
        <div class="absolute bottom-1/4 right-10 w-60 h-60 bg-yellow-500 rounded-full opacity-5 animate-blob animation-delay-2000"></div>
      </div>

      <div class="container mx-auto px-4 relative z-10">
        <div class="pt-8 md:pt-16 pb-12 text-center">
            <div class="mb-6 flex justify-center">
                <img src="/img/marca de agua/color png2.png" alt="Conexiones Chávez Logo" class="w-28 h-28 md:w-40 md:h-40 object-contain fade-in animate-pulse-slow hover:scale-105 transition-transform duration-300">
            </div>

            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 slide-in-left">
                Nuestros <span class="text-yellow-400">Proveedores</span>
            </h1>

            <div class="w-24 h-1 bg-yellow-500 mx-auto mb-6 slide-in-right"></div>

            <p class="text-gray-300 max-w-2xl mx-auto text-lg md:text-xl mb-10 fade-in">
                Trabajamos con los mejores proveedores de la industria para garantizar productos de alta calidad y soluciones confiables para nuestros clientes.
            </p>

            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <div class="px-6 py-3 bg-black/50 border border-yellow-500/30 rounded-lg text-white slide-in-left">
                    <span class="text-yellow-400 font-semibold">Calidad</span> Garantizada
                </div>
                <div class="px-6 py-3 bg-black/50 border border-yellow-500/30 rounded-lg text-white slide-in-right">
                    <span class="text-yellow-400 font-semibold">Marcas</span> Reconocidas
                </div>
                <div class="px-6 py-3 bg-black/50 border border-yellow-500/30 rounded-lg text-white slide-in-left animation-delay-2000">
                    <span class="text-yellow-400 font-semibold">Alianzas</span> Estratégicas
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto" data-aos="fade-up" data-aos-delay="200">
          @livewire('provider-table')
        </div>
      </div>
    </section>

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
    });
  </script>
  @livewireScripts
</body>
</html>
