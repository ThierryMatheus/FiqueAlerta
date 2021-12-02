@props(['type' => 'consumidor', 'empresa'])

@if($type === 'consumidor' ?? false)
    <svg {{ $attributes->merge(['class'=> 'mb-4 rounded-full border-8 bg-gray-300']) }}xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="128" height="128" preserveAspectRatio="xMidYMid meet" viewBox="0 0.5 16 16"><g transform="translate(16 0) scale(-1 1)"><g fill="currentColor"><path d="M3 14s-1 0-1-1s1-4 6-4s6 3 6 4s-1 1-1 1H3zm5-6a3 3 0 1 0 0-6a3 3 0 0 0 0 6z"/></g></g></svg>
@elseif($type === 'empresa' ?? false)
    <svg {{ $attributes->merge(['class' => 'mb-4 rounded-full border-8 bg-gray-300']) }}width="128" height="128" viewBox="-10 0 110 85" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M45.4781 74.268H15.267V53.1961H45.4781V74.268ZM90.7949 53.1961V42.6601L85.7597 16.3203H5.19657L0.161377 42.6601V53.1961H5.19657V84.8039H55.5485V53.1961H75.6893V84.8039H85.7597V53.1961H90.7949ZM85.7597 0.516357H5.19657V11.0523H85.7597V0.516357Z"
            fill="black"/>
    </svg>
@endif
