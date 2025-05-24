<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>HiveEstate - Find Comfort and Luxury</title>
  <link href="/hive_app/css/tailwind.css" rel="stylesheet">


</head>

<body class="bg-white text-zinc-800 font-sans">
  <!-- Header -->
  <header
    class="header-profile">
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

  <!-- Hero Section -->
  <section class="flex flex-col bg-purple-100 py-16 text-center relative">
    <div class="mx-auto"><img src="/hive_app/public/images/mainImage.png" alt="" class=" w-[600px]" /></div>
    <h1 class="text-4xl sm:text-5xl font-bold text-gray-800 mb-4">
      Find Comfort and Luxury
    </h1>
    <p class="text-lg sm:text-xl text-gray-600 mb-6">
      Explore our curated selection of exquisite properties meticulously
      tailored to your needs.
    </p>

    <!-- Placeholder for house image -->
    <div class="absolute inset-0 flex justify-center items-center">

    </div>
  </section>

  <!-- Discover Section -->
  <section class="py-10 sm:py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        Discover Where Dreams Live
      </h2>
      <p class="text-gray-600 mb-6">
        Whether it’s a charming cottage, a lavish estate, or our expert team
        supports you at every step, turning your dream property into reality.
      </p>
      <div class="flex justify-center text-gray-600 mb-6">
        <span><b>8K+</b> Houses</span><span class="mx-4"><b>6K+</b> Houses Sold</span><span><b>2K+</b> Trusted Agents</span>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="py-10 sm:py-12 bg-purple-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        Why Choose Us
      </h2>
      <p class="text-gray-600 mb-6">
        Guiding You to the Perfect Property with Trust, and Personalized Care.
      </p>
      <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
        <div
          class="bg-purple-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow">
          <div class="w-12 h-12 bg-gray-300 rounded-full mx-auto mb-4"><img src="/hive_app/public/images/location.jpg" alt=""></div>
          <!-- Placeholder for icon -->
          <h3 class="text-lg font-semibold">Expert Guidance</h3>
          <p class="text-gray-600">
            Let our HiveEstate simplify your property journey with trusted
            expertise.
          </p>
        </div>
        <div
          class="bg-purple-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow">
          <div class="w-12 h-12 bg-gray-300 rounded-full mx-auto mb-4"><img src="/hive_app/public/images/personalized.jpg" alt=""></div>
          <!-- Placeholder for icon -->
          <h3 class="text-lg font-semibold">Personalized Service</h3>
          <p class="text-gray-600">
            Ensuring a hassle-free and tailored experience to commit security.
          </p>
        </div>
        <div
          class="bg-purple-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow">
          <div class="w-12 h-12 bg-gray-300 rounded-full mx-auto mb-4"><img src="/hive_app/public/images/sec.jpg" alt=""></div>
          <!-- Placeholder for icon -->
          <h3 class="text-lg font-semibold">Unmatched Security</h3>
          <p class="text-gray-600">
            Experience peace of mind with our commitment to unmatched
            security.
          </p>
        </div>
        <div
          class="bg-purple-100 p-6 rounded-lg shadow hover:shadow-lg transition-shadow">
          <div class="w-12 h-12 bg-gray-300 rounded-full mx-auto mb-4"><img src="/hive_app/public/images/support.jpg" alt=""></div>
          <!-- Placeholder for icon -->
          <h3 class="text-lg font-semibold">Exceptional Support</h3>
          <p class="text-gray-600">
            Delivering peace of mind and responsive support and assistance.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Residences Section -->
  <section class="py-10 sm:py-12">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        Our Popular Residences
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div
          class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
          <img
            src="/hive_app/public/images/Maskgroup.jpg"
            alt="Residence"
            class="w-full h-40 object-cover rounded-t-lg" />
          <h3 class="text-lg font-semibold mt-2">
            San Francisco, California
          </h3>
          <p class="text-gray-600">$2,500,000</p>
        </div>
        <div
          class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
          <img
            src="/hive_app/public/images/Maskgroup.jpg"
            alt="Residence"
            class="w-full h-40 object-cover rounded-t-lg" />
          <h3 class="text-lg font-semibold mt-2">
            Beverly Hills, California
          </h3>
          <p class="text-gray-600">$1,800,000</p>
        </div>
        <div
          class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
          <img
            src="/hive_app/public/images/Maskgroup.jpg"
            alt="Residence"
            class="w-full h-40 object-cover rounded-t-lg" />
          <h3 class="text-lg font-semibold mt-2">Palo Alto, California</h3>
          <p class="text-gray-600">$3,700,000</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-10 sm:py-12 bg-purple-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        What People Say About HiveEstate
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div
          class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
          <img
            src="/hive_app/public/images/ch1.jpg"
            alt="Testimonial"
            class="w-16 h-16 object-cover rounded-full mx-auto mb-2" />
          <h3 class="text-lg font-semibold">Sarah Nguyen</h3>
          <p class="text-gray-600">
            HiveEstate went above and beyond. Their team made the property
            search in the Bay Area their perfect place with attention to
            detail that set them apart.
          </p>
          <div class="flex justify-center mt-2">
            <span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span>
          </div>
        </div>
        <div
          class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
          <img
            src="/hive_app/public/images/ch2.jpg"
            alt="Testimonial"
            class="w-16 h-16 object-cover rounded-full mx-auto mb-2" />
          <h3 class="text-lg font-semibold">Michael Rodriguez</h3>
          <p class="text-gray-600">
            I had an amazing experience with HiveEstate. Highly recommend for
            anyone looking for personalized property in no time.
          </p>
          <div class="flex justify-center mt-2">
            <span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span>
          </div>
        </div>
        <div
          class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow">
          <img
            src="/hive_app/public/images/ch3.jpg"
            alt="Testimonial"
            class="w-16 h-16 object-cover rounded-full mx-auto mb-2" />
          <h3 class="text-lg font-semibold">Emily Johnson</h3>
          <p class="text-gray-600">
            HiveEstate turned my dream of owning an incredible support guided
            me with my new home.
          </p>
          <div class="flex justify-center mt-2">
            <span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span><span class="text-yellow-400">★</span>
          </div>
        </div>
      </div>
      <div class="flex justify-center mt-6">
        <button class="bg-gray-300 text-gray-600 px-2 py-1 rounded-l mr-1">
          ←
        </button>
        <button class="bg-gray-300 text-gray-600 px-2 py-1 rounded-r">
          →
        </button>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="py-10 sm:py-12 text-center bg-purple-50">
    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
      Do You Have Any Questions?
    </h2>
    <p class="text-lg sm:text-xl text-gray-600 mb-6">Get Help From Us</p>
    <div
      class="flex flex-col sm:flex-row justify-center gap-4 max-w-xl mx-auto">
      <input
        type="email"
        placeholder="Enter your email address..."
        class="border border-gray-300 rounded p-2 sm:p-3 w-full sm:w-2/3 focus:outline-none" />
      <button
        class="bg-purple-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded hover:bg-purple-700">
        Submit
      </button>
    </div>
    <p class="mt-4 text-gray-600">Contact with our support team</p>
  </section>

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