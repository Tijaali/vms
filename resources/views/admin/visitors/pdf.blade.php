<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            @media print {
                table {
                    font-size: 10px; /* Adjust font size as needed */
                }
                .page-break {
                page-break-before: always;
            }
            }
        </style>


    </head>

<body>
    <h1 class="text-center">All Visitors</h1>
    @foreach ($visitors->chunk(10) as $chunk)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Mobile</th>
                <th scope="col">CNIC</th>
                <th scope="col">Address1</th>
                <th scope="col">Address2</th>
                <th scope="col">Category</th>
                <th scope="col">Depart</th>
                <th scope="col">Visitee</th>
                <th scope="col">From</th>
                <th scope="col">To</th>
                <th scope="col">Status</th>
                <th scope="col">Approval</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($chunk as $visitor)
                <tr>
                    <td>{{ $visitor->id }}</td>
                    <td><img src="/storage/{{ $visitor->image }}" alt=""></td>
                    <td>{{ $visitor->fname }}</td>
                    <td>{{ $visitor->lname }}</td>
                    <td>{{ $visitor->gender}}</td>
                    <td>{{ $visitor->mobilenumber}}</td>
                    <td>{{ $visitor->cnic_number}}</td>
                    <td>{{ $visitor->address1}}</td>
                    <td>{{ $visitor->address2}}</td>
                    <td>{{ $visitor->category->name}}</td>
                    <td>{{ $visitor->depart->name}}</td>
                    <td>{{ $visitor->visitee}}</td>
                    <td>{{ $visitor->from}}</td>
                    <td>{{ $visitor->to}}</td>
                    <td>{{ $visitor->status}}</td>
                    <td>{{ $visitor->purpose}}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page-break"></div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
