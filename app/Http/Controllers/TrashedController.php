<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        $trash =
        $notes = Auth::user()->notes()->onlyTrashed()->latest('updated_at')->paginate(5);

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
        if($note->user->isNot(Auth::user())){
            abort(403);
        }
//        $note = $note->onlyTrashed()->get()->first();
//        $notebook =null;
        return view('notes.show', compact('note'));

//        dd($note->onlyTrashed()->get());
    }

    /**
     * Show the form for editing the specified resource.
     */
//    public function edit(string $id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Note $note)
    {
        //
        if($note->user->isNot(Auth::user())){
            abort(403);
        }
        $note->restore();
        return redirect()->route('notes.show', compact('note'))->with('success', 'Note restored');
//        return $note;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
//        dd($note);
        if($note->user->isNot(Auth::user())){
            abort(403);
        }
         $note->forceDelete();
         return redirect()->route('trashed.index', compact('note'))->with('success', 'Note Permanently deleted');
    }
}
