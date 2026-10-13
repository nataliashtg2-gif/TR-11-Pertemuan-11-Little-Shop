LITTLE SHOP — PAKET GAMBAR PRODUK

Isi:
- 100 file JPG bernama sesuai slug produk dari database.
- update_product_images.sql untuk mengisi kolom products.image.
- tile_01.jpg sampai tile_25.jpg adalah potongan foto dari lembar katalog.

Cara pakai:
1. Ekstrak ZIP ini.
2. Salin 100 file JPG yang namanya berupa slug (abaikan tile_01.jpg–tile_25.jpg jika tidak diperlukan) ke:
   public/products/
3. Buka phpMyAdmin > database tugasweb_p11 > tab Import.
4. Import file update_product_images.sql.
5. Di Blade, tampilkan gambar dengan:
   <img src="{{ $p->image ? asset($p->image) : asset('images/product-placeholder.png') }}"
        alt="{{ $p->name }}" class="product-image">

Catatan:
Gambar ini merupakan foto katalog ilustratif bergaya pastel yang disesuaikan berdasarkan jenis nama produk.
Produk dengan jenis yang sama memakai foto representatif yang sama; gambar bukan foto resmi merek tertentu.
Database selain kolom image tidak diubah oleh SQL ini.
