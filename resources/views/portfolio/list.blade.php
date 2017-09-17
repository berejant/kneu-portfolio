@extends('layouts.main')

@section('title', 'Портфоліо викладачів')

@section('content')

    <form class="row" method="get">
        <div class="form-group col-xs-4">
            <select name="department_id" class="form-control">
                <option value="" disabled @if(!$filter['department_id']) selected @endif>-- Фільтр за кафедрою --</option>
            @foreach($faculties as $faculty)
                @if($faculty->departments->count())
                <optgroup label="{{ $faculty->name }}">
                    @foreach($faculty->departments as $department)
                        <option value="{{$department->id}}" @if($filter['department_id']==$department->id) selected @endif >
                            {{ $department->name }}
                        </option>
                    @endforeach
                </optgroup>
                @endif
            @endforeach
            </select>
        </div>
        <div class="form-group col-xs-4">
            <input type="text" class="form-control" name="last_name" placeholder="Прізвище" value="{{ $filter['last_name'] }}">
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-default">Фільтрувати</button>
        </div>
    </form>

    <div class="row">
        <div class="col-md-6">
            <ul>
            @foreach($teachers as $teacher)
                <li>
                    <a href="{{ route('portfolio.show', ['teacher' => $teacher]) }}">
                        {{$teacher->getFullName()}}
                    </a>
                </li>

                @if( $loop->iteration === $middleIndex)
            </ul>
        </div>
        <div class="col-md-6">
            <ul>
                @endif
            @endforeach
            </ul>
        </div>

    </div>

    {{ $teachers->links() }}

@endsection