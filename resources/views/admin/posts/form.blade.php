<div class="form-group">
    {{ html()->label('Title')->for('title') }}
    {{ html()->text('title')->class('form-control')->placeholder('Title') }}
</div>

<div class="form-group">
    {{ html()->label('Category')->for('category_id') }}
    {{ html()->select('category_id', [null => 'Chose category'] + $view->categories)->class('form-control') }}
</div>

<div class="form-group">
    {{ html()->label('Tags')->for('tags') }}
    {{ html()->multiselect('tags', [null => 'Chose tags'] + $view->tags, $view->selectedTags)->class('form-control') }}
</div>
<div class="form-group">
    {{ html()->label('Published')->for('published_at') }}
    {{ html()->datetime('published_at')->class('form-control') }}
</div>

<div class="form-group">
    {{ html()->label('Content')->for('content') }}
    {{ html()->textarea('content')->class('form-control summernote-editor')->placeholder('Content') }}
</div>

<div class="form-group">
    {{ html()->label('Thumbnail')->for('thumbnail') }}
    {{ html()->file('thumbnail')->acceptImage()->class('form-control') }}
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('admin.posts') }}" class="btn btn-secondary">Cancel</a>
</div>
