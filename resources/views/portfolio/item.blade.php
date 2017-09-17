@extends('layouts.main')

@section('title', 'Портфоліо ' . $teacher->getFullName() )

@section('content')

    <h3>{{$teacher->getFullName()}}</h3>

    <img src="{{ $teacher->image_url }}" />

    @foreach($categories as $category)
        <h4>{{$category['name']}}</h4>

        @foreach($category['fields'] as $field)
            <dd>
                {{$field['name']}}
            </dd>

            <dt>
                {{$field['formatValue']}}
            </dt>
        @endforeach

    @endforeach

@endsection