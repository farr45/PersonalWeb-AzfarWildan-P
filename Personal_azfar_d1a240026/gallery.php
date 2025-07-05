<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Gallery | Hopepully RP - FiveM Server</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            darkBg: '#0c0c0c',
            tacticalBlue: '#1f6feb',
            mafiaRed: '#c0392b',
            cautionYellow: '#f1c40f',
            mutedText: '#95a5a6',
            neonGreen: '#32FF6A'
          },
          animation: {
            fade: 'fadeIn 1s ease-in-out',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: 0, transform: 'translateY(15px)' },
              '100%': { opacity: 1, transform: 'translateY(0)' }
            }
          },
          fontFamily: {
            gta: ['"Orbitron"', 'sans-serif']
          }
        }
      }
    };
  </script>
  <style>
    .fade-in {
      animation: fade 1s ease-in-out;
    }

    .hover-zoom:hover {
      transform: scale(1.05);
      transition: transform 0.3s ease-in-out;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
</head>

<body class="bg-darkBg text-white font-sans">

  <!-- Header -->
  <header class="text-center p-6 text-4xl font-extrabold font-gta shadow-md fade-in text-cautionYellow">
    Hopepully RP | FiveM Server
  </header>

  <!-- Navigation -->
  <nav class="bg-black py-3 shadow-inner border-t-4 border-cautionYellow">
    <ul class="flex justify-center space-x-10 font-semibold text-lg text-tacticalBlue uppercase">
      <li><a href="index.php" class="hover:text-neonGreen transition">Beranda</a></li>
      <li><a href="gallery.php" class="text-neonGreen border-b-2 border-neonGreen pb-1">Gallery RP</a></li>
      <li><a href="about.php" class="hover:text-neonGreen transition">About</a></li>
      <li><a href="admin/login.php" class="hover:text-neonGreen transition">Admin Login</a></li>
    </ul>
  </nav>

  <!-- Gallery Section -->
  <main class="max-w-6xl mx-auto px-6 py-12 fade-in">
    <h2 class="text-2xl font-bold mb-8 text-cautionYellow text-center">📸 Galeri Dunia Roleplay</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      <?php
      $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
      $query = mysqli_query($db, $sql);
      while ($data = mysqli_fetch_array($query)) {
        echo "<div class='bg-gray-900 rounded-2xl shadow-lg overflow-hidden hover-zoom border border-tacticalBlue'>";
        echo "<img src='images/{$data['foto']}' alt='Gambar' class='w-full h-56 object-cover'>";
        echo "<div class='p-4'>";
        echo "<h3 class='text-xl font-semibold text-tacticalBlue'>" . htmlspecialchars($data['judul']) . "</h3>";
        echo "</div></div>";
      }
      ?>
    </div>
  </main>

  <!-- Audio Player -->
  <section class="bg-gray-900 p-6 rounded-xl shadow-lg max-w-xl mx-auto mt-12 fade-in text-center border border-tacticalBlue">
    <h2 class="text-xl font-bold mb-4 text-cautionYellow">🎧 Radio Komunitas RP</h2>
    <div class="flex items-center justify-between bg-black rounded-lg p-4 shadow-inner">
      <div class="flex items-center space-x-4">
        <img src="https://img.icons8.com/fluency/96/000000/headphones.png" alt="Music" class="w-12 h-12 rounded-md" />
        <div class="text-left">
          <p class="text-lg font-semibold text-white">Sekarang Diputar</p>
          <p class="text-sm text-mutedText">everything u are - .Hindia</p>
        </div>
      </div>
      <button onclick="togglePlay()" class="bg-tacticalBlue hover:bg-mafiaRed text-white p-3 rounded-full shadow transition" id="playBtn">
        ▶️
      </button>
    </div>
    <audio id="audioPlayer" class="hidden">
      <source src="mp3/Hindia - everything u are [lB8ASupNtlw].mp3" type="audio/mpeg">
    </audio>
  </section>

  <script>
    const audio = document.getElementById('audioPlayer');
    const playBtn = document.getElementById('playBtn');
    let isPlaying = false;

    function togglePlay() {
      if (isPlaying) {
        audio.pause();
        playBtn.innerHTML = '▶️';
      } else {
        audio.play();
        playBtn.innerHTML = '⏸️';
      }
      isPlaying = !isPlaying;
    }
  </script>

  <!-- Footer -->
  <footer class="bg-black text-mutedText text-center py-4 mt-12 text-sm">
    &copy; <?= date('Y'); ?> | Hopepully RP FiveM Server - Dibuat oleh <span class="text-white font-medium">Azfar M Wildan P</span>
  </footer>

</body>

</html>
