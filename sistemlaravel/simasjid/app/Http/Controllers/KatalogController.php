<?php

namespace App\Http\Controllers;

use App\Katalog;
use App\Pengelola_Aset;
use App\Kategori;
use Auth;
use Illuminate\Http\Request;

class KatalogController extends Controller
{

    public function index()
    {
        //list pengelola
        $obj_list_pengelola = Pengelola_Aset::get();
        $arr_list_pengelola = [];
        foreach ($obj_list_pengelola as $pengelola) {
            $arr_list_pengelola[] = $pengelola->id_anggota;
        }
        //list katalog
        $list_katalog = Katalog::get();
        foreach ($list_katalog as $katalog) {
            $katalog->kategori;
        }

        //list kategori
        $list_kategori = Kategori::get();

        // return $list_katalog;

        //user terotentikasi
        $anggota = Auth::user();

        // return $list_kategori;

        return view('aset.katalog', ['list_kategori' => $list_kategori, 'list_katalog' => $list_katalog, 'list_pengelola' => $arr_list_pengelola, 'anggota' => $anggota]);

        //retval
        // return view('aset.usulan', ['list_usulan' => $list_usulan, 'list_pengelola' => $arr_list_pengelola, 'anggota' => $anggota]);
    }

    public function byKategori($id){
        $list_katalog = Katalog::get()->where('id_kategori', '=', $id);
        return $list_katalog;
    }
    
}
