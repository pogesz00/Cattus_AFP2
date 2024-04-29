Blade is the simple, yet powerful templating engine provided with Laravel. Unlike other popular PHP templating engines, Blade does not restrict you from using plain PHP code in your views. All Blade views are compiled into plain PHP code and cached until they are modified, meaning Blade adds essentially zero overhead to your application. Blade view files use the .blade.php file extension and are typically stored in the resources/views directory.

Blade Directives
Blade provides a variety of convenient directives for working with the most common PHP control structures. These directives are enclosed by {{ and }} or {!! and !!}. Here are some of the most commonly used Blade directives:

Echoing Data:
{{ $variable }}: Echo the value of a variable.
{!! $variable !!}: Echo the value of a variable without escaping HTML entities.
Control Structures:
@if, @elseif, @else, @endif: Conditionally display content.
@unless, @endunless: Conditionally display content unless a condition is met.
@isset, @endisset: Check if a variable is set.
@empty, @endempty: Check if a variable is empty.
@switch, @case, @break, @default, @endswitch: Switch statement.
Loops:
@for, @endfor: Loop a specific number of times.
@foreach, @endforeach: Loop through arrays or collections.
@while, @endwhile: While loop.
Include Files:
@include('view.name'): Include another Blade view.
@includeIf('view.name'): Include another Blade view if it exists.
@includeWhen($condition, 'view.name'): Include another Blade view when a condition is met.
@includeFirst(['custom.admin', 'admin'], ['data' => $data]): Include the first view that exists from an array.
Extending Layouts:
@extends('layout.name'): Extend a master layout.
@section('content'), @endsection: Define sections in a child view.
@yield('section'): Yield content from a child view to a parent layout.
@show: Display the content of a section.
Comments:
{{-- This is a Blade comment --}}: Blade comments that won't appear in the rendered HTML.
PHP in Blade:
@php, @endphp: Execute arbitrary PHP code within a Blade template.
Escaping:
@{{, @}}: Display curly braces in Blade output.