<div class="form-group row">
                    <label id="{{ $name }}-lbl1" class="form-label col-md-2">{{ $label }}:</label>
@if($prepend_at)
                    <div class="input-group col-md-6">
                        <div class="input-group-prepend">
                            <label id="twitter-lbl2" class="input-group-text">@</label>
                        </div>
                        @endif
                        <input type="@isset($type) {{$type }} @else text @endisset" class="form-control @if(!$prepend_at) col-md-6 @endif @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}" value="{{ $slot }}"
                            aria-labelledby="{{ $name . '-lbl1' }} @if($prepend_at) {{ $name . '-lbl2' }} @endif" placeholder="{{ $placeholder }}"
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