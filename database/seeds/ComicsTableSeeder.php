<?php

use Illuminate\Database\Seeder;

use App\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // attraverso il seed mi popolo il db iterando
        $comics_array = config('comic');
        foreach($comics_array as $comic) {
            $new_comic = new Comic();

            // se in App/Comic specifico il protected fillable posso evitare di scrivere tutte le carat. e usare il comando:
            // $new_comic->fill($comic);

            $new_comic->title = $comic['title'];
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];
            $new_comic->save();

        }
    }
}
