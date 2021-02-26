<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * an investment
     *
     * @return BelongsTo
     */
    public function investment() : BelongsTo
    {
        return $this->belongsTo(Investment::class);
    }
}
