<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questionnaire extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'price'];

    /**
     * Get the type indicators associated with the questionnaire.
     */
    public function typeIndicators(): HasMany
    {
        return $this->hasMany(TypeIndicator::class);
    }

    /**
     * Get the pairs associated with the questionnaire.
     */
    public function pairs(): HasMany
    {
        return $this->hasMany(Pair::class);
    }

    /**
     * Get the questions associated with the questionnaire.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the submits associated with the questionnaire.
     */
    public function submits(): HasMany
    {
        return $this->hasMany(Submit::class);
    }

    /**
     * Get the person types associated with the questionnaire.
     */
    public function personTypes(): HasMany
    {
        return $this->hasMany(PersonType::class);
    }

    /**
     * Check if a user can submit this questionnaire.
     *
     * @param User $user
     * @return bool
     */
    public function canSubmit(User $user, Submit $submit): bool
    {
        if ($user->submits()->paid()->where('id', $submit->id)->notSubmited()->count()) {
            return true;
        }
        return false;
    }

    /**
     * Scope a query to eagerly load all related relationships.
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeWithAll(Builder $query): Builder
    {
        return $query->with('typeIndicators', 'pairs', 'questions', 'personTypes');
    }
}
