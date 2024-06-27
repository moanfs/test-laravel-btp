<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LearningActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['metode_id', 'title', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];

    public function metode()
    {
        return $this->belongsTo(Metode::class);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}
