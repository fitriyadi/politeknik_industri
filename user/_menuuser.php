<?php
function link_user($hal, $page)
{
    if ($hal == $page || $hal == ($page . "_detail")) {
        return "bg-warning";
    } else {
        return "";
    }
}


if (!isset($_SESSION['user'])) {
    echo "<script>alert('Anda belum login, silakan login terlebih dahulu')</script>";
    echo "<script>window.location='index.php?hal=login';</script>";
} else {
?>
    <div class="info-item d-flex <?= link_user($_GET['hal'], "user_home") ?>">
        <a href="?hal=user_home" style="text-decoration: none;color: white;">Home</a>
    </div><!-- End Info Item -->

    <div class="info-item d-flex <?= link_user($_GET['hal'], "user_profil") ?>">
        <a href="?hal=user_profil" style="text-decoration: none;color: white;">Profil</a>
    </div><!-- End Info Item -->

    <div class="info-item d-flex <?= link_user($_GET['hal'], "user_pengajuan") ?>">
        <a href="?hal=user_pengajuan" style="text-decoration: none;color: white;">Pengajuan</a>
    </div><!-- End Info Item -->

    <div class="info-item d-flex <?= link_user($_GET['hal'], "user_history"); ?>">
        <a href="?hal=user_history" style="text-decoration: none;color: white;">History</a>
    </div><!-- End Info Item -->
<?php } ?>