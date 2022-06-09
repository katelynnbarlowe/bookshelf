<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShelfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show(Shelf $shelf)
    {
        if($shelf->name === 'Historical Fiction') {
            $dates = ['0600s','1100s','1200s','1300s','1400s','1500s','1600s','1700s','1800s','1800s Early','1800s Late','1800s Mid','1900s Early','1920s','1930s','1940s','1950s','1960s','1970s','1980s','1990s','Historical Fiction'];
            $shelfIds = Shelf::whereIn('name',$dates)->pluck('id')->toArray();
            $bookIds = DB::table('book_shelf')->whereIn('shelf_id',$shelfIds)->pluck('book_id')->toArray();
            $books = Book::whereIn('id',$bookIds)->inRandomOrder()->get();
            $otherShelvesIds = DB::table('book_shelf')
                ->selectRaw('shelf_id, count(*) as shelf_count')
                ->whereIn('book_id',$books->pluck('id')->toArray())
                ->whereNotIn('shelf_id',$shelfIds)
                ->groupBy('shelf_id')
                ->orderby('shelf_count','desc')
                ->pluck('shelf_id')
                ->toArray();
        }else {
            $books = $shelf->books()->inRandomOrder()->get();
            $otherShelvesIds = DB::table('book_shelf')
                ->selectRaw('shelf_id, count(*) as shelf_count')
                ->whereIn('book_id',$books->pluck('id')->toArray())
                ->groupBy('shelf_id')
                ->orderby('shelf_count','desc')
                ->pluck('shelf_id')
                ->toArray();
        }
        unset($otherShelvesIds[array_search($shelf->id,$otherShelvesIds)]);
        $otherShelves = Shelf::whereIn('id',$otherShelvesIds)
                            ->orderByRaw('FIELD(id,'.implode(',',$otherShelvesIds).')')
                            ->get();

        $metaData = ['title' => strtolower($shelf->name) . ' - bookshelf'];
        return view('shelf',compact('shelf','books', 'otherShelves', 'metaData'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function edit(Shelf $shelf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shelf $shelf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shelf  $shelf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shelf $shelf)
    {
        //
    }
}
