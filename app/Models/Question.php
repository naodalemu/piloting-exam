<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;

    public function answers() : HasMany {
        return $this->hasMany(Answer::class);
    }

    public function questionSection() : BelongsTo {
        return $this->belongsTo(QuestionSection::class);
    }

    public function userAnswers() : HasMany {
        return $this->hasMany(UserAnswer::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, "created_by");
    }
}
