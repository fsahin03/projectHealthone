<nav class="navbar navbar-expand-lg navbar-light bg-red">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <div class="header-row row lead">
                <img src="../img/Logo-Health-One.png" alt="">
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Sportapparaat</a>
                </li>
                <?php
                if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                   include_once(TEMPLATE_ROOT .'/admin/defaults/menu.php'); 
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <?php if (isset($_SESSION) && isset($_SESSION['login'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><b>uitloggen</b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profiel"><b>profiel</b></a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">inloggen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/registreren"><b>REGISTREREN</b></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>