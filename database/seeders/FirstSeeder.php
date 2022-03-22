<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(["name" => "Administrator"]);
        $bank = Role::create(["name" => "Bank"]);
        $canteen = Role::create(["name" => "Canteen"]);
        $student = Role::create(["name" => "Student"]);

        User::create([
            "name" => "Bella",
            "email" => "bella@gmail.com",
            "password" => Hash::make("bella"),
            "role_id" => $admin->id
        ]);

        User::create([
            "name" => "Ira",
            "email" => "ira@gmail.com",
            "password" => Hash::make("ira"),
            "role_id" => $bank->id
        ]);

        User::create([
            "name" => "Fadiah",
            "email" => "fadiah@gmail.com",
            "password" => Hash::make("fadiah"),
            "role_id" => $canteen->id
        ]);

        $septy = User::create([
            "name" => "Septy",
            "email" => "septy@gmail.com",
            "password" => Hash::make("septy"),
            "role_id" => $student->id,
        ]);

        $mie_ayam = Barang::create([
            "name" => "Mie Ayam",
            "price" => 7000,
            "stock" => 10,
            "desc" => "Mie dengan toping ayam kecap"
        ]);

        $bakso = Barang::create([
            "name" => "Bakso",
            "price" => 2000,
            "stock" => 15,
            "desc" => "Bakso kuah"
        ]);

        $burger = Barang::create([
            "name" => "Burger",
            "price" => 6000,
            "stock" => 13,
            "desc" => "Roti dan daging"
        ]);

        $aqua = Barang::create([
            "name" => "Aqua",
            "price" => 2000,
            "stock" => 10,
            "desc" => "Air mineral"
        ]);

        $teh_kotak = Barang::create([
            "name" => "Teh Kotak",
            "price" => 3500,
            "stock" => 10,
            "desc" => "Teh berbentuk kotak"
        ]);

        Saldo::create([
            "user_id" => $septy->id,
            "saldo" => 30000
        ]);

        //Isi Saldo
        Transaksi::create([
            "user_id" => $septy->id,
            "barang_id" => null,
            "jumlah" => 50000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 3
        ]);
    }
}
