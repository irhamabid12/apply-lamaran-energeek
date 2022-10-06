<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill_sets extends Model
{
    use HasFactory;

    protected $table = "skill_sets";

    public function candidateId()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');

    }

    public function skillId()
    {
        return $this->belongsTo(Skill::class, 'skill_id');

    }
}
