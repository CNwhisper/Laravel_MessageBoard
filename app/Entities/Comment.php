<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'user_id', 'post_id','content'
    ];
    
    public function post()
    {
        return $this->belongsTo('App\Entities\Post');//\Entities
        //return $this->belongsToMany('App\Entities\posts', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('post_id');
            $table->string('content');
            $table->timestamps();
        });
    }
    
}
