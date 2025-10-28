<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-green-400 via-teal-400 to-cyan-500 flex items-center justify-center">

  <div class="bg-white/90 backdrop-blur-md shadow-2xl rounded-2xl w-full max-w-md p-8 border border-white/40">
    <h1 class="text-3xl font-extrabold text-center text-teal-700 mb-6">🧩 Edit Data Produk</h1>

    <form action="/produk/update" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Nama Produk</label>
        <input type="text" name="nama" value="Laptop Lama" required
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-400 bg-teal-50 hover:bg-teal-100 transition">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Harga Produk</label>
        <input type="number" name="harga" value="5000000" required
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 bg-green-50 hover:bg-green-100 transition">
      </div>

      <div>
        <label class="block text-gray-700 font-semibold mb-1">Kategori</label>
        <select name="kategori"
          class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-400 bg-cyan-50 hover:bg-cyan-100 transition">
          <option value="Elektronik">💻 Elektronik</option>
          <option value="Makanan">🍱 Makanan</option>
          <option value="Minuman">🥤 Minuman</option>
        </select>
      </div>

      <button type="submit"
        class="w-full py-2.5 bg-gradient-to-r from-teal-600 to-green-500 text-white font-bold rounded-lg shadow-lg hover:scale-105 transform transition">
        🔄 Perbarui Produk
      </button>
    </form>

    <p class="text-center text-sm text-gray-600 mt-6">
      Dibuat dengan 🌿 oleh <span class="font-semibold text-teal-700">Laravel & TailwindCSS</span>
    </p>
  </div>

</body>
</html>
