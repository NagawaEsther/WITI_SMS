<form action="{{ route('send-whatsapp') }}" method="POST">
    @csrf
    <label for="phone">Student's WhatsApp Number:</label>
    <input type="text" name="phone" placeholder="+256XXXXXXXXX" required>

    <label for="message">Message:</label>
    <textarea name="message" placeholder="Enter your message" required></textarea>

    <button type="submit">Send Message</button>
</form>