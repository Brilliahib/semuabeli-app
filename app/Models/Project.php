<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::created(function (Project $project) {
            $users = User::all();
            $project->users()->attach($users);
        });

        static::deleting(function (Project $project) {
            // Hapus gambar cover terkait
            Storage::disk('public')->delete($project->cover);

            // Hapus semua gambar di ProjectImage terkait
            $project->images()->each(function ($image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            });

            if ($project->file) {
                Storage::disk('public')->delete($project->file);
            }
        });
    }

    public function tools(){
        return $this->belongsToMany(Tools::class, 'project_tools');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_projects');
    }
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
}
