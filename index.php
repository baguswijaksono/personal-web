<!DOCTYPE html>
<html lang=" en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>Bagus Muhammad Wijaksono</title>

  <!-- TailwindCSS and Inter Font-->
  <link rel="stylesheet" href="assets/css/tailwind.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  
 </head>
 
<body class="font-sans mx-auto max-w-prose">
  <div class="pt-12 pb-4">
    
  <nav class="flex flex-wrap items-center justify-center px-2 mb-6">
    <div class="container px-4 mx-auto flex flex-wrap items-center justify-center">
        <div class="w-full relative flex justify-center">
            <button type="button" onclick="toggleNavbar('navbar')"
                class="rounded-md inline-flex items-center justify-center text-gray-500 md:hidden"
                aria-expanded="false">
                <span class="sr-only">Open menu</span>
                <!-- Heroicon name: outline/menu -->
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div class="flex hidden md:block" id="navbar">
            <div class="flex flex-col md:flex-row mr-auto w-full">
                    <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                        href="about">
                        About
                    </a>
                    <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                        href="docs">
                        Docs
                    </a>
                    <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                        href="blog">
                        Blogs
                    </a>
                    <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                        href="tag">
                        Tag
                    </a>
            </div>
        </div>
    </div>
</nav>


<div class="mx-auto text-center prose prose-indigo">
  <div>
    <img class="object-cover mx-auto h-36 w-36 rounded-full" src="https://static.miraheze.org/bluearchivewiki/c/c2/Hoshino_%28Swimsuit%29.png?version=25af5c07790b064540722a394002a255"
      alt="author profile image">
    <h1>Bagus Wijaksono</h1>
  </div>
  
  <p class="text-gray-500 pb-4">Software Engineer with over 3 years of experience specializing in backend. Additionally, interested in cybersecurity.</p>
  
</div>
</div>

<section>
  <div class="flex flex-wrap text-center">
    <div class="w-full pt-4">
      <div>
        
        <a href="https://www.youtube.com/channel/UC6lO7NY7ADXzsLFabYqnbzg" target="_blank">
          <button
            class="bg-white text-lightBlue-600 font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
            type="button">
            <i class="fab fa-youtube"></i>
          </button>
        </a>

        
        <a href="https://www.instagram.com/bagusmhdw/" target="_blank">
          <button
            class="bg-white text-blueGray-800 font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
            type="button">
            <i class="fab fa-instagram"></i>
          </button>
        </a>
        
        <a href="https://github.com/baguswijaksono" target="_blank">
          <button
            class="bg-white text-blueGray-800 font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
            type="button">
            <i class="fab fa-github"></i>
          </button>
        </a>
        
        <a href="https://linkedin.com/" target="_blank">
          <button
            class="bg-white text-blueGray-800 font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2"
            type="button">
            <i class="fab fa-linkedin"></i>
          </button>
        </a>
        

      </div>
    </div>
  </div>
</section>

  </div>
</body>

<script>

  /* Function for opning navbar on mobile */
  function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
    /* Function for dropdowns */
    function openDropdown(event, dropdownID) {
      let element = event.target;
      while (element.nodeName !== "A") {
        element = element.parentNode;
      }
      document.getElementById(dropdownID).classList.toggle("hidden");
      document.getElementById(dropdownID).classList.toggle("block");
    }

</script>

</html>