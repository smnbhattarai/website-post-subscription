<x-mail::message>
# Hello {{ $user->name }}

A new post was added to {{ $post->website->name }}. Please go to the link below to read now.

<x-mail::button :url="$post->website->url">
Read here
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
