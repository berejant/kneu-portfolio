@extends('layouts.main')

@section('title', 'Портфоліо ' . $teacher->getFullName() )

@section('content')

    <h3>
        {{$teacher->getFullName()}}
        @can('update', $teacher)
            <a href="{{route('portfolio.edit', ['teacher' => $teacher])}}">Редагувати</a>
        @endcan
    </h3>

    <img src="{{ $teacher->image_url }}" />

    @foreach($categories as $category)
    <dl>
        <h4>{{$category->name}}</h4>
        @foreach($category->portfolioFields as $field)
            <dt>{{$field->name}}</dt>
            <dd>@component($field->getBladeViewComponent(), ['field' => $field])@endcomponent</dd>
        @endforeach
    </dl>
    @endforeach

@endsection