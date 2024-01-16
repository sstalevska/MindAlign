@props([
    'set' => [],
    'name' => '',
])

<div>
    @foreach ($set as $item)
        <div>
            <label>
                <input type="checkbox" name="{{ $name }}[]" value="{{ $item }}">
                <span class="ml-2">{{ $item }}</span>
            </label>
        </div>
    @endforeach
</div>