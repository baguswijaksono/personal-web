<?php
include('../dbconfig.php');
if (isset($_GET['project']) && !empty($_GET['project'])) {
    $project = $_GET['project'];
    $result = getDocs($conn, $project)
        ?>
    <!DOCTYPE html>
    <html lang=" en-US">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <?php

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <title>
                    <?php echo $row["docname"]; ?>
                </title>

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
                            <?php echo $row["title"]; ?>
                        </h1>
                        <div class="text-center">
                            <?php
                            $blog_id = $row["id"];
            }
        }

        $result = getTags($conn, $blog_id);
        if ($result->num_rows > 0) {
            while ($tag = $result->fetch_assoc()) {
                ?>
                            <div
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                <a class="!no-underline" href="../tag/<?php echo $tag['tag_name']; ?>">
                                    <?php echo $tag['tag_name']; ?>
                                </a>
                            </div>
                            <?php
            }
        }
        ?>
                </div>
                <?php

                $result2 = getDocs($conn, $project);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo $row2["hypertext"];
                    }
                }

                ?>
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
    <?php
} else {
    include('docslist.php');
}
mysqli_close($conn);
?>