## My personal bookshelf where I can nerd out about data and pick next reads.
⚠️ Work in Progress ⚠️

### But why? 🤷🏻‍♀️

This is what happens when a coder is dissatisfied with an existing app (Goodreads) and has some time on their hands. I've been faithfully maintaining my [Goodreads profile](https://www.goodreads.com/user/show/28142761-katelynn) for over 8 years, but there was stuff I wanted to do there that I couldn't.

### And what does it do again? 

The app allows easy sorting and filtering of books, as well as viewing books on overlapping shelves. It also displays my ratings and reviews.

### And how exactly? 🤔

Unfortunately, Goodreads is deprecating their API, so I have to run this via CSV imports. 
I use the export generated [here](https://www.goodreads.com/review/import) to pull in books and build shelves dynamically. 
The CSV to import is stored in `/storage` and the command is `php artisan importBooks {filename}`. 

### With help from...

- **[Open Library Covers](https://openlibrary.org/dev/docs/api/covers)**
