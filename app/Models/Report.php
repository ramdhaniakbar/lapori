<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Comment;
use App\Models\Response;
use App\Models\ReportCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'reports';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'report_category_id',
        'title_report',
        'body_report',
        'incident_date',
        'location_incident',
        'report_image',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Get the user that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    /**
     * Get the report_category that owns the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function report_category(): BelongsTo
    {
        return $this->belongsTo(ReportCategory::class, 'report_category_id', 'id');
    }

    /**
     * Get all of the responses for the Report
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses(): HasMany
    {
        return $this->hasMany(Response::class, 'report_id');
    }
}
