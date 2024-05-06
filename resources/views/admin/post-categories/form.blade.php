<div class="form-group">
    {{ html()->label('Name')->for('name') }}
    {{ html()->text('name')->class('form-control')->placeholder('Name') }}
</div>

<div class="form-group">
    {{ html()->label('Parent')->for('parent_id') }}
    {{ html()->select('parent_id', [null => 'Chose parent'] + $view->parentCategories)->class('form-control') }}
</div>

<div class="form-group">
    {{ html()->label('Description')->for('description') }}
    {{ html()->textarea('description')->class('form-control summernote-editor')->placeholder('Description') }}
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('admin.post-categories') }}" class="btn btn-secondary">Cancel</a>
</div>
