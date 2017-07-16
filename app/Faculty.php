<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;

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
 */
class Faculty extends Model
{
    public $incrementing = false;

    public function departments()
    {
        return $this->hasMany(__NAMESPACE__ . '\Department');
    }

}
