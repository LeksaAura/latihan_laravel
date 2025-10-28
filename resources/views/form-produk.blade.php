<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Produk</title>
  <link rel="stylesheet" href="/css/tailwind.css">
</head>
<body class="bg-red-400">

class="min-h-screen bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-400 flex items-center justify-center">

  <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-md p-8 border border-white/40">
    <h1 class="text-3xl font-extrabold text-center text-indigo-700 mb-6">🛍️ Input Data Produk</h1>

    <form action="/kirim-produk" method="POST" class="space-y-5">
      @csrf

      <!-- Nama Produk -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Nama Produk</label>
        <input type="text" name="nama" required
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none bg-pink-50 hover:bg-pink-100 transition">
      </div>

      <!-- Harga Produk -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Harga Produk</label>
        <input type="number" name="harga" required
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-400 focus:outline-none bg-indigo-50 hover:bg-indigo-100 transition">
      </div>

      <!-- Kategori -->
      <div>
        <label class="block text-gray-700 font-semibold mb-1">Kategori</label>
        <select name="kategori"
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none bg-purple-50 hover:bg-purple-100 transition">
          <option value="Makanan">🍱 Makanan</option>
          <option value="Minuman">🥤 Minuman</option>
          <option value="Elektronik">💻 Elektronik</option>
        </select>
      </div>

      <!-- Tombol Submit -->
      <button type="submit"
        class="w-full py-2.5 bg-gradient-to-r from-indigo-600 to-pink-500 text-white font-bold rounded-lg shadow-lg hover:scale-105 transform transition">
        🚀 Kirim Data Produk
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Dibuat dengan 💖 menggunakan <span class="text-indigo-700 font-semibold">Laravel</span> + <span class="text-pink-600 font-semibold">Tailwind CSS</span>
    </p>
  </div>

</body>
</html>
