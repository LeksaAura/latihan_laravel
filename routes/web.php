<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| ROUTE 1: HOME / REDIRECT
|--------------------------------------------------------------------------
| Ketika membuka halaman utama (localhost:8000),
| pengguna akan langsung diarahkan ke form input produk.
*/
Route::get('/', function () {
    return redirect('/form-produk');
});


/*
|--------------------------------------------------------------------------
| ROUTE 2: GET (Menampilkan Form Produk)
|--------------------------------------------------------------------------
| Menampilkan halaman form input produk (warna ungu-pink).
| View: resources/views/form-produk.blade.php
*/
Route::get('/form-produk', function () {
    return view('form-produk');
});


/*
|--------------------------------------------------------------------------
| ROUTE 3: POST (Mengirim Data Produk)
|--------------------------------------------------------------------------
| Menangkap data dari form-produk dan menampilkan hasilnya.
| Menampilkan card hasil dengan tampilan modern.
*/
Route::post('/kirim-produk', function (Request $request) {
    $nama = $request->input('nama');
    $harga = number_format($request->input('harga'), 0, ',', '.');
    $kategori = $request->input('kategori');

    return "
    <body style='
        font-family: Poppins, Arial, sans-serif;
        background: linear-gradient(135deg, #6366f1, #ec4899);
        color: #333;
        display: flex; align-items: center; justify-content: center;
        height: 100vh;'>
        <div style='
            background: white; padding: 30px 40px;
            border-radius: 20px; text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            max-width: 450px;'>
            <h2 style='color:#4f46e5;'>✅ Data Produk Berhasil Dikirim</h2>
            <hr style='margin:15px 0; border:none; height:1px; background:#ddd;'>
            <p><b>Nama Produk:</b> $nama</p>
            <p><b>Harga:</b> Rp$harga</p>
            <p><b>Kategori:</b> $kategori</p>
            <a href='/form-produk' style='
                display:inline-block; margin-top:20px;
                background: linear-gradient(to right, #4f46e5, #ec4899);
                color:white; padding:10px 20px;
                border-radius:10px; text-decoration:none;
                font-weight:bold; transition:0.3s;'>
                🔙 Kembali ke Form
            </a>
        </div>
    </body>";
});


/*
|--------------------------------------------------------------------------
| ROUTE 4: PUT (Edit Produk)
|--------------------------------------------------------------------------
| Menampilkan form edit data produk lengkap (warna hijau-teal).
| View: resources/views/edit-produk.blade.php
*/
Route::get('/produk/edit', function () {
    return view('edit-produk');
});

/*
|--------------------------------------------------------------------------
| ROUTE 5: PUT (Proses Update Produk)
|--------------------------------------------------------------------------
| Menerima data hasil edit dan menampilkannya.
*/
Route::put('/produk/update', function (Request $request) {
    $namaBaru = $request->input('nama');
    $hargaBaru = number_format($request->input('harga'), 0, ',', '.');
    $kategoriBaru = $request->input('kategori');

    return "
    <body style='
        font-family: Poppins, sans-serif;
        background: linear-gradient(135deg, #34d399, #14b8a6);
        display: flex; align-items: center; justify-content: center;
        height: 100vh; color: #333;'>
        <div style='
            background:white; padding:30px 40px;
            border-radius:20px; text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);'>
            <h2 style='color:#0d9488;'>✅ Produk Diperbarui!</h2>
            <hr style='margin:15px 0; border:none; height:1px; background:#ddd;'>
            <p><b>Nama:</b> $namaBaru</p>
            <p><b>Harga:</b> Rp$hargaBaru</p>
            <p><b>Kategori:</b> $kategoriBaru</p>
            <a href='/produk/edit' style='
                display:inline-block; margin-top:15px;
                background:linear-gradient(to right,#0d9488,#22c55e);
                color:white; padding:8px 16px;
                border-radius:8px; text-decoration:none;
                font-weight:bold;'>🔙 Kembali ke Form</a>
        </div>
    </body>";
});


/*
|--------------------------------------------------------------------------
| ROUTE 6: PATCH (Edit Harga Produk)
|--------------------------------------------------------------------------
| Menampilkan form ubah harga produk (warna oranye-kuning).
| View: resources/views/edit-harga.blade.php
*/
Route::get('/produk/edit-harga', function () {
    return view('edit-harga');
});

/*
|--------------------------------------------------------------------------
| ROUTE 7: PATCH (Proses Update Harga)
|--------------------------------------------------------------------------
| Menerima input harga baru dan menampilkannya.
*/
Route::patch('/produk/update-harga', function (Request $request) {
    $hargaBaru = number_format($request->input('harga'), 0, ',', '.');

    return "
    <body style='
        font-family:Poppins, sans-serif;
        background:linear-gradient(135deg, #f97316, #facc15);
        display:flex; align-items:center; justify-content:center;
        height:100vh; color:#333;'>
        <div style='
            background:white; padding:30px 40px;
            border-radius:20px; text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);'>
            <h2 style='color:#ea580c;'>💰 Harga Diperbarui!</h2>
            <hr style='margin:15px 0; border:none; height:1px; background:#ddd;'>
            <p><b>Harga Baru:</b> Rp$hargaBaru</p>
            <a href='/produk/edit-harga' style='
                display:inline-block; margin-top:15px;
                background:linear-gradient(to right,#ea580c,#fbbf24);
                color:white; padding:8px 16px;
                border-radius:8px; text-decoration:none;
                font-weight:bold;'>🔙 Kembali ke Form</a>
        </div>
    </body>";
});
