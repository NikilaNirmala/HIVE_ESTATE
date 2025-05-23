<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/hive_app/css/tailwind.css" rel="stylesheet">
  <title>HiveEstate - Add a Property</title>
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

  <!-- Add Property Section -->
  <section class="bg-purple-100 py-16 text-center">
    <div class="max-w-2xl mx-auto px-4 bg-white p-6 rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold mb-6">Add a Property</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col items-center">
          <img
            src="https://placehold.co/150x200"
            alt="Property"
            class="w-48 h-64 object-cover rounded mb-2" />
          <button
            class="bg-blue-600 text-white px-4 py-2 rounded mt-2 hover:bg-blue-700">
            Add Image
          </button>
        </div>
        <div>
          <?php
          if (isset($_SESSION['Message'])) {
            echo "<p class='mt-4 text-red-600'>{$_SESSION['Message']}</p>";
            $_SESSION['Message'] = null;
            header("refresh:4");
          };
          ?>
          <form action="post_property" method="post">
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Property Title</label>
              <input
                name="property_title"
                minlength="8"
                required
                maxlength="20"
                type="text"
                placeholder="Enter the property title"
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none" />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
              <input
                name="location"
                minlength="3"
                required
                maxlength="20"
                type="text"
                placeholder="Enter the property title"
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none" />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
              <input
                name="country"
                minlength="8"
                required
                maxlength="20"
                type="text"
                placeholder="Enter the property title"
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none" />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Property type</label>
              <select name="property_type"
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none">
                <option value="apartment">Apartment</option>
                <option value="building">Building</option>
                <option value="villa">Villa</option>
              </select>
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Measurement of the property</label>
              <input
                name="measurement"
                required
                type="number"
                placeholder="Measurement of the property"
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none" />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
              <input
                name="price"

                required
                type="number"
                placeholder="Enter the price (Rs)"
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none" />
            </div>
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
              <input
                minlength="60"
                name="property_description"
                required
                type="text"
                placeholder="Enter a description for the property...."
                class="w-full p-2 border border-purple-200 rounded bg-purple-50 focus:outline-none" />
            </div>
            <button
              class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">
              Post
            </button>
          </form>
          <div class="flex justify-center mt-6">
            <div>
              <a href="my_ads">
                <button
                  class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700">
                  Discard
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
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
        class="bg-purple-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded hover:bg-purple-700">
        Submit
      </button>
    </div>
    <p class="mt-4 text-gray-600">Contact with our support team</p>
  </section>
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