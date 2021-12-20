<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base MVC with PHP</title>
</head>
<body>
    
    <h1>Support App</h1>
    <h3>Add a request</h3>
    <section>
        <form action="?action=store" method="post">
            
            <label for="topic">Topic</label>
            <select name="topic" id="topic" required>
                <option value="" hidden selected>Select an option</option>
                <option value="Print error">Print error</option>
                <option value="Windows Blue Screen">Windows Blue Screen</option>
            </select>
            
            <label for="description">Description</label>
            <textarea type="text" name="description" id="description" required></textarea>
            
            <label for="user_name">User name</label>
            <input type="text" name="user_name" id="user_name" required>
            <input type="submit" value="Add">
        </form>        
    </section>

</body>
</html>