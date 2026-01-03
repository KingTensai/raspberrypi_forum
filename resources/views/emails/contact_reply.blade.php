<h2>Hello {{ $messageData->name }},</h2>

<p>We have replied to your message:</p>

<blockquote style="border-left: 4px solid #ccc; padding-left: 8px; margin: 10px 0;">
    {{ $messageData->message }}
</blockquote>

<p><strong>Our reply:</strong></p>
<p>{{ $messageData->reply }}</p>

<p>Best regards,<br>Your Admin Team</p>
