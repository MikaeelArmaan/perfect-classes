<!-- Banner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('banner_id', __('models/bannerImages.fields.banner_id').':') !!}
    {!! Form::number('banner_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/bannerImages.fields.image').':') !!}
    <div class="input-group">
        <div class="custom-file">
            {!! Form::file('image', ['class' => 'custom-file-input']) !!}
            {!! Form::label('image', 'Choose file', ['class' => 'custom-file-label']) !!}
        </div>
    </div>
</div>
<div class="clearfix"></div>


<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', __('models/bannerImages.fields.url').':') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/bannerImages.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/bannerImages.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>