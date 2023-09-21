<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat 10 transaksi secara acak
        Transaction::factory()->count(10)->create()->each(function ($transaction) {
            // Membuat 3 detail transaksi secara acak untuk setiap transaksi
            $details = TransactionDetail::factory()->count(3)->make();
            // Menyimpan detail transaksi ke dalam tabel transaction_details dan menautkan dengan transaksi
            $transaction->details()->saveMany($details);
        });
    }
}
