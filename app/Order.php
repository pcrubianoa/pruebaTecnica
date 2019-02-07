<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Order extends Model
{
    protected $fillable = [
        'user_id', 'date', 'quantity', 'concept', 'state', 'import'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

	public function article()
	{
	    return $this->belongsTo(Article::class);
	}
}