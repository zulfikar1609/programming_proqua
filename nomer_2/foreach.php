<?php

// Berisi daftar angka yang akan dicek.
$angka = [1, 2, 3, 4, 5, 6, 7, 8, 9];

// Ambil setiap angka dalam array satu per satu, masukkan ke variabel $a.
foreach ($angka as $a) {
    // Mengecek apakah sisa pembagian angka tersebut dengan 2 adalah 0.
    if ($a % 2 == 0) {
        // Jika iya angka genap.
        echo $a . " adalah ANGKA GENAP<br>";
    } else {
        // Jika tidak sama dengan 0 angka ganjil.
        echo $a . " adalah ANGKA GANJIL<br>";
    }
}

// Program menampilkan hasil untuk tiap angka, misalnya:
// - 1 adalah ANGKA GANJIL
// - 2 adalah ANGKA GENAP
// - dan seterusnya.
