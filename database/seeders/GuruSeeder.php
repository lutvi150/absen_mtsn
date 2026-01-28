<?php

namespace Database\Seeders;

use App\Models\GuruModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuruModel::create([
            'id_user' => 2,
            'nama_guru' => 'Fuji Delfi Sonata, S.Pd',
            'nip' => '1234567890',
            'jenis_kelamin' => 'L',
            'foto' => 'default',
            'alamat' => 'atu Bajanjang, BATU BAJANJANG, Kec. Tigo Lurah, Kab. Solok Prov. Sumatera Barat  No. 1',
            'no_hp' => '081234567890'
        ]);
        GuruModel::create([
            'id_user' => 3,
            'nama_guru' => 'Winta Jusriani',
            'nip' => '0987654321',
            'jenis_kelamin' => 'P',
            'foto' => 'default',
            'alamat' => 'atu Bajanjang, BATU BAJANJANG, Kec. Tigo Lurah, Kab. Solok Prov. Sumatera Barat  No. 2',
            'no_hp' => '089876543210'
        ]);
        GuruModel::create([
            'id_user' => 4,
            'nama_guru' => 'Rusima',
            'nip' => '1122334455',
            'jenis_kelamin' => 'L',
            'foto' => 'default',
            'alamat' => 'atu Bajanjang, BATU BAJANJANG, Kec. Tigo Lurah, Kab. Solok Prov. Sumatera Barat  No. 3',
            'no_hp' => '082233445566'
        ]);
        GuruModel::create([
            'id_user' => 5,
            'nama_guru' => 'Erika Sari',
            'nip' => '5566778899',
            'jenis_kelamin' => 'P',
            'foto' => 'default',
            'alamat' => 'atu Bajanjang, BATU BAJANJANG, Kec. Tigo Lurah, Kab. Solok Prov. Sumatera Barat  No. 4',
            'no_hp' => '085556677889'
        ]);
        GuruModel::create([
            'id_user' => 6,
            'nama_guru' => 'Sri Wahyuni',
            'nip' => '2233445566',
            'jenis_kelamin' => 'L',
            'foto' => 'default',
            'alamat' => 'atu Bajanjang, BATU BAJANJANG, Kec. Tigo Lurah, Kab. Solok Prov. Sumatera Barat  No. 5',
            'no_hp' => '083344556677'
        ]);
        GuruModel::create([
            'id_user' => 7,
            'nama_guru' => 'Dewi Lestari',
            'nip' => '9988776655',
            'jenis_kelamin' => 'P',
            'foto' => 'default',
            'alamat' => 'atu Bajanjang, BATU BAJANJANG, Kec. Tigo Lurah, Kab. Solok Prov. Sumatera Barat  No. 6',
            'no_hp' => '087998877665'
        ]);
    }
}
