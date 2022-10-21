<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectCategory extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $fillable = ['name', 'slug', 'parent_id'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function projectCategory()
    {
        return $this->belongsTo(ProjectCategory::class, 'parent_id');
    }

    public function projectCategories()
    {
        return $this->hasMany(ProjectCategory::class, 'parent_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'project_category_id');
    }
}
