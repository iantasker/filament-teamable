<?php

namespace FilamentTenant\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Parental\HasChildren;

class Tenant extends Model
{
    use HasChildren;
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'address' => 'array',
        'additional_properties' =>'array'
    ];

    protected $fillable = [
        'additional_properites',
        'type'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, Membership::class)
                        ->withPivot('role')
                        ->withTimestamps()
                        ->as('membership');
    }
}
