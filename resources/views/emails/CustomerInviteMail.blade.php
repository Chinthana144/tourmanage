<h5>Akagi eXperiences</h5>

<p>Hi {{ $customer->first_name .' '. $customer->last_name }}, </p>

<p>
    Thank you for your interest in our tour services.
</p>

<p>
    Please click the link below to submit your tour request:
</p>

<p>
    <a href="{{ url('/tour-request/' . $customer->invite_token) }}">
        Submit Tour Request
    </a>
</p>

<p>
    Best regards,<br>
    Akagi eXperiences.
</p>