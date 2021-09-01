<?php

use Illuminate\Database\Seeder;

class DataTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email'=>'phu@com',
        	'password'=>bcrypt('123'),
        ];
        DB::table('taikhoan')->insert($data);
    }
}
