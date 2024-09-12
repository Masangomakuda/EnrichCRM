<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'client_id',
        'duedate',
        'status'
    ];

    protected $casts = [
        'duedate' => 'datetime',
        // 'created_at' => 'y/m/d',
    ];
    public const STATUS = ['open', 'inprogress', 'cancelled', 'completed'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

}
