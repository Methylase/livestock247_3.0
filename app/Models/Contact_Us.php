<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'message_type'=>'required',
        'your_name'=>'required',
        'company_name'=>'required',
        'email'=>'required',
        'phone_number'=>'required',
        'your_message'=>'required'
   ];   
  protected $table='contact_us';
  protected $primaryKey='id';
}
