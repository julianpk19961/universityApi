<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Teacher extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teachers_subjects');
    }
}
