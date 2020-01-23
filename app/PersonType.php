<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonType extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    const FromPDF = 1;
    const FromText = 2;

    /**
     * Get a list of available report types.
     *
     * @return array
     */
    public static function getReportList(): array
    {
        return [
            self::FromPDF => 'ساخت گزارش بر اساس قالب PDF',
            self::FromText => 'ساخت گزارش بر اساس متن',
        ];
    }

    /**
     * Get a list of available report types as values.
     *
     * @return array
     */
    public static function getReportType(): array
    {
        return [self::FromPDF, self::FromText];
    }

    /**
     * Get the display name of the report type.
     *
     * @return string
     */
    public function getReportNameAttribute(): string
    {
        return self::getReportList()[$this->report_type];
    }

    /**
     * Get the details associated with the person type.
     */
    public function details(): HasMany
    {
        return $this->hasMany(PersonTypeDetail::class);
    }
}
