<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tarjeta Impresión | Mangueras Chávez</title>
  <style>
    body {
      background: #fff;
      color: #fff;
      margin: 0;
      padding: 0;
      font-family: 'Montserrat', Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }
    .card {
      width: 380px;
      height: 210px;
      border-radius: 18px;
      background: #000000;
      box-shadow: 0 4px 24px rgba(0,0,0,0.18);
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: space-around;
      padding: 15px 25px;
      position: relative;
      border: 2px solid #facc15;
      overflow: hidden;
    }

    .logo-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      flex: 1;
    }

    .qr-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      flex: 1;
    }
    .logo {
      width: 130px;
      height: auto;
      display: block;
      margin-top: 10px;
    }
    .title {
      font-size: 1.2rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-align: center;
      margin-bottom: 4px;
      color: #facc15;
      text-shadow: 0 2px 8px #000;
    }
    .qr {
      width: 120px;
      height: 120px;
      background: #fff;
      border-radius: 14px;
      padding: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 12px #0008;
      border: 2px solid #facc15;
    }
    .footer {
      font-size: 0.7rem;
      color: #bbb;
      text-align: center;
      margin-top: 8px;
      letter-spacing: 0.5px;
    }
    @media print {
      body { background: #111 !important; }
      .card { box-shadow: none; }
    }

    .download-button {
      margin-top: 30px;
      background-color: #facc15;
      color: #000;
      font-weight: bold;
      border: none;
      padding: 12px 24px;
      border-radius: 8px;
      cursor: pointer;
      font-family: 'Montserrat', Arial, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s ease;
      box-shadow: 0 4px 12px rgba(250, 204, 21, 0.3);
    }

    .download-button:hover {
      background-color: #f59e0b;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(250, 204, 21, 0.4);
    }

    .download-button svg {
      margin-right: 8px;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    @media print {
      .download-button {
        display: none;
      }
    }

    /* Media queries para dispositivos móviles */
    @media (max-width: 480px) {
      .container {
        padding: 10px;
      }

      .card {
        width: 300px;
        height: auto;
        flex-direction: column;
        padding: 15px;
      }

      .logo-section {
        margin-bottom: 5px;
      }

      .logo {
        width: 100px;
        margin-top: 5px;
      }

      .title {
        font-size: 1.1rem;
        margin-bottom: 3px;
      }

      .qr-section {
        margin-top: 5px;
      }

      .qr {
        width: 100px;
        height: 100px;
        padding: 6px;
      }

      .download-button {
        margin-top: 20px;
        font-size: 0.9rem;
        padding: 10px 20px;
      }
    }

    /* Media queries para dispositivos muy pequeños */
    @media (max-width: 320px) {
      .card {
        width: 260px;
        padding: 10px;
      }

      .logo {
        width: 90px;
      }

      .title {
        font-size: 1rem;
      }

      .qr {
        width: 90px;
        height: 90px;
        padding: 5px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div id="cardContainer" class="card">
      <div class="logo-section">
        <div class="title">Mangueras Chávez</div>
        <img src="/img/logotipo/color-logotipo1.jpg" alt="Logo Mangueras Chávez" class="logo">
      </div>
      <div class="qr-section">
        <div class="qr">
          <div id="qrcode"></div>
        </div>
        <div class="footer">Escanea para ver la tarjeta digital</div>
      </div>
    </div>

    <button id="downloadBtn" class="download-button">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
      </svg>
      Descargar Tarjeta
    </button>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script>
    // Función para aplicar clases adaptativas según el tamaño de pantalla
    function applyResponsiveClasses() {
      const container = document.querySelector('.container');
      const card = document.querySelector('.card');

      if (window.innerWidth <= 320) {
        container.classList.add('mobile-xs');
        card.classList.add('mobile-xs');
      } else if (window.innerWidth <= 480) {
        container.classList.add('mobile');
        container.classList.remove('mobile-xs');
        card.classList.add('mobile');
        card.classList.remove('mobile-xs');
      } else {
        container.classList.remove('mobile', 'mobile-xs');
        card.classList.remove('mobile', 'mobile-xs');
      }
    }

    // Aplicar clases al cargar
    applyResponsiveClasses();

    // Actualizar cuando cambia el tamaño o la orientación
    window.addEventListener('resize', applyResponsiveClasses);
    window.addEventListener('orientationchange', applyResponsiveClasses);

    // Ajustar el tamaño del QR según el tamaño de pantalla
    function getQRSize() {
      if (window.innerWidth <= 320) {
        return 80;
      } else if (window.innerWidth <= 480) {
        return 90;
      } else {
        return 105;
      }
    }

    // Generar el código QR con tamaño adaptativo
    const qrSize = getQRSize();
    new QRCode(document.getElementById("qrcode"), {
      text: "https://mangueraschavez.com/tarjeta-presentacion-adriana",
      width: qrSize,
      height: qrSize,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
    });

    // Funcionalidad de descarga
    document.getElementById('downloadBtn').addEventListener('click', function() {
      const cardElement = document.getElementById('cardContainer');
      const downloadBtn = this;

      // En móviles, cambiamos temporalmente la tarjeta a horizontal para mejor calidad en la descarga
      const isMobile = window.innerWidth <= 480;
      let originalStyles = {};

      if (isMobile) {
        // Guardar estilos originales
        originalStyles = {
          width: cardElement.style.width,
          height: cardElement.style.height,
          flexDirection: cardElement.style.flexDirection,
          padding: cardElement.style.padding
        };

        // Forzar estilo horizontal para la captura (mejor calidad)
        cardElement.style.width = '380px';
        cardElement.style.height = '210px';
        cardElement.style.flexDirection = 'row';
        cardElement.style.padding = '15px 25px';
      }

      // Cambiar el texto del botón mientras procesa
      downloadBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/><path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg> Generando...';
      downloadBtn.disabled = true;

      // Pequeño retardo para asegurar que el botón se actualice antes de generar la imagen
      setTimeout(() => {
        // Capturar la tarjeta como imagen
        html2canvas(cardElement, {
          backgroundColor: null,
          scale: 2, // Mayor calidad
          logging: false,
          useCORS: true
        }).then(canvas => {
          // Restaurar estilos originales si estábamos en móvil
          if (isMobile) {
            cardElement.style.width = originalStyles.width;
            cardElement.style.height = originalStyles.height;
            cardElement.style.flexDirection = originalStyles.flexDirection;
            cardElement.style.padding = originalStyles.padding;
          }

          // Convertir a imagen
          const imgData = canvas.toDataURL('image/png');

          // Crear un enlace temporal para descargar
          const link = document.createElement('a');
          link.href = imgData;
          link.download = 'tarjeta_mangueras_chavez.png';
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);

          // Restaurar el botón
          setTimeout(() => {
            downloadBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg> Descargar Tarjeta';
            downloadBtn.disabled = false;
          }, 1000);
        });
      }, 100);
    });
  </script>
</body>
</html>
