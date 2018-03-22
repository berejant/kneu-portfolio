<?php

namespace Kneu\Portfolio\Http\Controllers;

use Kneu\Portfolio\Faculty;
use Kneu\Portfolio\PortfolioCategory;
use Kneu\Portfolio\PortfolioField;
use Kneu\Portfolio\PortfolioValue;
use Kneu\Portfolio\Teacher;

class PortfolioEditController extends Controller
{
    public function edit(Teacher $teacher) {
        $this->authorize('update', $teacher);

        $categories = PortfolioCategory::withPortfolioValue($teacher->id)->ordered()->get();

        return view('portfolio.edit', compact(
            'teacher',
            'categories'
        ));
    }

}