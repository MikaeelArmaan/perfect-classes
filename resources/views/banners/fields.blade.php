<!-- Name Field -->
<div class="form-group row">
    {!! Form::label('name', __('models/banners.fields.name').':',['class' => 'col-sm-4']) !!}
    {!! Form::text('name', null, ['class' => 'form-control col-sm-8']) !!}
</div>

<!-- Sequence Field -->
<div class="form-group row">
    {!! Form::label('sequence', __('models/banners.fields.sequence').':',['class' => 'col-sm-4']) !!}
    {!! Form::number('sequence', null, ['class' => 'form-control col-sm-8']) !!}
</div>

<!-- Position Field -->
<div class="form-group row">
    {!! Form::label('position', __('models/banners.fields.position').':',['class' => 'col-sm-4']) !!}
    {!! Form::select('position', ['Home' => 'Home', '' => ''], null, ['class' => 'form-control custom-select col-sm-8']) !!}
</div>

<!-- Title Field -->
<div class="form-group row">
    {!! Form::label('title', __('models/banners.fields.title').':',['class' => 'col-sm-4']) !!}
    {!! Form::text('title', null, ['class' => 'form-control col-sm-8']) !!}
</div>

<!-- Subtitle Field -->
<div class="form-group row">
    {!! Form::label('subtitle', __('models/banners.fields.subtitle').':',['class' => 'col-sm-4']) !!}
    {!! Form::text('subtitle', null, ['class' => 'form-control col-sm-8']) !!}
</div>

<!-- Description Field -->
<div class="form-group row">
    {!! Form::label('description', __('models/banners.fields.description').':',['class' => 'col-sm-4']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control col-sm-8 description']) !!}
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="25%">{!! Form::label('image', __('models/banners.fields.image')) !!}</th>
                <th width="25%">{!! Form::label('url', __('models/banners.fields.url').':') !!}</th>
                <th width="25%">{!! Form::label('title', __('models/banners.fields.title')) !!}</th>
                <th width="25%">{!! Form::label('description', __('models/banners.fields.description')) !!}</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($banner->bannerImages))
                @foreach($banner->bannerImages as $key => $image)
                <tr class="item" style="display: table-row;" id="row_{{ $key }}">
                    <td colspan="4" style="position: relative;">
                        <!-- Remove Icon -->
                        <button type="button" class="bg-danger removeRowBtn rounded-pill" data-row="row_{{ $key }}" 
                                style="position: absolute; top: 5px; left: 2px; background: none; border: none; z-index:1;">
                            <i class="fa fa-1x fa-minus " aria-hidden="true" ></i>
                        </button>
                        <div class="slider-content-wrapper" style="position: relative; padding: 15px; border: 1px solid red;">
                            <!-- Row Content (image, text, etc.) -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="input-group">
                                        <div class="custom-file">
                                           {!! Form::file('slider['.$key.'][image]', ['class' => 'custom-file-input', 'onchange' => 'previewImage(this)']) !!}
                                            {!! Form::label('image', __('models/banners.fields.image'), ['class' => 'custom-file-label']) !!}
                                        </div>
                                    </div>
                                    <img src="{{ asset('storage/'.$image->image) }}" alt="Image Preview" style="width: 100px; height: 100px; margin-top: 10px;">
                                </div>
                                <div class="col-sm-3">{!! Form::text('slider['.$key.'][url]', $image->url, ['class' => 'form-control']) !!}</div>
                                <div class="col-sm-3">{!! Form::text('slider['.$key.'][title]', $image->title, ['class' => 'form-control']) !!}</div>
                                <div class="col-sm-3">
                                {!! Form::textarea('slider['.$key.'][description]', $image->description, ['class' => 'form-control description', 'id' => 'description_'.$key, 'rows' => 3]) !!}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="text-center">
                    <button type="button" class="btn btn-secondary" id="addSliderButton">
                        <i class="fa fa-plus"></i> Add Slider
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@push('third_party_scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<script>
    $(document).ready(function() {
        let sliderCount = {{ isset($banner) && $banner->bannerImages?count($banner->bannerImages):0 }}; // Start with the count of existing banner images

        function createEditorForDescription(rowId) {
            ClassicEditor
                .create(document.querySelector(`#description_${rowId}`), {
                    mediaEmbed: {
                        previewsInData: true
                    }
                })
                .then(editor => {
                    console.log('Editor initialized for row:', rowId);
                })
                .catch(error => {
                    console.error(error);
                });
        }

        // Initialize editors for existing rows
        @if(!empty($banner->bannerImages))
            @foreach($banner->bannerImages as $key => $image)
                createEditorForDescription({{ $key }});
            @endforeach
        @endif

        // Add Slider Button Click Event
        $("#addSliderButton").on("click", function() {
            sliderCount++; // Increment slider count for new row

            // Generate a new row
            let newRow = `<tr class="item" style="display: table-row;" id="row_${sliderCount}">
                <td colspan="4" style="position: relative;">
                    <!-- Remove Icon -->
                    <button type="button" class="bg-danger removeRowBtn rounded-pill" data-row="row_${sliderCount}" 
                            style="position: absolute; top: 5px; left: 2px; background: none; border: none; z-index:1;">
                        <i class="fa fa-1x fa-minus " aria-hidden="true" ></i>
                    </button>
                    <div class="slider-content-wrapper" style="position: relative; padding: 15px; border: 1px solid #ddd;">
                        <!-- Row Content (image, text, etc.) -->
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <div class="custom-file">
                                       {!! Form::file('slider[${sliderCount}][image]', ['class' => 'custom-file-input', 'onchange' => 'previewImage(this)']) !!}
                                        {!! Form::label('image', __('models/banners.fields.image'), ['class' => 'custom-file-label']) !!}
                                    </div>
                                </div>
                                <img src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; margin-top: 10px;">
                            </div>
                            <div class="col-sm-3">{!! Form::text('slider[${sliderCount}][url]', null, ['class' => 'form-control']) !!}</div>
                            <div class="col-sm-3">{!! Form::text('slider[${sliderCount}][title]', null, ['class' => 'form-control']) !!}</div>
                            <div class="col-sm-3">
                            {!! Form::textarea('slider[${sliderCount}][description]', null, ['class' => 'form-control description', 'id' => 'description_${sliderCount}', 'rows' => 3]) !!}
                            </div>
                        </div>
                    </div>
                </td>
            </tr>`;

            // Append the new row
            $("table tbody").append(newRow);

            // Initialize CKEditor for the newly added description field
            createEditorForDescription(sliderCount);
        });

        // Remove row
        $(document).on("click", ".removeRowBtn", function() {
            let rowId = $(this).data("row"); // Get the row ID from the data attribute
            $(`#${rowId}`).remove(); // Remove the row
        });

        // Image Preview Function
        window.previewImage = function(input) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).closest('td').find('img').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(input.files[0]);
        };
    });
</script>
@endpush