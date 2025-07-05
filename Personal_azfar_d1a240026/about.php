<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>About | Hopepully RP - Azfar M Wildan P</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              '0%': { opacity: 0, transform: 'translateY(20px)' },
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
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
</head>

<body class="bg-darkBg text-white font-sans">

  <!-- Header -->
  <header class="text-center p-6 text-4xl font-extrabold font-gta shadow-md fade-in text-cautionYellow">
    About | Azfar M Wildan P
  </header>

  <!-- Navigation -->
  <nav class="bg-black py-3 shadow-inner border-t-4 border-cautionYellow">
    <ul class="flex justify-center space-x-10 font-semibold text-lg text-tacticalBlue uppercase">
      <li><a href="index.php" class="hover:text-neonGreen transition">Beranda</a></li>
      <li><a href="gallery.php" class="hover:text-neonGreen transition">Gallery RP</a></li>
      <li><a href="about.php" class="text-neonGreen border-b-2 border-neonGreen pb-1">About</a></li>
      <li><a href="admin/login.php" class="hover:text-neonGreen transition">Admin Login</a></li>
    </ul>
  </nav>

  <!-- About Content -->
  <main class="max-w-4xl mx-auto px-6 py-10 fade-in">
    <div class="bg-gray-900 rounded-2xl shadow-lg p-8 border border-tacticalBlue">
      <h2 class="text-2xl font-bold mb-6 text-cautionYellow text-center">🧑‍💻 Profil Developer</h2>
      <div class="space-y-6 text-mutedText leading-relaxed">
        <?php
        $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
        $query = mysqli_query($db, $sql);
        if (mysqli_num_rows($query) > 0) {
          while ($data = mysqli_fetch_array($query)) {
            echo "<div>";
            echo "<p>" . nl2br(htmlspecialchars($data['about'])) . "</p>";
            echo "</div>";
          }
        } else {
          echo "<p class='text-center text-mutedText'>Belum ada informasi tentang saya.</p>";
        }
        ?>
      </div>
    </div>
  </main>

  <!-- Custom Audio Player -->
  <section class="bg-gray-900 p-6 rounded-xl shadow-lg max-w-xl mx-auto mt-12 fade-in text-center border border-tacticalBlue">
    <h2 class="text-xl font-bold mb-4 text-cautionYellow">🎧 Lagu Favorit</h2>

    <div class="flex items-center justify-between bg-black rounded-lg p-4 shadow-inner">
      <div class="flex items-center space-x-4">
        <img src="https://img.icons8.com/color/96/000000/music--v1.png" alt="Music" class="w-12 h-12 rounded-md" />
        <div class="text-left">
          <p class="text-lg font-semibold text-white">Sedang Diputar</p>
          <p class="text-sm text-mutedText">Tarot - .Feast</p>
        </div>
      </div>
      <button onclick="togglePlay()" class="bg-tacticalBlue hover:bg-mafiaRed text-white p-3 rounded-full shadow transition" id="playBtn">
        ▶️
      </button>
    </div>
    <audio id="audioPlayer" class="hidden">
      <source src="mp3/Audio WhatsApp 2025-06-27 pukul 13.52.02_1069524f_[cut_257sec].mp3" type="audio/mpeg">
      Browser Anda tidak mendukung audio.
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

    audio.addEventListener('ended', () => {
      playBtn.innerHTML = '▶️';
      isPlaying = false;
    });
  </script>

  <!-- Footer -->
  <footer class="bg-black text-mutedText text-center py-4 mt-10 text-sm">
    &copy; <?= date('Y'); ?> | Hopepully RP - Dibuat oleh <span class="text-white font-medium">Azfar M Wildan P</span>
  </footer>

</body>

</html>
