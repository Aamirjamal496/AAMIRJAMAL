<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class ProjectImage extends Model
{
    protected $fillable = ["project_id", "images"];
    protected $table = "project_images";
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
