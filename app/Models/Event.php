<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use HasFactory;

    public $timestamps = false;
    use Sluggable;

    public function sluggable()
    {
        return [
          'slug' => [
              'source' => 'title',
              'onUpdate' => true
          ]
      ];
    }

    protected $fillable = [
      'category_id',
      'photo_id',
      'title',
      'place',
      'event_date',
      'web_page',
      'sign_up',
      'fanpage',
      'is_active'
  ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'event_users');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function opinions()
    {
        return $this->hasMany('App\Models\Opinion');
    }
}
