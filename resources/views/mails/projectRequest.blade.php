@component('mail::message')
Hello,

You have received a new request regarding your project.
@component('mail::button', ['url' => env('APP_URL'). '/#/project-requests/'. $projectClientId])
    See request
@endcomponent


Best regards,<br>
The Signifly team
@endcomponent