<!DOCTYPE html>
<html lang=" en-US">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>
        Naya Documentation </title>

    <!-- TailwindCSS and Inter Font-->
    <link rel="stylesheet" href="../assets/css/tailwind.css">
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <div class="flex hidden md:block" id="navbar">
                    <div class="flex flex-col md:flex-row mr-auto w-full">
                        <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                            href="../">
                            Home
                        </a>
                        <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                            href="../about">
                            About
                        </a>
                        <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                            href="../docs">
                            Docs
                        </a>
                        <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                            href="../blog">
                            Blog
                        </a>
                        <a class="text-sm text-gray-500 hover:text-gray-900 px-3 py-2 lg:py-1 mx-auto uppercase"
                            href="../tag">
                            TAG
                        </a>


                    </div>
                </div>
            </div>
        </nav>


        <div class="px-4 pt-4 prose prose-indigo">

            <h1 class="text-center mt-6 mb-6">
                Naya - Multi User Telegram Task Manager Bot </h1>
            <div class="text-center">
                <div
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                    <a class="!no-underline" href="../tag/cyber-security">
                        cyber-security </a>
                </div>
            </div>

            <h2>Overview</h2>
            <p> Naya is a simple Telegram bot designed to manage tasks for multiple users securely. It is built using
                Golang
                programming language, MongoDB for data storage, and employs symmetric encryption for privacy.</p>

            <h2>Repository</h2>
            <p>If you want the code to develop based on your preferences, you can access it <a class="!no-underline"
                    href="https://github.com/baguswijaksono/go-telegram-task-bot">here</a> on GitHub.</p>

            <h2>Features</h2>
            <p>
                <b>Multi-User:</b> Allows multiple users to manage tasks independently. <br>
                <b>Telegram Integration:</b> Utilizes Telegram for task management through chat. <br>
                <b>Encryption:</b> Ensures data security by utilizing symmetric encryption techniques.
            </p>


            <h2>Bot Commands</h2>
            <b>/start:</b> Start interaction with the bot. <br>

            <b>/add</b>
            <task_description>: Add a new task.<br>
                <img class="rounded" src="../assets/img/naya/nayaadd.png" alt="">
                <b>/task:</b> View all tasks.<br>
                <img class="rounded" src="../assets/img/naya/nayatask.png" alt="">
                <b>/done</b>
                <task_number>: Mark a task as complete.<br>
                    <img class="rounded" src="../assets/img/naya/nayadone.png" alt="">
                    <b>/delete</b>
                    <task_number>: Remove a task.<br>
                        <img class="rounded" src="../assets/img/naya/nayadelete.png" alt="">

                        <h2>How the encryption work ?</h2>
                        <p>Naya employs symmetric encryption techniques to secure user data. The encryption keys no
                            stored in Databases so it's managed
                            securely within the application.</p>
                        <img src="../assets/img/naya/naya_enc.png" alt="">

                        <h2>How it look like in database ? </h2>
                        <p>the database only sotre chipertext version of userID and UserTask.</p>
                        <img class="rounded" src="../assets/img/naya/dblook.png" alt="">


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