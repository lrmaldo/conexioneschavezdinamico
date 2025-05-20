<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galería Completa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
    }
    .section-divider {
      height: 3px;
      background: linear-gradient(90deg, rgba(250,204,21,0.01) 0%, rgba(250,204,21,0.8) 50%, rgba(250,204,21,0.01) 100%);
      margin: 2rem auto;
      width: 80%;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 50;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      animation: zoomIn 0.3s;
    }

    @keyframes zoomIn {
      from {
        transform: scale(0.5);
        opacity: 0;
      }
      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    .close {
      position: absolute;
      top: 20px;
      right: 35px;
      color: #fff;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
    .gallery-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .gallery-card:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    .gallery-section {
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.9));
      color: #f3f4f6;
    }
    .gallery-card h3 {
      color: #facc15;
    }
    .gallery-card p {
      color: #d1d5db;
    }
    .bg-image {
      background-image: url('/img/portada.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }
  </style>
</head>
<body class="bg-gray-100 antialiased">
  <div class="min-h-screen bg-gradient-to-b from-black/90 to-black/80">
    <nav class="bg-black border-b border-yellow-500 text-white py-3 shadow-lg fixed w-full z-50">
      <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <div class="logo-container">
            <img src="/img/marca de agua/color png2.png" alt="Conexiones Chávez Logo" class="w-10 h-10 object-contain">
          </div>
          <span class="font-bold text-xl md:text-2xl">Conexiones Chávez</span>
        </div>
        <div class="hidden md:flex space-x-8">
          <a href="{{ url('/#inicio') }}" class="hover:text-yellow-400 transition-colors font-medium">Inicio</a>
          <a href="{{ url('/#quienes-somos') }}" class="hover:text-yellow-400 transition-colors font-medium">Quiénes Somos</a>
          <a href="{{ url('/#productos') }}" class="hover:text-yellow-400 transition-colors font-medium">Productos</a>
          <a href="{{ url('/#testimonios') }}" class="hover:text-yellow-400 transition-colors font-medium">Testimonios</a>
          <a href="{{ url('/#proveedores') }}" class="hover:text-yellow-400 transition-colors font-medium">Proveedores</a>
          <a href="{{ url('/#contacto') }}" class="hover:text-yellow-400 transition-colors font-medium">Contacto</a>
        </div>
        <a href="{{ url('/') }}" class="md:hidden hover:text-yellow-400 transition-colors font-medium">Inicio</a>
      </div>
    </nav>

    <section id="galeria" class="py-16 px-4 bg-image relative">
      <div class="absolute inset-0 bg-black/70 z-0"></div>
      <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-transparent z-0"></div>
      <div class="container mx-auto relative z-10">
        <div class="text-center mb-16" data-aos="fade-down" data-aos-duration="800">
          <h2 class="text-4xl font-bold text-yellow-400 mb-4">Galería Completa</h2>
          <p class="text-xl text-gray-300 max-w-3xl mx-auto">Explora todos nuestros proyectos destacados y trabajos realizados</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          @foreach($galleryImages as $image)
          <div class="gallery-card" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="{{ $loop->index * 200 }}">
            <div class="gallery-image-container">
              <img src="{{ asset($image->url) }}" alt="{{ $image->titulo }}" class="w-full h-48 object-cover rounded-lg shadow-md cursor-pointer" onclick="openModal('{{ asset($image->url) }}')">
            </div>
            <div class="p-4">
              <h3 class="text-lg font-bold text-yellow-400">{{ $image->titulo }}</h3>
              <p class="text-sm text-gray-300 line-clamp-2">{{ $image->descripcion }}</p>
            </div>
          </div>
          @endforeach
        </div>

        <div class="mt-12 text-center">
          <a href="{{ url('/') }}" class="inline-block bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-3 px-8 rounded-lg shadow-lg transition-all transform hover:scale-105">
            Volver al Inicio
          </a>
        </div>
      </div>
    </section>

    <div id="imageModal" class="modal">
      <span class="close" onclick="closeModal()">&times;</span>
      <img class="modal-content" id="modalImage">
    </div>

    <div class="absolute inset-0 bg-black/70 z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/60 to-transparent z-0"></div>

    <div class="section-divider"></div>

    <footer class="bg-black border-t border-yellow-500 text-white py-10">
      <div class="container mx-auto px-4">
        <div class="text-center">
          <p class="text-gray-400">&copy; {{ date('Y') }} Conexiones Chávez. Todos los derechos reservados.</p>
        </div>
      </div>
    </footer>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      AOS.init({
        once: false,
        mirror: true,
        offset: 120,
        easing: 'ease-in-out'
      });

      // Ensure the modal is hidden on page load
      const modal = document.getElementById('imageModal');
      modal.style.display = 'none';
    });

    function openModal(imageUrl) {
      const modal = document.getElementById('imageModal');
      const modalImage = document.getElementById('modalImage');
      modal.style.display = 'flex';
      modalImage.src = imageUrl;
    }

    function closeModal() {
      const modal = document.getElementById('imageModal');
      modal.style.display = 'none';
    }
  </script>
</body>
</html>
