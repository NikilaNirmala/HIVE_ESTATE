<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HiveEstate - Page Not Found</title>
    <link href="/hive_app/css/tailwind.css" rel="stylesheet">

</head>

<body class="bg-white text-zinc-800 font-sans">
    <!-- Header -->
    <header class="bg-purple-100 p-4 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center space-x-2">
            <img src="/hive_app/public/images/hive_logo.png" alt="HiveEstate Logo" class="h-6" />
            <span class="text-xl font-bold">HiveEstate</span>
        </div>
        <nav class="space-x-4 hidden md:block">
            <a href="home" class="text-gray-600 hover:text-purple-600">Home</a>
            <a href="property" class="text-gray-600 hover:text-purple-600">Property</a>
            <a href="about" class="text-gray-600 hover:text-purple-600">About</a>
            <?php
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == 'agent' || $_SESSION['username'] == 'member') {
                    echo '<a href="user_profile" class="text-gray-600 hover:text-purple-600">My Profile</a>';
                } else {
                    echo '<a href="admin_profile" class="text-gray-600 hover:text-purple-600">My Profile</a>';
                }
            }
            ?>
        </nav>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a href='logout' class='bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700'>Logout</a>";
        } else {
            echo "<a href='login' class='bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700'>Login</a>";
        }
        ?>
    </header>

    <!-- 404 Error Message -->
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-purple-600 mb-4">404</h1>
            <h2 class="text-3xl font-semibold text-gray-800 mb-4">Page Not Found</h2>
            <p class="text-lg text-gray-600 mb-6">Sorry, the page you're looking for doesn't exist.</p>
            <a href="home" class="bg-purple-600 text-white px-6 py-3 rounded hover:bg-purple-700 transition duration-200">
                Return to Home
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="bg-purple-100 text-center py-4">
            <p class="text-gray-600">© 2023 HiveEstate. All rights reserved.</p>
        </div>
        <!-- Bottom Navigation Menu (Mobile Only) -->
        <nav class="fixed bottom-0 left-0 w-full bg-purple-100 border-t border-gray-200 flex justify-around items-center py-3 md:hidden z-20">
            <a href="home" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
                <span class="text-2xl">🏠</span>
                <span class="text-xs">Home</span>
            </a>
            <a href="property" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
                <span class="text-2xl">🏢</span>
                <span class="text-xs">Property</span>
            </a>
            <a href="about" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
                <span class="text-2xl">❓</span>
                <span class="text-xs">About</span>
            </a>
            <?php
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == 'agent' || $_SESSION['username'] == 'member') {
                    echo '<a href="user_profile" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
                            <span class="text-2xl">👤</span>
                            <span class="text-xs">Profile</span>
                          </a>';
                } else {
                    echo '<a href="admin_profile" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
                            <span class="text-2xl">👤</span>
                            <span class="text-xs">Profile</span>
                          </a>';
                }
            }
            ?>
        </nav>
    </footer>
</body>

</html>