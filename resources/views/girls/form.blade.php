<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($girl->name) ? $girl->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">{{ 'Rol' }}</label>
    <select class="form-control" name="role_id">
        @foreach($roles as $role)
          <option value="{{$role->id}}">{{$role->title}}</option>
        @endforeach
      </select>
</div>
<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="control-label">{{ 'Empresa' }}</label>
    <select class="form-control" name="company_id">
        @foreach($companies as $company)
          <option value="{{$company->id}}" >{{$company->name}}</option>
        @endforeach
      </select>
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
