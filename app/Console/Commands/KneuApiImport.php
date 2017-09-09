<?php

namespace Kneu\Portfolio\Console\Commands;

use Illuminate\Console\Command;
use \Kneu\Api;
use Carbon\Carbon;
use Kneu\Portfolio\Department;
use Kneu\Portfolio\Faculty;
use Kneu\Portfolio\Teacher;

class KneuApiImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kneu-api:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import from KNEU API information about Faculties, Departments and Teachers';

    /** @var Api */
    protected $api;

    /** @var int */
    protected $limit = 500;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @param Api $api
     * @return mixed
     */
    public function handle(Api $api)
    {
        $this->api = $api;
        $this->startDatetime = Carbon::now();

        \DB::transaction(function () {
            $this->importFaculties();
            $this->importDepartments();
            $this->importTeachers();
        });
    }

    protected function importFaculties()
    {
        $offset = 0;
        do {
            /**
             * @var \stdClass $kneuFaculty
             * @var Faculty $faculty
             */
            foreach($this->api->getFaculties($offset, $this->limit) as $kneuFaculty) {
                $faculty = Faculty::withTrashed()->findOrNew($kneuFaculty->id);
                $faculty->fill((array)$kneuFaculty);
                $faculty->trashed() ? $faculty->restore() : $faculty->touch();
            }

            $offset = $this->api->getContentRange('end') + 1;
        } while ( $offset < $this->api->getContentRange('total') );

        Faculty::where('updated_at', '<', $this->startDatetime)->delete();
    }

    protected function importDepartments()
    {
        $offset = 0;
        do {
            /**
             * @var \stdClass $kneuDepartment
             * @var Department $teacher
             */
            foreach($this->api->getDepartments($offset, $this->limit) as $kneuDepartment) {
                $department = Department::withTrashed()->findOrNew($kneuDepartment->id);
                $department->fill((array)$kneuDepartment);
                $department->trashed() ? $department->restore() : $department->touch();
            }

            $offset = $this->api->getContentRange('end') + 1;
        } while ( $offset < $this->api->getContentRange('total') );

        Department::where('updated_at', '<', $this->startDatetime)->delete();
    }

    protected function importTeachers()
    {
        $offset = 0;
        do {
            /**
             * @var \stdClass $kneuTeacher
             * @var Teacher $teacher
             */
            foreach($this->api->getTeachers($offset, $this->limit) as $kneuTeacher) {
                $teacher = Teacher::withTrashed()->findOrNew($kneuTeacher->id);
                $teacher->fill((array)$kneuTeacher);
                $teacher->trashed() ? $teacher->restore() : $teacher->touch();
            }

            $offset = $this->api->getContentRange('end') + 1;
        } while ( $offset < $this->api->getContentRange('total') );

        Teacher::where('updated_at', '<', $this->startDatetime)->delete();
    }


}
