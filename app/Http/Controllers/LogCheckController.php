<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogCheckController extends Controller
{

    private $batas_bawah_luas = 2;
    private $batas_atas_luas = 10;
    private $batas_bawah_fasilitas = 10;
    private $batas_atas_fasilitas = 300;
    private $batas_bawah_harga = 500000;
    private $batas_atas_harga = 3000000;

    public function check(Request $request) {
        $data = $request->all();
        $fasilitas = array_sum($request['fasilitas']);
        
        // R1
        $aPredikat1 = min([$this->luas_kecil($data['luas']), $this->fasilitas_banyak($fasilitas)]);
        $z1 = $aPredikat1 * ($this->batas_atas_harga - $this->batas_bawah_harga) +  $this->batas_bawah_harga;

        // R2
        $aPredikat2 = min([$this->luas_kecil($data['luas']), $this->fasilitas_sedikit($fasilitas)]);
        $z2 = ($aPredikat2 * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

        // R3
        $aPredikat3 = min([$this->luas_besar($data['luas']), $this->fasilitas_banyak($fasilitas)]);
        $z3 = $aPredikat3 * ($this->batas_atas_harga -  $this->batas_bawah_harga) +  $this->batas_bawah_harga;

        // R4
        $aPredikat4 = min([$this->luas_besar($data['luas']), $this->fasilitas_sedikit($fasilitas)]);
        $z4 = ($aPredikat4 * ($this->batas_atas_harga -  $this->batas_bawah_harga) - $this->batas_atas_harga) * -1;

        $z_rata_rata = ($aPredikat1 * $z1 + $aPredikat2 * $z2 + $aPredikat3 * $z3 + $aPredikat4 * $z4) / ($aPredikat1 + $aPredikat2 + $aPredikat3 + $aPredikat4);
    
        return view('form-check', [
            'data_form' => $request->all(),
            'result_price' => (int) $z_rata_rata
        ]);
    }

    protected function luas_besar($x) {
        if ($x <= $this->batas_bawah_luas) {
            return 0;
        } else if ($x >= $this->batas_bawah_luas && $x <= $this->batas_atas_luas) {
            return ($x - $this->batas_bawah_luas) / ($this->batas_atas_luas - $this->batas_bawah_luas);
        } else if ($x >= $this->batas_atas_luas) {
            return 1;
        }
    }

    protected function luas_kecil($x) {
        if ($x <= $this->batas_bawah_luas) {
            return 1;
        } else if ($x >= $this->batas_bawah_luas && $x <= $this->batas_atas_luas) {
            return ($this->batas_atas_luas - $x) / ($this->batas_atas_luas - $this->batas_bawah_luas);
        } else if ($x >= $this->batas_atas_luas) {
            return 0;
        }
    }

    protected function fasilitas_banyak($y) {
        if ($y <= $this->batas_bawah_fasilitas) {
            return 0;
        } else if ($y >= $this->batas_bawah_fasilitas && $y <= $this->batas_atas_fasilitas) {
            return ($y - $this->batas_bawah_fasilitas) / ($this->batas_atas_fasilitas - $this->batas_bawah_fasilitas);
        } else if ($y >= $this->batas_atas_fasilitas) {
            return 1;
        }
    }

    protected function fasilitas_sedikit($y) {
        if ($y <= $this->batas_bawah_fasilitas) {
            return 1;
        } else if ($y >= $this->batas_bawah_fasilitas && $y <= $this->batas_atas_fasilitas) {
            return ($this->batas_atas_fasilitas - $y) / ($this->batas_atas_fasilitas - $this->batas_bawah_fasilitas);
        } else if ($y >= $this->batas_atas_fasilitas) {
            return 0;
        }
    }

    protected function harga_mahal($z) {
        if ($z <= $this->batas_bawah_harga) {
            return 0;
        } else if ($z >= $this->batas_bawah_harga && $z <= $this->batas_atas_harga) {
            return ($z - $this->batas_bawah_harga) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } else if ($z >= $this->batas_atas_harga) {
            return 1;
        }
    }

    protected function harga_murah($z) {
        if ($z <= $this->batas_bawah_harga) {
            return 1;
        } else if ($z >= $this->batas_bawah_harga && $z <= $this->batas_atas_harga) {
            return ($this->batas_atas_harga - $z) / ($this->batas_atas_harga - $this->batas_bawah_harga);
        } else if ($z >= $this->batas_atas_harga) {
            return 0;
        }
    }
}
