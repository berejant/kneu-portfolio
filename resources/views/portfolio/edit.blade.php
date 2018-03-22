@extends('layouts.main')

@section('title', 'Портфоліо ' . $teacher->getFullName() )

@section('content')

    <h3>
        {{$teacher->getFullName()}}
    </h3>

    <form method="post" action="{{route('portfolio.update', ['teacher' => $teacher])}}" class="form-horizontal portfolio-edit-form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-2">
                <img src="{{ $teacher->image_url }}" align="left" />
            </div>

        </div>

        @foreach($categories as $category)
            <div>
                <h4>{{$category->name}}</h4>
                @foreach($category->portfolioFields as $field)
                    <div class="form-group">
                        <label for="field_{{$field->id}}" class="col-sm-2 control-label">{{$field->name}}</label>
                        @component($field->getBladeEditComponent(), [
                            'field' => $field,
                            'fieldName' => $field->getFormFieldName($teacher)
                        ])@endcomponent
                    </div>
                @endforeach
            </div>
            <hr />
        @endforeach

        <div class="row">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-success">Зберегти</button>
            </div>
        </div>

    </form>

@endsection