<!DOCTYPE html>
<html>
 <head>
    <title>Account {{ $account->id }}</title>
    @vite('resources/css/app.css')
 </head>
 <body>
    <h1>Account no {{ $account->accountno }}</h1>
    <ul>
        <li>Balance: {{ $account->balance }}</li>
        <li>Interest: {{ $account->interest }}</li>
    </ul>
 </body>
</html>
