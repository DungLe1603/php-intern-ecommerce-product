<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="POST" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="configuration">Configuration:</label>
            <textarea name="configuration" id="configuration" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label for="images">Images:</label>
            <input type="file" accept="image/*" name="images" id="images" multiple>
        </div>

        <div>
            <label for="color">Color:</label>
            <input type="text" name="color" id="color">
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price">
        </div>
    </form>
</body>
</html>
