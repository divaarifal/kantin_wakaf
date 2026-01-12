<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

if (Schema::hasColumn('users', 'username')) {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('username');
    });
    echo "Dropped username column.\n";
}

if (Schema::hasColumn('users', 'role')) {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
    echo "Dropped role column.\n";
}
