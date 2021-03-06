<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number',
        'user_id',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'order_number' => 'required|unique:orders|min:3|max:45',
        'user_id' => 'required|exists:users,id',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_details');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
