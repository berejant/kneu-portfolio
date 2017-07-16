<?php

namespace Kneu\Portfolio;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Kneu\Portfolio\User
 *
 * @property-read \Kneu\Portfolio\Teacher $teacher
 * @mixin \Eloquent
 * @property int $id
 * @property string $email
 * @property string $type
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string|null $role
 * @property int|null $teacher_id
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Kneu\Portfolio\User whereType($value)
 */
class User extends Authenticatable
{
    public $timestamps = false;

    public function teacher()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Teacher');
    }

}
