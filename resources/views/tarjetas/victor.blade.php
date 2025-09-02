<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tarjeta de Presentación - Victor Chávez | Mangueras Chávez</title>
  <meta name="description" content="Tarjeta de presentación digital de Victor Chávez - Gerente en Mangueras Chávez. Contacto, WhatsApp y redes sociales." />
  <meta property="og:title" content="Victor Chávez | Mangueras Chávez" />
  <meta property="og:description" content="Gerente - Coordinación de proyectos y soporte técnico." />
  <meta property="og:type" content="profile" />
  <meta property="og:image" content="/img/marca de agua/color png2.png" />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta name="theme-color" content="#facc15" />
  <link rel="icon" type="image/png" href="/favicon.ico" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <style>
    body { font-family: 'Montserrat', sans-serif; }
    .page-bg {
      position: fixed; inset:0; background: radial-gradient(circle at 30% 20%, rgba(250,204,21,0.25), transparent 60%), radial-gradient(circle at 70% 80%, rgba(250,204,21,0.18), transparent 65%), #0a0a0a;
      overflow:hidden;
    }
    .blob { position:absolute; filter:blur(60px); opacity:.35; animation: blob 14s infinite; }
    .blob:nth-child(2){ animation-delay:4s; }
    .blob:nth-child(3){ animation-delay:8s; }
    @keyframes blob { 0%,100%{ transform:translate(0,0) scale(1);} 33%{ transform:translate(40px,-60px) scale(1.15);} 66%{ transform:translate(-50px,30px) scale(.9);} }
    .card-gradient { background: linear-gradient(145deg, rgba(17,17,17,.9) 0%, rgba(34,34,34,.85) 60%, rgba(0,0,0,.9) 100%); }
    .glass { backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px); }
    .divider { height:2px; background:linear-gradient(90deg, transparent, #facc15, transparent); margin:1.25rem 0; }

    /* Estilos responsivos adicionales */
    @media (max-width: 640px) {
      .grid {
        grid-template-columns: 1fr;
      }
      .divider {
        margin: 1rem 0;
      }
      main {
        padding: 0 0.5rem;
      }
    }

    @media (max-width: 480px) {
      .blob {
        filter: blur(40px);
      }
      .text-lg {
        font-size: 1rem;
      }
      .p-6 {
        padding: 1rem;
      }
      .p-3 {
        padding: 0.75rem;
      }
      h1.text-2xl {
        font-size: 1.25rem;
      }
      .space-y-3 > * {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
      }
      .divider {
        margin: 0.75rem 0;
      }
    }

    @media (max-width: 380px) {
      .w-10.h-10 {
        width: 2rem;
        height: 2rem;
      }
      .text-xs {
        font-size: 0.65rem;
      }
      button span, a span {
        font-size: 0.85rem;
      }
      .gap-3 {
        gap: 0.5rem;
      }
    }
  </style>
</head>
<body class="min-h-screen text-white flex items-center justify-center p-4 md:p-6 relative">
  <div class="page-bg">
    <div class="blob w-72 h-72 bg-yellow-500/20 top-10 left-10 rounded-full"></div>
    <div class="blob w-80 h-80 bg-yellow-400/10 bottom-20 right-16 rounded-full"></div>
    <div class="blob w-64 h-64 bg-yellow-300/10 top-1/2 left-1/2 -translate-x-1/2 rounded-full"></div>
  </div>

  <main class="w-full max-w-3xl relative z-10" data-aos="fade-up" data-aos-duration="900">
    <div class="grid md:grid-cols-2 gap-0 md:gap-6 items-stretch">
      <!-- Columna Foto -->
      <div class="relative md:rounded-2xl rounded-t-2xl md:rounded-tr-none overflow-hidden group" data-aos="zoom-in" data-aos-delay="150">
        <div class="absolute inset-0 bg-gradient-to-b from-yellow-500/30 to-black/80 opacity-70 group-hover:opacity-90 transition-opacity"></div>
        <img src="https://via.placeholder.com/600x800.png?text=Victor" alt="Victor Chávez" class="w-full h-72 md:h-full object-cover object-center transform group-hover:scale-105 transition-transform duration-[1600ms]">
        <div class="absolute top-3 left-3 bg-black/60 px-3 py-1 text-xs rounded-full border border-yellow-500/40 tracking-wide">Mangueras Chávez</div>
        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
          <h1 class="text-2xl font-bold drop-shadow-lg">Victor Chávez</h1>
          <span class="text-[10px] font-semibold bg-yellow-500 text-black px-3 py-1 rounded-full shadow">Gerente</span>
        </div>
      </div>

      <!-- Columna Info -->
      <div class="card-gradient glass rounded-b-2xl md:rounded-2xl md:rounded-bl-none border border-yellow-500/30 shadow-2xl flex flex-col" data-aos="fade-left" data-aos-delay="250">
        <div class="p-6 md:p-8 flex-1 flex flex-col">
          <div class="flex items-center mb-4" data-aos="fade-down" data-aos-delay="400">
            <img src="/img/marca de agua/color png2.png" alt="Logo" class="w-14 h-14 object-contain drop-shadow-lg">
            <div class="ml-4">
              <p class="text-xs uppercase tracking-wider text-yellow-300/80">Tarjeta Digital</p>
              <p class="text-lg font-semibold -mt-0.5">Mangueras Chávez</p>
            </div>
          </div>
          <p class="text-sm text-gray-300 leading-relaxed" data-aos="fade-up" data-aos-delay="500">Coordinación de proyectos, logística y soporte técnico integral enfocado en eficiencia operativa.</p>
          <div class="divider" data-aos="zoom-in" data-aos-delay="600"></div>

          <ul class="space-y-3" data-aos="fade-up" data-aos-delay="650">
            <li>
              <a href="tel:+5212871811810" class="group flex items-center gap-3 p-3 rounded-lg bg-white/5 hover:bg-white/10 transition border border-white/5 hover:border-yellow-500/40">
                <span class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-500 text-black font-bold group-hover:scale-105 transition">📞</span>
                <div class="text-xs">
                  <p class="font-semibold tracking-wide text-yellow-300/90">Teléfono principal</p>
                  <p class="text-gray-200">+52 1 287 181 1810</p>
                </div>
              </a>
            </li>
            <li>
              <a href="mailto:manolo.chavez@hotmail.com" class="group flex items-center gap-3 p-3 rounded-lg bg-white/5 hover:bg-white/10 transition border border-white/5 hover:border-yellow-500/40">
                <span class="w-10 h-10 flex items-center justify-center rounded-full bg-yellow-500 text-black font-bold group-hover:scale-105 transition">✉️</span>
                <div class="text-xs">
                  <p class="font-semibold tracking-wide text-yellow-300/90">Correo</p>
                  <p class="text-gray-200 truncate max-w-[140px]">manolo.chavez@hotmail.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="https://wa.me/5212871811810" target="_blank" class="group flex items-center gap-3 p-3 rounded-lg bg-white/5 hover:bg-white/10 transition border border-white/5 hover:border-green-400/40">
                <span class="w-10 h-10 flex items-center justify-center rounded-full bg-green-500 text-white font-bold group-hover:scale-105 transition">WA</span>
                <div class="text-xs">
                  <p class="font-semibold tracking-wide text-green-300/90">WhatsApp</p>
                  <p class="text-gray-200">Chat Directo</p>
                </div>
              </a>
            </li>
          </ul>
          <div class="mt-2" data-aos="fade-up" data-aos-delay="700">
            <button id="vcardBtn" type="button" class="group w-full flex items-center gap-3 p-3 rounded-lg bg-yellow-500/90 hover:bg-yellow-400 text-black font-semibold justify-center shadow transition border border-yellow-500/40"
              data-name="Victor Chávez"
              data-phone="+5212871811810"
              data-email="manolo.chavez@hotmail.com"
              data-title="Gerente"
              data-org="Mangueras Chávez"
              data-address="Blvd. Plan de Tuxtepec, Local 6, Col. 5 de Mayo, San Juan Bautista Tuxtepec, Oaxaca, México">
              <i class="fas fa-id-card-alt text-lg"></i>
              <span>Guardar Contacto (vCard)</span>
            </button>
          </div>
          <div class="divider" data-aos="zoom-in" data-aos-delay="750"></div>

          <div class="flex items-center justify-center gap-4" data-aos="fade-up" data-aos-delay="800">
            <a href="https://www.facebook.com/MANGUERACHAVEZ" target="_blank" class="w-10 h-10 rounded-full bg-white/10 hover:bg-yellow-500/30 flex items-center justify-center transition" aria-label="Facebook">
              <i class="fab fa-facebook-f"></i>
            </a>
            <button id="copyLink" class="w-10 h-10 rounded-full bg-yellow-500/90 hover:bg-yellow-400 text-black font-bold flex items-center justify-center transition" aria-label="Copiar enlace" title="Copiar enlace">
              <i class="fas fa-link"></i>
            </button>
          </div>

          <div class="mt-6 text-center" data-aos="fade-up" data-aos-delay="850">
            <div class="mb-2 text-xs text-gray-300">
              <span class="font-semibold text-yellow-300">Dirección:</span> Blvd. Plan de Tuxtepec, Local 6, Col. 5 de Mayo<br>
              San Juan Bautista Tuxtepec, Oaxaca, México
            </div>
            <a href="https://mangueraschavez.com/" class="text-[11px] tracking-wide text-gray-400 hover:text-yellow-300 transition inline-flex items-center gap-1">
              <span>www.mangueraschavez.com</span>
              <i class="fas fa-external-link-alt text-[10px]"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" defer></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ once: true, duration: 700, easing: 'ease-out-cubic' });
    const btn = document.getElementById('copyLink');
    btn?.addEventListener('click', () => {
      navigator.clipboard.writeText(window.location.href).then(() => {
        btn.classList.add('ring-2','ring-yellow-300');
        btn.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(()=>{ btn.classList.remove('ring-2','ring-yellow-300'); btn.innerHTML = '<i class="fas fa-link"></i>'; }, 2500);
      });
    });
    const vBtn = document.getElementById('vcardBtn');
    function createVCard({name, phone, email, title, org, address}) {
      const now = new Date();
      const rev = now.toISOString();
      return `BEGIN:VCARD\nVERSION:3.0\nN:${name.split(' ').slice(-1)};${name.split(' ').slice(0,-1).join(' ')};;;\nFN:${name}\nORG:${org.replace(/,/g,'\\,')}\nTITLE:${title}\nTEL;TYPE=CELL,VOICE:${phone}\nEMAIL;TYPE=INTERNET:${email}\nADR;TYPE=WORK:;;${address};;;;\nURL:https://mangueraschavez.com\nREV:${rev}\nEND:VCARD`;
    }
    vBtn?.addEventListener('click', () => {
      const data = {
        name: vBtn.dataset.name,
        phone: vBtn.dataset.phone,
        email: vBtn.dataset.email,
        title: vBtn.dataset.title,
        org: vBtn.dataset.org,
        address: vBtn.dataset.address
      };
      const vcard = createVCard(data);
      const blob = new Blob([vcard], { type: 'text/vcard;charset=utf-8' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = data.name.replace(/\s+/g,'_').toLowerCase()+'.vcf';
      document.body.appendChild(a);
      a.click();
      setTimeout(()=>{ URL.revokeObjectURL(url); a.remove(); }, 500);
      vBtn.innerHTML = '<i class="fas fa-check"></i><span>Contacto Guardado</span>';
      vBtn.classList.add('ring-2','ring-yellow-300');
      setTimeout(()=>{ vBtn.innerHTML = '<i class="fas fa-id-card-alt text-lg"></i><span>Guardar Contacto (vCard)</span>'; vBtn.classList.remove('ring-2','ring-yellow-300'); }, 3000);
    });
  </script>
</body>
</html>
