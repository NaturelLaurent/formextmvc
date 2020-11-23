<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- <link rel='stylesheet' type='text/css' media='screen' href='main.css'> -->
        <style>
            <?php include $cssMain; ?>
            <?php include $cssTaillwind; ?>
        </style>
    </head>
    <body>
        <header>
            <nav class="flex items-center justify-between flex-wrap bg-blue-600 p-6">
                <a class="flex items-center flex-no-shrink text-white mr-6" href="/">
                    <span class="font-semibold text-xl tracking-tight">SataWork</span>
                </a>
                <div class="block lg:hidden">
                    <button
                        class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                        <svg class="h-3 w-3" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
                <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                    <div class="text-sm lg:flex-grow">
                        <a
                            href="/articles"
                            class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white mr-4">
                            Article
                        </a>
                        <a
                            href="/profile"
                            class="block mt-4 lg:inline-block lg:mt-0 text-teal-lighter hover:text-white">
                            Profile
                        </a>
                    </div>
                    <div>
                        <a
                            href="/profile"
                            class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4 lg:mt-0">Mon profile
                        </a>
                    </div>
                </div>
            </nav>
        </header>

    
        <div id="app">
            <?php require $body;  ?>
        </div> 

    </body>
</html>