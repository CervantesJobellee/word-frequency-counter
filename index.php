<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="process.php" method="post">
        <label for="text">Paste your text here: </label><br>
        <textarea id="text" name="text" rows="10" cols="50" required></textarea><br><br>
        
        <label for="sort">Sort by frequency: </label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display: </label>
        <input type="number" id="limit" name="limit" value="10" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Result</title>
    <style>
        /* CSS styles */
        /* Body, Centering Form*/
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    padding: 20px;
}

/* Form  container */
form {
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    max-width: 600px;
    margin: 0 auto;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

/* Labels and Inputs */
label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

textarea,
select,
input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Submit button */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

        /*End of CSS  */
    </style>
</head>
<body>
    <h1>Word Frequency Result</h1>

    <!-- HTML Form -->
    <form method="POST">
        <label for="text">Enter Text: </label>
        <textarea name="text" id="text" rows="4" cols="50"><?= $inputText ?></textarea>
        <br>
        <label for="sort">Sort Order: </label>
        <select name="sort" id="sort">
            <option value="asc" <?= ($selectedSortOrder === 'asc') ? 'selected' : '' ?>>Ascending</option>
            <option value="desc" <?= ($selectedSortOrder === 'desc') ? 'selected' : '' ?>>Descending</option>
        </select>
        <br>
        <label for="limit">Number of Words to Display: </label>
        <input type="number" name="limit" id="limit" value="<?= $selectedLimit ?>" min="1">
        <br>
        <input type="submit" value="Submit">
    </form>

    <!-- Display word frequency results in a table -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <table>
            <tr><th>Word</th><th>Frequency</th></tr>
            <?php foreach ($limitedWordFrequency as $word => $frequency): ?>
                <tr><td><?= $word ?></td><td><?= $frequency ?></td></tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</body>
</html>