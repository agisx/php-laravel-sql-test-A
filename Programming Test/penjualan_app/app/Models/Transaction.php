<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TransactionDetail;

class Transaction extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan oleh model ini
    protected $table = 'transactions';

    // Menentukan nama kolom kunci utama yang digunakan oleh model ini
    protected $primaryKey = 'id';

    // Menentukan atribut-atribut yang dapat diisi secara massal oleh model ini
    protected $fillable = ['no_transaction', 'transaction_date'];

    // Menentukan format tanggal yang digunakan oleh model ini
    protected $dateFormat = 'Y-m-d';

    // Menentukan relasi dengan model lain yang terkait dengan model ini
    // Misalnya, jika setiap transaksi memiliki banyak item, maka Anda dapat menambahkan metode berikut:
    public function items()
    {
        // Mengembalikan hasil dari relasi one-to-many dengan model Item
        return $this->hasMany(TransactionDetail::class);
    }
}
