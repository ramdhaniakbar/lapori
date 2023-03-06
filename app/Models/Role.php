<?php

namespace App\Models;

use App\Models\User;
use App\Models\RoleUser;
use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'roles';

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
     * The user that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The permission that belong to the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permission(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     * Get all of the role_user for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function role_user(): HasMany
    {
        return $this->hasMany(RoleUser::class, 'role_id');
    }

    /**
     * Get all of the permission_role for the Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permission_role(): HasMany
    {
        return $this->hasMany(PermissionRole::class, 'role_id');
    }
}
