<?php

namespace Kneu\Portfolio\Policies;

use Kneu\Portfolio\User;
use Kneu\Portfolio\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the teacher.
     *
     * @param  \Kneu\Portfolio\User  $user
     * @param  \Kneu\Portfolio\Teacher  $teacher
     * @return mixed
     */
    public function view(User $user, Teacher $teacher)
    {
        return true;
    }

    /**
     * Determine whether the user can create teachers.
     *
     * @param  \Kneu\Portfolio\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the teacher.
     *
     * @param  \Kneu\Portfolio\User  $user
     * @param  \Kneu\Portfolio\Teacher  $teacher
     * @return mixed
     */
    public function update(User $user, Teacher $teacher)
    { var_dump(231);
        return $user->teacher_id === $teacher->id;
    }

    /**
     * Determine whether the user can delete the teacher.
     *
     * @param  \Kneu\Portfolio\User  $user
     * @param  \Kneu\Portfolio\Teacher  $teacher
     * @return mixed
     */
    public function delete(User $user, Teacher $teacher)
    {
        return false;
    }
}
