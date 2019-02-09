<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome email</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Thank you for posting an advert on our site, {{ $user->name }}</h1>
            <h2>Please see the details below</h2>

            <h3>{{ $PropertyAdvert->address . $PropertyAdvert->county . $PropertyAdvert->town }}

            <table>
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Rent</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Availability Date</th>
                        <th>Furnished</th>
                        <th>Further Deatils</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{ $PropertyAdvert->type }}</th>
                        <th>{{ $PropertyAdvert->rent }}</th>
                        <th>{{ $PropertyAdvert->bedrooms }}</th>
                        <th>{{ $PropertyAdvert->bathrooms }}</th>
                        <th>{{ $PropertyAdvert->date }}</th>
                        <th>{{ $PropertyAdvert->furnished }}</th>
                        <th>{{ $PropertyAdvert->description }}</th>
                    </tr>
                </tbody>
            </table>

            <h3>Please visit your <a href="property/{{ $PropertyAdvert->id }}/edit">advert</a> if you wish to make any changes</h3>
        </div>
    </div>
</body>
</html> 