<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/images.fields.id').':') !!}
    <p>{{ $image->id }}</p>
</div>

<!-- Type Field -->
<div class="col-sm-12">
    {!! Form::label('type', __('models/images.fields.type').':') !!}
    <p>{{ $image->type }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('models/images.fields.image').':') !!}
    <p>{{ $image->image }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/images.fields.title').':') !!}
    <p>{{ $image->title }}</p>
</div>

<!-- Subtitle Field -->
<div class="col-sm-12">
    {!! Form::label('subtitle', __('models/images.fields.subtitle').':') !!}
    <p>{{ $image->subtitle }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/images.fields.description').':') !!}
    <p>{{ $image->description }}</p>
</div>

<!-- Parent Id Field -->
<div class="col-sm-12">
    {!! Form::label('parent_id', __('models/images.fields.parent_id').':') !!}
    <p>{{ $image->parent_id }}</p>
</div>

