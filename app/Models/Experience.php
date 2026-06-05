<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    // protected $fillable=[
        // 'title',
        // 'company_name',
        // 'starting_date',
        // 'completion_date',
        // 'responsibilities',
    // ];
   protected function completionDate():Attribute{
        return Attribute::make(
            get: fn (?string $value) => $value ? \Carbon\Carbon::parse($value)->format('Y-m-d') : 'Present',
            set: fn ($value) => ($value === 'Present' || empty($value)) ? null : $value,
        );
    }
}
