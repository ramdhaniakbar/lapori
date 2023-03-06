<?php

namespace App\Models;

use App\Models\DetailUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeUser extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'type_users';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get all of the detail_user for the TypeUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_user(): HasMany
    {
        return $this->hasMany(DetailUser::class, 'type_user_id');
    }
}
