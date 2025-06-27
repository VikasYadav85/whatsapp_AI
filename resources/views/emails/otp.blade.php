<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>
</head>
<body>
    <h2>Hello,</h2>
    <p>Your OTP is:</p>
    <h1 style="color: blue;">{{ $otp }}</h1>
    <p>Expires at: {{ $expiry ?? '10 minutes' }}</p>
</body>
</html>
