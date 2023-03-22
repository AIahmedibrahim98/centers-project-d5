<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id', 'id');
    }
    public function instractor()
    {
        return $this->belongsTo(User::class, 'instractor_id', 'id');
    }
}
