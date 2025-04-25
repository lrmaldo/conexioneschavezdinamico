<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos - Conexiones, Bandas y Mangueras Chávez</title>
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

    /* Estilos para la sección Hero */
    .hero-section {
      position: relative;
      min-height: 70vh;
      overflow: hidden;
      display: flex;
      align-items: center;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.7) 100%);
      z-index: 1;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      width: 100%;
    }

    .hero-logo {
      position: relative;
      max-width: 180px;
      height: auto;
      margin: 0 auto 2rem;
      filter: drop-shadow(0 0 15px rgba(250, 204, 21, 0.5));
      transition: all 0.5s ease;
    }

    @media (min-width: 768px) {
      .hero-logo {
        max-width: 220px;
        margin-bottom: 3rem;
      }
    }

    @media (min-width: 1024px) {
      .hero-logo {
        max-width: 250px;
      }
    }

    .hero-title {
      position: relative;
      font-size: 2rem;
      font-weight: 800;
      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      margin-bottom: 1rem;
      text-align: center;
    }

    .hero-highlight {
      color: #facc15;
      position: relative;
      display: inline-block;
    }

    .hero-highlight::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 3px;
      background: #facc15;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.5s ease;
    }

    .hero-section:hover .hero-highlight::after {
      transform: scaleX(1);
    }

    .hero-text {
      max-width: 600px;
      margin: 0 auto 2rem;
      text-align: center;
      color: #e5e7eb;
      font-size: 1.1rem;
    }

    .hero-pattern {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23facc15' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      z-index: 0;
      opacity: 0.5;
    }

    .hero-cta {
      text-align: center;
      margin-top: 1.5rem;
    }

    .hero-button {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      background-color: #facc15;
      color: #000;
      font-weight: 700;
      padding: 0.75rem 1.5rem;
      border-radius: 0.5rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .hero-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .hero-button-icon {
      margin-left: 0.5rem;
    }

    .hero-scroll-indicator {
      position: absolute;
      bottom: 2rem;
      left: 50%;
      transform: translateX(-50%);
      color: white;
      font-size: 2rem;
      animation: bounce 2s infinite;
      z-index: 2;
      cursor: pointer;
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
          <a href="/#inicio" class="hover:text-yellow-400 transition-colors font-medium">Inicio</a>
          <a href="/#quienes-somos" class="hover:text-yellow-400 transition-colors font-medium">Quiénes Somos</a>
          <a href="/#productos" class="hover:text-yellow-400 transition-colors font-medium">Productos</a>
          <a href="/#testimonios" class="hover:text-yellow-400 transition-colors font-medium">Testimonios</a>
          <a href="/#proveedores" class="hover:text-yellow-400 transition-colors font-medium">Proveedores</a>
          <a href="/#contacto" class="hover:text-yellow-400 transition-colors font-medium">Contacto</a>
        </div>
        <button class="md:hidden">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </nav>

    <!-- Nueva sección Hero -->
    <section class="hero-section">
      <div class="hero-pattern"></div>
      <div class="hero-overlay"></div>
      <div class="container mx-auto px-4 hero-content">
        <div class="text-center">
          <img src="/img/marca de agua/color png2.png" alt="Conexiones Chávez Logo" class="hero-logo">
          <h1 class="hero-title">Soluciones <span class="hero-highlight">Industriales</span> de Calidad</h1>
          <p class="hero-text">
            Con más de {{ $companyStats['experience'] }} años de experiencia, proveemos conexiones, bandas y mangueras
            de la más alta calidad para satisfacer las necesidades de la industria moderna.
          </p>
          <div class="hero-cta">
            <a href="#productos-catalogo" class="hero-button">
              Explorar Productos
              <i class="fas fa-arrow-right hero-button-icon"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="hero-scroll-indicator">
        <i class="fas fa-chevron-down"></i>
      </div>
    </section>

    <!-- Contenido principal -->
    <div class="pt-10 pb-10" id="productos-catalogo">
      <div class="container mx-auto px-4">
        <!-- Header de sección con animación -->
        <div class="text-center mb-12">
          <h2 class="text-4xl font-bold text-white mb-2">Nuestro Catálogo</h2>
          <p class="text-gray-300 max-w-2xl mx-auto">Encuentra el producto perfecto para tus necesidades industriales.</p>
          <div class="section-divider mt-6"></div>
        </div>

        <!-- Estadísticas de la compañía -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-12">
          <div class="industrial-card bg-black/70 p-4 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="text-3xl text-yellow-500 mb-2 animate-pulse-slow">
              <i class="fas fa-calendar-check"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $companyStats['experience'] }}</div>
            <div class="text-sm text-gray-400">Años de experiencia</div>
          </div>

          <div class="industrial-card bg-black/70 p-4 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="text-3xl text-yellow-500 mb-2 animate-pulse-slow">
              <i class="fas fa-users"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ number_format($companyStats['clients']) }}+</div>
            <div class="text-sm text-gray-400">Clientes satisfechos</div>
          </div>

          <div class="industrial-card bg-black/70 p-4 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="300">
            <div class="text-3xl text-yellow-500 mb-2 animate-pulse-slow">
              <i class="fas fa-project-diagram"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ number_format($companyStats['projects']) }}+</div>
            <div class="text-sm text-gray-400">Proyectos completados</div>
          </div>

          <div class="industrial-card bg-black/70 p-4 rounded-lg shadow-lg text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="text-3xl text-yellow-500 mb-2 animate-pulse-slow">
              <i class="fas fa-headset"></i>
            </div>
            <div class="text-2xl font-bold text-white mb-1">{{ $companyStats['service'] }}</div>
            <div class="text-sm text-gray-400">Servicio de emergencia</div>
          </div>
        </div>

        <!-- Livewire para búsqueda y filtros -->
        @livewire('product-search1')
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
        once: true, // Cambiado a true para que las animaciones solo ocurran una vez
        mirror: false, // Cambiado a false para evitar animaciones en scroll reverso
        offset: 120,
        easing: 'ease-in-out',
        disable: window.innerWidth < 992 // Deshabilitar en dispositivos móviles
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

      // Añadir scroll suave para el indicador de desplazamiento
      document.querySelector('.hero-scroll-indicator').addEventListener('click', function() {
        const catalogoSection = document.getElementById('productos-catalogo');
        if (catalogoSection) {
          window.scrollTo({
            top: catalogoSection.offsetTop - 80,
            behavior: 'smooth'
          });
        }
      });
    });
  </script>
  @livewireScripts
</body>
</html>
