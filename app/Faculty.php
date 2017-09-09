<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Kneu\Portfolio\Faculty
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kneu\Portfolio\Department[] $departments
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Faculty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Faculty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Faculty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Faculty whereUpdatedAt($value)
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Faculty onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Faculty whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Faculty withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Faculty withoutTrashed()
 */
class Faculty extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
    ];

    public function departments()
    {
        return $this->hasMany(__NAMESPACE__ . '\Department');
    }

}
