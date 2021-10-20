<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Major;
use App\Models\Faculty;
use App\Models\Timeline;
use App\Models\Candidate;
use App\Models\Committee;
use App\Models\Organization;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Timeline::create([
            'name' => 'Judul Kegiatan',
            'desc' => 'Deskripsi Kegiatan',
            'from' => now(),
            'to' => now(),
        ]);

        Timeline::create([
            'name' => 'Judul Kegiatan',
            'desc' => 'Deskripsi Kegiatan',
            'from' => now(),
            'to' => now(),
        ]);
        
        Faculty::create([
            'name' => 'Fakultas Ekonomi & Bisnis',
            'slug' => 'fakultas-ekonomi-dan-bisnis',
        ]);

        Faculty::create([
            'name' => 'Fakultas Teknik',
            'slug' => 'fakultas-teknik',
        ]);

        Faculty::create([
            'name' => 'Fakultas Bahasa',
            'slug' => 'fakultas-bahasa',
        ]);

        Faculty::create([
            'name' => 'Fakultas Desain dan Komunikasi Visual',
            'slug' => 'fakultas-desain-dan-komunikasi-visual',
        ]);

        Faculty::create([
            'name' => 'Fakultas Ilmu Sosial dan Ilmu Politik',
            'slug' => 'fakultas-ilmu-sosial-dan-ilmu-politik',
        ]);

        Major::create([
            'name' => 'Akutansi',
            'slug' => 'akutansi',
            'faculty_id' => 1,
        ]);

        Major::create([
            'name' => 'Manajemen',
            'slug' => 'manajemen',
            'faculty_id' => 1,
        ]);

        Major::create([
            'name' => 'Teknik Informatika',
            'slug' => 'teknik-informatika',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Teknik Industri',
            'slug' => 'teknik-industri',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Teknik Informasi',
            'slug' => 'teknik-informasi',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Teknik Elektro',
            'slug' => 'teknik-elektro',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Teknik Mesin',
            'slug' => 'teknik-mesin',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Teknik Sipil',
            'slug' => 'teknik-sipil',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Bahasa Jepang',
            'slug' => 'teknik-jepang',
            'faculty_id' => 2,
        ]);

        Major::create([
            'name' => 'Bahasa Inggris',
            'slug' => 'bahasa-inggris',
            'faculty_id' => 3,
        ]);

        Major::create([
            'name' => 'Desain Grafis',
            'slug' => 'desain-grafis',
            'faculty_id' => 4,
        ]);

        Major::create([
            'name' => 'Multimedia',
            'slug' => 'multimedia',
            'faculty_id' => 4,
        ]);

        Major::create([
            'name' => 'Perdagangan Internasional',
            'slug' => 'perdagangan-internasional',
            'faculty_id' => 5,
        ]);

        Major::create([
            'name' => 'Perpustakaan dan Sains Informasi',
            'slug' => 'perpustakaan-dan-sains-informasi',
            'faculty_id' => 5,
        ]);

        Major::create([
            'name' => 'Produksi Film dan Televisi',
            'slug' => 'produksi-film-dan-televisi',
            'faculty_id' => 5,
        ]);
        
        Organization::create([
            'name' => 'MPM',
            'slug' => 'mpm',
        ]);

        Organization::create([
            'name' => 'Presma',
            'slug' => 'presma',
        ]);

        Organization::create([
            'name' => 'Senat',
            'slug' => 'senat',
        ]);

        Organization::create([
            'name' => 'English Club',
            'slug' => 'english-club',
        ]);

        Organization::create([
            'name' => 'Kewirausahaan',
            'slug' => 'kewirausahaan',
        ]);

        Organization::create([
            'name' => 'Taekwondo',
            'slug' => 'taekwondo',
        ]);

        Organization::create([
            'name' => 'Resimen Mahasiswa',
            'slug' => 'resimen-mahasiswa',
        ]);

        Organization::create([
            'name' => 'Unbol',
            'slug' => 'unbol',
        ]);

        Organization::create([
            'name' => 'PKM',
            'slug' => 'pkm',
        ]);

        Organization::create([
            'name' => 'Japan Club',
            'slug' => 'japan-club',
        ]);

        Organization::create([
            'name' => 'ISC',
            'slug' => 'isc',
        ]);

        Organization::create([
            'name' => 'Bulu Tangkis',
            'slug' => 'bulu-tangkis',
        ]);

        Organization::create([
            'name' => 'BSTC',
            'slug' => 'bstc',
        ]);

        Organization::create([
            'name' => 'Basket',
            'slug' => 'basket',
        ]);

        Organization::create([
            'name' => 'Sentra',
            'slug' => 'sentra',
        ]);

        Organization::create([
            'name' => 'An-Naafi',
            'slug' => 'an-naafi',
        ]);

        Organization::create([
            'name' => 'Tarung Drajat',
            'slug' => 'tarung-drajat',
        ]);

        // Team::create([
        //     'name' => 'Paslon MPM 1',
        //     'organization_id' => 1
        // ]);

        // Team::create([
        //     'name' => 'Paslon MPM 2',
        //     'organization_id' => 1
        // ]);

        // Team::create([
        //     'name' => 'Paslon Presma 1',
        //     'organization_id' => 2
        // ]);

        // Team::create([
        //     'name' => 'Paslon Presma 2',
        //     'organization_id' => 2
        // ]);

        // Team::create([
        //     'name' => 'Paslon Senat FT',
        //     'organization_id' => 3,
        // ]);

        // Team::create([
        //     'name' => 'Paslon Senat FB',
        //     'organization_id' => 3,
        // ]);

        Team::factory(10)->create();
        Candidate::factory(20)->create();
        Committee::factory(10)->create();
        Student::create([
            'name' => 'Alif Nuryana',
            'npm' => '0620101052',
            'email' => 'nuryana.alif@widyatama.ac.id',
            'ukm' => 'Unbol',
            'password' => Hash::make('Bricard2708_'),
            'is_admin' => true,
            'major_id' => 1,
        ]);

        Student::create([
            'name' => 'admin',
            'npm' => '0620101050',
            'ukm' => 'Unbol',
            'email' => 'admin@widyatama.ac.id',
            'password' => Hash::make('adminkpum2021'),
            'is_admin' => false,
            'major_id' => 1,
        ]);
    }
}