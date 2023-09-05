<x-mail::message>
    # New Message

    You received a new contact message from Portfolio

    Message From:

    Name: {{ $data['name'] }}
    Email: {{ $data['email'] }}

    Message content:
    
    {{ $data['message'] }}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
