<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Courier New', Courier, monospace;
        }
        label {
            display: block;
        }

        .form {
            min-width: 300px;
            max-width: 400px;
            margin: 0 auto;
        }
        input {
            width: 100%;
        }
        fieldset {
            margin-bottom: 20px; 
        }

        .item-container {
            height: 200px;
            overflow-y: scroll; 
        }
        .item {
            padding: 10px;
            margin-bottom: 30px;
            border: 1px solid black;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <a href="/home">Home</a>
    <a href="/create">Create</a>
    <div class="form">
        <h2>View</h2>
        <fieldset>
            <label>
                Transaction No
                <input type="number" name="no_transaction" id="no_transaction" value={{ $transaction->no_transaction }} readonly>
            </label>
            <hr>
            <label>
                Transaction Date
                <input type="text" name="transaction_date" id="transaction_date" value={{ $transaction->transaction_date }} readonly>
            </label>
        </fieldset>
        <fieldset>
            <h3>Detail Items</h3>
            <input type="button" value="Add Item" id="addItem" hidden>
            <hr>
            
            <div class="item-container" id="item-container">
                @foreach ($transaction_details as $transaction_detail)
                    <div class="item">
                        <label>
                            Item Name
                            <input type="text" name="item[]" id="item" value={{ $transaction_detail->item }} readonly>
                        </label>
                        <label>
                            Quantity
                            <input type="number" name="quantity[]" id="quantity" value={{ $transaction_detail->quantity }} readonly>
                        </label>
                    </div>
                @endforeach
            </div>
        </fieldset>
    </div>
</body>
</html>