<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Investment extends Model
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
        'name',
        'client_id',
        'fund_id',
        'date',
        'amount'
    ];

    /**
     * the guarded colums
     *
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * an investments fund
     *
     * @return HasMany
     */
    public function fund() : HasOne
    {
        return $this->HasOne(Fund::class,'id', 'fund_id');
    }
}
