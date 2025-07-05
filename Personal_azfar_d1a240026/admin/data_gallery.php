<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
  header('location:login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin | Kelola Gallery</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            darkBg: '#0c0c0c',
            cautionYellow: '#f1c40f',
            mutedText: '#95a5a6',
            tacticalBlue: '#1f6feb',
            mafiaRed: '#c0392b',
            neonGreen: '#32FF6A'
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

<body class="bg-darkBg min-h-screen text-white font-sans">

  <!-- Header -->
  <header class="bg-black text-cautionYellow text-center py-6 shadow font-gta text-3xl tracking-widest">
    // ADMIN PANEL //
  </header>

  <div class="flex max-w-7xl mx-auto mt-8 px-4">
    <!-- Sidebar -->
    <aside class="w-1/4 bg-gray-900 text-white rounded-xl shadow p-6">
      <h2 class="text-lg font-semibold text-cautionYellow mb-4 text-center font-gta">MENU</h2>
      <ul class="space-y-3 text-mutedText">
        <li><a href="beranda_admin.php" class="block hover:text-neonGreen transition">🏠 Beranda</a></li>
        <li><a href="data_artikel.php" class="block hover:text-neonGreen transition">📝 Kelola Artikel</a></li>
        <li><a href="data_gallery.php" class="block text-neonGreen font-bold">🖼️ Kelola Gallery</a></li>
        <li><a href="about.php" class="block hover:text-neonGreen transition">👤 About</a></li>
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
            class="block text-mafiaRed hover:underline font-medium">🚪 Logout</a>
        </li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="w-3/4 bg-gray-900 rounded-xl shadow p-6 ml-6 border border-tacticalBlue">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-cautionYellow font-gta">🖼️ Daftar Gallery</h2>
        <a href="add_gallery.php"
          class="bg-tacticalBlue text-white px-4 py-2 rounded hover:bg-mafiaRed transition shadow">
          + Tambah Gambar
        </a>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <?php
        $sql = "SELECT * FROM tbl_gallery";
        $query = mysqli_query($db, $sql);
        while ($data = mysqli_fetch_array($query)) {
          echo "<div class='bg-gray-800 rounded-xl shadow overflow-hidden border border-gray-700'>";
          echo "<img src='../images/{$data['foto']}' class='w-full h-48 object-cover'>";
          echo "<div class='p-4'>";
          echo "<p class='font-semibold text-white mb-2'>" . htmlspecialchars($data['judul']) . "</p>";
          echo "<div class='flex justify-between text-sm'>";
          echo "<a href='edit_gallery.php?id_gallery={$data['id_gallery']}' class='text-neonGreen hover:underline'>Edit</a>";
          echo "<a href='delete_gallery.php?id_gallery={$data['id_gallery']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-mafiaRed hover:underline'>Hapus</a>";
          echo "</div>";
          echo "</div></div>";
        }
        ?>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-black text-mutedText text-center py-4 mt-10 text-sm">
    &copy; <?= date('Y'); ?> | Hopepully RP - Dibuat oleh <span class="text-white font-medium">Azfar M Wildan P</span>
  </footer>

</body>

</html>
