<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pair extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['questionnaire_id', 'type_indicator_1_id', 'type_indicator_2_id', 'type_indicator_prefered_id'];

    /**
     * Get the questionnaire that owns the pair.
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * Get the first type indicator of the pair.
     */
    public function typeIndicator1(): BelongsTo
    {
        return $this->belongsTo(TypeIndicator::class, 'type_indicator_1_id');
    }

    /**
     * Get the second type indicator of the pair.
     */
    public function typeIndicator2(): BelongsTo
    {
        return $this->belongsTo(TypeIndicator::class, 'type_indicator_2_id');
    }

    /**
     * Get the title of the pair combining both type indicators' titles.
     *
     * @return string
     */
    public function getPairTitle(): string
    {
        return $this->typeIndicator1->title_fa . ' / ' . $this->typeIndicator2->title_fa;
    }
}
