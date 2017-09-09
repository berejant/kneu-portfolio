<?php

namespace Kneu\Portfolio;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Kneu\Portfolio\Department
 *
 * @property-read \Kneu\Portfolio\Faculty $faculty
 * @property-read \Illuminate\Database\Eloquent\Collection|\Kneu\Portfolio\Teacher[] $teachers
 * @mixin \Eloquent
 * @property int $id
 * @property int $faculty_id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Department whereFacultyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Department whereUpdatedAt($value)
 * @property string|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Department onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\Department whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Department withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Kneu\Portfolio\Department withoutTrashed()
 */
class Department extends Model
{
    use SoftDeletes;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'faculty_id',
        'name',
    ];

    public function faculty()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Faculty');
    }

    public function teachers()
    {
        return $this->hasMany(__NAMESPACE__ . '\Teacher');
    }
}
