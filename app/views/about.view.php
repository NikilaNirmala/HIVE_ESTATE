<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/hive_app/css/tailwind.css" rel="stylesheet">
  <title>HiveEstate - About Us</title>
</head>

<body class="bg-white text-zinc-800 font-sans">
  <!-- Main Container -->
  <div class="min-h-screen bg-white">
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

    <!-- About Us Hero Section -->
    <section class="bg-purple-100 py-12 sm:py-20 text-center flex flex-col items-center">
      <h1 class="text-3xl sm:text-5xl font-bold text-gray-800 mb-4">
        About us
      </h1>
      <img class='w-[600px] h-[400px] sm:w-[800px] sm:h-[500px]'
        src="/hive_app/public/images/aboutMain.png"

        alt="Illustration of a house"
        class="mx-auto mt-6 max-w-full h-auto" />
      <h2 class="text-2xl sm:text-4xl font-bold text-gray-800 mb-4">
        Who we are?
      </h2>
      <p class="text-base sm:text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
        We are hiveEstate. A e-commerce platform providing seamless experience
        through digital means.
      </p>

    </section>

    <!-- Our Mission Section -->
    <section class="py-10 sm:py-12 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        Our Mission
      </h2>
      <p class="text-base sm:text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
        We are entirely dedicated for providing better real estate services
        with rich information and improving accessibility to different users
        without overwhelming them.
      </p>
      <img
        src="/hive_app/public/images/house.png"
        alt="Mission Illustration"
        class="mx-auto mt-6 w-[600px]" />
    </section>

    <!-- Why Choose Us Section -->
    <section class="py-10 sm:py-12 bg-purple-100 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        Why Choose Us
      </h2>
      <p class="text-base sm:text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
        Guiding You to the Perfect Property with Expertise, Trust, and
        Personalized Care.
      </p>
      <div
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/location.jpg"
            alt="Expert Guidance Icon"
            class="mx-auto mb-2" />
          <h3 class="text-lg font-bold">Expert Guidance</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            Let our HiveAgents simplify your property journey with trusted
            expertise.
          </p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/personalized.jpg"
            alt="Personalized Service Icon"
            class="mx-auto mb-2" />
          <h3 class="text-lg font-bold">Personalized Service</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            Our services are tailored to your unique needs, ensuring a
            hassle-free journey.
          </p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/sec.jpg"
            alt="Unmatched Security Icon"
            class="mx-auto mb-2" />
          <h3 class="text-lg font-bold">Unmatched Security</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            Experience peace of mind with our steadfast commitment to
            unmatched security.
          </p>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/support.jpg"
            alt="Exceptional Support Icon"
            class="mx-auto mb-2" />
          <h3 class="text-lg font-bold">Exceptional Support</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            Delivering peace of mind through our attentive and responsive
            support.
          </p>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-10 sm:py-12 text-center">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">
        What People Say About HiveEstate
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-5xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/ch1.jpg"
            alt="Sarah Nguyen"
            class="mx-auto mb-2 rounded-full" />
          <h3 class="text-lg font-bold">Sarah Nguyen</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            hiveEstate went above and beyond to understand my needs and
            preferences. Their team made the entire property search effortless
            and helped me secure the perfect place in the Bay Area. Their
            dedication, professionalism, and attention to detail truly set
            them apart.
          </p>
          <div class="flex justify-center mt-2">
            <span class="text-yellow-400">★★★★★ 5.0</span>
          </div>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/ch2.jpg"
            alt="Michael Rodriguez"
            class="mx-auto mb-2 rounded-full" />
          <h3 class="text-lg font-bold">Michael Rodriguez</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            I had an amazing experience with hiveEstate. Their expert team and
            personalized approach made my home search effortless. I found my
            perfect property in no time. Highly recommended!
          </p>
          <div class="flex justify-center mt-2">
            <span class="text-yellow-400">★★★★★ 4.5</span>
          </div>
        </div>
        <div class="bg-white p-6 rounded shadow">
          <img
            src="/hive_app/public/images/ch1.jpg"
            alt="Emily Johnson"
            class="mx-auto mb-2 rounded-full" />
          <h3 class="text-lg font-bold">Emily Johnson</h3>
          <p class="text-sm sm:text-base text-gray-600 mt-2">
            hiveEstate turned my dream of owning a property into reality!
            Their team offered incredible support and guided me seamlessly
            through each step. I’m thrilled with my new home!
          </p>
          <div class="flex justify-center mt-2">
            <span class="text-yellow-400">★★★★★ 5.0</span>
          </div>
        </div>
      </div>
      <div class="flex justify-center mt-4 space-x-2">
        <button class="w-4 h-4 bg-gray-800 rounded-full"></button>
        <button class="w-4 h-4 bg-gray-800 rounded-full"></button>
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
          placeholder="Enter your email..."
          class="border border-gray-300 rounded p-2 sm:p-3 w-full sm:w-2/3" />
        <button
          class="bg-purple-600 text-white px-4 py-2 sm:px-6 sm:py-3 rounded hover:bg-purple-700">
          Submit
        </button>
      </div>
      <p class="mt-4 text-gray-600">Contact with our support team</p>
    </section>
  </div>
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