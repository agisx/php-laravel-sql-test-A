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

        form {
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
    <a href="home">Home</a>
    <form action="create" method="post">
        @csrf
        <h2>Create</h2>
        <fieldset>
            <label>
                Transaction No
                <input type="number" name="no_transaction" id="no_transaction">
            </label>
            <hr>
            <label>
                Transaction Date
                <input type="text" name="transaction_date" id="transaction_date">
            </label>
        </fieldset>
        <fieldset>
            <h3>Detail Items</h3>
            <input type="button" value="Add Item" id="addItem">
            <hr>
            
            <div class="item-container" id="item-container">
            </div>
        </fieldset>

        <input type="submit" value="Buat">
    </form>
    <script>
        document.getElementById("addItem").addEventListener("click", function (e) {
            // Create a new div element with the class name item
            const item = document.createElement('div');
            item.className = 'item';

            const destroy = document.createElement('input');
            destroy.type = 'button';
            destroy.value = "X";
            // Add a click event listener to the item element
            destroy.addEventListener('click', function (event) {
                // Remove the item element from its parent element
                item.parentNode.removeChild(item);
            });

            // Create a label for item name
            const nameLabel = document.createElement('label');
            nameLabel.textContent = 'Item Name';

            // Create an input for item name
            const nameInput = document.createElement('input');
            nameInput.type = 'text';
            nameInput.name = 'item[]';
            nameInput.id = 'item';

            // Append the input to the label
            nameLabel.appendChild(nameInput);

            // Create a label for quantity
            const quantityLabel = document.createElement('label');
            quantityLabel.textContent = 'Quantity';

            // Create an input for quantity
            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.name = 'quantity[]';
            quantityInput.id = 'quantity';

            // Append the input to the label
            quantityLabel.appendChild(quantityInput);

            // Append the labels to the item
            item.appendChild(destroy);
            item.appendChild(nameLabel);
            item.appendChild(quantityLabel);

            // Append the item to the container
            itemContainer = document.getElementById("item-container")
            itemContainer.appendChild(item);
        });
    </script>
</body>
</html>