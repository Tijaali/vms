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
                font-size: 10px;
                /* Adjust font size as needed */
            }

            .page-break {
                page-break-before: always;
            }
        }
    </style>


</head>

<body>
    <div style="width: 600px; background-color:antiquewhite;margin:auto; text-align:center ;">
        <h1 style="text-align: center; margin-bottom:10px">{{ $visitor->name }} Details</h1>
        <img src="data:image/png+jpg;base64,<?php echo base64_encode(file_get_contents(base_path('public/storage/'.$visitor->image))); ?>" style="width: 200px; height:170px; border-radius:50px;">
        <table style="width: 80%; margin:auto">
            <tr>
                <th> <label style="color:black; font-size:20px">Id</label></th>
                <td>
                    <p>{{ $visitor->id }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Name</label></th>
                <td>
                    <p>{{ $visitor->name }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Gender</label></th>
                <td>
                    <p>{{ $visitor->gender }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Mobile</label></th>
                <td>
                    <p>{{ $visitor->mobilenumber }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">CNIC</label></th>
                <td>
                    <p>{{ $visitor->cnic_number }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Address1</label></th>
                <td>
                    <p>{{ $visitor->address1 }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Address2</label></th>
                <td>
                    <p>{{ $visitor->address2 }}</p>
                </td>
            </tr>
            <tr>
                <th> <label style="color:black; font-size:20px">Category</label></th>
                <td>
                    <p>{{ $visitor->category->name }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Depart</label></th>
                <td>
                    <p>{{ $visitor->depart->name }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Visitee</label></th>
                <td>
                    <p>{{ $visitor->visitee }}</p>
                </td>
            </tr>
            <tr>
                <th> <label style="color:black; font-size:20px">From</label></th>
                <td>
                    <p>{{ $visitor->from }}</p>
                </td>
            </tr>
            <tr>
                <th> <label style="color:black; font-size:20px">To</label></th>
                <td>
                    <p>{{ $visitor->to }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Status</label></th>
                <td>
                    <p>{{ $visitor->status }}</p>
                </td>
            </tr>
            <tr>
                <th><label style="color:black; font-size:20px">Approval</label></th>
                <td>
                    <p>{{ $visitor->purpose }}</p>
                </td>
            </tr>

        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
