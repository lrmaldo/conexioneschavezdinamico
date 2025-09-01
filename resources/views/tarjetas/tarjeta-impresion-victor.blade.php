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
    // Generar el código QR
    new QRCode(document.getElementById("qrcode"), {
      text: "https://mangueraschavez.com/tarjeta-presentacion-victor",
      width: 105,
      height: 105,
      colorDark : "#000000",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
    });

    // Funcionalidad de descarga
    document.getElementById('downloadBtn').addEventListener('click', function() {
      const cardElement = document.getElementById('cardContainer');
      const downloadBtn = this;

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
