<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'employees';

    protected $guard = 'employee';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get all of the response for the Employee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function response(): HasMany
    {
        return $this->hasMany(Response::class, 'employee_id', 'id');
    }
}