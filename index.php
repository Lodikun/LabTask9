<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LabTask9.css">
    <title>Word Jumbler</title>
</head>
<body>
    <div class="container">
        <h1>Word Jumbler</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="Word1">Word 1:</label>
                <input type="text" id="Word1" name="Word1" required>
            </div>
            <div class="input-group">
                <label for="Word2">Word 2:</label>
                <input type="text" id="Word2" name="Word2" required>
            </div>
            <div class="input-group">
                <label for="Word3">Word 3:</label>
                <input type="text" id="Word3" name="Word3" required>
            </div>
            <div class="input-group">
                <label for="Word4">Word 4:</label>
                <input type="text" id="Word4" name="Word4" required>
            </div>
            <div class="button-group">
                <input type="reset" value="Reset">
                <input type="submit" value="Submit">
            </div>
        </form>
        <?php
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word1 = $_POST["Word1"];
    $word2 = $_POST["Word2"];
    $word3 = $_POST["Word3"];
    $word4 = $_POST["Word4"];

    // Validate words
    if (!preg_match('/^[a-zA-Z]{4,7}$/', $word1)) {
        $errors[] = "Word 1 must contain only letters and be between 4 and 7 characters long.";
    }
    if (!preg_match('/^[a-zA-Z]{4,7}$/', $word2)) {
        $errors[] = "Word 2 must contain only letters and be between 4 and 7 characters long.";
    }
    if (!preg_match('/^[a-zA-Z]{4,7}$/', $word3)) {
        $errors[] = "Word 3 must contain only letters and be between 4 and 7 characters long.";
    }
    if (!preg_match('/^[a-zA-Z]{4,7}$/', $word4)) {
        $errors[] = "Word 4 must contain only letters and be between 4 and 7 characters long.";
    }

    if (empty($errors)) {
        // Generate jumbled sets of letters
        $jumbled1 = str_shuffle(strtoupper($word1));
        $jumbled2 = str_shuffle(strtoupper($word2));
        $jumbled3 = str_shuffle(strtoupper($word3));
        $jumbled4 = str_shuffle(strtoupper($word4));

        echo "Word 1: $jumbled1<br>";
        echo "Word 2: $jumbled2<br>";
        echo "Word 3: $jumbled3<br>";
        echo "Word 4: $jumbled4<br>";
    } else {
        // Display error messages with added CSS classes
        foreach ($errors as $error) {
            echo '<div class="error-message">' . $error . '</div>';
        }
    }
}
?>



    </div>
</body>
</html>
