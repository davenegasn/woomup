
<div class="form-group {{ $errors->has('girl1_id') ? 'has-error' : ''}}">
    <label for="girl1_id" class="control-label">{{ 'Usuaria 1' }}</label>
    <select class="form-control" name="girl1_id">
        @foreach($girls as $girl)
          <option value="{{$girl->id}}">{{$girl->name}}</option>
        @endforeach
      </select>
</div>
<div class="form-group {{ $errors->has('girl2_id') ? 'has-error' : ''}}">
    <label for="girl2_id" class="control-label">{{ 'Usuaria 2' }}</label>
    <select class="form-control" name="girl2_id">
        @foreach($girls as $girl)
          <option value="{{$girl->id}}">{{$girl->name}}</option>
        @endforeach
      </select>
</div>
<div class="form-group {{ $errors->has('match_type_id') ? 'has-error' : ''}}">
    <label for="match_type_id" class="control-label">{{ 'Tipo de match' }}</label>
    <select class="form-control" name="match_type_id">
        @foreach($matches_types as $types)
          <option value="{{$types->id}}">{{$types->name}}</option>
        @endforeach
      </select>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
