<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicOpinion extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'author',
        'author_description',
        'content'
      ];

      public function event()
      {
          return $this->belongsTo('App\Models\Event');
      }
}
