<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;
    
    protected $table = "jobs";
    protected $guarded = ['id'];
    protected $fillable = ['name'];

    public function candidates()
    {
        return $this->hasMany(Candidates::class, 'id');

    }
}
