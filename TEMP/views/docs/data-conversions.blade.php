<h1>PHP Data Conversions</h1>

{{-- READ ME | READ ME | READ ME | READ ME | READ ME | READ ME --}}
{{--        DO NOT USE AUTO FORMATTING IN THIS DOCUMENT        --}}
{{-- READ ME | READ ME | READ ME | READ ME | READ ME | READ ME --}}


<h4>Use `json_encode` to convert an array of arrays to an array of objects</h4>

@php
    $arrayOfArrays = [
        ['title' => 'Accordion one', 'body' => 'This body for accordion one.'],
        ['title' => 'Accordion two', 'body' => 'This body for accordion two.']
    ];

    $json = json_encode($arrayOfArrays);

@endphp



<x-markdown class="-ml-3">


    @verbatim
        ```
        // convert array of arrays
        $arrayOfArrays = [
            ['title' => 'Accordion one', 'body' => 'This body for accordion one.'],
            ['title' => 'Accordion two', 'body' => 'This body for accordion two.'],
        ];

        // to array of objects
        $arrayOfObjects = [
            {title: 'Accordion one', body 'This body for accordion one'},
            {title: 'Accordion two', body 'This body for accordion two'},
        ]
    @endverbatim
</x-markdown>

<pre>{{ $json }}</pre>
