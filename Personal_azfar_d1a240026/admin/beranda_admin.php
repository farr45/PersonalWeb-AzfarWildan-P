<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
require_once("../koneksi.php");

$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin | Hopepully RP</title>
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
            neonGreen: '#32FF6A',
            mutedText: '#95a5a6'
          },
          fontFamily: {
            gta: ['"Orbitron"', 'sans-serif']
          }
        }
      }
    };
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet">
</head>

<body class="bg-darkBg text-white font-sans">

  <!-- Header -->
  <header class="bg-black text-cautionYellow py-6 shadow-md">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">
      <h1 class="text-3xl font-bold font-gta tracking-wide flex items-center gap-2">
        🛡️ Admin Dashboard - Hopepully RP
      </h1>
    </div>
  </header>

  <!-- Layout -->
  <div class="flex flex-col lg:flex-row max-w-7xl mx-auto mt-8 px-4 gap-6">

    <!-- Sidebar -->
    <aside class="lg:w-1/4 bg-gray-900 shadow-lg rounded-xl p-6 border border-tacticalBlue">
      <h2 class="text-xl font-bold text-neonGreen text-center mb-4 font-gta">Menu</h2>
      <ul class="space-y-4 font-medium text-gray-300">
        <li><a href="beranda_admin.php" class="block hover:text-neonGreen">🏠 Beranda</a></li>
        <li><a href="data_artikel.php" class="block hover:text-neonGreen">📝 Kelola Artikel</a></li>
        <li><a href="data_gallery.php" class="block hover:text-neonGreen">🖼️ Kelola Gallery</a></li>
        <li><a href="about.php" class="block hover:text-neonGreen">👤 About</a></li>
        <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
            class="block text-mafiaRed hover:underline">🚪 Logout</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="lg:w-3/4 bg-gray-900 rounded-xl shadow-lg p-6 border border-tacticalBlue">
      <div class="text-lg text-white mb-4">
        Halo, <strong class="text-neonGreen"><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! Selamat datang di panel admin.
      </div>

      <!-- Statistik -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div class="bg-tacticalBlue text-white rounded-lg shadow-lg p-6 text-center border-t-4 border-cautionYellow">
          <h3 class="text-xl font-semibold mb-2">Jumlah Artikel</h3>
          <p class="text-5xl font-bold"><?php echo $jumlah_artikel; ?></p>
        </div>
        <div class="bg-mafiaRed text-white rounded-lg shadow-lg p-6 text-center border-t-4 border-cautionYellow">
          <h3 class="text-xl font-semibold mb-2">Jumlah Galeri</h3>
          <p class="text-5xl font-bold"><?php echo $jumlah_gallery; ?></p>
        </div>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-black text-mutedText text-center py-4 mt-10 text-sm">
    &copy; <?php echo date('Y'); ?> | Dibuat oleh <span class="text-white font-medium">Azfar M Wildan P</span> untuk <span class="text-neonGreen font-bold">Hopepully RP</span>
  </footer>

</body>

</html>
