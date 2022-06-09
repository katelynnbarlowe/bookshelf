<?php

namespace App\Console\Commands;

use App\Models\Shelf;
use Illuminate\Console\Command;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImportBooks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importBooks {file=goodreads_library_export.csv} {update_only=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function saveImage(string $url, string $name): ?string
    {
        $fileContents = file_get_contents($url);
        $img = Image::make($fileContents);
        if($img->width() > 1) {
            $img->stream();
            Storage::disk('public')->put("images/covers/{$name}",$img);
            return $name;
        }
        return null;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->argument('file');
        $updateOnly = $this->argument('update_only');
        $file_handle = fopen(storage_path($file), 'r');
        $bookIds = Book::all()->pluck('id')->toArray();
        while (!feof($file_handle)) {

            $bookArray = fgetcsv($file_handle, 0, ',');
            if(is_array($bookArray) && $bookArray[1] !== 'Title'):
                $book = Book::firstOrCreate([
                    'title' => $bookArray[1],
                ]);
                if (($key = array_search($book->id, $bookIds)) !== false && !$updateOnly) {
                    unset($bookIds[$key]);
                }
                $oldIsbn = $book->isbn;
                $book->isbn = !empty($bookArray[5]) ? $bookArray[5] : $oldIsbn;
                while(strlen($book->isbn) < 10){
                    $book->isbn = '0'.$book->isbn;
                }
                if(!empty($book->isbn) && !$book->cover):
                    $book->cover = $this->saveImage("http://covers.openlibrary.org/b/isbn/{$book->isbn}-M.jpg","{$book->isbn}-M.jpg");
                endif;
                $book->goodreads_id = $bookArray[0];
                $author = explode(', ', $bookArray[3]);
                $book->author_lastname = $author[0];
                $book->author_firstname = $author[1];
                $book->isbn13 = $bookArray[6];
                $book->rating = (float) $bookArray[7];
                $book->average_rating = (float) $bookArray[8];
                $book->publisher = $bookArray[9];
                $book->num_pages = (int) $bookArray[11];
                $book->year_published = (int) $bookArray[12];
                $book->year_published_original = (int) $bookArray[13];
                $book->date_read = $bookArray[14] ? date("Y-m-d",strtotime($bookArray[14])) : null;
                $book->date_added = date("Y-m-d",strtotime($bookArray[15]));
                $book->main_shelf = $bookArray[18];
                $book->review = $bookArray[19];
                if(strpos($bookArray[19],'4.5') !== false) {
                    $book->rating = 4.5;
                }
                if(strpos($bookArray[19],'3.5') !== false) {
                    $book->rating = 3.5;
                }
                if(strpos($bookArray[19],'2.5') !== false) {
                    $book->rating = 2.5;
                }
                $book->notes = $bookArray[20];
                $book->read_count = (int) $bookArray[21];
                $book->recommended_by = $bookArray[23];
                $book->save();

                $shelfAliases = explode(', ', $bookArray['16']);
                foreach($shelfAliases as $alias) {
                    $shelf = Shelf::firstOrCreate([
                        'alias' => $alias,
                    ]);
                    $shelf->name = $shelf->name ?? ucwords(str_replace("-"," ",$alias));
                    $shelf->save();

                    if(!$book->shelves->contains($shelf->id)){
                        $book->shelves()->attach($shelf);
                    }
                }
            endif;
        }
        fclose($file_handle);

        Book::whereIn('id',$bookIds)->delete();
    }
}
