<?
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Events;

class EventSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            Events::create([
                'user_id' => $user->id,
                'title' => 'Sample Event',
                'description' => 'This is a sample event description.',
                'place' => 'Sample Place',
                'price' => '0',
                'method' => 'A',
                'status' => 'archived',
                'categorie_id' => 1, // Set categorie_id to 1
                'available_places' => 100,
                'start_date' => now(),
                'end_date' => now()->addDays(8),
            ]);
        }
        Events::create([
            'user_id' => 1,
            'title' => 'Sample Event1',
            'description' => '1This is a sample event description.',
            'place' => 'Sample Place',
            'price' => '16',
            'method' => 'A',
            'status' => 'archived',
            'categorie_id' => 2, // Set categorie_id to 1
            'available_places' => 90,
            'start_date' => now(),
            'end_date' => now()->addDays(9),
        ]);
        Events::create([
            'user_id' => $user->id,
            'title' => '2Sample Event',
            'description' => '2This is a sample event description.',
            'place' => 'Sample Place',
            'price' => '99',
            'method' => 'A',
            'status' => 'archived',
            'categorie_id' => 2, // Set categorie_id to 1
            'available_places' => 10,
            'start_date' => now(),
            'end_date' => now()->addDays(4),
        ]);
    }
}