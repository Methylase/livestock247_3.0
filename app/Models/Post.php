<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
       'user_id',
        'link_post_title', 	
        'post_title',
        'post_description', 	
        'post_image', 	
        'last_read_time', 	
        'delete_post', 	
        'created_at', 	
        'updated_at'	

   ];   
  protected $table='posts';
  protected $primaryKey='id';
}
