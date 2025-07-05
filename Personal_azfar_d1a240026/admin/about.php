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
  <title>Kelola About</title> 
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

<body class="bg-darkBg text-white min-h-screen font-sans">

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
        <li><a href="data_gallery.php" class="block hover:text-neonGreen transition">🖼️ Kelola Gallery</a></li> 
        <li><a href="about.php" class="block text-neonGreen font-bold">👤 About</a></li> 
        <li>
          <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');" 
             class="block text-mafiaRed hover:underline font-medium">🚪 Logout</a> 
        </li> 
      </ul> 
    </aside> 

    <!-- Main Content --> 
    <main class="w-3/4 bg-gray-900 rounded-xl shadow p-6 ml-6 border border-tacticalBlue"> 
      <div class="flex justify-between items-center mb-6"> 
        <h2 class="text-2xl font-bold text-cautionYellow font-gta">👤 Tentang Saya</h2> 
        <a href="add_about.php" class="bg-tacticalBlue text-white px-4 py-2 rounded hover:bg-mafiaRed transition shadow">+ Tambah Data</a> 
      </div> 

      <div class="space-y-6"> 
        <?php 
        $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC"; 
        $query = mysqli_query($db, $sql); 
        while ($data = mysqli_fetch_array($query)) { 
          echo "<div class='p-4 bg-gray-800 border border-gray-700 rounded-xl shadow'>"; 
          echo "<p class='mb-3 text-white'>" . htmlspecialchars($data['about']) . "</p>"; 
          echo "<div class='flex space-x-6 text-sm'>"; 
          echo "<a href='edit_about.php?id_about={$data['id_about']}' class='text-neonGreen hover:underline'>Edit</a>"; 
          echo "<a href='delete_about.php?id_about={$data['id_about']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-mafiaRed hover:underline'>Hapus</a>"; 
          echo "</div></div>"; 
        } 
        ?> 
      </div> 
    </main> 
  </div> 

  <!-- Footer --> 
  <footer class="bg-black text-mutedText text-center py-4 mt-10 text-sm"> 
    &copy; <?php echo date('Y'); ?> | Created by <span class="text-white font-medium">Azfar M Wildan P</span>
  </footer> 
</body> 
</html>
