<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//        $user_id = Auth::id();
        $notes = Auth::user()->notes()->latest('updated_at')->paginate(5);
//        foreach ($notes as $note) {
//            dump( $note->title);
//        }
//        $notes = Auth::user()->notes()->where('notebook_id',$notebook->id)->latest('updated_at')->paginate(5);
//        dd($notebook);
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $notebooks = Notebook::where('user_id', Auth::id())->get();
        return view('notes.create', compact('notebooks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //
        $request->validate(['title'=>'required|max:120','text' => 'required']);
       $note = Auth::user()->notes()->create([
            'uuid'=>Str::uuid(),
            'title' => $request->title,
            'text' => $request->text,
            'notebook_id' => $request->notebook_id,]);
// //        $note->save();
        return redirect()->route('notes.show',compact('note'))->with('success', 'Note created successfully');
//        return redirect('/notes')->with('success', 'Note created!');
//        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
//        dd($note);
        if($note->user->isNot(Auth::user())){
            abort(403); //forbidden
        }
//        $notebook = Auth::user()->notebooks()->where('id',$note->notebook_id)->first();
        return view('notes.show', compact(['note']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
        $notebooks = Notebook::where('user_id', Auth::id())->get();
        if($note->user->isNot(Auth::user())){ //check to see if it belongs to the logged in user
            abort(403); //forbidden
        }

        return view('notes.edit', compact(['note','notebooks']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        //
        if($note->user->isNot(Auth::user())){
            abort(403); //forbidden
        }

        $request->validate(['title'=>'required|max:120','text' => 'required']); //validate all the fields of the notes
        $note->update(['title' => $request->title,'text' => $request->text,'notebook_id' => $request->notebook_id]);

        return redirect()->route('notes.show', $note)->with('success', 'Note updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
        if($note->user->isNot(Auth::user())){
            abort(403); //forbidden
        }
//        if(auth()->user()->can('delete', $note)){
//            abort(403);
//        }

        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note moved to thrash');
    }
}
