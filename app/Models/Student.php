<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';

    protected $fillable = [
        'user_id','avatar', 'phone', 'address', 'gender', 'birthday', 'faculty_id'
    ];

    public function getAgeAttribute()
    {
        return date_diff(date_create($this->birthday), date_create('now'))->y;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function getGendAttribute()
    {
        if ($this->gender == 0) {
            return 'other';
        } elseif ($this->gender == 1) {
            return 'male';
        } else {
            return 'female';
        }
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'student_subject');
    }
}
