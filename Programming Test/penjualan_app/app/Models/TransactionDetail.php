<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Transaction;

class TransactionDetail extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'transaction_details';

    // Menentukan nama kolom kunci utama yang digunakan oleh model ini
    protected $primaryKey = 'id';

    // Menentukan atribut-atribut yang dapat diisi secara massal oleh model ini
    protected $fillable = ['transaction_id', 'item', 'quantity'];

    // Menentukan relasi dengan model lain yang terkait dengan model ini
    // Misalnya, jika setiap detail transaksi milik satu transaksi, maka Anda dapat menambahkan metode berikut:

    public function transaction()
    {
        // Mengembalikan hasil dari relasi one-to-many (inverse) dengan model Transaction
        return $this->belongsTo(Transaction::class);
    }
}
