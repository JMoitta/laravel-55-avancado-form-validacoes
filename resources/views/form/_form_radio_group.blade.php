<div class="radio{{ $errors->has($field)?' has-error':''}}">
    {{ $slot }}
</div>
<div class="{{ $errors->has($field)?' has-error':''}}">
    @include('form._help_block', ['field' => $field])
</div>