<?php

use Illuminate\Database\Seeder;
use App\Laporan;

class UserTableSeeder3 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Laporan::where('pelapor', '')->delete();
        Laporan::where('pemilik', '')->delete();
        Laporan::where('peralatan_id', 0)->delete();
    }
}
