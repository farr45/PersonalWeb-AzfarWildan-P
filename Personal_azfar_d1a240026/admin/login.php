<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:beranda_admin.php');
}
require_once("../koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Admin | Hopepully RP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        rpRed: '#c0392b',
                        rpBlue: '#2980b9',
                        darkNight: '#121212',
                        metalGray: '#7f8c8d',
                        tacticalBlack: '#0c0c0c',
                        cautionYellow: '#f39c12'
                    },
                    animation: {
                        fade: 'fadeIn 1s ease-in-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: 0 },
                            '100%': { opacity: 1 }
                        }
                    },
                    fontFamily: {
                        gta: ['"Orbitron"', 'sans-serif']
                    }
                }
            }
        };
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-darkNight min-h-screen flex items-center justify-center text-white bg-[url('https://images5.alphacoders.com/132/1326026.jpeg')] bg-cover bg-center">
    <div class="bg-tacticalBlack bg-opacity-85 shadow-2xl rounded-2xl p-10 w-full max-w-md animate-fade border border-cautionYellow">
        <div class="text-center mb-6">
             <img src="data:image/jpeg;base64,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" alt="FCB Logo" class="w-16 h-16 mx-auto mb-3">
            <h2 class="text-4xl font-extrabold text-cautionYellow font-gta drop-shadow-md">Hopepully RP | Admin Login</h2>
            <p class="text-sm text-metalGray italic">Masuk ke Command Center Roleplay Anda</p>
        </div>
        <form action="cek_login.php" method="post" class="space-y-6">
            <div>
                <label for="username" class="block text-sm font-medium text-rpBlue">Username Admin</label>
                <input type="text" name="username" id="username" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg shadow-sm text-white focus:ring-2 focus:ring-rpBlue focus:outline-none focus:border-transparent">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-rpBlue">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full px-4 py-2 bg-gray-900 border border-gray-700 rounded-lg shadow-sm text-white focus:ring-2 focus:ring-rpBlue focus:outline-none focus:border-transparent">
            </div>
            <div class="flex justify-between gap-2">
                <button type="submit" name="login"
                    class="w-full bg-rpBlue text-white font-semibold py-2 rounded-lg hover:bg-cautionYellow hover:text-black transition duration-300">
                    <i class="fas fa-door-open mr-2"></i>Masuk
                </button>
                <button type="reset" name="cancel"
                    class="w-full bg-gray-700 text-white font-semibold py-2 rounded-lg hover:bg-rpRed transition duration-300">
                    <i class="fas fa-times-circle mr-2"></i>Batal
                </button>
            </div>
        </form>
        <p class="text-center text-xs text-gray-400 mt-6">
            &copy; <?php echo date('Y'); ?> Hopepully RP | Panel Admin. Selamat Bertugas, Officer.
        </p>
    </div>
</body>

</html>
