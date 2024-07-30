<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    public $timestamps=false;
    protected $fillable = [
       'user_id',
       'profile_image',        
       'firstname',
       'lastname',            
       'gender',            
       'phone_number'

   ];   
  protected $table='profile';
  protected $primaryKey='id';
}
