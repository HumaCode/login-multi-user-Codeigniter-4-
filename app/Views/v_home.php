<h1>Halaman Home</h1>

<?php if (session()->get('level') == 1) { ?>
    Admin
<?php } else if (session()->get('level') == 2) { ?>
    User
<?php } else { ?>
    Pelanggan
<?php } ?></a>