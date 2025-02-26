<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-2 pe-5">
    <a href="index.php" class="navbar-brand ps-3 me-0" style="background-color: white; padding: 5px 10px; border-radius: 5px;">
        <img src="img/logo_cinema.png" alt="Industro Logo" style="height: 300px;">
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-2 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
            <a href="upcoming.php" class="nav-item nav-link <?php echo ($current_page == 'upcoming.php') ? 'active' : ''; ?>">Upcoming</a>
            <a href="theater.php" class="nav-item nav-link <?php echo ($current_page == 'theater.php') ? 'active' : ''; ?>">Theater</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php echo ($current_page == 'usia-su.html' || $current_page == 'usia-13.html' || $current_page == 'usia-17.html') ? 'active' : ''; ?>" data-bs-toggle="dropdown">Usia</a>
                <div class="dropdown-menu bg-light m-0">
                <a href="usia.php?usia=SU" class="dropdown-item">SU</a>
                <a href="usia.php?usia=13" class="dropdown-item">13</a>
                <a href="usia.php?usia=17" class="dropdown-item">17</a>
                </div>
            </div>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?php echo ($current_page == 'genre.php') ? 'active' : ''; ?>" data-bs-toggle="dropdown">Genre</a>
                <div class="dropdown-menu bg-light m-0" style="max-height: 300px; overflow-y: auto; width: 250px;">
                    <a href="genre.php?genre=Action" class="dropdown-item">Action</a>
                    <a href="genre.php?genre=Adventure" class="dropdown-item">Adventure</a>
                    <a href="genre.php?genre=Animation" class="dropdown-item">Animation</a>
                    <a href="genre.php?genre=Biography" class="dropdown-item">Biography</a>
                    <a href="genre.php?genre=Cartoon" class="dropdown-item">Cartoon</a>
                    <a href="genre.php?genre=Comedy" class="dropdown-item">Comedy</a>
                    <a href="genre.php?genre=Crime" class="dropdown-item">Crime</a>
                    <a href="genre.php?genre=Disaster" class="dropdown-item">Disaster</a>
                    <a href="genre.php?genre=Documentary" class="dropdown-item">Documentary</a>
                    <a href="genre.php?genre=Drama" class="dropdown-item">Drama</a>
                    <a href="genre.php?genre=Epic" class="dropdown-item">Epic</a>
                    <a href="genre.php?genre=Erotic" class="dropdown-item">Erotic</a>
                    <a href="genre.php?genre=Experimental" class="dropdown-item">Experimental</a>
                    <a href="genre.php?genre=Family" class="dropdown-item">Family</a>
                    <a href="genre.php?genre=Fantasy" class="dropdown-item">Fantasy</a>
                    <a href="genre.php?genre=Film-Noir" class="dropdown-item">Film-Noir</a>
                    <a href="genre.php?genre=History" class="dropdown-item">History</a>
                    <a href="genre.php?genre=Horror" class="dropdown-item">Horror</a>
                    <a href="genre.php?genre=Martial+Arts" class="dropdown-item">Martial Arts</a>
                    <a href="genre.php?genre=Music" class="dropdown-item">Music</a>
                    <a href="genre.php?genre=Musical" class="dropdown-item">Musical</a>
                    <a href="genre.php?genre=Mystery" class="dropdown-item">Mystery</a>
                    <a href="genre.php?genre=Political" class="dropdown-item">Political</a>
                    <a href="genre.php?genre=Psychological" class="dropdown-item">Psychological</a>
                    <a href="genre.php?genre=Romance" class="dropdown-item">Romance</a>
                    <a href="genre.php?genre=Sci-Fi" class="dropdown-item">Sci-Fi</a>
                    <a href="genre.php?genre=Sport" class="dropdown-item">Sport</a>
                    <a href="genre.php?genre=Superhero" class="dropdown-item">Superhero</a>
                    <a href="genre.php?genre=Survival" class="dropdown-item">Survival</a>
                    <a href="genre.php?genre=Thriller" class="dropdown-item">Thriller</a>
                    <a href="genre.php?genre=War" class="dropdown-item">War</a>
                    <a href="genre.php?genre=Western" class="dropdown-item">Western</a>
                </div>
            </div>

            <!-- Form Pencarian -->
            <form class="d-flex ms-3 me-4 align-items-center" role="search" id >
                <input class="form-control me-2" type="search" placeholder="Cari film..." aria-label="Search">
                <button class="btn btn-primary" type="submit" style="background-color: #D32F2F; border-color: #D32F2F; color: white;">
                    Cari
                </button>
            </form>
        </div>
        <!-- Cek apakah pengguna sudah login -->
        <?php if (isset($_SESSION['name'])): ?>
            <div class="nav-item dropdown">
                <a href="#" class="btn btn-primary px-3 d-none d-lg-flex align-items-center dropdown-toggle"
                    style="background-color: #D32F2F; border-color: #D32F2F; color: white;"
                    id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i> <?php echo $_SESSION['name']; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="riwayat.php?username=<?php echo
$_SESSION['email']; ?>">Riwayat Transaksi</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
        <?php else: ?>
            <a href="login.php" class="btn btn-primary px-3 d-none d-lg-flex align-items-center"
                style="background-color: #D32F2F; border-color: #D32F2F; color: white;">
                <i class="fas fa-user me-2"></i> Login
            </a>
        <?php endif; ?>
    </div>
</nav>