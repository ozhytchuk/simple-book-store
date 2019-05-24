<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateAffectedTables();

        $this->call([
            BooksTableSeeder::class,
            TagsTableSeeder::class,
            BooksTagsTableSeeder::class,
        ]);
    }

    /**
     * Truncates all the tables affected this seeder
     *
     * @return void
     */
    private function truncateAffectedTables()
    {
        DB::statement('SET foreign_key_checks = 0');

        foreach (['books', 'tags', 'tags_books'] as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET foreign_key_checks = 1');
    }
}
