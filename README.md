# php-laravel-sql-test-A

Repositori ini berisi kode untuk tes teknis yang melibatkan php, laravel, dan sql. Tes ini terdiri dari tiga sub bagian: structure data test, programming test, dan query test. Setiap sub bagian memiliki cabang tersendiri di repositori ini.

## Structure Data Test

Sub bagian ini berisi tes yang wajib menggunakan bahasa php. Saya menyediakan dua solusi berupa kode untuk setiap soal. Anda dapat melihat kode saya di cabang [data-structures-test](https://github.com/agisx/php-laravel-sql-test-A/tree/data-structures-test).

## Programming Test

Sub bagian ini berisi tes membuat aplikasi menggunakan laravel. Aplikasi ini adalah aplikasi penjualan yang menggunakan dua tabel: transactions dan transaction_details. Tabel transactions berisi id, no_transaction, transaction_date. Tabel transaction_details berisi id, transaction_id, item, quantity. Transaction_id adalah referensi dari tabel transactions yaitu id.

Aplikasi ini memiliki lima tampilan:

- Tampilan 1: Menampilkan data no, transaksi, total item, total quantity, dan action (berisi view, edit, delete).
- Tampilan 2: Berisi input, yaitu transaction no dan transaction date. Disini kita bisa membuat banyak item dan quantity secara dinamis dengan tombol add item.
- Tampilan 3: Berisi update, yaitu berisi kita update data yang sudah ada.
- Tampilan 4: Berisi delete, yaitu delete data.
- Tampilan 5: Berisi view, disini kita hanya dapat melihat saja tanpa bisa merubah.

Anda dapat melihat kode saya di cabang [programming-test](https://github.com/agisx/php-laravel-sql-test-A/tree/programming-test).

## Query Test

Sub bagian ini berisi tes menggunakan sql. Saya menggunakan mysql untuk tes ini. Saya menggunakan dua tabel: activities dan activity_details. Tabel activities berisi id dan title. Tabel activity_details berisi id, activity_id, type, dan weight. Activity_id merupakan id dari tabel activities.

Tes ini memiliki empat soal. Saya menyediakan empat solusi kode sql untuk setiap soal. Anda dapat melihat kode saya di cabang [query-test](https://github.com/agisx/php-laravel-sql-test-A/tree/query-test).
