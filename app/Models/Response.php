<?php

namespace App\Models;

use App\Models\User;
use App\Models\Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Response extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'responses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'report_id',
        'body_response',
        'response_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the user that owns the Response
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Get the reports that owns the Response
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reports(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }
}
