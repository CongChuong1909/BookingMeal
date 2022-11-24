
<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="../controller/Home.php" class="nav-item nav-link">Home</a>
                <a href="../controller/Menu.php" class="nav-item nav-link active">Menu</a>

                <a href="../controller/contact.php" class="nav-item nav-link">Contact</a>
                <?php
                //  session_start();
                // var_dump($_SESSION);
                    if(isset($_SESSION['login_successful']))
                    {
                       if($_SESSION['loginName']){
                        echo '<div class="nav-item dropdown">';
                        echo '    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome ('.$_SESSION['loginName'].')</a>';
                        echo '    <div class="dropdown-menu m-0">';
                        echo '       <a href="../controller/Login.php" onClick="'.removeSession().'" class="dropdown-item">Logout</a>';
                        echo '    </div>';
                        echo '</div>';

                       }
                    }
                    else{
                        echo '<a href="../controller/Login.php" class="nav-item nav-link">Login</a>';
                        echo '<a href="../controller/Register.php" class="nav-item nav-link">Register</a>';
                    }

                    function removeSession(){
                        unset($_SESSION['login_successful']);
                        unset($_SESSION['loginName']);
                    }
                ?>
            </div>
            <a href="../controller/Booking.php" class="btn btn-primary py-2 px-4">Your Table</a>
        </div>

        
    </nav>
