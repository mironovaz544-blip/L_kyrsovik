@props(['rating' => 0, 'count' => 0, 'size' => 'md'])

@php
    $sizeClasses = [
        'sm' => 'h-3 w-3',
        'md' => 'h-4 w-4',
        'lg' => 'h-5 w-5',
        'xl' => 'h-6 w-6',
    ];

    $starSize = $sizeClasses[$size] ?? $sizeClasses['md'];
    $fullStars = floor($rating);
    $hasHalfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
@endphp

<div class="flex items-center gap-1 sss">
    <div class="flex items-center">
        @for($i = 0; $i < $fullStars; $i++)
            <svg class="{{ $starSize }} text-yellow-400" viewBox="0 0 20 20">
                <defs>
                    <linearGradient id="half-fill-{{ $rating }}">
                        <stop offset="50%" stop-color="currentColor"></stop>
                        <stop offset="50%" stop-color="rgb(209 213 219)" stop-opacity="1"></stop>
                    </linearGradient>
                </defs>
                <path fill="url(#half-fill-{{ $rating }})" d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"></path>
            </svg>
        @endfor

        @for($i = 0; $i <$emptyStars; $i++)
            <svg class="{{ $starSize }} text-gray-300 fill-current" viewBox="0 0 20 20">
                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
            </svg>
        @endfor
    </div>
    <span class="text-sm text-gray-600 ml-1">
        {{number_format($rating, 1)}}
        @if($count > 0)
            <span class="text-gray-400">({{ $count }})</span>
        @endif
    </span>

</div>
