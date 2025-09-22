<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuestionSection extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionSectionFactory> */
    use HasFactory;

    public function questions() : HasMany {
        return $this->hasMany(Question::class);
    }
}
