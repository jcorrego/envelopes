<?php

namespace App\Envelopes;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['month', 'envelope_id', 'value'];
}
