@component('mail::message')
#You've got a email from {{ $contact->name }} 

With email 
{{ $contact->email }}

With the next subject
{{ $contact->subject }}

With the next message
{{ $contact->body }}

@component('mail::button', ['url' => 'http://localhost:8080'])
Got to the site
@endcomponent

Thanks,<br>
{{ config('blog.name') }}
@endcomponent
