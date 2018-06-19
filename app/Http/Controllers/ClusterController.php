<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Note;
use App\User;
use App\Tag;
use App\Cluster;
use App\ClusterToNote;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clusters = Cluster::where('user_id', Auth::user()->id)
                ->orderBy('updated_at', 'DESC')
                ->get();

      return view('clusters', [
          'clusters' => $clusters
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $notes = Note::where('user_id', Auth::user()->id)
                ->where('type_id', '!=', 2)
                ->orderBy('title', 'ASC')
                ->get();
      return view('new_cluster', [
          'notes' => $notes
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'title' => 'bail|required|max:255',
          'selectedNotes' => 'bail|required',
      ]);
      if ($validator->fails()) {
          return redirect('/clusters/create')
              ->withInput()
              ->withErrors($validator);
      }
      $cluster = new Cluster;
      $cluster->name = $request->title;
      $cluster->user_id = Auth::user()->id;
      $cluster->save();
      $selectedNotes = $request->selectedNotes;
      foreach($selectedNotes as $noteId){
        $currentNote = Note::where('id',(int)$noteId)->get();
        $clusterToNote = new ClusterToNote;
        $clusterToNote->Cluster()->associate($cluster);
        $clusterToNote->Note()->associate($currentNote[0]);
        $clusterToNote->save();
      }
      return redirect('/clusters');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cluster = Cluster::where('id', $id)->get();
      if($cluster[0]->user_id == Auth::user()->id){
        $notes = [];
        $clusterToNotes = ClusterToNote::where('cluster_id', $cluster[0]->id)->get();
        foreach($clusterToNotes as $clusterToNote){
          $note = Note::where('id', $clusterToNote->id)->get();
          array_push($notes, $note[0]);
        }
        return view('home', [
            'title' => $cluster[0]->name,
            'notes' => $notes
        ]);
      } else {return redirect('/home/2'); }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
