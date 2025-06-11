<?php

namespace App\Http\Controllers;

use App\Models\DomisiliUsaha;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;

class PdfController extends Controller
{
    public function preview()
    {
        $domisiliUsaha = DomisiliUsaha::all(); // Ambil semua data penduduk

        return view('pdf.template', [
            'data_penduduk' => $domisiliUsaha
        ]);
    }

    public function generate()
    {
        $domisiliUsaha = DomisiliUsaha::all();

        $html = view('pdf.template', [
            'penduduk' => $domisiliUsaha
        ])->render();

        $pdf = Browsershot::html($html)
            ->format('A4')
            ->margins(10, 10, 10, 10)
            ->showBackground()
            ->pdf();

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf;
        }, 'laporan_domisiliusaha.pdf');
    }

}
