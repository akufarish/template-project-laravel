<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Saldo;
use Illuminate\Support\Facades\DB;

class SaldoSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('saldos')->insert([
            "saldo_referral" => "50.000",
            "saldo_mengajak" => "2.000"
        ]);
    }
}
