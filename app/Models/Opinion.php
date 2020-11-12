<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'author',
        'atmosphere_rating',
        'road_rating',
        'organization_rating',
        'overall_rating',
        'body'
    ];
  
      public function event()
      {
          return $this->belongsTo('App\Models\Event');
      }
}
