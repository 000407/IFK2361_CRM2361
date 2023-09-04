<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    	$roleData = [];

    	foreach (['ROOT', 'ADMIN', 'USER'] as $name) {
    		$date = date('Y-m-d H:i:s');

    		$roleData[] = [
	            'name' => $name,
            	'created_at' => $date,
            	'updated_at' => $date
	        ];
    	}

        DB::table('roles')->insert($roleData);
    }
}
