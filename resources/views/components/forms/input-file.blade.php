<div class="form-group {{$topclass}}">
    @isset($label)
    <label for="{{$id}}">{{$label}}</label>
    @endisset
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="{{$inputclass}} custom-file-input @error($name) is-invalid @enderror" id="{{$id}}"
                name="{{$name}}" {{($required) ? 'required' : '' }} {{($multiple) ? 'multiple' : '' }}
                {{($disabled) ? 'disabled' : '' }}>
            <label class="custom-file-label" for="{{$id}}">{{$placeholder}}</label>
        </div>
    </div>
    @error($name)
    <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@push('scripts')
<script>
    $(()=>{bsCustomFileInput.init();})
</script>
@endpush