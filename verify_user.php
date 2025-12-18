<?php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'evolve@gmail.com';
$password = '12345678';

$user = User::where('email', $email)->first();

if (!$user) {
    echo "User not found: $email\n";
    exit(1);
}

echo "User found: " . $user->name . "\n";
echo "ID: " . $user->id . "\n";
echo "Hash: " . $user->password . "\n";

if (Hash::check($password, $user->password)) {
    echo "Password MATCHES!\n";
} else {
    echo "Password DOES NOT match!\n";
    echo "Re-hashing password...\n";
    $user->password = Hash::make($password);
    $user->save();
    echo "Password updated locally. Try login again.\n";
}
