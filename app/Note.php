<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Note extends Model
{
    public function clusterToNotes(){
      return $this->hasMany('App\ClusterToNote');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function noteType(){
      return $this->belongsTo('App\NoteType');
    }

    public function tag(){
      return $this->belongsTo('App\Tag');
    }

    public function formatTime() {
        return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('d-m-Y H:i');
    }
}
