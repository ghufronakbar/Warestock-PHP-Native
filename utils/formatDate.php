<?php
function formatDate($tanggal)
{
    $date = new DateTime($tanggal);

    $hariIndo = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    );

    $bulanIndo = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );

    $hari = $hariIndo[$date->format('l')];
    $tanggal = $date->format('j');
    $bulan = $bulanIndo[(int)$date->format('n')];
    $tahun = $date->format('Y');

    return "$hari, $tanggal $bulan $tahun";
}
