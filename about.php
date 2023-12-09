<!DOCTYPE html>
<html lang=" en-US">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>About</title>

  <!-- TailwindCSS and Inter Font-->
  <link rel="stylesheet" href="assets/css/tailwind.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

  <!-- fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

  <!-- highlight.js -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/github-dark-dimmed.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
  <script>hljs.highlightAll();</script>

</head>

<body class="font-sans mx-auto max-w-prose">
  <div class="pt-12 pb-4">

    <nav class="flex flex-wrap items-center justify-center px-2 mb-6">
      <div class="container px-4 mx-auto flex flex-wrap items-center justify-center">
        <div class="w-full relative flex justify-center">
          <button type="button" onclick="toggleNavbar('navbar')"
            class="rounded-md inline-flex items-center justify-center text-gray-500 md:hidden" aria-expanded="false">
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
            <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase" href="./">
              Home
            </a>
            <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase" href="docs">
              Docs
            </a>
            <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase" href="blog">
              Blogs
            </a>
            <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase" href="tag">
              Tag
            </a>


          </div>
        </div>
      </div>
    </nav>


    <div class="px-4 pt-4 prose prose-indigo">
      <h1 class="text-center mt-6 mb-6">About</h1>

      <p>
        I specialize in crafting the foundational elements that power applications. I design APIs, manage databases, and
        ensure seamless communication between different parts of the software is secure, scalable, and optimized user
        experiences. you can see more about me on my <a href="">cv</a>.
        <br>
        <br>
        I like to turn bugs into 'undocumented features.' When I'm not debugging, I'm probably debugging... my life
        choices, also sometime im trying to teach random cat on street how to fetch a git branch.
        <br>
        <br>
        You can see what project i bould during my time as backend developer on <a href="docs">docs</a> or if you have
        to much time and dont know what to do, you can see my <a href="blog">blog</a> post.
      </p>


    </div>

  </div>
</body>

<script>
  function toggleNavbar(collapseID) {
    document.getElementById(collapseID).classList.toggle("hidden");
    document.getElementById(collapseID).classList.toggle("block");
  }
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