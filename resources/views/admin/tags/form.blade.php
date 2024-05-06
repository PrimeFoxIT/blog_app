<div class="form-group">
    {{ html()->label('Name')->for('name') }}
    {{ html()->text('name')->class('form-control')->placeholder('Name') }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('admin.tags') }}" class="btn btn-secondary">Cancel</a>
</div>
