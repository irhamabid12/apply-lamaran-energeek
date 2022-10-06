<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidates extends Model
{
    use HasFactory;

    protected $table = "candidates";
    protected $guarded = ['id'];
    protected $fillable = ['job_id', 'name', 'email', 'phone', 'year'];

    public function jobs()
    {
        return $this->belongsTo(Jobs::class, 'job_id');

    }
}
