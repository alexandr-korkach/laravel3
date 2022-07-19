<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'img', 'slug'];

    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function state(){
        return $this->hasOne(State::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function getBodyPreview(){
        return Str::limit($this->body, 100);
    }

    public function createdAtForHumans(){
        return $this->created_at->diffForHumans();
    }

    public function scopeLastLimit($query, $number){
        return $query->with('state', 'tags')->orderBy('created_at', 'desc')->take($number)->get();
    }

    public function scopeAllPaginate($query, $number){
        return $query->with('state', 'tags')->orderBy('created_at', 'desc')->paginate($number);
    }

    public function scopeFindBySlug($query, $slug){
        return $query->with('comments', 'state', 'tags')->where('slug', $slug)->firstOrFail();
    }

    public function scopeFindByTag($query, $number){
        return $query->with('state', 'tags')->orderBy('created_at', 'desc')->paginate($number);
    }

}
