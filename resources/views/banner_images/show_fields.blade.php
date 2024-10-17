<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/bannerImages.fields.id').':') !!}
    <p>{{ $bannerImages->id }}</p>
</div>

<!-- Banner Id Field -->
<div class="col-sm-12">
    {!! Form::label('banner_id', __('models/bannerImages.fields.banner_id').':') !!}
    <p>{{ $bannerImages->banner_id }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', __('models/bannerImages.fields.image').':') !!}
    <p>{{ $bannerImages->image }}</p>
</div>

<!-- Url Field -->
<div class="col-sm-12">
    {!! Form::label('url', __('models/bannerImages.fields.url').':') !!}
    <p>{{ $bannerImages->url }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', __('models/bannerImages.fields.title').':') !!}
    <p>{{ $bannerImages->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', __('models/bannerImages.fields.description').':') !!}
    <p>{{ $bannerImages->description }}</p>
</div>

