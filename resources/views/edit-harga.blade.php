<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Harga Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-orange-400 via-amber-400 to-yellow-300 flex items-center justify-center">

  <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-md p-8 border border-white/40">
    <h1 class="text-3xl font-extrabold text-center text-orange-700 mb-6">💰 Ubah Harga Produk</h1>

    <div class="mb-5 text-center">
      <p class="text-lg font-semibold text-gray-800">Nama Produk: <span class="text-orange-600">Laptop ASUS</span></p>
      <p class="text-lg font-semibold text-gray-800">Kategori: <span class="text-orange-600">Elektronik</span></p>
      <p class="text-md text-gray-700 mt-2">Harga Saat Ini: <b>Rp5.000.000</b></p>
    </div>

    <form action="/produk/update-harga" method="POST" class="space-y-5">
      @csrf
      @method('PATCH')

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Harga Baru</label>
        <input type="number" name="harga" value="5000000" required
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-400 bg-orange-50 hover:bg-orange-100 transition">
      </div>

      <button type="submit"
        class="w-full py-2.5 bg-gradient-to-r from-orange-600 to-yellow-400 text-white font-bold rounded-lg shadow-lg hover:scale-105 transform transition">
        💸 Perbarui Harga
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Desain cerah ☀️ dengan <span class="font-semibold text-orange-700">Tailwind CSS</span>
    </p>
  </div>

</body>
</html>
