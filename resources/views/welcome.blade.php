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
      background-image: url('https://scontent-dfw5-2.xx.fbcdn.net/v/t39.30808-6/482302451_962615122728824_4557501094215340720_n.jpg?stp=cp6_dst-jpg_tt6&_nc_cat=104&ccb=1-7&_nc_sid=86c6b0&_nc_eui2=AeH5aIf9cH0wRt7VQoW27-VCAAp8M2cM2BYACnwzZwzYFk0jX9-xlmT_pfwrPFxvkp44fuwGkbmL4V8VVhnsGUuu&_nc_ohc=tQq7r_i_sz0Q7kNvgE-bd1C&_nc_oc=AdlvarZ4DgG0tQKthIIyeHoy_VuZa7YBwC68erAWyl6VVYCp0ucw9J9wMVSUkxYSqyw&_nc_zt=23&_nc_ht=scontent-dfw5-2.xx&_nc_gid=uEIVSfDExwcWI0VoOeC2rA&oh=00_AYEKtr3Q6nrXFLq_jfzpF3xgcGqJXZ8lsKLvUhcVaoekHg&oe=67F4698C');
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
            <span>CC</span>
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
    <section id="inicio" class="pt-28 pb-20 px-4 min-h-screen flex items-center relative">
      <div class="container mx-auto text-center">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 tracking-tight" data-aos="fade-down" data-aos-duration="1000">Conexiones, Bandas y<br>Mangueras Chávez</h1>
        <p class="text-xl md:text-2xl text-gray-200 mb-10 max-w-3xl mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Soluciones industriales confiables para sus necesidades de conexión y transporte de fluidos</p>
        <div class="flex flex-col md:flex-row justify-center gap-4" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
          <a href="#productos" class="bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
            Nuestros Productos
          </a>
          <a href="#contacto" class="bg-transparent border-2 border-yellow-500 text-yellow-400 hover:bg-yellow-500/10 font-bold py-3 px-8 rounded-lg shadow-lg transition-all">
            Contactar Ahora
          </a>
        </div>
      </div>

      <!-- Indicador de scroll -->
      <div class="scroll-indicator">
        <a href="#quienes-somos" class="text-yellow-400 animate-bounce">
          <i class="fas fa-chevron-down text-3xl"></i>
        </a>
      </div>
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
                Con más de 15 años de experiencia en el sector industrial y automotriz, en <strong class="text-yellow-400">Conexiones Chávez</strong> nos hemos consolidado como líderes en la venta y reparación de sistemas hidráulicos y neumáticos en Tuxtepec.
              </p>
              <p class="text-lg mb-4 leading-relaxed slide-in-left" style="animation-delay: 0.4s">
                Nuestro equipo de especialistas técnicos cuenta con la capacitación necesaria para ofrecer soluciones precisas que se adaptan a las necesidades específicas de cada cliente.
              </p>
              <div class="mt-8 grid grid-cols-2 gap-4 slide-in-left" style="animation-delay: 0.6s">
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">15+</p>
                  <p class="text-sm">Años de experiencia</p>
                </div>
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">1000+</p>
                  <p class="text-sm">Clientes satisfechos</p>
                </div>
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">5000+</p>
                  <p class="text-sm">Proyectos completados</p>
                </div>
                <div class="text-center">
                  <p class="text-3xl font-bold text-yellow-400">24h</p>
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
          <div class="bg-white/95 rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-yellow-500" data-aos="flip-left" data-aos-duration="1000">
            <div class="h-48 bg-black relative overflow-hidden">
              <div class="absolute inset-0 flex items-center justify-center">
                <i class="fas fa-cog text-8xl text-yellow-500/30"></i>
              </div>
              <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-4">
                <h3 class="text-xl font-bold text-yellow-400">Conexiones Hidráulicas</h3>
              </div>
            </div>
            <div class="p-6">
              <p class="text-gray-700 mb-4">Adaptadores, acoples rápidos y conexiones de alta presión diseñados para garantizar un sellado perfecto y prevenir fugas en sistemas hidráulicos.</p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-black font-semibold">Variedad de tamaños</span>
                <button class="text-yellow-600 hover:text-yellow-800 font-medium">Ver más</button>
              </div>
            </div>
          </div>

          <div class="bg-white/95 rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-yellow-500" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="200">
            <div class="h-48 bg-black relative overflow-hidden">
              <div class="absolute inset-0 flex items-center justify-center">
                <i class="fas fa-sync-alt text-8xl text-yellow-500/30"></i>
              </div>
              <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-4">
                <h3 class="text-xl font-bold text-yellow-400">Bandas Industriales</h3>
              </div>
            </div>
            <div class="p-6">
              <p class="text-gray-700 mb-4">Bandas de transmisión de potencia para aplicaciones industriales, fabricadas con materiales de primera calidad para garantizar durabilidad y rendimiento.</p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-black font-semibold">Alta resistencia</span>
                <button class="text-yellow-600 hover:text-yellow-800 font-medium">Ver más</button>
              </div>
            </div>
          </div>

          <div class="bg-white/95 rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-yellow-500" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="400">
            <div class="h-48 bg-black relative overflow-hidden">
              <div class="absolute inset-0 flex items-center justify-center">
                <i class="fas fa-water text-8xl text-yellow-500/30"></i>
              </div>
              <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-4">
                <h3 class="text-xl font-bold text-yellow-400">Mangueras Especializadas</h3>
              </div>
            </div>
            <div class="p-6">
              <p class="text-gray-700 mb-4">Mangueras de alta y baja presión diseñadas para transportar fluidos en condiciones extremas, resistentes a la abrasión, temperatura y productos químicos.</p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-black font-semibold">Múltiples aplicaciones</span>
                <button class="text-yellow-600 hover:text-yellow-800 font-medium">Ver más</button>
              </div>
            </div>
          </div>

          <div class="bg-white/95 rounded-lg overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-2xl border-t-4 border-yellow-500" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="600">
            <div class="h-48 bg-black relative overflow-hidden">
              <div class="absolute inset-0 flex items-center justify-center">
                <i class="fas fa-plug text-8xl text-yellow-500/30"></i>
              </div>
              <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black p-4">
                <h3 class="text-xl font-bold text-yellow-400">Válvulas y Adaptadores</h3>
              </div>
            </div>
            <div class="p-6">
              <p class="text-gray-700 mb-4">Componentes de control de flujo y adaptadores para crear sistemas completos y personalizados que se ajusten perfectamente a sus necesidades operativas.</p>
              <div class="flex justify-between items-center">
                <span class="text-sm text-black font-semibold">Control preciso</span>
                <button class="text-yellow-600 hover:text-yellow-800 font-medium">Ver más</button>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-12 text-center" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="800">
          <a href="#contacto" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
            Solicitar Cotización
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
          <div class="bg-gradient-to-br from-white/95 to-gray-100 p-8 rounded-lg shadow-lg relative border-l-4 border-yellow-500" data-aos="fade-right" data-aos-duration="1000">
            <div class="absolute -top-5 -left-5 bg-yellow-500 text-black p-3 rounded-full w-12 h-12 flex items-center justify-center text-3xl">
              "
            </div>
            <p class="text-gray-700 mb-6 pt-4">En 2018 llegue a la ciudad de Tuxtepec con la empresa Prodicam al área de maquinaria de cosecha e inicie la búsqueda de proveedores de refacciones, aceites, mangueras y herramientas en ese tiempo no conocía Tuxtepec por lo que un operador de alzadora me recomendó ir con "Chávez"...</p>
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <div class="w-12 h-12 rounded-full overflow-hidden">
                  <img src="img/Prodicam.png" alt="Prodicam logo" class="w-full h-full object-cover">
                </div>
                <div class="ml-4">
                  <h4 class="font-bold text-black">Pablo Casanova Barón</h4>
                  <p class="text-gray-600">Prodicam - Industria Azucarera</p>
                </div>
              </div>
              <a href="prodicam.html" class="text-yellow-600 hover:text-yellow-800 font-medium flex items-center">
                Leer completo <i class="fas fa-arrow-right ml-2"></i>
              </a>
            </div>
          </div>

          <div class="bg-gradient-to-br from-white/95 to-gray-100 p-8 rounded-lg shadow-lg relative border-l-4 border-yellow-500" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <div class="absolute -top-5 -left-5 bg-yellow-500 text-black p-3 rounded-full w-12 h-12 flex items-center justify-center text-3xl">
              "
            </div>
            <p class="text-gray-700 mb-6 pt-4">Cuando tuvimos una emergencia en nuestra línea de producción, el equipo de Conexiones Chávez respondió en tiempo récord. Su conocimiento técnico y disponibilidad de piezas nos sacaron de un apuro importante.</p>
            <div class="flex items-center">
              <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <span class="text-yellow-800 font-bold">LG</span>
              </div>
              <div class="ml-4">
                <h4 class="font-bold text-black">Laura Gómez</h4>
                <p class="text-gray-600">Transportes del Sureste</p>
              </div>
            </div>
          </div>

          <div class="bg-gradient-to-br from-white/95 to-gray-100 p-8 rounded-lg shadow-lg relative border-l-4 border-yellow-500" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
            <div class="absolute -top-5 -left-5 bg-yellow-500 text-black p-3 rounded-full w-12 h-12 flex items-center justify-center text-3xl">
              "
            </div>
            <p class="text-gray-700 mb-6 pt-4">La asesoría técnica que nos brindan es inigualable. Nos han ayudado a seleccionar los componentes correctos para nuestros sistemas, lo que ha resultado en una mayor eficiencia y menos mantenimiento.</p>
            <div class="flex items-center">
              <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                <span class="text-yellow-800 font-bold">FC</span>
              </div>
              <div class="ml-4">
                <h4 class="font-bold text-black">Fernando Castillo</h4>
                <p class="text-gray-600">Construcciones Papaloapan</p>
              </div>
            </div>
          </div>
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
            <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition border-b-2 border-yellow-500">
              <div class="text-center">
                <i class="fas fa-industry text-5xl text-yellow-600 mb-3"></i>
                <h3 class="font-bold text-gray-800">Parker</h3>
                <p class="text-sm text-gray-600">Conexiones de precisión</p>
              </div>
            </div>

            <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition border-b-2 border-yellow-500">
              <div class="text-center">
                <i class="fas fa-cogs text-5xl text-yellow-600 mb-3"></i>
                <h3 class="font-bold text-gray-800">Gates</h3>
                <p class="text-sm text-gray-600">Bandas y mangueras</p>
              </div>
            </div>

            <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition border-b-2 border-yellow-500">
              <div class="text-center">
                <i class="fas fa-tachometer-alt text-5xl text-yellow-600 mb-3"></i>
                <h3 class="font-bold text-gray-800">Eaton</h3>
                <p class="text-sm text-gray-600">Sistemas hidráulicos</p>
              </div>
            </div>

            <div class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition border-b-2 border-yellow-500">
              <div class="text-center">
                <i class="fas fa-tools text-5xl text-yellow-600 mb-3"></i>
                <h3 class="font-bold text-gray-800">SKF</h3>
                <p class="text-sm text-gray-600">Componentes de precisión</p>
              </div>
            </div>
          </div>

          <div class="mt-10 text-center">
            <p class="text-gray-700">Al trabajar con los mejores fabricantes del sector, podemos ofrecer garantía extendida en todos nuestros productos y servicios, asegurando que su inversión está protegida.</p>
          </div>
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

              <form class="space-y-6">
                <div>
                  <label class="block text-gray-700 mb-2 font-medium" for="nombre">Nombre completo</label>
                  <input type="text" id="nombre" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Tu nombre">
                </div>

                <div>
                  <label class="block text-gray-700 mb-2 font-medium" for="email">Correo electrónico</label>
                  <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="tucorreo@ejemplo.com">
                </div>

                <div>
                  <label class="block text-gray-700 mb-2 font-medium" for="telefono">Teléfono</label>
                  <input type="tel" id="telefono" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Tu número telefónico">
                </div>

                <div>
                  <label class="block text-gray-700 mb-2 font-medium" for="mensaje">Mensaje</label>
                  <textarea id="mensaje" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="¿En qué podemos ayudarte?"></textarea>
                </div>

                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-4 rounded-lg transition-colors">
                  Enviar mensaje
                </button>
              </form>
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
                    <p class="text-gray-300">Blvd. Plan de Tuxtepec, Local 6, Colonia 5 de Mayo, San Juan Bautista Tuxtepec, Oaxaca, C.P. 68370</p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-phone text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Teléfonos</h4>
                    <p class="text-gray-300"><a href="tel:+522871216143" class="hover:text-yellow-400 transition-colors">287 121 6143</a></p>
                    <p class="text-gray-300"><a href="tel:+522871536141" class="hover:text-yellow-400 transition-colors">287 153 6141</a></p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-envelope text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Correo electrónico</h4>
                    <p class="text-gray-300"><a href="mailto:manolo.chavez@hotmail.com" class="hover:text-yellow-400 transition-colors">manolo.chavez@hotmail.com</a></p>
                  </div>
                </div>

                <div class="flex items-start">
                  <div class="h-12 w-12 rounded-full bg-yellow-500/20 flex items-center justify-center mr-4 shrink-0">
                    <i class="fas fa-clock text-xl text-yellow-400"></i>
                  </div>
                  <div>
                    <h4 class="font-bold text-lg mb-1 text-yellow-200">Horario de atención</h4>
                    <p class="text-gray-300">Lunes a Viernes: 8:00 AM - 6:00 PM</p>
                    <p class="text-gray-300">Sábados: 8:00 AM - 2:00 PM</p>
                  </div>
                </div>
              </div>

              <div class="mt-10">
                <h4 class="font-bold text-lg mb-3 text-yellow-200">Síguenos en redes sociales</h4>
                <div class="flex space-x-4">
                  <a href="#" class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-yellow-600 transition-colors text-black">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-yellow-600 transition-colors text-black">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a href="#" class="h-10 w-10 rounded-full bg-yellow-500 flex items-center justify-center hover:bg-yellow-600 transition-colors text-black">
                    <i class="fab fa-whatsapp"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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
              <p class="text-yellow-200">Soluciones de calidad para la industria desde 2008</p>
            </div>
          </div>
          <div class="text-center md:text-right">
            <p class="text-gray-400">&copy; 2025 Conexiones Chávez. Todos los derechos reservados.</p>
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
</body>
</html>
