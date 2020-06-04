<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $amount = 55;
        $Starttime = new DateTime();
        echo 'Planned: ',$amount,' - Start time: ', $Starttime->format('H:i:s'),' - ';

        factory(App\Product::class, $amount)->create();

        $Endtime = new DateTime(); $dif = $Starttime->diff($Endtime);
        echo 'End time: ', $Endtime->format('H:i:s') ,' - Estimated time: ', $dif->format('%Hh %Imin %Ssek.'),'  ';
    }
}
