<?php

use Master\Pedagang;
use Master\Menu;
use Master\Petugas;
use Master\Rekapitulasi;

include('autoload.php');
include('Config/Database.php');

$menu = new Menu();
$data_pedagang = new Pedagang($dataKoneksi);
$data_petugas = new Petugas($dataKoneksi);
$data_rekapitulasi = new Rekapitulasi($dataKoneksi);
// $data_pedagang->tambah();
// $data_petugas->tambah();
// $data_rekapitulasi->tambah();
$target = @$_GET['target'];
$act = @$_GET['act'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Mukhtar</title>
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script scr="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <style>
        .logo {
            position: absolute;
            left: 20px;
        }

        .out {
            position: relative;
            left: 50px;
        }

        .out1 {
            position: relative;
            left: 55px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container-fluid">
                <div class="logo">
                    <img src="Kabupaten Banyuwangi.png" alt="logo" width="30px">
                </div>
                <a class="out navbar-brand" href="#">E-RETRIBUSI</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MyMenu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse id=" MyMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($menu->topMenu() as $r) {
                        ?>
                            <li class="out1 nav-item">
                                <a href="<?php echo $r['Link']; ?>" class="nav-link">
                                    <?php echo $r['Text']; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <div class="Content">
            <h5>Content <?php echo strtoupper($target); ?></h5>
            <?php
            if (!isset($target) or $target == "home") {
                echo "Hai, Selamat datang di Website Sistem Pendapatan Retribusi Pasar";
                // ========== star kontent data_pedagang ================
            } elseif ($target == "data_pedagang") {
                if ($act == "tambah_data_pedagang") {
                    echo $data_pedagang->tambah();
                } elseif ($act == "simpan_data_pedagang") {
                    if ($data_pedagang->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=data_pedagang';
                            </script>";
                    } else {
                        echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=data_pedagang';
                        </script>";
                    }
                } elseif ($act == "edit_data_pedagang") {
                    $id = $_GET['id'];
                    echo $data_pedagang->edit($id);
                } elseif ($act == "update_data_pedagang") {
                    if ($data_pedagang->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=data_pedagang';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=data_pedagang';
                        </script>";
                    }
                } elseif ($act == "delete_data_pedagang") {
                    $id = $_GET['id'];
                    if ($data_pedagang->delete($id)) {
                        echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=data_pedagang';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=data_pedagang';
                        </script>";
                    }
                } else {
                    echo $data_pedagang->index();
                }
                // ======================== end kontent data_pedagang =====================
            }
                // ========== star kontent data_petugas ================
                elseif ($target == "data_petugas") {
                if ($act == "tambah_data_petugas") {
                    echo $data_petugas->tambah();
                } elseif ($act == "simpan_data_petugas") {
                    if ($data_petugas->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=data_petugas';
                            </script>";
                    } else {
                        echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=data_petugas';
                        </script>";
                    }
                } elseif ($act == "edit_data_petugas") {
                    $id = $_GET['id'];
                    echo $data_petugas->edit($id);
                } elseif ($act == "update_data_petugas") {
                    if ($data_petugas->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=data_petugas';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=data_petugas';
                        </script>";
                    }
                } elseif ($act == "delete_data_petugas") {
                    $id = $_GET['id'];
                    if ($data_petugas->delete($id)) {
                        echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=data_petugas';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=data_petugas';
                        </script>";
                    }
                } else {
                    echo $data_petugas->index();
                }
                // ======================== end kontent data_petugas =====================
            }
                // ========== star kontent data_rekapitulasi ================
                elseif ($target == "data_rekapitulasi") {
                if ($act == "tambah_data_rekapitulasi") {
                    echo $data_rekapitulasi->tambah();
                } elseif ($act == "simpan_data_rekapitulasi") {
                    if ($data_rekapitulasi->simpan()) {
                        echo "<script>
                            alert('data sukses disimpan');
                            window.location.href='?target=data_rekapitulasi';
                            </script>";
                    } else {
                        echo "<script>
                        alert('data gagal disimpan');
                        window.location.href='?target=data_rekapitulasi';
                        </script>";
                    }
                } elseif ($act == "edit_data_rekapitulasi") {
                    $id = $_GET['id'];
                    echo $data_rekapitulasi->edit($id);
                } elseif ($act == "update_data_rekapitulasi") {
                    if ($data_rekapitulasi->update()) {
                        echo "<script>
                            alert('data sukses diubah');
                            window.location.href='?target=data_rekapitulasi';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal diubah');
                        window.location.href='?target=data_rekapitulasi';
                        </script>";
                    }
                } elseif ($act == "delete_data_rekapitulasi") {
                    $id = $_GET['id'];
                    if ($data_rekapitulasi->delete($id)) {
                        echo "<script>
                        alert('data sukses dihapus');
                        window.location.href='?target=data_rekapitulasi';
                        </script>";
                    } else {
                        echo "<script>
                        alert('data gagal dihapus');
                        window.location.href='?target=data_rekapitulasi';
                        </script>";
                    }
                } else {
                    echo $data_rekapitulasi->index();
                }
                // ======================== end kontent data_rekapitulasi =====================
            }
            ?>

        </div>
    </div>

</body>

</html>