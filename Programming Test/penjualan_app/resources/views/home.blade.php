<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
                font-family: 'Courier New', Courier, monospace;
            }
            .container{
                grid: 
                width: 80%;
            }

            table, th, td {
                margin: 0 auto;
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 3px;
            }

            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body class="antialiased">
        <a href="create">Create</a>
        <div class="container">
            <table>
                <thead>
                    <th>No</th>
                    <th>Transaksi</th>
                    <th>Total Item</th>
                    <th>Total Quantity</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= count($transactions); $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $transactions[$i - 1]->no_transaction }}</td>
                            <td>{{ $transactions[$i - 1]->total_item }}</td>
                            <td>{{ $transactions[$i - 1]->total_quantity }}</td>
                            <td>
                                <a href="view/{{  encrypt($transactions[$i - 1]->id) }}">View</a> | <a href="edit/{{  encrypt($transactions[$i - 1]->id) }}">Edit</a> | <a href="delete/{{  encrypt($transactions[$i - 1]->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </body>
</html>
