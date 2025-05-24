<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/hive_app/css/tailwind.css" rel="stylesheet">
  <title>HiveEstate - Discover Property</title>
</head>

<body class="bg-white text-zinc-800 font-sans">
  <!-- Header -->
  <header class="bg-purple-100 p-4 flex justify-between items-center">
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
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'agent' || $_SESSION['role'] == 'member') {
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

  <!-- Discover Places Section -->
  <section class="py-10 sm:py-12 text-center bg-purple-100">
    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
      Discover places
    </h1>
    <div class="flex justify-center mb-6">
      <form class="relative w-full max-w-xl" action='search_property' method='post'>
        <input
          type="text"
          placeholder="Search by name......"
          name='search_word'
          class="w-2/3 sm:w-3/4 p-2 sm:p-3 border bg-white border-gray-300 rounded-r text-sm sm:text-base pl-20 sm:pl-24 focus:outline-none" />
        <button type='submit'
          class="absolute right-0 top-0 bg-purple-600 text-white p-2 sm:p-3 rounded-r hover:bg-purple-700 text-sm sm:text-base min-w-[130px]">
          Search
        </button>
      </form>
    </div>
  </section>

  <!-- Property Listings Section -->
  <section class="py-10 sm:py-12">
    <div
      class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-5xl mx-auto">
      <?php
      if (isset($_SESSION['props'])) {
        foreach ($_SESSION['props'] as $property) {
          $title = htmlspecialchars($property['property_title']);
          echo "<div
        class='bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow w-80 text-center'>
        <img
          src='https://placehold.co/300x200'
          alt='Property'
          class='w-full h-40 object-cover rounded-t-lg' />
        <h3 class='text-lg font-semibold mt-2'>{$title}</h3>
        <p class='text-gray-600'>{$property['property_location']}, {$property['property_country']}</p>
        <div class='flex flex-col justify-center text-gray-600 text-sm mt-2'>
          <span>{$property['measurement']} sq.ft</span>
          <span class='text-[1rem] font-bold text-green-600'>
            Rs: {$property['property_price']}.00
          </span>
        </div>
        <div class='flex justify-center mt-4'>
          <form method='post' action='buy_property'>
            <button
              type='submit'
              name='property_ID'
              value='{$property['property_ID']}'
              class='bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-800'>
              Buy Now
            </button>
          </form>
        </div>
      </div>";
        }
      }
      ?>


    </div>
  </section>

  <!-- Contact Section -->
  <section class="py-10 sm:py-12 text-center">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
      Do You Have Any Questions?
    </h2>
    <p class="text-lg sm:text-xl text-gray-600 mb-6">Get Help From Us</p>
    <div
      class="flex flex-col sm:flex-row justify-center gap-4 max-w-xl mx-auto">
      <input
        type="email"
        placeholder="Enter your email address..."
        class="border border-gray-300 rounded p-2 sm:p-3 w-full sm:w-2/3" />
      <button
        class="bg-purple-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded hover:bg-purple-700">
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