<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $sourcePath = database_path('seeders/placeholders/My_Prof.jpg');
        // Verify the seed file exists before starting
        if (!File::exists($sourcePath)) {
            $this->command->error("Placeholder image not found at: {$sourcePath}");
            return;
        }

        // Loop to generate multiple records
        for ($i = 1; $i <= 10; $i++) {
            // Generate a unique file name for the database and filesystem
            $filename = 'myProf-' . Str::uuid() . '.jpg';
            
            // Define the storage path destination relative to the public disk root
            $destinationPath = '/' . $filename;

            // Read original file contents and copy to the storage disk
            Storage::disk('public')->put($destinationPath, File::get($sourcePath));
        User::factory()->create([
            'image'=>$destinationPath,
            'name' => 'AAMIR JAMAL',
            'email' => 'amirjamal@dev.com',
            'phone'=>'+923421995853',
            'password'=>Hash::make('Amirjamal@12309'),
            'email_verified_at'=>now(),
            'profession'=>'Laravel Developer',
            'about'=>'I create modern, responsive and user-friendly web applications with clean UI designs and powerful backend systems using Laravel, JavaScript and modern frontend technologies.'
        ]);
    }
    }
}
