<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/sistem_retribusi/index.php?target=";
        $data = [
            array('Text' => 'Home', 'Link' => $base . 'home'),
            array('Text' => 'Data Pedagang', 'Link' => $base . 'data_pedagang'),
            array('Text' => 'Data Petugas', 'Link' => $base . 'data_petugas'),
            array('Text' => 'Data Rekapitulasi', 'Link' => $base . 'data_rekapitulasi'),
        ];
        return $data;
    }
}
