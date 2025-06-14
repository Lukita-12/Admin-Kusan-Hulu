<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use App\Models\PenerbitanAktaKelahiran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class PenerbitanAktaKelahiranController extends Controller
{
    public function index(Request $request)
{
    $role = Auth::user()->role;

    // Query dasar (tambahkan relasi jika ada, misal: 'penduduk')
    $query = PenerbitanAktaKelahiran::query();

    // Filter berdasarkan role
    if ($role === 'super_admin') {
        $query->whereIn('status', ['Diproses', 'Selesai']);
    } elseif ($role === 'admin') {
        $query->whereIn('status', ['Diajukan', 'Ditolak','Diproses', 'Selesai']);
    }

    // Pencarian berdasarkan nama penduduk (jika ada relasi penduduk)
    if ($request->filled('search')) {
        $query->whereHas('penduduk', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    // Filter status dropdown (validasi sesuai role)
    $allowedStatus = $role === 'super_admin'
        ? ['Diproses', 'Selesai']
        : ['Diajukan', 'Ditolak'];

    if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
        $query->where('status', $request->status);
    }
    
    $query->orderByRaw("
    FIELD(status, 'Diajukan', 'Diproses', 'Ditolak', 'Selesai')
    ")->orderBy('created_at', 'asc');
    // Pagination akhir
    $penerbitanAktaKelahirans = $query->simplePaginate(6);

    return view('admin.penerbitan_akta_kelahiran.index', [
        'penerbitanAktaKelahirans' => $penerbitanAktaKelahirans,
    ]);
}


    public function create()
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin.penerbitan_akta_kelahiran.create', [
            'penduduks' => $penduduks,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'nomor_akta'        => ['required'],
            'tempat_kelahiran'  => ['required'],
            'tanggal_kelahiran' => ['required'],
            'nama_anak'         => ['required'],
            'jenis_kelamin'     => ['required', 'in:Laki-laki,Perempuan'],
            'agama'             => ['required'],
            'nama_ayah'         => ['required'],
            'nama_ibu'          => ['required'],
            'upload_sp_bidan'   => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
            'upload_sp_rt'      => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        // Handle Image Upload
        foreach (['upload_sp_bidan', 'upload_sp_rt'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads/surat_pengantar', $fileName, 'public');
    
                $validatedData[$field] = $filePath; // Save file path in DB
            }
        }

        PenerbitanAktaKelahiran::create($validatedData);

        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        dd('You hit it right show!');
    }

    public function edit(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $penduduks = Penduduk::with('kartukeluarga')->latest()->get();

        return view('/admin.penerbitan_akta_kelahiran.edit', [
            'penerbitanAktaKelahiran'   => $penerbitanAktaKelahiran,
            'penduduks'                 => $penduduks,
        ]);
    }

    public function update(Request $request, PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $validatedData = $request->validate([
            'penduduk_id'       => ['required', 'exists:penduduk,id'],
            'tanggal'           => ['required', 'date'],
            'nomor_akta'        => ['required'],
            'tempat_kelahiran'  => ['required'],
            'tanggal_kelahiran' => ['required'],
            'nama_anak'         => ['required'],
            'jenis_kelamin'     => ['required', 'in:Laki-laki,Perempuan'],
            'agama'             => ['required'],
            'nama_ayah'         => ['required'],
            'nama_ibu'          => ['required'],
            'upload_sp_bidan'   => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
            'upload_sp_rt'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        // Handle Image Upload
        foreach (['upload_sp_bidan', 'upload_sp_rt'] as $field) {

            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('uploads/surat_pengantar', $fileName, 'public');
    
                $validatedData[$field] = $filePath; // Save file path in DB
            }
        } 

        $penerbitanAktaKelahiran->update($validatedData);

        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    public function destroy(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $penerbitanAktaKelahiran->delete();
        
        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    public function accept(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $penerbitanAktaKelahiran->status = 'Diproses';
        $penerbitanAktaKelahiran->save();

        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    public function reject(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $penerbitanAktaKelahiran->status = 'Ditolak';
        $penerbitanAktaKelahiran->save();

        return redirect('/admin/penerbitan-akta-kelahiran');
    }

    public function complete(PenerbitanAktaKelahiran $penerbitanAktaKelahiran)
    {
        $penerbitanAktaKelahiran->status = 'Selesai';
        $penerbitanAktaKelahiran->save();

        return redirect()->route('penerbitan-akta-kelahiran.surat', $penerbitanAktaKelahiran->id);
    }

    public function print(Request $request)
    {  // Validasi input date (format Y-m-d karena <input type="date">)
        $request->validate([
            'start_date' => 'required|date_format:Y-m-d',
            'end_date' => 'required|date_format:Y-m-d',
        ]);

        // Parsing tanggal
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDate = Carbon::parse($request->end_date)->format('Y-m-d');

        // Tentukan status yang akan difilter berdasarkan role user
        $user = Auth::user(); // pastikan kamu sudah pakai middleware auth
        if ($user->role === 'admin') {
            $status = ['Diajukan', 'Ditolak', 'Diproses', 'Selesai'];
        } elseif ($user->role === 'super_admin') {
            $status = ['Diproses', 'Selesai'];
        } else {
            $status = []; // jika role tidak dikenali, bisa set default atau kosong
        }

        // Query data berdasarkan tanggal dan status sesuai role
        $penerbitanAktaKelahiran = PenerbitanAktaKelahiran::with('dataPenduduk')
            ->whereBetween('tanggal', [$startDate, $endDate])
            ->whereIn('status', $status)
            ->get();

        // Buat view HTML
        $html = view('admin.penerbitan_akta_kelahiran.print', compact('penerbitanAktaKelahiran', 'startDate', 'endDate'))->render();

        // Generate PDF pakai Browsershot
        return response()->streamDownload(function () use ($html) {
            echo Browsershot::html($html)
                ->format('A4')
                ->margins(10, 10, 10, 10)
                ->pdf();
        }, 'penerbitan_akta_kelahiran_' . date('Ymd') . '.pdf');
    }
}
