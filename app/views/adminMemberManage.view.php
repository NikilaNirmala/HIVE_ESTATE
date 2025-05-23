<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/hive_app/css/tailwind.css" rel="stylesheet">
  <title>HiveEstate - User List</title>
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
    <div class="max-w-4xl mx-auto px-4">
      <!-- White Rounded Square Wrapper -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <!-- User Profile Section -->
        <div class="text-center mb-8">
          <img
            src="https://placehold.co/60x60"
            alt="Emily Johnson"
            class="h-24 w-24 rounded-full mx-auto mb-4" />
          <div>
            <h1 class="text-xl sm:text-2xl font-bold text-gray-800">
              <?= $_SESSION['username'] ?>
            </h1>
            <p class="text-gray-600">HiveAdmin</p>
          </div>
        </div>

        <!-- Navigation Tabs -->
        <div
          class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <a
            href="admin_profile"
            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            My Profile
          </a>
          <a
            href="member_manage"
            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            Users
          </a>
          <a
            href="ads_manage"
            class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
            Ads
          </a>
        </div>

        <!-- User List Table -->
        <div class="overflow-x-auto min-h-[350px]">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-purple-50">
                <th class="p-2">Name</th>
                <th class="p-2">Role</th>
                <th class="p-2">Email</th>
                <th class="p-2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if (isset($_SESSION['user_info'])) {
                foreach ($_SESSION['user_info'] as $user) {
                  echo "<tr class='border-b'>
  <td class='p-2 flex items-center'>
    <span>{$user['username']}</span>
  </td>
  <td class='p-2'>{$user['user_role']}</td>
  <td class='p-2'>{$user['user_email']}</td>
";
                  if ($user['user_status'] == 'active') {
                    echo "<td class='p-2'>
    <form action='block_user' method='post'>
      <button type='submit' name='uid' value='{$user['user_ID']}'
        class='bg-red-500 text-white px-2 py-1 rounded hover:bg-gray-300'>
        Block
      </button>
    </form>
  </td>
</tr>";
                  } else {
                    echo "<td class='p-2'>
    <form action='unblock_user' method='post'>
      <button type='submit' name='uid' value='{$user['user_ID']}'
        class='bg-green-500 text-white px-2 py-1 rounded hover:bg-gray-300'>
        Unblock
      </button>
    </form>
  </td>
</tr>";
                  }
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-purple-100 text-center py-4">
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