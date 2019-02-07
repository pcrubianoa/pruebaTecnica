<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Article extends Model
{
    protected $fillable = [
        'name', 'code'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function orders()
    {
       return $this->hasMany(Order::class);
    }
}