<?php

use App\Models\Content;
use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Starting cleanup...\n";

$all = Content::all();
$grouped = $all->groupBy(function ($item) {
    return $item->page . '|' . $item->section . '|' . $item->key;
});

$deletedCount = 0;

foreach ($grouped as $groupKey => $items) {
    if ($items->count() > 1) {
        echo "Found duplicates for: $groupKey (Count: " . $items->count() . ")\n";
        
        // Keep the one with the highest ID
        $toKeep = $items->sortByDesc('id')->first();
        
        foreach ($items as $item) {
            if ($item->id !== $toKeep->id) {
                echo " - Deleting ID: " . $item->id . "\n";
                $item->delete();
                $deletedCount++;
            }
        }
    }
}

echo "Cleanup complete. Deleted $deletedCount records.\n";
