<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZERO COFFIE STORE</title>

    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@100;300;400;700&display=swap"
        rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <!--feather icon-->

    <script src="https://unpkg.com/feather-icons"></script>


    <!--my style-->
    <style>
    header {
        height: 100vh;
        background-image: url(coffie/triokopi.webp);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }.navbar-nav{
        flex-direction: row;
    }
    a{
        text-decoration: none;
    }
    header::after{
        content : "";
        width : 100%;
        height : 5vh;
        position: absolute;
        bottom : 0px;
        background-color: black;
        opacity: 0.60;
    }
    </style>
    <link rel="stylesheet" href="web.css">
</head>

<body>


    <header>
        <!--navbar start-->

        <nav class="navbar">
            <a href="#" class="navbar-logo">ZERO <span>COFFIE STORE</span></a>

            <div class="navbar-nav d-flex">
                <a href="web.php">Home</a>
                <a href="#abaout">404</a>
                <a href="#menu" w>menu</a>
                <a href="#contact">kontak</a>
                <a href="#product">product</a>
            </div>

            <div class="navbar-extra">
                <a href="#" id="search"><i data-feather="search"></i></a>
                <a href="#" id="shopping-cart"><i data-feather="shopping-cart"></i></a>
                <a id="menu" href="#" id="humbergur-menu"><i data-feather="menu"></i></a>
            </div>
        </nav>

        
        
    </header>
    
    <div class="container position-relative">
            <div class="position-absolute mt-5 translate-middle top-100 start-50" style="z-index: 99;">
                <h2 class="p-4 mt-5">
                    Welcome To Our Coffee Shop
                </h2>
            </div>
    </div>

    <div class="container">
        
    </div>



    <!-- navbar end 
    <div class="col-sm-9 padding-right">
        <div class="product">
            <h2 class="title text-center"></h2>
            <div class="col-sm-4">
                <div class="Frontend/images/coffie/coffie gula are.jpg">
                    <div class="single-products">
                        <div class="text-center">
                            <img src="" alt="" />
                            <h1></h1>
                            <p></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i></a>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div> -->

    <!--feather icon-->
    <script>
    feather.replace()
    </script>


    <!--JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>