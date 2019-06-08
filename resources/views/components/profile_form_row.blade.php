@php
$type = isset($type) ? $type: "textt";
$input_classes = "form-control";
    $labels = $name . "-lbl1";
if(!$prepend_at)
{
    $input_classes .= " col-md-6";
    } else {
    $labels .= " " . $name . "-lbl2";
    }
@endphp
@error($name)
@php
$input_classes .= " is-invalid";
@endphp
@enderror
<div class="form-group row">
                    <label id="{{ $name }}-lbl1" class="form-label col-md-2">{{ $label . ':' }}</label>
@if($prepend_at)
                    <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                            <label id="{{ $name . '-lbl2' }}" class="input-group-text">@</label>
                        </div>
                        @endif
                        <input type="{{ $type }}" class="{{ $input_classes }}" id="{{ $name }}" name="{{ $name }}" value="{{ $slot }}"
                            aria-labelledby="{{ $labels }}" placeholder="{{ $placeholder }}"
                            @isset($pattern)
                            pattern="{{ $pattern }}"
                            @endisset
                            >
                            @if($prepend_at)
                    </div>
                    @endif
                    @error($name)
                            <div class="col-md-4 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                </div>
