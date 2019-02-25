<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id', 'title', 'content',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');//\Entities
    }

    public function comments()
    {   
        //return $this->belongsTo('App\Entities\Comment');//\Entities
        return $this->hasMany('App\Entities\Comment');
    }
    
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });
    }
}
