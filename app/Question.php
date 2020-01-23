<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['questionnaire_id', 'pair_id', 'title', 'type_indicator_1_id', 'point_first', 'option_first', 'type_indicator_2_id', 'point_second', 'option_second'];

    /**
     * Get the questionnaire that owns the question.
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the pair that the question belongs to.
     */
    public function pair(): BelongsTo
    {
        return $this->belongsTo(Pair::class);
    }

    /**
     * Get the first type indicator associated with the question.
     */
    public function typeIndicator1 (): BelongsTo
    {
        return $this->belongsTo(TypeIndicator::class, 'type_indicator_1_id');
    }

    /**
     * Get the second type indicator associated with the question.
     */
    public function typeIndicator2 (): BelongsTo
    {
        return $this->belongsTo(TypeIndicator::class, 'type_indicator_2_id');
    }
}
