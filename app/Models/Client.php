<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Client extends Model
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
        'permission',
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
     * a clients investments
     *
     * @return HasMany
     */
    public function investments() : HasMany
    {
        return $this->hasMany(Investment::class);
    }

    /**
     * a clients funds
     *
     * @return HasManyThrough
     */
    public function funds() : HasManyThrough
    {
        return $this->hasManyThrough(Fund::class, Investment::class);
    }
}
