<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClusterToNote extends Model
{
    public function cluster(){
      return $this->belongsTo('App\Cluster');
    }
    public function note(){
      return $this->belongsTo('App\Note');
    }
}
