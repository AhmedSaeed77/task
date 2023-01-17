<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';
    public $fillable = [ 'id' , 'name' , 'user_id'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function images()
    {
        return $this->hasMany(AlbumImage::class,'album_id');
    }
}
