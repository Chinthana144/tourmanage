<table style="width:600px;">
    <tr>
        <td>
            <img src="{{ asset('images/company/logo.png') }}" alt="Akagi logo" style="width: 140px;">
        </td>
        <td>
            <h2>Akagi eXperience</h2>
            <p>Travel Beyond The Ordinary.</p>
        </td>
    </tr>
</table>

<p>Hi {{ $customer->first_name .' '. $customer->last_name }}, </p>

<p>
    Thank you for contacting <strong>Akagi eXperiences</strong>.
    Please click the button below to submit your tour request.
</p>

<p style="text-align:left; margin:30px 0;">
    <a href="{{ url('/tour-request/' . $customer->invite_token) }}"
        style="
            background:#1e88e5;
            color:#ffffff;
            padding:14px 28px;
            text-decoration:none;
            border-radius:4px;
            font-weight:bold;
        ">
        Submit Tour Request
    </a>
</p>

<p>
    If you did not request this, you may safely ignore this email.
</p>

<p>
    Best regards,<br>
    Akagi eXperiences.
</p>