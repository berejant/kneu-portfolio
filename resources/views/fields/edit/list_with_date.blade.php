<ol class="col-sm-10 edit-petition-input-list">
    @foreach($field->portfolioValues as $value)
        <li class="js-remove-if-empty">
            <div class="col-sm-3">
                <input type="date" class="form-control" placeholder="{{$field->hint}}"
                       name="{{ $fieldName }}[{{$value->id}}][date]" id="field_{{$field->id}}_{{$value->id}}" value="{{$value->value}}" />
            </div>

            <div class="col-sm-12">
                <textarea type="text" class="form-control"
                    placeholder="{{$field->hint}}" rows="1"
                    name="{{ $fieldName }}[{{ $value->id }}][text]" id="field_{{$field->id}}_{{$value->id}}"
                   >{{$value->value}}</textarea>
            </div>

        </li>
    @endforeach
    <li class="js-endless-list">
        <textarea type="text" class="form-control" placeholder="{{$field->hint}}" rows="1"
                  name="{{ $fieldName }}[new][text]"></textarea>

        <div class="row">
            <label for="field_{{$field->id}}_date" class="col-sm-2 control-label">Дата публікації</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="field_{{$field->id}}_date" name="{{ $fieldName }}[new][date]" placeholder="{{$field->hint}}" />
            </div>

        </div>

    </li>

</ol>