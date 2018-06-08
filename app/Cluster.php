<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cluster extends Model
{
  public function clusterToNotes(){
    return $this->hasMany('App\ClusterToNote');
  }

  public function formatTime() {
      return Carbon::createFromFormat('Y-m-d H:i:s',$this->created_at)->format('d-m-Y H:i');
  }
}
