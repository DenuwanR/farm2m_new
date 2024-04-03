<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Farm2Market: Revolution in Sri Lankan Agriculture </title>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- css link here  -->
    <link rel="stylesheet" href="./public/assets/plugins/css/swipper.css">
    <link rel="stylesheet" href="./public/assets/plugins/css/select2.css">
    <link rel="stylesheet" href="./public/css/tailwind.css">
    <link rel="stylesheet" href="./public/css/styles.css">
    <link rel="stylesheet" href="./public/css/responsive.css">



</head>

<body class="font-display">
    <!-- header area start -->
    <header class="font-display">
        <div id="header-sticky" class="">
            <div class="top-header bg-secondary">
                <div class="container px-3 md:px-5 xl:px-0">
                    <div class="py-3.5 flex justify-center sm:justify-between">
                        <p class="sm:flex gap-2 items-center text-[13px] leading-[110%] text-white opacity-70 hidden">
                        </p>
                        <div>
                            <ul class="flex gap-6 items-center">
                                <li class="inline-flex items-center justify-center">
                                        <div class="font-display font-normal text-[14px] leading-[110%] text-gray-black mt-6 text-center">
                                            <a href="adminLogin.php" class="text-dark-accents font-display font-medium text-[14px] leading-[110%]"> Login as Admin</a></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header bg-grayscales-500 lg:border-none border-b border-grayscales-700">
                <div class="container px-3 md:px-5 xl:px-0">
                    <div class="flex justify-between items-center py-5">
                        <div>
                            <a href=''>
                                <img src="Farm2Market_c-removebg-preview.png" alt=""
                                    style="display: block; margin: 0 auto; align-items: center;">
                            </a>
                        </div>
                    </div>
                    <div class="lg:hidden inline-block hamburger-btn" id="hamburger-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <!-- <div class="overlay" id="overlay"></div> -->
    </header>
    <!-- header area end -->



    <!-- Sign In Form Start -->
    <div class="container py-20">

        <div class="sign_in ">
            <h2 class="text-center text-gray-black xl:text-[32px] text-[20px] font-semibold font-display">Sign In</h2>
            <div class="form">
                <form action="signin.php" method="post" class="">
                    <div class="mb-4">
                        <input type="text" id="email" name="email" placeholder="Email"
                            class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                    </div>

                    <div class="relative">
                        <input type="password" id="pw" name="pw" placeholder="Password"
                            class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out"
                            id="myInput" name="password">
                        <span class="absolute top-[17px] right-5 cursor-pointer ">
                            <!-- <svg id="icon-show" onclick="PasswordIcon()" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z"
                                    stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z"
                                    stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <svg class="mt-[10px]" id="icon-hide" onclick="PasswordIcon()" width="20" height="10"
                                viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252"
                                    stroke="#272343" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg> -->
                        </span>
                    </div>
                  
                    <button class="form_btn w-full">
                        Sign In
                        <span>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 7.5L20.5 12M20.5 12L16 16.5M20.5 12H4.5" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </span>
                    </button>

                </form>
                <div class="font-display font-normal text-[14px] leading-[110%] text-gray-black mt-6 text-center">Don’t
                    have account? <a href="sign-up.html"
                        class="text-dark-accents font-display font-medium text-[14px] leading-[110%]"> Sign Up</a></div>
            </div>
        </div>
    </div>
    <!-- Sign In Form End -->


    <!-- script file here -->
    <script src="./public/assets/plugins/js/jquery.js"></script>
    <script src="./public/assets/plugins/js/swipper.js"></script>
    <script src="./public/assets/plugins/js/select2.js"></script>
    <script src="./public/assets/plugins/js/mixitUp.js"></script>
    <script src="./public/js/app.js"></script>
</body>

</html>