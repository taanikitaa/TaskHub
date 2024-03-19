<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Selamat Datang</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #add8e6;
      position: relative;
      font-family: 'Roboto', sans-serif;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    .content {
      width: 45%;
      margin-left: 5%;
      margin-bottom: 10%;
      z-index: 1;
    }

    .logo {
      width: 30%;
      margin-right: 10%;
      margin-bottom: 10%;
      z-index: 1;
    }

    h1 {
      font-size: 3em;
      color: #333;
      font-family: 'Pacifico', cursive;
      position: relative;
      
    }

    p {
      color: #555;
      text-align: justify;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    .decoration {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: -1;
    }

    @keyframes wave {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
      100% {
        transform: translateY(0);
      }
    }

    .wave-path {
      animation: wave 3s infinite;
    }

    .circle {
      position: absolute;
      background-color: rgba(255, 255, 255, 0.3);
      border-radius: 50%;
      animation: move 5s linear alternate infinite;
    }

    @keyframes move {
      0% {
        transform: translate(-50%, -50%) scale(0.5);
      }
      100% {
        transform: translate(-50%, -50%) scale(1);
      }
    }

    .button {
      background-color: #0F1035;
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      transition-duration: 0.4s;
      cursor: pointer;
      border-radius: 8px;
    }

    .button:hover {
      background-color: #1e2149;
    }
  </style>
</head>
<body>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
  <div class="container">
    <div class="content">
      <h1>Selamat Datang</h1>
      <p>TaskHub adalah sebuah platform berbasis web yang dirancang untuk memudahkan manajemen tugas dan penjadwalan waktu masuk bagi para karyawan magang. Dengan TaskHub, manajer atau pengelola dapat dengan mudah membuat, mengatur, dan melacak berbagai tugas yang perlu diselesaikan oleh para karyawan magang. Selain itu, platform ini juga memungkinkan pengguna untuk memberikan jadwal masuk kepada karyawan magang, sehingga mempermudah pengaturan waktu kerja mereka.</p>
    <br>
      @if (Route::has('login'))
      <div class="mt-6">
        @auth
        <button onclick="location.href='{{ url('/home') }}'" class="button">Home</button>
        @else
        @if (Route::has('register'))
        <button onclick="location.href='{{ route('register') }}'" class="button">Daftar</button>
        @endif
        @endauth
      </div>
      @endif
    </div>
    <div class="logo">
      <img src="img/logo.png" alt="Logo Aplikasi">
    </div>
    <div class="circle" style="top: 20%; left: 15%; width: 100px; height: 100px;"></div>
    <div class="circle" style="top: 70%; left: 70%; width: 80px; height: 80px;"></div>
    <div class="circle" style="top: 40%; left: 80%; width: 120px; height: 120px;"></div>
  </div>

  <svg class="decoration" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path class="wave-path" fill="#ffffff" fill-opacity="1" d="M0,224L120,229.3C240,235,480,245,720,213.3C960,181,1200,107,1320,69.3L1440,32L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
  </svg>
</body>
</html>
