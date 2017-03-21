<?php

namespace App\Envelopes;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Return envelopes records associated with this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function envelopes()
    {
        return $this->hasMany(Envelope::class);
    }
}
