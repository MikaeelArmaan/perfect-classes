 <tr class="item" style="display: table-row;">
        <td>
            <div class="input-group">
                <div class="custom-file">
                    {!! Form::file('slider[image][{{ $sliderCount}}]', ['class' => 'custom-file-input', 'onchange' => 'previewImage(this)']) !!}
                    {!! Form::label('image', __('models/banners.fields.image'), ['class' => 'custom-file-label']) !!}
                </div>
            </div>
            <img src="#" alt="Image Preview" style="display: none; width: 100px; height: 100px; margin-top: 10px;">
        </td>
        <td>{!! Form::text('slider[url][{{ $sliderCount}}]', null, ['class' => 'form-control']) !!}</td>
        <td>{!! Form::text('slider[title][{{ $sliderCount}}]', null, ['class' => 'form-control']) !!}</td>
        <td>{!! Form::text('slider[subtitle][{{ $sliderCount}}]', null, ['class' => 'form-control']) !!}</td>
        <td>{!! Form::textarea('description[{{ $sliderCount}}]', null, ['class' => 'form-control description', 'id' => 'description_{{ $sliderCount}}', 'rows' => 3]) !!}</td>
    </tr>