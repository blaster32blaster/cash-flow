<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;


    /**
     * use timestamps in the model
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * use auto incrementing PKs
     *
     * @var boolean
     */
    public $incrementing = false;

    /**
     * the fillable columns
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'investment_id',
        'date',
        'return'
    ];

    /**
     * the guarded colums
     *
     * @var array
     */
    protected $guarded = [

    ];
}
