<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/hive_app/css/tailwind.css" rel="stylesheet">
  <title>HiveEstate - Login</title>
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

  <!-- Main Content -->
  <main class="bg-purple-100 py-10 sm:py-12">
    <div class="max-w-md mx-auto px-4">
      <!-- White Rounded Square Wrapper -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Login Header -->
        <div class="text-center mb-8">
          <h1 class="text-xl font-bold text-gray-800">Login</h1>
          <div class="flex justify-center mt-4">
            <img
              src="/hive_app/public/images/hive_logo.png"
              alt="HiveEstate Logo"
              class="h-8" />
          </div>
          <?php
          if (isset($_SESSION['Message'])) {
            echo "<p class='mt-4 text-red-600'>{$_SESSION['Message']}</p>";
            $_SESSION['Message'] = null;
            header("refresh:4");
          };
          ?>
        </div>

        <!-- Login Form -->
        <form class="space-y-4" action='login' method='post'>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
            <input required
              name='username'
              type="text"
              placeholder="Enter username"
              class="w-full p-3 border border-gray-300 rounded bg-purple-50 focus:outline-none" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <select
              name="role"
              class="w-full p-3 border border-gray-300 rounded bg-purple-50 focus:outline-none">
              <option value="member">Member</option>
              <option value="agent">Agent</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input required
              name='password'
              type="password"
              placeholder="Password"
              class="w-full p-3 border border-gray-300 rounded bg-purple-50 focus:outline-none" />
          </div>
          <button
            class="w-full bg-purple-600 text-white px-4 py-3 rounded hover:bg-purple-700">
            Login
          </button>
        </form>
      </div>
    </div>
  </main>

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
  </nav>
</body>

</html>