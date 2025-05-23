<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/hive_app/css/tailwind.css" rel="stylesheet">
    <title>HiveEstate - Member Profile</title>
</head>

<body class="bg-white text-zinc-800 font-sans">
    <!-- Header -->
    <header
        class="bg-purple-100 p-4 flex justify-between items-center sticky top-0 z-10">
        <div class="flex items-center space-x-2">
            <img
                src="/hive_app/public/images/hive_logo.png"
                alt="HiveEstate Logo"
                class="h-6" />
            <span class="text-xl font-bold">HiveEstate</span>
        </div>
        <nav class="space-x-4 hidden md:block">
            <a href="home" class="text-gray-600 hover:text-purple-600">Home</a>
            <a href="property" class="text-gray-600 hover:text-purple-600">Property</a>
            <a href="about" class="text-gray-600 hover:text-purple-600">About</a>
            <?php
            if (isset($_SESSION['username'])) {
                if ($_SESSION['username'] == 'agent' || $_SESSION['username'] == 'member') {
                    echo ' <a href="user_profile" class="text-gray-600 hover:text-purple-600">My Profile</a>';
                } else {
                    echo ' <a href="admin_profile" class="text-gray-600 hover:text-purple-600">My Profile</a>';
                }
            }
            ?>
        </nav>
        <?php
        if (isset($_SESSION['username'])) {
            echo "<a
      href='logout'
      class='bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700'> Logout
    </a>";
        } else {
            echo "<a
      href='login'
      class='bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700'> Login
    </a>";
        }
        ?>
    </header>

    <!-- Profile Section -->
    <section class="bg-purple-100 py-16 text-center">
        <div class="max-w-2xl mx-auto px-4 bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-col items-center mb-6">
                <img
                    src="https://placehold.co/100x100"
                    alt="Agent"
                    class="w-20 h-20 rounded-full object-cover mb-2" />
                <h2 class="text-xl font-semibold"><?= $_SESSION['username']; ?></h2>
                <p class="text-gray-600">HiveMember</p>
            </div>
            <div
                class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <a
                    href="user_profile"
                    class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    My Profile
                </a>
                <a
                    href="my_ads"
                    class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Ads
                </a>
                <a
                    href="request_agent"
                    class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
                    Request Agent
                </a>
            </div>
            <?php
            if (isset($_SESSION['Message'])) {
                echo "<p class='mt-4 text-green-600'>{$_SESSION['Message']}</p>";
                $_SESSION['Message'] = null;
                header("refresh:4");
            };
            ?>
            <form class="space-y-4 mt-10" action='submit_request' method='post'>
                <div>
                    <label for="username" class="block text-gray-700 font-semibold mb-1">Username</label>
                    <input required type="text" id="username" name="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-purple-600" placeholder="Enter your username" required>
                </div>
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                    <input required type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-purple-600" placeholder="Enter your email" required>
                </div>
                <div>
                    <label for="message-title" class="block text-gray-700 font-semibold mb-1">Message Title</label>
                    <input required type="text" id="message-title" name="title" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-purple-600" placeholder="Enter the message title" required>
                </div>
                <div>
                    <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                    <input required type="text" id="description" name="description" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-purple-600" placeholder="Enter your message" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700 w-full">Submit Request</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-10 sm:py-12 text-center bg-white">
        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
            Do You Have Any Questions?
        </h2>
        <p class="text-lg sm:text-xl text-gray-600 mb-6">Get Help From Us</p>
        <div
            class="flex flex-col sm:flex-row justify-center gap-4 max-w-xl mx-auto">
            <input
                type="email"
                placeholder="Enter your email address..."
                class="border border-gray-300 rounded p-2 sm:p-3 w-full sm:w-2/3 focus:outline-none bg-purple-50" />
            <button
                class="bg-purple-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded hover:bg-purple-700"
                type="submit">
                Submit
            </button>
        </div>
        <p class="mt-4 text-gray-600">Contact with our support team</p>
    </section>

    <!-- Footer -->
    <footer>
        <div class="bg-purple-100 text-center py-4">
            <p class="text-gray-600">© 2023 HiveEstate. All rights reserved.</p>
    </footer>
    <!-- Bottom Navigation Menu (Mobile Only) -->
    <nav
        class="fixed bottom-0 left-0 w-full bg-purple-100 border-t border-gray-200 flex justify-around items-center py-3 md:hidden z-20">
        <a
            href="home"
            class="flex flex-col items-center text-gray-600 hover:text-purple-600">
            <span class="text-2xl">🏠</span>
            <span class="text-xs">Home</span>
        </a>
        <a
            href="property"
            class="flex flex-col items-center text-gray-600 hover:text-purple-600">
            <span class="text-2xl">🏢</span>
            <span class="text-xs">Property</span>
        </a>
        <a
            href="about"
            class="flex flex-col items-center text-gray-600 hover:text-purple-600">
            <span class="text-2xl">❓</span>
            <span class="text-xs">About</span>
        </a>
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username'] == 'agent' || $_SESSION['username'] == 'member') {
                echo ' <a href="user_profile" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
        <span class="text-2xl">👤</span>
        <span class="text-xs">Profile</span>
      </a>';
            } else {
                echo ' <a href="admin_profile" class="flex flex-col items-center text-gray-600 hover:text-purple-600">
        <span class="text-2xl">👤</span>
        <span class="text-xs">Profile</span>
      </a>';
            }
        }
        ?>
</body>

</html>