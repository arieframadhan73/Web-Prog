<?php

use Illuminate\Database\Seeder;
use App\Tukang;
class TukangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tukang = new Tukang();
        $tukang->name = 'Arief Ramadhan';
        $tukang->no_ktp = '1234567890';
        $tukang->password = bcrypt('juki123');
        $tukang->address = 'Jalan Jalan';
        $tukang->city = 'Jakarta';
        $tukang->phone = '081361984556';
        $tukang->status = 'Available';
        $tukang->picture = 'Arief.jpg';
        $tukang->save();

        $tukang = new Tukang();
        $tukang->name = 'Haidar Aliza';
        $tukang->no_ktp = '1234567891';
        $tukang->password = bcrypt('haidar12');
        $tukang->address = 'Jalan Jalan';
        $tukang->city = 'Jakarta';
        $tukang->phone = '081361984556';
        $tukang->status = 'Available';
        $tukang->picture = 'Haidar.jpg';
        $tukang->save();

        $tukang = new Tukang();
        $tukang->name = 'Tirta Yanuar';
        $tukang->no_ktp = '1234567892';
        $tukang->password = bcrypt('juki12');
        $tukang->address = 'Jalan Jalan';
        $tukang->city = 'Jakarta';
        $tukang->phone = '081361984556';
        $tukang->status = 'Available';
        $tukang->picture = 'Tirta.jpg';
        $tukang->save();

        $tukang = new Tukang();
        $tukang->name = 'Utama Pribadi';
        $tukang->no_ktp = '1234567893';
        $tukang->password = bcrypt('juki1234');
        $tukang->address = 'Jalan Jalan';
        $tukang->city = 'Jakarta';
        $tukang->phone = '081361984556';
        $tukang->status = 'Available';
        $tukang->picture = 'Tama.jpg';
        $tukang->save();

    }
}
