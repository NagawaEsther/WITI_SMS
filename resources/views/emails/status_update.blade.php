<!DOCTYPE html>
<html>

<head>
    <title>Request Update</title>
</head>

<body>
    <h3>Hello {{ $request->first_name }},</h3>
    <p>Your request for dead {{ $request->type }} has been <strong>{{ ucfirst($request->status) }}</strong>.</p>

    <p><strong>Reason:</strong> {{ $request->reason }}</p>

    @if($request->document)
    <p>You can view your document <a href="{{ asset('storage/' . $request->document) }}">here</a>.</p>
    @endif

    <p>Thank you.</p>
</body>

</html>