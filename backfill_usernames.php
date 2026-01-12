<?php
use App\Models\User;
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = User::whereNull('username')->get();
foreach ($users as $user) {
    if ($user->email === 'evolve@gmail.com') {
        $user->username = 'admin';
        $user->role = 'admin';
    } else {
        $user->username = 'user' . $user->id;
    }
    $user->save();
    echo "Updated user {$user->id} with username {$user->username}\n";
}
