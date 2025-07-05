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
  <title>Admin | Kelola Artikel</title> 
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
      <ul class="space-y-3 text-base text-mutedText">
        <li><a href="beranda_admin.php" class="block hover:text-neonGreen transition">🏠 Beranda</a></li>
        <li><a href="data_artikel.php" class="block text-neonGreen font-bold">📝 Kelola Artikel</a></li>
        <li><a href="data_gallery.php" class="block hover:text-neonGreen transition">🖼️ Kelola Gallery</a></li>
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
        <h2 class="text-2xl font-bold text-cautionYellow font-gta">📚 Daftar Artikel</h2>
        <a href="add_artikel.php"
           class="bg-tacticalBlue text-white px-4 py-2 rounded hover:bg-mafiaRed transition shadow">
          + Tambah Artikel
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full text-sm border border-tacticalBlue rounded shadow">
          <thead class="bg-tacticalBlue text-white uppercase">
            <tr>
              <th class="p-3 border">No</th>
              <th class="p-3 border">Judul</th>
              <th class="p-3 border">Isi</th>
              <th class="p-3 border">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-white">
            <?php 
            $sql = "SELECT * FROM tbl_artikel"; 
            $query = mysqli_query($db, $sql); 
            $no = 1; 
            while ($data = mysqli_fetch_array($query)) { 
              echo "<tr class='even:bg-gray-800'>"; 
              echo "<td class='border p-2 text-center'>" . $no++ . "</td>"; 
              echo "<td class='border p-2'>" . htmlspecialchars($data['nama_artikel']) . "</td>"; 
              echo "<td class='border p-2'>" . htmlspecialchars($data['isi_artikel']) . "</td>"; 
              echo "<td class='border p-2 text-center space-x-3'>
                      <a href='edit_artikel.php?id_artikel={$data['id_artikel']}' 
                         class='text-neonGreen hover:underline'>Edit</a>
                      <a href='delete_artikel.php?id_artikel={$data['id_artikel']}' 
                         onclick='return confirm(\"Yakin ingin menghapus?\")' 
                         class='text-mafiaRed hover:underline'>Hapus</a>
                    </td>"; 
              echo "</tr>"; 
            } 
            ?> 
          </tbody>
        </table>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-black text-mutedText text-center py-4 mt-10 text-sm">
    &copy; <?= date('Y'); ?> | Hopepully RP - Dibuat oleh <span class="text-white font-medium">Azfar M Wildan P</span>
  </footer>

</body>
</html>
