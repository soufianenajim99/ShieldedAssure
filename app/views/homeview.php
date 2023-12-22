<!DOCTYPE html>
<html lang="en" data-theme="cupcak">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="dist/style.css" />
    <title>E-bank-V2</title>
</head>

<body>
    <header>
        <div class="navbar bg-base-100">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 font-bold">
                        <li><a>HOME</a></li>
                        <li><a>CONTACT</a></li>
                        <li><a>ABOUT US</a></li>
                    </ul>
                </div>
                <a class="btn btn-ghost text-xl">E-Bank</a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1 font-bold">
                    <li><a>HOME</a></li>
                    <li><a>CONTACT</a></li>
                    <li><a>ABOUT US</a></li>
                </ul>
            </div>
            <div class="navbar-end">
                <a class="btn" href="app/views/login.php">LOGIN</a>
            </div>
        </div>
    </header>
    <section>
        <div class="hero min-h-screen" style="
          background-image: url(public/img/132242647-banking-theme-cartoon-bank-building-with-dollars-and-coin-stack-isolated-over-white-background.jpg);
        ">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-center text-neutral-content">
                <div class="max-w-md">
                    <h1 class="mb-5 text-5xl font-bold">E-Bank Bank of Tomorrow</h1>
                    <p class="mb-5">
                        Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda
                        excepturi exercitationem quasi. In deleniti eaque aut repudiandae
                        et a id nisi.
                    </p>
                    <button class="btn btn-primary">Get Started</button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>