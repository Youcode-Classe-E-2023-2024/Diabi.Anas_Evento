<?
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a sample user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_banned' => false,
            'role_id' => 1, // Default role_id
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'organizer',
            'email' => 'org@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_banned' => false,
            'role_id' => 2, // Default role_id
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_banned' => false,
            'role_id' => 3, // Default role_id
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}