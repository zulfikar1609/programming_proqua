<?php

function bubbleSort($arr) {
    $n = count($arr);

    // Loop untuk tiap pass
    for ($i = 0; $i < $n - 1; $i++) {

        // Loop untuk membandingkan elemen bersebelahan
        for ($j = 0; $j < $n - 1 - $i; $j++) {

            // Jika elemen kiri lebih besar, tukar
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }

    return $arr;
}

// Contoh penggunaan
$data = [5, 1, 4, 2, 8];
$hasil = bubbleSort($data);

print_r($hasil);

// penjelasan :
// - Bubble sort melakukan penyisiran pada array berkali-kali.
// - Pada setiap penyisiran, dilakukan perbandingan elemen yang berdampingan.
// - Jika posisi salah, elemen ditukar.
// - Proses akan membuat angka besar pindah ke kanan secara bertahap.
// - Setelah beberapa putaran, semua angka sudah berada pada posisi yang benar.
