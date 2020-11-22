<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:2|max:45',
        'description' => 'required|min:5|max:45',
        'quantity' => 'required|max:45',
    ];

    public function suppliers()
    {
        return $this->belongsToMany('App\Models\Supplier', 'supplier_products');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'order_details');
    }
}
