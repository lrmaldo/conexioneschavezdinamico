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
          <a href="#inicio" class="hover:text-yellow-400 transition-colors font-medium">Inicio</a>
          <a href="#quienes-somos" class="hover:text-yellow-400 transition-colors font-medium">Quiénes Somos</a>
          <a href="#productos" class="hover:text-yellow-400 transition-colors font-medium">Productos</a>
          <a href="#testimonios" class="hover:text-yellow-400 transition-colors font-medium">Testimonios</a>
          <a href="#proveedores" class="hover:text-yellow-400 transition-colors font-medium">Proveedores</a>
          <a href="#contacto" class="hover:text-yellow-400 transition-colors font-medium">Contacto</a>
        </div>
        <button class="md:hidden">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="relative pt-28 pb-20 px-4 min-h-screen flex items-center">
      <div class="absolute inset-0 bg-black/70 z-0"></div>
      <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-transparent z-0"></div>

      <div class="container mx-auto relative z-10">
        <div class="flex flex-col items-center justify-center mb-10" data-aos="fade-down" data-aos-duration="1200">
          <img src="/img/marca de agua/color png2.png" alt="Conexiones Chávez Logo" class="w-64 md:w-80 mb-8 drop-shadow-2xl animate-pulse-slow">
        </div>

        <div class="text-center">
          <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 tracking-tight leading-tight" data-aos="zoom-in" data-aos-duration="1000">
            <span class="block">Conexiones, Bandas y</span>
            <span class="text-yellow-400">Mangueras Chávez</span>
          </h1>

          <p class="text-xl md:text-2xl text-gray-200 mb-12 max-w-3xl mx-auto leading-relaxed" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            Soluciones industriales <span class="text-yellow-400 font-semibold">confiables y duraderas</span> para sus necesidades de conexión y transporte de fluidos
          </p>

          <div class="flex flex-col sm:flex-row justify-center gap-4 md:gap-6" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="600">
            <a href="#productos" class="group bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-4 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105 flex items-center justify-center">
              <span>Nuestros Productos</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
              </svg>
            </a>
            <a href="#contacto" class="group bg-transparent border-2 border-yellow-500 text-yellow-400 hover:bg-yellow-500/10 font-bold py-4 px-8 rounded-lg shadow-lg transition-all flex items-center justify-center">
              <span>Contactar Ahora</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <!-- Indicador de scroll -->
      <div class="scroll-indicator">
        <a href="#quienes-somos" class="text-yellow-400 animate-bounce">
          <i class="fas fa-chevron-down text-3xl"></i>
        </a>
      </div>

      <!-- Elemento decorativo - Partículas -->
      <div class="absolute top-1/4 left-10 w-20 h-20 bg-yellow-500/10 rounded-full blur-xl animate-blob"></div>
      <div class="absolute bottom-1/4 right-10 w-32 h-32 bg-yellow-400/10 rounded-full blur-xl animate-blob animation-delay-2000"></div>
      <div class="absolute top-1/2 left-1/3 w-24 h-24 bg-yellow-300/10 rounded-full blur-xl animate-blob animation-delay-4000"></div>
    </section>

    <div class="section-divider"></div>

    <!-- Quiénes Somos -->
    <section id="quienes-somos" class="py-16 px-4">
      <div class="container mx-auto">
        <div class="bg-white/95 rounded-xl shadow-2xl overflow-hidden" data-aos="fade-up" data-aos-duration="1000">
          <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 bg-black text-white p-10 industrial-card">
              <h2 class="text-3xl font-bold mb-6 slide-in-left text-yellow-400">Quiénes Somos</h2>
              <p class="text-lg mb-4 leading-relaxed slide-in-left" style="animation-delay: 0.2s">
                Con más de {{ $companyStats['experience'] }} años de experiencia en el sector industrial y automotriz, en <strong class="text-yellow-400">Conexiones Chávez</strong> nos hemos consolidado como líderes en la venta y reparación de sistemas hidráulicos y neumáticos en Tuxtepec.
              </p>
              <p class="text-lg mb-4 leading-relaxed slide-in-left" style="animation-delay: 0.4s">
                Nuestro equipo de especialistas técnicos cuenta con la capacitación necesaria para ofrecer soluciones precisas que se adaptan a las necesidades específicas de cada cliente.
              </p>
              <div class="mt-8 grid grid-cols-2 gap-4 slide-in-left" style="animation-delay: 0.6s">
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">{{ $companyStats['experience'] }}+</p>
                  <p class="text-sm">Años de experiencia</p>
                </div>
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">{{ $companyStats['clients'] }}+</p>
                  <p class="text-sm">Clientes satisfechos</p>
                </div>
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">{{ $companyStats['projects'] }}+</p>
                  <p class="text-sm">Proyectos completados</p>
                </div>
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">{{ $companyStats['service'] }}</p>
                  <p class="text-sm">Servicio de emergencia</p>
                </div>
              </div>
            </div>
            <div class="md:w-1/2 p-10">
              <h3 class="text-2xl font-bold text-black mb-4 slide-in-right">Nuestra Misión</h3>
              <p class="text-gray-700 mb-6 slide-in-right" style="animation-delay: 0.2s">
                Proveer soluciones eficientes en sistemas de conexión y transporte de fluidos, garantizando la más alta calidad y servicio personalizado para mantener operativas las industrias de nuestra región.
              </p>
              <h3 class="text-2xl font-bold text-black mb-4 slide-in-right" style="animation-delay: 0.4s">Nuestra Visión</h3>
              <p class="text-gray-700 mb-6 slide-in-right" style="animation-delay: 0.6s">
                Ser reconocidos como el proveedor líder de soluciones hidráulicas y neumáticas en la región, destacando por nuestra excelencia técnica, innovación y compromiso con la satisfacción del cliente.
              </p>
              <h3 class="text-2xl font-bold text-black mb-4 slide-in-right" style="animation-delay: 0.8s">Valores</h3>
              <ul class="list-disc list-inside text-gray-700 slide-in-right" style="animation-delay: 1s">
                <li>Integridad en cada servicio que ofrecemos</li>
                <li>Compromiso con la calidad y durabilidad</li>
                <li>Responsabilidad en cumplir tiempos de entrega</li>
                <li>Innovación constante en nuestras soluciones</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="section-divider"></div>

    <!-- Productos -->
    <section id="productos" class="py-16 px-4">
      <div class="container mx-auto">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
          <h2 class="text-4xl font-bold text-white mb-4">Nuestros Productos</h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">Ofrecemos una amplia gama de soluciones de alta calidad para satisfacer las necesidades más exigentes de la industria</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($featuredProducts as $product)
          <div class="bg-white/95 rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-yellow-500" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 200 }}">
            <div class="h-48 bg-black relative overflow-hidden">
              <div class="absolute inset-0 flex items-center justify-center">
                @if($product->imagen)
                    <img src="{{ asset('storage/' . $product->imagen) }}" alt="{{ $product->nombre }}" class="h-40 w-full object-cover">
                @else
                    <i class="fas fa-cog text-8xl text-yellow-500/30"></i>
                @endif
              </div>
              <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-4">
                <h3 class="text-xl font-bold text-yellow-400">{{ $product->nombre }}</h3>
              </div>
            </div>
            <div class="p-6">
              <p class="text-gray-700 mb-4">{{ $product->descripcion }}</p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-black font-semibold">{{ $product->highlight ?? 'Alta calidad' }}</span>
                <a href="{{ route('products.show', $product) }}" class="text-yellow-600 hover:text-yellow-800 font-medium">Ver más</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <div class="mt-12 text-center" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800">
          <a href="{{ route('products.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
            Ver Todos los Productos
          </a>
        </div>
      </div>
    </section>

    <div class="section-divider"></div>

    <!-- Testimonios -->
    <section id="testimonios" class="py-16 px-4">
      <div class="container mx-auto">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
          <h2 class="text-4xl font-bold text-white mb-4">Lo Que Dicen Nuestros Clientes</h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">La satisfacción de nuestros clientes es nuestro mayor logro</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
          @foreach($testimonials as $testimonial)
          <div class="bg-gradient-to-br from-white/95 to-gray-100 p-8 rounded-lg shadow-lg relative border-l-4 border-yellow-500" data-aos="{{ $loop->first ? 'fade-right' : ($loop->last ? 'fade-left' : 'fade-up') }}" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 200 }}">
            <div class="absolute -top-5 -left-5 bg-yellow-500 text-black p-3 rounded-full w-12 h-12 flex items-center justify-center text-3xl">
              "
            </div>
            <p class="text-gray-700 mb-6 pt-4">{{ Str::limit($testimonial->mensaje, 150) }}</p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                @if($testimonial->imagen)
                <div class="w-12 h-12 rounded-full overflow-hidden">
                  <img src="{{ asset('storage/' . $testimonial->imagen) }}" alt="{{ $testimonial->empresa }}" class="w-full h-full object-cover">
                </div>
                @else
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                  <span class="text-yellow-800 font-bold">{{ substr($testimonial->cliente, 0, 2) }}</span>
                </div>
                @endif
                <div class="ml-4">
                  <h4 class="font-bold text-black">{{ $testimonial->cliente }}</h4>
                  <p class="text-gray-600">{{ $testimonial->empresa }}</p>
                </div>
              </div>

              <a href="{{ route('testimonials.show', $testimonial) }}" class="text-yellow-600 hover:text-yellow-800 font-medium flex items-center">
                Leer completo <i class="fas fa-arrow-right ml-2"></i>
              </a>

            </div>
          </div>
          @endforeach
        </div>

        <div class="mt-12 text-center" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800">
          <a href="{{ route('testimonials.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
            Ver Todos los Testimonios
          </a>
        </div>
      </div>
    </section>

    <div class="section-divider"></div>

    <!-- Proveedores -->
    <section id="proveedores" class="py-16 px-4">
      <div class="container mx-auto">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
          <h2 class="text-4xl font-bold text-white mb-4">Nuestros Proveedores</h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">Trabajamos con las marcas más reconocidas para garantizar la más alta calidad en todos nuestros productos</p>
        </div>

        <div class="bg-white/90 rounded-xl shadow-xl p-10 border-t-4 border-yellow-500" data-aos="fade-up" data-aos-duration="1000">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($providers as $provider)
            <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition border-b-2 border-yellow-500">
              <div class="text-center">
                @if($provider->logo)
                    <img src="{{ asset('storage/' . $provider->logo) }}" alt="{{ $provider->nombre }}" class="h-16 mb-3 mx-auto">
                @else
                    <i class="fas fa-industry text-5xl text-yellow-600 mb-3"></i>
                @endif
                <h3 class="font-bold text-gray-800">{{ $provider->nombre }}</h3>
                <p class="text-sm text-gray-600">{{ $provider->category->nombre?? 'Proveedor' }}</p>
              </div>
            </div>
            @endforeach
          </div>

          <div class="mt-10 text-center">
            <p class="text-gray-700">Al trabajar con los mejores fabricantes del sector, podemos ofrecer garantía extendida en todos nuestros productos y servicios, asegurando que su inversión está protegida.</p>
            {{-- ver mas proveedores --}}
            <div class="mt-8 text-center">
                <a href="{{ route('providers.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
                    Ver Todos los Proveedores
                </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="section-divider"></div>

    <!-- Galería -->
    <section id="galeria" class="py-16 px-4">
      <div class="container mx-auto">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
          <h2 class="text-4xl font-bold text-white mb-4">Galería</h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">Explora algunos de nuestros proyectos destacados y trabajos realizados</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($galleryImages as $image)
          <div class="gallery-card" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 200 }}">
            <div class="gallery-image-container">
              <img src="{{ asset($image->url) }}" alt="{{ $image->titulo }}">
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold text-gray-800">{{ $image->titulo }}</h3>
              <p class="text-sm text-gray-600 line-clamp-2">{{ $image->descripcion }}</p>
            </div>
          </div>
          @endforeach
        </div>

        <div class="mt-12 text-center" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800">
          <a href="{{ route('gallery.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
            Ver Más
          </a>
        </div>
      </div>
    </section>

    <div class="section-divider"></div>

    <!-- Contacto -->
    <section id="contacto" class="py-16 px-4">
      <div class="container mx-auto">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
          <h2 class="text-4xl font-bold text-white mb-4">Contáctanos</h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">Estamos listos para ayudarte con cualquier consulta o requerimiento</p>
        </div>

        <div class="bg-white/95 rounded-xl shadow-2xl overflow-hidden border-t-4 border-yellow-500" data-aos="zoom-in" data-aos-duration="1000">
          <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 p-10">
              <h3 class="text-2xl font-bold text-black mb-6">Envíanos un mensaje</h3>
              <!-- Formulario de contacto (edición) movido al backend. Aquí mostramos información de contacto pública -->
              <div class="space-y-3">
                <p class="text-gray-700"><strong>Teléfono:</strong> {{ $contact->telefono1 ?? '' }}</p>
                @if($contact->telefono2)
                  <p class="text-gray-700"><strong>Teléfono 2:</strong> {{ $contact->telefono2 }}</p>
                @endif
                @if($contact->correo)
                  <p class="text-gray-700"><strong>Correo:</strong> <a href="mailto:{{ $contact->correo }}" class="text-yellow-600">{{ $contact->correo }}</a></p>
                @endif
                @if($contact->direccion)
                  <p class="text-gray-700"><strong>Dirección:</strong> {{ $contact->direccion }}</p>
                @endif

              </div>
            </div>

            <div class="md:w-1/2 bg-black text-white p-10 industrial-card">
              <h3 class="text-2xl font-bold mb-6 text-yellow-400">Información de contacto</h3>
              <div class="space-y-6">
                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-map-marker-alt text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Dirección</h4>
                    <p class="text-gray-300">{{ $contact->direccion }}</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-phone text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Teléfonos</h4>
                    @if($contact->telefono1)
                    <p class="text-gray-300"><a href="tel:+52{{ preg_replace('/\D/', '', $contact->telefono1) }}" class="hover:text-yellow-400 transition-colors">{{ $contact->telefono1 }}</a></p>
                    @endif
                    @if($contact->telefono2)
                    <p class="text-gray-300"><a href="tel:+52{{ preg_replace('/\D/', '', $contact->telefono2) }}" class="hover:text-yellow-400 transition-colors">{{ $contact->telefono2 }}</a></p>
                    @endif
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-envelope text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Correo electrónico</h4>
                    <p class="text-gray-300"><a href="mailto:{{ $contact->correo }}" class="hover:text-yellow-400 transition-colors">{{ $contact->correo }}</a></p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-clock text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Horario de atención</h4>
                    <div class="space-y-1">
                      @forelse(App\Models\Schedule::all() as $schedule)
                        <p class="text-gray-300">
                          <span class="font-medium text-yellow-100">{{ $schedule->dia }}:</span>
                          {{ \Carbon\Carbon::parse($schedule->inicio)->format('h:i A') }} -
                          {{ \Carbon\Carbon::parse($schedule->fin)->format('h:i A') }}
                        </p>
                      @empty
                        <p class="text-gray-300">Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <p class="text-gray-300">Sábados: 9:00 AM - 5:00 PM</p>
                      @endforelse
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-10">
                <h4 class="font-bold text-lg mb-3 text-yellow-200">Síguenos en redes sociales</h4>
                <div class="flex space-x-4">
                  @if($contact->facebook)
                  <a href="{{ $contact->facebook }}" target="_blank" class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-yellow-600 transition-colors text-black">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  @endif

                  @if($contact->instagram)
                  <a href="{{ $contact->instagram }}" target="_blank" class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-yellow-600 transition-colors text-black">
                    <i class="fab fa-instagram"></i>
                  </a>
                  @endif

                  @if($contact->whatsapp)
                  <a href="https://wa.me/{{ preg_replace('/\D/', '', $contact->whatsapp) }}" target="_blank" class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-yellow-600 transition-colors text-black">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="section-divider"></div>

    <!-- Pie de página -->
    <footer class="bg-black border-t border-yellow-500 text-white py-10">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-6 md:mb-0 flex items-center">
            <div class="logo-container mr-4 w-12 h-12">
              <span>CC</span>
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
