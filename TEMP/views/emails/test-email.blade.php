<x-mail::message>
# Introduction

{{ dd($enquiry) }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
