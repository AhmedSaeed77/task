<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{
    use HasFactory;
    protected $table = 'album_images';
    public $fillable = [ 'id' , 'name' , 'image' ,'album_id'];
    
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function albums()
    {
        return $this->belongsTo(Album::class,'album_id');
    }
}
