@foreach($field->portfolioValues as $value)
    <div class="row js-remove-if-empty">
        <input type="text" class="form-control"
               name="{{ $fieldName }}[{{$value->id}}]" id="field_{{$field->id}}_{{$value->id}}"
               placeholder="{{$field->hint}}" value="{{$value->value}}" />
    </div>
@endforeach
<div class="row js-endless-list">
    <input type="text" class="form-control" name="{{ $fieldName }}[new]" placeholder="{{$field->hint}}" />
</div>
