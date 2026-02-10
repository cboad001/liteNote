<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user_id = Auth::id();
        $notebooks = Notebook::where('user_id', $user_id)->latest('updated_at')->get();
        return view('notebooks.index', compact('notebooks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(['name'=>'required|max:120']);
        $notebook = new Notebook(['user_id'=>Auth::id(),
            'name' => $request->name]);

        $notebook->save();
        return redirect()->route('notebooks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notebook $notebook)
    {
        //
        if($notebook->user_id !== Auth::id()){
            abort(403); //forbidden
        }
        $notes = Note::where('notebook_id', $notebook->id)->get();
        return view('notebooks.show', compact(['notebook', 'notes']));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notebook $notebook)
    {
        //
//        $notebooks = Notebook::where('user_id', Auth::id())->get();
//        if($notebook->user->isNot(Auth::user())){ //check to see if it belongs to the logged in user
//            abort(403); //forbidden
//        }
        return view('notebooks.edit', compact(['notebook']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notebook $notebook)
    {
        //
        if($notebook->user->isNot(Auth::user())){
            abort(403); //forbidden
        }

        $request->validate(['name'=>'required|max:120']); //validate all the fields of the notes
        $notebook->update(['name' => $request->name]);

        return redirect()->route('notebooks.show', $notebook)->with('success', 'Notebook updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
//    public function displayNote(Notebook $notebook){
//        if($notebook->user()->isNot(Auth::user())){
//            abort(403);
//        }
//        $notes= Note::where('notebook_id', $notebook->id)->get();
//        dd($notes);
////        return view('notebooks.shownotes', compact('notes'));
//    }
}
