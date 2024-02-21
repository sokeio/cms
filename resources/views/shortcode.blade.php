<div {!! $attributes ?? '' !!} @if (isset($attrs['poll'])) wire:{{ $attrs['poll'] }} @endif>
    @includeif($shortcodeView, [
        'attrs' => $attrs,
        'content' => $content,
        'shortcode' => $shortcode,
        ...$shortcodeData,
    ])
</div>
