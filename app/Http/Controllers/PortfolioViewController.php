<?php

namespace Kneu\Portfolio\Http\Controllers;

use Kneu\Portfolio\Faculty;
use Kneu\Portfolio\PortfolioCategory;
use Kneu\Portfolio\PortfolioField;
use Kneu\Portfolio\PortfolioValue;
use Kneu\Portfolio\Teacher;

class PortfolioViewController extends Controller
{
    public function show(Teacher $teacher) {
        $categories = PortfolioCategory::withPortfolioValue($teacher->id)->ordered()->get();

        return view('portfolio.item', compact(
            'teacher',
            'categories'
        ));
    }

    public function index () {

        $filter = filter_input_array(INPUT_GET, [
            'department_id' => FILTER_VALIDATE_INT,
            'last_name' => FILTER_DEFAULT
        ]);

        $user = \Auth::user();

        $builder = Teacher::orderBy('last_name', 'ASC');

        if($filter['department_id']) {
            $builder->where('department_id', '=', $filter['department_id']);
        }

        if($filter['last_name']) {
            $builder->where('last_name', 'LIKE', '%' . $filter['last_name'] . '%');
        }

        $teachers = $builder->paginate(50);
        $teachers->appends($filter);

        $middleIndex = (int)floor($teachers->count() / 2);

        $faculties = Faculty::with('departments')->get();

        return view('portfolio.list', compact(
            'teachers',
            'middleIndex',
            'filter',
            'faculties'
        ));

    }

}