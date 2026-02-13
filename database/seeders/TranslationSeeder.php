<?php

namespace Database\Seeders;

use App\Models\Translation;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        $dataPath = database_path('data/translations');

        if (!is_dir($dataPath)) {
            return;
        }

        $files = glob($dataPath . '/*.json');

        foreach ($files as $file) {
            $group = pathinfo($file, PATHINFO_FILENAME);
            $translations = json_decode(file_get_contents($file), true);

            if (!is_array($translations)) {
                continue;
            }

            foreach ($translations as $t) {
                Translation::updateOrCreate(
                    ['key' => $t['key']],
                    [
                        'group' => $group,
                        'text' => $t['text']
                    ]
                );
            }
        }
    }
}
