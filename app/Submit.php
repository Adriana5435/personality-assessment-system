<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'submits';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['submit_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Submission status constants.
     */
    const UnPaid = 1;
    const Paid = 2;

    /**
     * Submission completion status constants.
     */
    const Submited = 1;
    const UnSubmited = 0;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'submit_data' => 'array',
    ];

    /**
     * Check if the submission is paid.
     *
     * @return bool
     */
    public function isPaid(): bool
    {
        return ($this->status == self::Paid);
    }

    /**
     * Get the list of submission status.
     *
     * @return array
     */
    public static function getSubmitStatus(): array
    {
        return [
            self::Submited => 'پایان یافته',
            self::UnSubmited => 'انجام نشده',
        ];
    }

    /**
     * Check if the submission is submitted.
     *
     * @return int
     */
    public function isSubmited(): int
    {
        return (empty($this->submit_data)) ? self::UnSubmited : self::Submited;
    }

    /**
     * Get the name of submission completion status.
     *
     * @return string
     */
    public function getSubmitedNameAttribute(): string
    {
        return self::getSubmitStatus()[$this->isSubmited()];
    }

    /**
     * Get the list of submission status.
     *
     * @return array
     */
    public static function getStatusList(): array
    {
        return [
            self::UnPaid => 'پرداخت نشده',
            self::Paid => 'پرداخت شده',
        ];
    }

    /**
     * Get the name of submission status.
     *
     * @return string
     */
    public function getStatusNameAttribute(): string
    {
        return self::getStatusList()[$this->status];
    }

    /**
     * Get the user who submitted this.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the questionnaire associated with the submission.
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class, 'questionnaire_id');
    }

    /**
     * Scope a query to only include paid submissions.
     */
    public function scopePaid($query)
    {
        return $query->whereStatus(self::Paid);
    }

    /**
     * Scope a query to only include submitted submissions.
     */
    public function scopeSubmited($query)
    {
        return $query->whereNotNull('submit_data')->where('submit_data','<>','[]');
    }

    /**
     * Scope a query to only include not submitted submissions.
     */
    public function scopeNotSubmited($query)
    {
        return $query->whereNull('submit_data')->where('submit_data','[]');
    }

    /**
     * Check if a user can submit this submission.
     *
     * @param  User  $user
     * @return bool
     */
    public function canSubmitByUser($user)
    {
        return $this->user_id == $user->id and $this->sumit_data == null;
    }
}
