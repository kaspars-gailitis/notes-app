<?php

namespace App\Http\Controllers;
use Auth;
use App\Note;
use App\User;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $notes = Note::where('user_id', Auth::user()->id)
                ->where('type_id', '!=', 2)
                ->orderBy('updated_at', 'DESC')
                ->get();

      return view('home', [
          'notes' => $notes
      ]);
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
    public function newNote(){
      return view('new_note', [
          'note' => null,
      ]);
    }
    public function tasks(){
      $tasks = Note::where('type_id',2)->where("user_id", Auth::user()->id)->orderBy('created_at', 'asc')->get();
      return view('tasks', [
          'tasks' => $tasks
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $type)
    {
      if ($type == 2){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/task')
                ->withInput()
                ->withErrors($validator);
        }
        $task = new Note;
        $task->title = "task";
        $task->tag_id = 1;
        $task->user_id = Auth::user()->id;
        $task->content = $request->name;
        $task->type_id = $type;
        $task->save();
        return redirect('/tasks');
      }
      if($type == 1){
        $validator = Validator::make($request->all(), [
            'title' => 'bail|required|max:255',
            'body' => 'bail|required',
            'tags' => 'bail|required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('/new/note')
                ->withInput()
                ->withErrors($validator);
        }
        $tag = new Tag;
        $tag->tag_content = $request->tags;
        $tag->save();

        $note = new Note;
        $note->title = $request->title;
        $note->Tag()->associate($tag);
        $note->content = $request->body;
        $note->user_id = Auth::user()->id;
        $note->type_id = $type;
        $note->save();
        return redirect('/home');

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);
        $rawTags = Tag::findOrFail($note->tag_id);
        $tags = explode(", ", $rawTags->tag_content);
        return view('show_note', [
            'note' => $note,
            'tags' => $tags
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $note = Note::findOrFail($id);
      $tag = Tag::findOrFail($note->tag_id);
      return view('edit_note', [
          'note' => $note,
          'tag' => $tag,
      ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $note = Note::findOrFail($id);
      Note::where('id',$id)
          ->where("user_id", Auth::user()->id)
          ->update(['title' => $request->title,
                    'content' => $request->body,
                  ]);
      Tag::where('id',$note->tag_id)
        ->update(['tag_content' => $request->tags,
                ]);
      return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $note = Note::findOrFail($id);
      if($note->type_id == 2){
        $note->delete();
        return redirect('/tasks');
      } else {
        $note->delete();
        return redirect('/home');
      }
    }
}
