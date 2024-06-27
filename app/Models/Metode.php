<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];


    public function learningActivities()
    {
        return $this->hasMany(LearningActivity::class);
    }
}
