<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Experience extends Model
{
    // protected $fillable=[
    // 'title',
    // 'company_name',
    // 'starting_date',
    // 'completion_date',
    // 'responsibilities',
    // ];
    protected function getcompletionDateAttribute($value)
    {
        if (empty($value)) {
            return 'Present';
        }
        return $value;
    }
}
