<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fund extends Model
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
        'type',
        'inception_date',
        'description'
    ];

    /**
     * the guarded colums
     *
     * @var array
     */
    protected $guarded = [

    ];

    /**
     * a funds investment
     *
     * @return HasOne
     */
    public function investment() : HasOne
    {
        return $this->HasOne(Investment::class);
    }
}
