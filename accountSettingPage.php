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

    <!-- PHP Start -->
    <?php
    require_once "connection.php";

    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['firstName']) || !isset($_SESSION['lastName'])) {
        // Redirect to the login page if not logged in
        header("Location: sign-in.html");
        exit();
    }

    // Retrieve the first name and last name from session variables
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];

    // Insert address and Mobile to signup

        // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Extract form data
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];

        // Prepare SQL statement
        $sql = "UPDATE signup SET address = ?, mobile = ? WHERE firstName = ? AND lastName = ?";
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param("ssss", $address, $mobile, $firstName, $lastName);
        
        // Execute statement
        // if ($stmt->execute()) {
        //     echo "<script>alert('Update successful');</script>";
        //     header("Location: index.php");
        //     exit();
        // } else {
        //     $message = "Error: " . $sql . "<br>" . $conn->error;
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }

        if ($stmt->execute()) {
            // If insertion is successful, redirect the user
            echo "<script>alert(' successfully.'); window.location.href = 'accountSettingPage.php';</script>";
            exit(); // Ensure that the script stops execution after the redirect
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>
    <!-- PHP End -->
   



</head>

<body class="font-display">



    <!-- header area start -->
    <header class="font-display">
        <div id="header-sticky" class="">
            <div class="top-header bg-secondary">
                <div class="container px-3 md:px-5 xl:px-0">
                    <div class="py-3.5 flex justify-center sm:justify-between">
                        <p class="sm:flex gap-2 items-center text-[13px] leading-[110%] text-white opacity-70 hidden">
                            <!-- <span>
                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.3334 4.5L6.00002 11.8333L2.66669 8.5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span> -->
                            <!-- <span>   </span> -->
                        </p>
                        <div>
                            <ul class="flex gap-6 items-center">
                                <!-- <li class="inline-flex items-center text-white-50 justify-center relative language">
                                    <select class="custom-select" name="state">
                                        <option value="AL">Eng</option>
                                        <option value="WY">Bangla</option>
                                    </select>
                                </li> -->
                                <!-- <li class="inline-flex items-center justify-center">
                                    <a href="#" class="inline-flex gap-2 items-center text-white opacity-70 text-[13px] leading-[130%]">Faqs</a>
                                </li> -->
                                <li class="inline-flex items-center justify-center">
                                    <a href="#contact" class="inline-flex gap-2 items-center text-white opacity-70 text-[13px] leading-[130%]">
                                        <span>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.7" clip-path="url(#clip0_906_1673)">
                                                    <path d="M7.99992 14.6667C11.6818 14.6667 14.6666 11.6819 14.6666 8C14.6666 4.3181 11.6818 1.33333 7.99992 1.33333C4.31802 1.33333 1.33325 4.3181 1.33325 8C1.33325 11.6819 4.31802 14.6667 7.99992 14.6667Z" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8 5.33333V8" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8 10.6667H8.00615" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_906_1673">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                        <span>Need Help</span>
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
                            <a href="index.php">
                                <img src="Farm2Market_c-removebg-preview.png" alt="">
                            </a>
                        </div>
                        <div class="lg:max-w-[413px] lg:block hidden w-full">
                            <div class="relative">
                                <input type="text" id="search" placeholder="search here..." class="block w-full bg-white focus:outline-none border-0 px-4 py-3 rounded-lg focus:ring-2 ring-[#029FAE]">
                                <label for="search" class="absolute right-4 top-3">
                                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5833 17.4167C14.6334 17.4167 17.9167 14.1334 17.9167 10.0833C17.9167 6.03325 14.6334 2.75 10.5833 2.75C6.53325 2.75 3.25 6.03325 3.25 10.0833C3.25 14.1334 6.53325 17.4167 10.5833 17.4167Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19.75 19.25L15.7625 15.2625" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </label>
                            </div>
                        </div>
                        <div class="lg:block hidden">
                            <ul class="flex items-center gap-3">
                                <li class="relative">
                                    <a href="#" class="inline-flex gap-2 bg-white rounded-lg p-[11px]" id="addToCart">
                                        <span><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.52087 2.97916L4.42754 3.30916L5.31029 13.8261C5.3442 14.2399 5.5329 14.6258 5.83873 14.9066C6.14457 15.1875 6.54506 15.3427 6.96029 15.3413H16.9611C17.3587 15.3418 17.7431 15.1986 18.0436 14.9383C18.344 14.6779 18.5404 14.3178 18.5965 13.9242L19.4673 7.91266C19.4905 7.75279 19.482 7.58991 19.4422 7.43333C19.4024 7.27675 19.3322 7.12955 19.2354 7.00015C19.1387 6.87074 19.0175 6.76167 18.8786 6.67917C18.7397 6.59667 18.5859 6.54235 18.426 6.51933C18.3673 6.51291 4.73371 6.50833 4.73371 6.50833" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M12.948 9.89542H15.4899" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.55786 18.5194C6.62508 18.5165 6.69219 18.5273 6.75515 18.551C6.81811 18.5748 6.87562 18.611 6.9242 18.6575C6.97279 18.7041 7.01145 18.76 7.03787 18.8219C7.06428 18.8837 7.0779 18.9503 7.0779 19.0176C7.0779 19.0849 7.06428 19.1515 7.03787 19.2134C7.01145 19.2753 6.97279 19.3312 6.9242 19.3777C6.87562 19.4243 6.81811 19.4605 6.75515 19.4842C6.69219 19.508 6.62508 19.5187 6.55786 19.5158C6.42942 19.5103 6.30808 19.4554 6.21914 19.3626C6.13021 19.2698 6.08057 19.1462 6.08057 19.0176C6.08057 18.8891 6.13021 18.7655 6.21914 18.6726C6.30808 18.5798 6.42942 18.5249 6.55786 18.5194Z" fill="#272343" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8988 18.5194C17.0312 18.5194 17.1583 18.5721 17.252 18.6657C17.3457 18.7594 17.3983 18.8865 17.3983 19.019C17.3983 19.1515 17.3457 19.2786 17.252 19.3723C17.1583 19.4659 17.0312 19.5186 16.8988 19.5186C16.7663 19.5186 16.6392 19.4659 16.5455 19.3723C16.4518 19.2786 16.3992 19.1515 16.3992 19.019C16.3992 18.8865 16.4518 18.7594 16.5455 18.6657C16.6392 18.5721 16.7663 18.5194 16.8988 18.5194Z" fill="#272343" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        
                                    </a>
                                   
                                </li>
                                <li class="inline-flex items-center justify-center">
                                    <a href="#" class="bg-white text-gray-black hover:text-[#007580] rounded-lg p-[11px]">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.63262 10.6315C1.64903 7.56067 2.79762 4.05075 6.02245 3.01217C6.85867 2.74459 7.74676 2.68086 8.61262 2.82629C9.47849 2.97172 10.297 3.32208 10.9999 3.84817C12.3337 2.81692 14.2743 2.46858 15.9683 3.01217C19.1922 4.05075 20.349 7.56067 19.3664 10.6315C17.8355 15.499 10.9999 19.2482 10.9999 19.2482C10.9999 19.2482 4.21478 15.5558 2.63262 10.6315V10.6315Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </li>
                                <li class="relative">
                                    <button class="bg-white text-gray-black hover:text-[#007580] rounded-lg p-[11px] user-profile">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9862 14.0672C7.44053 14.0672 4.4137 14.6034 4.4137 16.7503C4.4137 18.8971 7.42128 19.4526 10.9862 19.4526C14.5309 19.4526 17.5587 18.9154 17.5587 16.7695C17.5587 14.6236 14.5502 14.0672 10.9862 14.0672V14.0672Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9862 11.0055C11.8195 11.0055 12.634 10.7584 13.3268 10.2955C14.0197 9.83255 14.5597 9.17457 14.8785 8.40475C15.1974 7.63492 15.2808 6.78783 15.1183 5.97058C14.9557 5.15334 14.5545 4.40266 13.9653 3.81346C13.3761 3.22426 12.6254 2.82301 11.8081 2.66045C10.9909 2.49789 10.1438 2.58132 9.37397 2.9002C8.60415 3.21907 7.94617 3.75906 7.48324 4.45188C7.02031 5.14471 6.77322 5.95925 6.77322 6.7925C6.76932 7.90581 7.20779 8.97508 7.99218 9.76515C8.77657 10.5552 9.84266 11.0014 10.956 11.0055H10.9862Z" stroke="currentColor" stroke-width="1.429" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    <div class="profile-content">
                                        <ul class="py-3">
                                            <div class="px-3 shadow-[0px_1px_0px_#E1E3E6]">
                                                <li>
                                                    <a href="sign-in.html">Sign In</a>
                                                </li>
                                                <li>
                                                    <a href="sign-up.html">Create a Account</a>
                                                </li>
                                            </div>
                                            <div class="px-3 shadow-[0px_1px_0px_#E1E3E6]">
                                                <li>
                                                    <a href="account-setting.html">Account Settings</a>
                                                </li>
                                                <li>
                                                    <a href="order-history.html">Order History</a>
                                                </li>
                                            </div>
                                            <div class="px-3 shadow-[0px_1px_0px_#E1E3E6]">
                                                <li>
                                                    <a href="wishlist.html">Wishlist</a>
                                                </li>
                                                <li>
                                                    <a href="shopping-cart.html">Shopping Cart</a>
                                                </li>
                                            </div>
                                            <div class="px-3">
                                                <li>
                                                    <a href="#">Logout</a>
                                                </li>
                                            </div>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
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
        <div class="bottom-header bg-white shadow-[0px_1px_0px_#E1E3E6] relative z-30 hidden lg:block">
            <div class="container px-3 md:px-5 xl:px-0">
                <div class="py-3.5 flex justify-between items-center">
                    <div class="flex gap-8 items-center">
                        <div class="relative">
                            <button class="max-h-12 inline-flex items-center justify-center gap-4 py-3.5 px-5 border border-grayscales-700 rounded-md custom-dropdown text-gray-black text-sm leading-4 font-medium font-display">
                                <span class="text-gray-black inline-flex">
                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 2.5H0V0.5H18V2.5Z" fill="currentColor" />
                                        <path d="M18 8.5H0V6.5H18V8.5Z" fill="currentColor" />
                                        <path d="M18 14.5H0V12.5H18V14.5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <span class="text-gray-black inline-flex">All Categories</span>
                            </button>
                            <div class="dropdown-content">
                                <ul class="p-3">
                                    <li>
                                        <a href="#">Vegetables</a>
                                    </li>
                                    <li>
                                        <a href="#">Fruits</a>
                                    </li>
                                    <li>
                                        <a href="#">Organic Foods</a>
                                    </li>
                                    <li>
                                        <a href="#">Meats</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <ul class="lg:flex gap-8 items-center hidden main-menu">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="#about">About</a>
                            </li>
                            <li class="relative">
                                <a href="javascript:void(0);" class="inline-flex gap-2 items-center">Products
                                    <span>
                                    <img src="./public/assets/images/all-img/select-arrow.png" alt="">     
                                    </span>
                                </a>
                                <ul>
                                    <li>
                                        <a href="AuctionList.php">Auction Products</a>
                                    </li>
                                    <li>
                                        <a href="BuyNowList.php">Buy Now Products</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="relative">
                                <a href="javascript:void(0);" class="inline-flex gap-2 items-center">Menu
                                    <span>
                                    <img src="./public/assets/images/all-img/select-arrow.png" alt="">     
                                    </span>
                                </a>
                                <ul>
                                 
                                    <li>
                                        <a href="accountSettingPage.php">Account Setting</a>
                                    </li>
                                    <li>
                                        <a href="products.html">Product List</a>
                                    </li>

                                    <!-- <li>
                                        <a href="product-details.html">Product Details</a>
                                    </li> -->

                                    <li>
                                        <a href="shopping-cart.html">Shopping Cart</a>
                                    </li>
                                    <li>
                                        <a href="wishlist.html">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="checkout-billing.html">Checkout Billing</a>
                                    </li>
                                    <li>
                                        <a href="checkout-shopping.html">Checkout Shoping</a>
                                    </li>
                                    <li>
                                        <a href="logout.php">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                
                            </li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>

         <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                                                                                        <!-- Mobile Menu Area Start -->
    <!-- -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <!-- Mobile Menu Area Start -->
        <div class="nav-menu" id="nav-menu">
            <div class="flex justify-between  items-center px-3 py-4 mb-4">
                <div>
                    <a href="#">
                        <img src="./public/assets/images/all-img/logo-sm.png" alt="">
                    </a>
                </div>
                <ul class="flex items-center gap-3">
                    <li>
                        <a href="#" class="inline-flex gap-2 bg-white rounded-lg p-[11px] relative">
                            <span>
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.52087 2.97916L4.42754 3.30916L5.31029 13.8261C5.3442 14.2399 5.5329 14.6258 5.83873 14.9066C6.14457 15.1875 6.54506 15.3427 6.96029 15.3413H16.9611C17.3587 15.3418 17.7431 15.1986 18.0436 14.9383C18.344 14.6779 18.5404 14.3178 18.5965 13.9242L19.4673 7.91266C19.4905 7.75279 19.482 7.58991 19.4422 7.43333C19.4024 7.27675 19.3322 7.12955 19.2354 7.00015C19.1387 6.87074 19.0175 6.76167 18.8786 6.67917C18.7397 6.59667 18.5859 6.54235 18.426 6.51933C18.3673 6.51291 4.73371 6.50833 4.73371 6.50833" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12.948 9.89542H15.4899" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.55786 18.5194C6.62508 18.5165 6.69219 18.5273 6.75515 18.551C6.81811 18.5748 6.87562 18.611 6.9242 18.6575C6.97279 18.7041 7.01145 18.76 7.03787 18.8219C7.06428 18.8837 7.0779 18.9503 7.0779 19.0176C7.0779 19.0849 7.06428 19.1515 7.03787 19.2134C7.01145 19.2753 6.97279 19.3312 6.9242 19.3777C6.87562 19.4243 6.81811 19.4605 6.75515 19.4842C6.69219 19.508 6.62508 19.5187 6.55786 19.5158C6.42942 19.5103 6.30808 19.4554 6.21914 19.3626C6.13021 19.2698 6.08057 19.1462 6.08057 19.0176C6.08057 18.8891 6.13021 18.7655 6.21914 18.6726C6.30808 18.5798 6.42942 18.5249 6.55786 18.5194Z" fill="#272343" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8988 18.5194C17.0312 18.5194 17.1583 18.5721 17.252 18.6657C17.3457 18.7594 17.3983 18.8865 17.3983 19.019C17.3983 19.1515 17.3457 19.2786 17.252 19.3723C17.1583 19.4659 17.0312 19.5186 16.8988 19.5186C16.7663 19.5186 16.6392 19.4659 16.5455 19.3723C16.4518 19.2786 16.3992 19.1515 16.3992 19.019C16.3992 18.8865 16.4518 18.7594 16.5455 18.6657C16.6392 18.5721 16.7663 18.5194 16.8988 18.5194Z" fill="#272343" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="bg-dark-accents absolute -top-1 right-0 text-white rounded-full px-2 py-1.5 inline-flex justify-center items-center text-[10px] leading-[100%]">2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="bg-white text-gray-black flex hover:text-[#007580] rounded-lg p-[11px]">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.63262 10.6315C1.64903 7.56067 2.79762 4.05075 6.02245 3.01217C6.85867 2.74459 7.74676 2.68086 8.61262 2.82629C9.47849 2.97172 10.297 3.32208 10.9999 3.84817C12.3337 2.81692 14.2743 2.46858 15.9683 3.01217C19.1922 4.05075 20.349 7.56067 19.3664 10.6315C17.8355 15.499 10.9999 19.2482 10.9999 19.2482C10.9999 19.2482 4.21478 15.5558 2.63262 10.6315V10.6315Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </li>
                    <li class="relative">
                        <button class="bg-white text-gray-black hover:text-[#007580] rounded-lg p-[11px] user-profile">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9862 14.0672C7.44053 14.0672 4.4137 14.6034 4.4137 16.7503C4.4137 18.8971 7.42128 19.4526 10.9862 19.4526C14.5309 19.4526 17.5587 18.9154 17.5587 16.7695C17.5587 14.6236 14.5502 14.0672 10.9862 14.0672V14.0672Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9862 11.0055C11.8195 11.0055 12.634 10.7584 13.3268 10.2955C14.0197 9.83255 14.5597 9.17457 14.8785 8.40475C15.1974 7.63492 15.2808 6.78783 15.1183 5.97058C14.9557 5.15334 14.5545 4.40266 13.9653 3.81346C13.3761 3.22426 12.6254 2.82301 11.8081 2.66045C10.9909 2.49789 10.1438 2.58132 9.37397 2.9002C8.60415 3.21907 7.94617 3.75906 7.48324 4.45188C7.02031 5.14471 6.77322 5.95925 6.77322 6.7925C6.76932 7.90581 7.20779 8.97508 7.99218 9.76515C8.77657 10.5552 9.84266 11.0014 10.956 11.0055H10.9862Z" stroke="currentColor" stroke-width="1.429" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                        <div class="profile-content">
                            <ul>
                                <li>
                                    <a href="#">Vegetables</a>
                                </li>
                                <li>
                                    <a href="#">Fruits</a>
                                </li>
                                <li>
                                    <a href="#">Meats</a>
                                </li>
                                <li>
                                    <a href="#">Eggs & Diary Foods</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <span class="hamburger-btn-close bg-[#F7F7F9] text-black w-[44px] h-[44px] rounded-full flex items-center justify-center" id="hamburger-btn-close">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="px-3 mb-4">
                <div class="lg:max-w-[413px] w-full">
                    <div class="relative">
                        <input type="text" placeholder="search here..." class="block w-full bg-grayscales-500 focus:outline-none border-0 px-4 py-3 rounded-lg">
                        <span class="absolute right-4 top-3">
                            <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5833 17.4167C14.6334 17.4167 17.9167 14.1334 17.9167 10.0833C17.9167 6.03325 14.6334 2.75 10.5833 2.75C6.53325 2.75 3.25 6.03325 3.25 10.0833C3.25 14.1334 6.53325 17.4167 10.5833 17.4167Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19.75 19.25L15.7625 15.2625" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
            <!-- menu -->
            <div>
                <nav class="tabs flex flex-row">
                    <button data-target="panel-1" class="tab rounded-none w-1/2 active text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500">
                        Menu
                    </button>
                    <button data-target="panel-2" class="tab rounded-none w-1/2 ext-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none border-b-2 font-medium border-blue-500">
                        Categories
                    </button>
                </nav>
            </div>

            <div id="panels">
                <div class="panel-1 tab-content active">
                    <ul class="flex flex-col items-center">
                        <li class="w-full block">
                            <a href="" class="border-b border-[#029FAE] block px-3 py-2">Home</a>
                        </li>
                        <li class="w-full block">
                            <a href="" class="border-b border-[#029FAE] block px-3 py-2">Shop</a>
                        </li>
                        <li class="w-full block">
                            <a href="" class="border-b border-[#029FAE] block px-3 py-2">Product</a>
                        </li>
                        <li class="w-full block">
                            <a href="" class="border-b border-[#029FAE] block px-3 py-2">Pages</a>
                        </li>
                        <li class="w-full block">
                            <a href="" class="border-b border-[#029FAE] block px-3 py-2">About</a>
                        </li>
                    </ul>
                </div>
                <div class="panel-2 tab-content py-5">
                    <ul>
                        <li>
                            <a href="#" class="border-b border-[#029FAE] block px-3 py-2">Vegetables</a>
                        </li>
                        <li>
                            <a href="#" class="border-b border-[#029FAE] block px-3 py-2">Fruits</a>
                        </li>
                        <li>
                            <a href="#" class="border-b border-[#029FAE] block px-3 py-2">Meats</a>
                        </li>
                        <li>
                            <a href="#" class="border-b border-[#029FAE] block px-3 py-2">Eggs & Diary Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Mobile Menu Area End -->
        <div class="overlay" id="overlay"></div>
    </header>
   <!-- header area end -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb">
        <div class="container">
            <div class="flex items-center gap-1 py-[1.5px]">
                <a href="index.php" class="text-[14px] font-normal leading-[110%] text-dark-gray">Home</a>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.125 5.25L10.875 9L7.125 12.75" stroke="#636270" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                
                <span class="text-[14px] font-medium leading-[110%] font-display text-gray-black inline-block">Account Settings</span>
            </div>

            <h2 class="pt-[13.5px] xl:text-2xl text-[18px] font-semibold text-gray-black font-display">Account Settings</h2>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- user menu start -->
    <div class="user bg-red-600">
        <div class="container">
            <div class="usermenu flex flex-col md:flex-row justify-between md:items-center">
                <!-- Tabs -->
                <ul id="tabs" class="inline-flex flex-col md:flex-row w-full">

                    <li class="border-b-2 border-accents">
                        <a id="default-tab" href="#account_settings" class="text-[#636270] font-medium p-5 border-b border-transparent hover:text-gray-black font-display">Account Settings</a>
                    </li>

                    <li>
                        <a href="#order_history" class="text-[#636270] font-medium p-5 border-b border-transparent hover:text-gray-black font-display">Order History</a>
                    </li>
                    
                    <li>
                        <a href="#order_details" class="text-[#636270] font-medium p-5 border-b border-transparent hover:text-gray-black">Order Details</a>
                    </li>

                    <li>
                        <a href="#wishlist" class="text-[#636270] font-medium p-5 border-b border-transparent hover:text-gray-black font-display">Wishlist</a>
                    </li>
                </ul>
                <a href="logout.php" class="font-display text-[16px] leading-[110%] font-medium capitalize text-[#636270] px-4 py-4 md:px-0">Logout</a>
                
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Tab Contents -->
        <div id="tab-contents">

            <!-- Account Setting Start -->
            <div id="account_settings">
                <div class="container px-3 md:px-5 xl:px-0 py-10">
                    <div class="accout-setting flex flex-col xl:flex-row gap-6">
                        <!-- account inforamation start -->
                        <div class="box xl:w-[536px]">
                            <div class="w-full">
                                <div class="p-6">
                                    <h2 class="text-start xl:text-2xl acc-title text-[22px] text-[#272343] font-medium mb-6 font-display">Account Information</h2>
                                    <form action="account-setting.php" method="POST">
                                        <div class="flex flex-col sm:flex-row gap-5 items-center mb-5">
                                            <div class="w-full">
                                                <!-- Display First Name -->
                                                <input type="text" name="firstName"  class="input-box focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out" value="<?php echo $firstName; ?>" disabled>
                                            </div>
                                            <div class="w-full">
                                                <!-- Display Last Name -->
                                                <input type="text" name="lastName"  class="input-box focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" value="<?php echo $lastName; ?>" disabled>
                                            </div>
                                        </div>
                        
                                        <div class="w-full mb-5">
                                            <input type="text" id="address" name="address"  placeholder="Address" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                                        </div>
                                        <div class="w-full mb-5">
                                            <input type="int" id="mobiel" name="mobile" placeholder="Mobile Number" class="input-box focus:outline-none  focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out">
                                        </div>
                                        <button type="submit" class="btn-primary">Save Changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- account inforamation end -->

                        <div class="flex flex-col md:flex-row gap-6">
                            <!-- user password change start -->
                            <div class="box xl:w-[424px]">
                                <div class="">
                                    <div class="p-6">
                                        <h2 class="text-start xl:text-2xl acc-title text-[22px] text-[#272343] font-medium mb-6 font-display">Change Password</h2>

                                        <div class="relative">
                                            <!-- input-box focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out -->
                                        <form action="changePw.php" method="POST">

                                                <input type="password" placeholder="Current passowrd" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="current_password" name="current_password">
                                                <span class="absolute top-[17px] right-5 cursor-pointer ">

                                                    <svg id="current-icon-show" onclick="currentPasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <svg id="current-icon-hide" onclick="currentPasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>

                                            <div class="relative">
                                                <input type="password" placeholder="New passowrd" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="new_password" name="new_password">
                                                <span class="absolute top-[17px] right-5 cursor-pointer select-none ">

                                                    <svg id="create-icon-show" onclick="CreatePasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>

                                                    <svg id="create-icon-hide" onclick="CreatePasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>

                                            <div class="relative">
                                                <input type="password" placeholder="Confirm passowrd" class="form_password focus:outline-none focus:ring-2 focus:ring-accents font-display transition duration-300 ease-in-out" id="confirm_password" name="confirm_password">
                                                <span class="absolute top-[17px] right-5 cursor-pointer ">
                                                    <svg id="icon-show" onclick="PasswordIcon()" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 4.24902C4.5 4.24902 1.5 11.9999 1.5 11.9999C1.5 11.9999 4.5 19.749 12 19.749C19.5 19.749 22.5 11.9999 22.5 11.9999C22.5 11.9999 19.5 4.24902 12 4.24902V4.24902Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12 15.75C12.9946 15.75 13.9484 15.3549 14.6517 14.6517C15.3549 13.9484 15.75 12.9946 15.75 12C15.75 11.0054 15.3549 10.0516 14.6517 9.34835C13.9484 8.64509 12.9946 8.25 12 8.25C11.0054 8.25 10.0516 8.64509 9.34835 9.34835C8.64509 10.0516 8.25 11.0054 8.25 12C8.25 12.9946 8.64509 13.9484 9.34835 14.6517C10.0516 15.3549 11.0054 15.75 12 15.75V15.75Z" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <svg id="icon-hide" onclick="PasswordIcon()" width="20" height="10" viewBox="0 0 20 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.858 2.93481L18.9963 6.63906" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M12.4547 4.99353L13.1215 8.77578" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M7.53701 4.99133L6.86951 8.77433" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M3.13825 2.9325L0.989502 6.6525" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 0.83252C2.575 2.78252 5.4655 5.25002 10 5.25002C14.5345 5.25002 17.4235 2.78252 19 0.83252" stroke="#272343" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>


                                            <button class="btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- user password change end -->

                            <!-- user profile change start -->
                            <form action="profilePhoto.php" method="post" enctype="multipart/form-data">
                                <div class="box xl:w-[312px]">
                                    <div class="">
                                        <div class="p-6">
                                            <h2 class="xl:text-2xl acc-title text-[22px] text-[#272343] font-medium mb-6 font-display text-center">Change Profile Photo</h2>
                                            
                                            <div class="pb-[26px] mx-auto">                                          
                                                <img class="w-[150px] h-[150px] rounded-full mx-auto object-cover" src="<?php echo $profile_photo; ?>" alt="Image" id="profile-image">
                                            </div>

                                            <div class="flex justify-center pb-3">
                                                <input type="file" id="profile_photo" name="profile_photo" hidden="hidden" accept=".jpeg, .jpg, .png" />
                                                
                                                <label for="profile_photo" id="select-button" class="flex gap-3 items-center transition-all duration-300 hover:bg-[#272343] bg-accents text-white text-base font-semibold py-[17px] px-6 rounded-lg font-display cursor-pointer">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 17H17.5C19.9853 17 22 14.9853 22 12.5C22 10.0147 19.9853 8 17.5 8H17.293C16.64 5.6915 14.5176 4 12 4C9.48245 4 7.35996 5.6915 6.70703 8H6.5C4.01472 8 2 10.0147 2 12.5C2 14.9853 4.01472 17 6.5 17H8" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M12 19.5V9.5M12 9.5L8.5 13M12 9.5L15.5 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Select Photo
                                                </label>
                                                <button type="submit" id="upload-button" class="flex gap-3 items-center transition-all duration-300 hover:bg-[#272343] bg-accents text-white text-base font-semibold py-[17px] px-6 rounded-lg font-display">
                                                    <span>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M16 17H17.5C19.9853 17 22 14.9853 22 12.5C22 10.0147 19.9853 8 17.5 8H17.293C16.64 5.6915 14.5176 4 12 4C9.48245 4 7.35996 5.6915 6.70703 8H6.5C4.01472 8 2 10.0147 2 12.5C2 14.9853 4.01472 17 6.5 17H8" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M12 19.5V9.5M12 9.5L8.5 13M12 9.5L15.5 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </span>
                                                    Upload Now
                                                </button>
                                            </div>
                                            <p class="text-center text-[#636270] text-sm font-display">JPG or PNG. Max size of 500KB</p>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- user profile change end -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- Account Setting End -->


            <!-- order History start -->
            <div id="order_history" class="hidden p-4">
                <div class="container">
                    <div class="shopping-cart-wrapper pt-10 pb-20 flex items-start gap-6">
                        <!-- shopping cart start -->
                        <div class="shopping-cart w-full">
                            <div class="px-6 py-6 overflow-x-auto">
                                <table class="min-w-[1240px] w-full leading-normal">
                                    <thead>
                                        <tr class="">
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[160px]">
                                                Order
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[200px]">
                                                Date
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[140px]">
                                                Total Product
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[120px]">
                                                Toral price
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[100px]">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="text-[#007580] text-[14px] block font-display leading-[120%]  font-medium ">#2485</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="mb-0 block">02 April, 2021</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">05</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">$265.00</a>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="btn-warning px-3 py-2 inline-block text-[#F5813F] text-[14px] leading-[120%] font-display">Pending</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="text-[#007580] block text-[14px] font-display leading-[120%]  font-medium ">#8901</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="mb-0 block">29 May, 2021</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">01</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">$265.00</a>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="btn-success2 px-3 py-2 inline-block text-[#01AD5A] text-[14px] leading-[120%] font-display">Completed</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="text-[#007580] block text-[14px] font-display leading-[120%]  font-medium ">#8901</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="mb-0 block">29 May, 2021</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">01</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">$265.00</a>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="btn-success2 px-3 py-2 inline-block text-[#01AD5A] text-[14px] leading-[120%] font-display">Completed</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="text-[#007580] block text-[14px] font-display leading-[120%]  font-medium ">#8901</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="mb-0 block">29 May, 2021</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">01</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">$265.00</a>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="btn-success2 px-3 py-2 inline-block text-[#01AD5A] text-[14px] leading-[120%] font-display">Completed</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="text-[#007580] block text-[14px] font-display leading-[120%]  font-medium ">#8901</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="mb-0 block">29 May, 2021</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">01</a>
                                            </td>
                                            <td class="py-6 text-sm text-[#272343]">
                                                <a href="order-details.html" class="block">$265.00</a>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <a href="order-details.html" class="btn-success2 px-3 py-2 inline-block text-[#01AD5A] text-[14px] leading-[120%] font-display">Completed</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- order History end -->

            <!-- Order Details start -->
            <div id="order_details" class="hidden p-4">
                <div class="container pt-10 pb-20">
                    <div class="box">
                        <div class="">
                            <div class="flex flex-wrap justify-between items-center px-8 py-[30px]">
                                <h2 class="text-[#272343] font-display xl:text-[32px] text-[18px] font-semibold leading-[110%] capitalize">Order Details</h2>
                                <button class="btn-primary capitalize">back to List</button>
                            </div>
                            <hr class="my-0">
                            <div class="px-8 py-8 flex flex-col md:flex-row md:flex-wrap gap-6 xl:gap-2 xl:justify-between md:items-center">
                                <div class="flex-wrap">
                                    <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Order ID:</p>
                                    <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">#2485</span>
                                </div>
                                <div class="flex-wrap">
                                    <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Date:</p>
                                    <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">02 April, 2021</span>
                                </div>
                                <div class="flex-wrap">
                                    <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Email:</p>
                                    <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">kevin.gilbert@gmail.com</span>
                                </div>
                                <div class="flex-wrap">
                                    <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Total:</p>
                                    <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">$265.00</span>
                                </div>
                                <div class="flex-wrap">
                                    <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Status:</p>
                                    <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">Proccesing</span>
                                </div>
                                <div class="flex-wrap">
                                    <p class="text-[#9A9CAA] font-display text-[14px] leading-[100%] capitalize pb-[10px]">Payment Method:</p>
                                    <span class="text-gray-black font-display text-[20px] leading-[120%] font-medium">Paypal</span>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="overflow-x-auto">
                                <table class="min-w-full leading-normal">
                                    <thead class="bg-off-white">
                                        <tr class="">
                                            <th class="pt-4 pb-4 px-8 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[305px]">
                                                Product
                                            </th>
                                            <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[140px]">
                                                Price
                                            </th>
                                            <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[145px]">
                                                Quantity
                                            </th>
                                            <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[175px]">
                                                Subtotal
                                            </th>
                                            <th class="pt-4 pb-4 border-b border-[#E1E3E6] text-left text-lg font-medium leading-[100%] text-[#272343] uppercase tracking-wider w-[295px]">
                                                Info
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="">
                                            <td class="text-sm px-6 pt-6">
                                                <div class="flex justify-between items-center">
                                                    <div class="flex items-center gap-3">
                                                        <div>
                                                            <img src="./public/assets/images/all-img/product1.png" alt="">
                                                        </div>

                                                        <p>Isolate Sofa Chair</p>

                                                    </div>

                                                </div>
                                            </td>
                                            <td class="text-sm">
                                                <p class="mb-0">$145.00</p>
                                            </td>
                                            <td class="text-sm">
                                                <p>x1</p>
                                            </td>
                                            <td class="text-sm">
                                                <p>$145.00</p>
                                            </td>
                                            <td class="text-sm pt-6">
                                                <div class="mb-6">
                                                    <ul class="p-0 m-0 ">
                                                        <li class="">
                                                            <p class="text-[15px] inline-flex gap-2 items-center">
                                                                <span class="text-[#9A9CAA]">Color:</span><span class="text-[#636270] font-medium">Black</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="text-[15px] inline-flex gap-2 items-center">
                                                                <span class="text-[#9A9CAA]">Material:</span><span class="text-[#636270] font-medium">Polyester, Fabric</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="text-[15px] inline-flex gap-2 items-center">
                                                                <span class="text-[#9A9CAA]">Brand:</span><span class="text-[#636270] font-medium">Purefit</span>
                                                            </p>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="">
                                            <td class="text-sm px-6 ">
                                                <div class="flex justify-between items-center">
                                                    <div class="flex items-center gap-3">
                                                        <div>
                                                            <img src="./public/assets/images/all-img/product1.png" alt="">
                                                        </div>

                                                        <p>Isolate Sofa Chair</p>

                                                    </div>

                                                </div>
                                            </td>
                                            <td class="text-sm">
                                                <p class="mb-0">$145.00</p>
                                            </td>
                                            <td class="text-sm">
                                                <p>x1</p>
                                            </td>
                                            <td class="text-sm">
                                                <p>$145.00</p>
                                            </td>
                                            <td class="text-sm pt-6">
                                                <div class="mb-6">
                                                    <ul class="p-0 m-0">
                                                        <li class="">
                                                            <p class="text-[15px] inline-flex gap-2 items-center">
                                                                <span class="text-[#9A9CAA]">Color:</span><span class="text-[#636270] font-medium">Black</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="text-[15px] inline-flex gap-2 items-center">
                                                                <span class="text-[#9A9CAA]">Material:</span><span class="text-[#636270] font-medium">Polyester, Fabric</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="text-[15px] inline-flex gap-2 items-center">
                                                                <span class="text-[#9A9CAA]">Brand:</span><span class="text-[#636270] font-medium">Purefit</span>
                                                            </p>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <hr class="my-0">

                        <div class="px-8 py-8 flex flex-col md:flex-row md:flex-wrap gap-y-6 justify-between md:items-center">

                            <div>
                                <h2 class="text-gray-black font-medium font-display xl:text-[32px] text-[20px] leading-[110%] capitalize ">Billing address</h2>
                                <p class="font-display text-[16px] leading-[120%] font-normal text-[#272343] pt-5 pb-2">Kevin Gilbert</p>
                                <p class="text-[#636270] text-[14px] leading-[150%] font-display font-normal pb-4">
                                    4140 Parker Rd. Allentown, New Mexico 31134
                                </p>
                                <p class="text-[#636270] text-[14px] leading-[100%] font-display font-normal pb-4">kevin.gilbert@gmail.com</p>
                                <span class="text-[#636270] text-[14px] leading-[100%] font-display font-normal">+8801497 548244</span>
                            </div>

                            <div>
                                <h2 class="text-gray-black font-medium font-display xl:text-[32px] text-[20px] leading-[110%] capitalize">Shipping address</h2>
                                <p class="font-display text-[16px] leading-[120%] font-normal text-[#272343] pt-5 pb-2">Kevin Gilbert</p>
                                <p class="text-[#636270] text-[14px] leading-[150%] font-display font-normal pb-4">
                                    4140 Parker Rd. Allentown, New Mexico 31134
                                </p>
                                <p class="text-[#636270] text-[14px] leading-[100%] font-display font-normal pb-4">kevin.gilbert@gmail.com</p>
                                <span class="text-[#636270] text-[14px] leading-[100%] font-display font-normal">+8801497 548244</span>
                            </div>

                            <div class="px-6 py-6 bg-off-white rounded-lg max-w-[348px] w-full">
                                <div class="">

                                    <div class="flex justify-between pb-4">
                                        <p>Subtotal</p>
                                        <p>$1,435.00</p>
                                    </div>
                                    <div class="flex justify-between pb-4">
                                        <p>discount</p>
                                        <p>26%</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <p>shipping</p>
                                        <p>Free</p>
                                    </div>
                                    <hr>
                                    <div class="flex justify-between">
                                        <p class="text-[18px] font-display text-dark-gray ">Total:</p>
                                        <p class="text-[22px] font-display leading-[120%] font-sem">$1026.23</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Details end -->

            <!-- wishlist start -->
            <div id="wishlist" class="hidden">
                <section>
                    <div class="container px-3 md:px-5 xl:px-0 xl:pt-10 xl:pb-20 py-8">
                        <!-- shopping cart start -->
                        <div class="shopping-cart">
                            <div class="px-6 py-6 overflow-x-auto">
                                <table class="min-w-[872px] w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[340px]">
                                                Products
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider w-[104px]">
                                                Price
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider">
                                                Stock Status
                                            </th>
                                            <th class="pb-6 border-b border-[#E1E3E6] text-left text-xs font-semibold text-[#272343] uppercase tracking-wider">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-6 text-sm">
                                                <div class="flex gap-2 items-center">
                                                    <button class="p-2">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2 2L6.00003 6M6.00003 6L10 2M6.00003 6L2 10M6.00003 6L10 10" stroke="#9A9CAA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                    <div class="w-[70px] h-[70px]">
                                                        <img class="w-full h-full rounded-lg" src="./public/assets/images/all-img/shopping-cart-01.png" alt="" />
                                                    </div>
                                                    <div class="ml-1">
                                                        <p class="mb-0 text-[#272343] text-sm">Sofa for Living Room</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <p class="mb-0">$250.00</p>
                                            </td>
                                            <td class="py-6 text-sm">
                                                <p class="text-[#01AD5A] font-semibold">In Stock</p>
                                            </td>
                                            <td class="py-6 text-sm text-right">
                                                <button class="mt-6 bg-accents hover:bg-[#272343]  py-[17px] px-6 rounded-lg text-[18px] font-semibold font-display leading-[110%] transition-all duration-300 text-gray-white text-center capitalize">Add to cart</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pb-6 text-sm">
                                                <div class="flex gap-2 items-center">
                                                    <button class="p-2">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2 2L6.00003 6M6.00003 6L10 2M6.00003 6L2 10M6.00003 6L10 10" stroke="#9A9CAA" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                    <div class="w-[70px] h-[70px]">
                                                        <img class="w-full h-full rounded-lg" src="./public/assets/images/all-img/shopping-cart-01.png" alt="" />
                                                    </div>
                                                    <div class="ml-1">
                                                        <p class="mb-0 text-[#272343] text-sm">Sofa for Living Room</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pb-6 text-sm">
                                                <p class="mb-0">$250.00</p>
                                            </td>
                                            <td class="pb-6 text-sm">
                                                <p class="text-[#F05C52] font-semibold">Out of stock</p>
                                            </td>
                                            <td class="pb-6 text-sm text-right">
                                                <button class="bg-off-white py-[17px] px-6 rounded-lg text-[18px] font-semibold font-display leading-[110%] text-[#9A9CAA] text-center capitalize">Add to cart</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- shopping cart end -->
                    </div>
                </section>
            </div>
            <!-- wishlist end -->

        </div>
    </div>
    <!-- user menu end -->

  <!-- footer area start -->
  <footer>
        <section id="contact">
        <div class="footer-top xl:pt-20 xl:pb-[60px] py-6 sm:py-8 md:py-12 shadow-[inset_0px_1px_0px_#E1E3E6]">
            <div class="container px-3 md:px-5 xl:px-0">
                <div class=" flex flex-wrap gap-y-6 justify-between">
                    <div class="footer-widget max-w-[350px]">
                        <div class="lg:mb-6 mb-4">
                            <a href="#">
                                <img src="Farm2Market_c-removebg-preview.png" alt="">
                            </a>
                        </div>
                        <p class="lg:mb-6 mb-4 text-gray-black text-base">At Farm2Market, we cultivate connections between farmers and buyers, ensuring fresh harvests reach your table with transparency and trust.</p>
                        <ul class="flex gap-1">
                            <li>
                                <a href="#" class="text-[#636270] p-[11px] rounded-full border border-transparent hover:text-[#007580] hover:border-[#007580] transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1101_2875)">
                                            <path d="M16 8C16 3.58167 12.4183 0 8 0C3.58167 0 0 3.58167 0 8C0 11.993 2.92533 15.3027 6.75 15.9027V10.3127H4.71867V8H6.75V6.23733C6.75 4.23267 7.94433 3.125 9.77167 3.125C10.6467 3.125 11.5623 3.28133 11.5623 3.28133V5.25H10.5537C9.56 5.25 9.25 5.86667 9.25 6.5V8H11.4687L11.114 10.3127H9.25V15.9027C13.0747 15.3027 16 11.9927 16 8Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1101_2875">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-[#636270] p-[11px] rounded-full border border-transparent hover:text-[#007580] hover:border-[#007580] transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1101_2879)">
                                            <path d="M5.03333 14.5001C11.07 14.5001 14.3723 9.49813 14.3723 5.16146C14.3723 5.0208 14.369 4.87713 14.3627 4.73646C15.0052 4.27179 15.5596 3.69621 16 3.0368C15.4017 3.3028 14.7667 3.4768 14.116 3.55213C14.8008 3.14166 15.3136 2.49681 15.5593 1.73713C14.915 2.11902 14.2104 2.38843 13.4757 2.5338C12.9807 2.00757 12.3261 1.65911 11.6132 1.54228C10.9002 1.42546 10.1687 1.54679 9.53161 1.88752C8.89456 2.22824 8.38752 2.76937 8.08891 3.42721C7.79031 4.08506 7.71677 4.82296 7.87967 5.5268C6.575 5.46133 5.29865 5.12242 4.13336 4.53206C2.96806 3.94169 1.93984 3.11303 1.11533 2.0998C0.696305 2.82229 0.568091 3.67723 0.756747 4.49086C0.945403 5.30449 1.43677 6.01576 2.131 6.48013C1.60977 6.46361 1.09995 6.3233 0.643667 6.0708V6.11146C0.643231 6.86962 0.905349 7.60455 1.38547 8.19131C1.86559 8.77808 2.53409 9.18048 3.27733 9.33013C2.79463 9.46221 2.28801 9.48149 1.79667 9.38646C2.00644 10.0385 2.41454 10.6087 2.964 11.0176C3.51346 11.4266 4.17688 11.6537 4.86167 11.6675C4.18054 12.2026 3.40049 12.5981 2.56623 12.8313C1.73197 13.0644 0.859899 13.1306 0 13.0261C1.50191 13.9895 3.24899 14.5012 5.03333 14.5001Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1101_2879">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-[#636270] p-[11px] rounded-full border border-transparent hover:text-[#007580] hover:border-[#007580] transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.6667 4.66667C10.6667 4.48986 10.7369 4.32029 10.8619 4.19526C10.9869 4.07024 11.1565 4 11.3333 4C11.5101 4 11.6797 4.07024 11.8047 4.19526C11.9298 4.32029 12 4.48986 12 4.66667C12 4.84348 11.9298 5.01305 11.8047 5.13807C11.6797 5.2631 11.5101 5.33333 11.3333 5.33333C11.1565 5.33333 10.9869 5.2631 10.8619 5.13807C10.7369 5.01305 10.6667 4.84348 10.6667 4.66667Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99998 4.83301C7.16013 4.83301 6.35467 5.16664 5.76081 5.7605C5.16694 6.35437 4.83331 7.15982 4.83331 7.99967C4.83331 8.83953 5.16694 9.64498 5.76081 10.2388C6.35467 10.8327 7.16013 11.1663 7.99998 11.1663C8.83983 11.1663 9.64529 10.8327 10.2392 10.2388C10.833 9.64498 11.1666 8.83953 11.1666 7.99967C11.1666 7.15982 10.833 6.35437 10.2392 5.7605C9.64529 5.16664 8.83983 4.83301 7.99998 4.83301ZM5.83331 7.99967C5.83331 7.42504 6.06159 6.87394 6.46792 6.46761C6.87424 6.06128 7.42534 5.83301 7.99998 5.83301C8.57462 5.83301 9.12572 6.06128 9.53204 6.46761C9.93837 6.87394 10.1666 7.42504 10.1666 7.99967C10.1666 8.57431 9.93837 9.12541 9.53204 9.53174C9.12572 9.93807 8.57462 10.1663 7.99998 10.1663C7.42534 10.1663 6.87424 9.93807 6.46792 9.53174C6.06159 9.12541 5.83331 8.57431 5.83331 7.99967Z" fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.5053 1.88853C9.17557 1.63026 6.82441 1.63026 4.49465 1.88853C3.15332 2.03853 2.06999 3.09519 1.91265 4.44319C1.63625 6.80625 1.63625 9.19347 1.91265 11.5565C2.06999 12.9045 3.15265 13.9612 4.49465 14.1112C6.80532 14.3692 9.19465 14.3692 11.5053 14.1112C12.8467 13.9612 13.93 12.9045 14.0873 11.5565C14.3638 9.19347 14.3638 6.80625 14.0873 4.44319C13.93 3.09519 12.8473 2.03853 11.5053 1.88853ZM4.60532 2.88186C6.86152 2.63177 9.13845 2.63177 11.3947 2.88186C12.2813 2.98186 12.9913 3.68119 13.0947 4.55986C13.362 6.8454 13.362 9.15431 13.0947 11.4399C12.9913 12.3185 12.2813 13.0185 11.3947 13.1172C9.13845 13.3673 6.86152 13.3673 4.60532 13.1172C3.71865 13.0185 3.00865 12.3185 2.90532 11.4399C2.63802 9.15431 2.63802 6.8454 2.90532 4.55986C3.00865 3.68119 3.71865 2.98119 4.60532 2.88253V2.88186Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-[#636270] p-[11px] rounded-full border border-transparent hover:text-[#007580] hover:border-[#007580] transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1101_2893)">
                                            <path d="M8 0C3.58133 0 0 3.58133 0 8C0 11.3907 2.10933 14.2843 5.08433 15.45C5.01567 14.8157 4.95 13.8467 5.11267 13.1563C5.25933 12.5313 6.05 9.18133 6.05 9.18133C6.05 9.18133 5.80933 8.703 5.80933 7.99367C5.80933 6.88133 6.453 6.05 7.256 6.05C7.93733 6.05 8.26867 6.56267 8.26867 7.178C8.26867 7.86566 7.83133 8.89066 7.60633 9.84066C7.41867 10.6373 8.00633 11.2873 8.79067 11.2873C10.2123 11.2873 11.3063 9.78733 11.3063 7.625C11.3063 5.70933 9.93133 4.36867 7.96567 4.36867C5.69067 4.36867 4.353 6.075 4.353 7.84066C4.353 8.528 4.61867 9.26566 4.95 9.66566C5.01567 9.74366 5.025 9.81566 5.00633 9.89366C4.947 10.147 4.80967 10.6903 4.78433 10.8C4.75 10.9467 4.66867 10.978 4.51567 10.9063C3.51567 10.4407 2.89067 8.98133 2.89067 7.80633C2.89067 5.28133 4.725 2.96567 8.175 2.96567C10.95 2.96567 13.1063 4.94367 13.1063 7.58733C13.1063 10.344 11.3687 12.5623 8.95633 12.5623C8.147 12.5623 7.38433 12.1407 7.122 11.6437C7.122 11.6437 6.722 13.172 6.625 13.547C6.44367 14.2403 5.95633 15.1127 5.63133 15.6437C6.3986 15.8804 7.19706 16.0005 8 16C12.4187 16 16 12.4187 16 8C16 3.58133 12.4187 0 8 0Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_1101_2893">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-[#636270] p-[11px] rounded-full border border-transparent hover:text-[#007580] hover:border-[#007580] transition-all duration-500">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.8407 4.80007C15.8407 4.80007 15.6843 3.69674 15.203 3.21274C14.5937 2.57507 13.9123 2.57207 13.6 2.5344C11.3627 2.37207 8.00333 2.37207 8.00333 2.37207H7.99667C7.99667 2.37207 4.63767 2.37207 2.4 2.5344C2.08733 2.57207 1.40633 2.57507 0.796667 3.21274C0.316 3.69674 0.162667 4.80007 0.162667 4.80007C0.162667 4.80007 0 6.09674 0 7.39074V8.60307C0 9.89707 0.159333 11.1937 0.159333 11.1937C0.159333 11.1937 0.315667 12.2971 0.793667 12.7814C1.403 13.4187 2.203 13.3971 2.55933 13.4657C3.84067 13.5877 8 13.6251 8 13.6251C8 13.6251 11.3623 13.6187 13.6 13.4594C13.9127 13.4221 14.5937 13.4187 15.2033 12.7814C15.6843 12.2971 15.8407 11.1937 15.8407 11.1937C15.8407 11.1937 16 9.9004 16 8.6034V7.39107C16 6.0974 15.8407 4.8004 15.8407 4.8004V4.80007ZM6.34667 10.0751V5.5784L10.6683 7.8344L6.34667 10.0751Z" fill="currentColor" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="footer-widget">
                        <h2 class="widget-title text-[#9A9CAA] text-sm leading-[110%] font-display font-medium uppercase mb-5">Category</h2>
                        <ul class="flex flex-col gap-3">
                            <li>
                                <a href="#" class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1 ease-in-out">Vegetable</a>
                            </li>
                            <li>
                                <a href="#" class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Fruits</a>
                            </li>
                            <li>
                                <a href="#" class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Meats</a>
                            </li>
                            <li>
                                <a href="#" class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Diary Products</a>
                            </li>
                            <li>
                                <a href="#" class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Eggs</a>
                            </li>
                            <!-- <li>
                                <a href="#" class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Park Bench</a>
                            </li> -->
                        </ul>
                    </div>

                    <div class="footer-widget">
                            <h2
                                class="widget-title text-[#9A9CAA] text-sm leading-[110%] font-display font-medium uppercase mb-5">
                                Guide</h2>
                            <ul class="flex flex-col gap-3">
                                <li>
                                    <a href="Terms.html"
                                        class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Terms
                                        & Conditions</a>
                                </li>
                                <li>
                                    <a href="PrivacyPolicy.html"
                                        class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500 inline-block pb-1">Privacy
                                        Policy</a>
                                </li>
                                <li>
                                    <a href="help.html"
                                        class="footer-link text-gray-black text-base leading-[110%] hover:text-[#007580] transition-all duration-500  inline-block pb-1">Help
                                        & Support</a>
                                </li>
                            </ul>
                        </div>

                    <!-- footer newsletter -->
                    <div class="footer-widget w-[424px]">
                        <h2 class="widget-title text-[#9A9CAA] text-sm leading-[110%] font-display font-medium uppercase mb-5">Contact</h2>
                        <form action="https://api.web3forms.com/submit" method="POST">
                            <input type="hidden" name="access_key" value="ea667f72-18d3-4103-8875-a2d5ad4c9490">

                                <input type="text" name="name" id="" class="bg-[#FFFFFF] block max-w-[285px] w-full px-5 py-[15px] rounded-lg focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out border border-[#E1E3E6]" placeholder="Name">
                            <br>
                                <input type="email" name="email" id="" class="bg-[#FFFFFF] block max-w-[285px] w-full px-5 py-[15px] rounded-lg focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out border border-[#E1E3E6]" placeholder="Email">
                            <br>
                                <input type="text" name="message" id="" class="bg-[#FFFFFF] block max-w-[285px] w-full px-5 py-[15px] rounded-lg focus:outline-none focus:ring-2 focus:ring-accents transition duration-300 ease-in-out border border-[#E1E3E6]" placeholder="Message">
                                <br>
                                <button type="submit"  class="btn-primary"  >Send</button>
                            <p class="py-3 text-gray-black opacity-60">Reach out to us with your inquiries and feedback, <br> We're here to grow together..</p>


                            <script src="https://web3forms.com/client/script.js" async defer></script>

                        </form>

                    </div>

                    <!-- footer newsletter end -->
                </div>
            </div>
        </div>
        <div class="footer-bottom shadow-[inset_0px_1px_0px_#E1E3E6] py-6">
            <div class="container px-3 md:px-5 xl:px-0">
                <div class="flex flex-wrap sm:justify-between sm:flex-nowrap justify-center items-center gap-y-6">
                    <p class="text-center text-[#9A9CAA]">&#169 All Rights Reserved <br> @2024 <b class="text-grayscales-900">NIBM</b></p>
                    <div class="inline-flex justify-center h-[27px] w-[227px]">
                        <img src="./public/assets/images/all-img/payments.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </footer>
    <!-- footer area end -->

    <!-- script file here -->
    <script src="./public/assets/plugins/js/jquery.js"></script>
    <script src="./public/assets/plugins/js/swipper.js"></script>
    <script src="./public/assets/plugins/js/select2.js"></script>
    <script src="./public/assets/plugins/js/mixitUp.js"></script>
    <script src="./public/js/app.js"></script>
    <script>
        function dismiss(el){
        el.parentNode.style.display='none';
        };
    </script>
</body>

</html>
