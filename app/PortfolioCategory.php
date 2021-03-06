<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Kneu\Portfolio\Portfolio\PortfolioCategory
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kneu\Portfolio\Portfolio\PortfolioField[] $portfolioFields
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory withPortfolioValue($teacherId = null)
 * @property int $order_index
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory ordered()
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\PortfolioCategory whereOrderIndex($value)
 */
class PortfolioCategory extends Model
{
    public $timestamps = false;

    public function portfolioFields()
    {
        return $this->hasMany(__NAMESPACE__ .  '\PortfolioField');
    }

    public function scopeWithPortfolioValue($portfolioCategoryQuery, $teacherId = null)
    {
        return $portfolioCategoryQuery->with([
            'PortfolioFields' => function($portfolioFieldsQuery) use ($teacherId) {
                return $portfolioFieldsQuery->ordered()->with([
                    'PortfolioValues' => function($portfolioValuesQuery) use ($teacherId) {
                        if($teacherId) {
                            $portfolioValuesQuery->where('teacher_id', '=', $teacherId);
                        }

                        return $portfolioValuesQuery;
                    }
                ]);
            }
        ]);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order_index', 'ASC');
    }


}
