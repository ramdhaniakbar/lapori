<?php

namespace App\Models;

use App\Models\Role;
use App\Models\PermissionRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'permissions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The role that belong to the Permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get all of the permission_role for the Permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permission_role(): HasMany
    {
        return $this->hasMany(PermissionRole::class, 'permission_id');
    }
}
