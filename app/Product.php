<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
   
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'pro_name', 'Price', 'Image'
    ];
}