<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'role'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPositionAttribute(){
        if ($this->role == 0) {
            return 'Admin';
        } else {
            return 'Student';
        }
    }
}
