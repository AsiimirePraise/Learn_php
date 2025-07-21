<?php
// Get the document
$docRoot = $_SERVER['DOCUMENT_ROOT'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP File Tools</title>
    <style>
        body { font-family: Arial; margin: 30px; }
        form { margin-bottom: 20px; }
        pre { background: #f4f4f4; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>PHP File Tools Dashboard</h1>

    <!-- Question 1: using file_get_contents() and file_put_contents() -->
    <h2>1. Generate Page from Template</h2>
    <?php
    if (isset($_POST['generate_template'])) {
        // Read the contents of the template file
        $template = file_get_contents('template.html');

        // Define values to replace placeholders in the template
        $replacements = [
            '{{title}}' => 'Welcome Page',
            '{{heading}}' => 'Hello!',
            '{{message}}' => 'This is a dynamically generated page.'
        ];

        // Replace placeholders with actual values
        $output = str_replace(array_keys($replacements), array_values($replacements), $template);

        // Save the output to a new file
        file_put_contents('output.html', $output);
        echo "<p>Generated <a href='output.html' target='_blank'>output.html</a></p>";
    }
    ?>
    <form method="post">
        <input type="submit" name="generate_template" value="Generate Template Page">
    </form>

    <!-- Question 2: Count email addresses in a file and output counts to another file -->
    <h2>2. Count Email Addresses</h2>
    <?php
    if (isset($_POST['count_addresses'])) {
        // Read each line (email) from addresses.txt
        $lines = file('addresses.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Count how many times each address appears
        $counts = array_count_values($lines);

        // Sort addresses by frequency in descending order
        arsort($counts);

        // Build the output string
        $output = '';
        foreach ($counts as $email => $count) {
            $output .= "$count,$email\n";
        }

        // Save the counts to a new file
        file_put_contents('addresses-count.txt', $output);
        echo "<p>Count written to <a href='addresses-count.txt' target='_blank'>addresses-count.txt</a></p>";
    }
    ?>
    <form method="post">
        <input type="submit" name="count_addresses" value="Count Emails in addresses.txt">
    </form>

    <!-- Question 3: Display CSV file as an HTML table -->
    <h2>3. Display CSV as HTML Table</h2>
    <?php
    if (isset($_POST['show_csv'])) {
        // Open the CSV file
        if (($handle = fopen('data.csv', 'r')) !== false) {
            echo "<table border='1' cellpadding='5'>";
            // Read each row and display as a table row
            while (($row = fgetcsv($handle)) !== false) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            fclose($handle);
        } else {
            echo "Unable to open data.csv";
        }
    }
    ?>
    <form method="post">
        <input type="submit" name="show_csv" value="Display data.csv as Table">
    </form>

    <!-- Question 4: Let user enter a filename under document root and display its content if safe -->
    <h2>4. View File Contents (Safe)</h2>
    <form method="post">
        <label for="filename">Enter file path (under document root):</label><br>
        <input type="text" name="filename" id="filename" required placeholder="e.g. article.html"><br>
        <input type="submit" name="view_file" value="View File">
    </form>

    <?php
    if (isset($_POST['view_file'])) {
        $filename = $_POST['filename'];

        // Convert the relative path to an absolute path
        $filePath = realpath($docRoot . '/' . $filename);

        // Check if the file exists, is readable, and is inside the document root
        // Question 5: Also restrict access to .html files only (for security)
        if ($filePath && str_starts_with($filePath, $docRoot) &&
            is_readable($filePath) && str_ends_with($filePath, '.html')) {
            // Display the contents safely
            echo "<h3>Contents of: " . htmlspecialchars($filename) . "</h3><pre>";
            echo htmlspecialchars(file_get_contents($filePath));
            echo "</pre>";
        } else {
            echo "<p style='color:red;'>Invalid or non-HTML file, or not allowed.</p>";
        }
    }

    // Helper function for PHP versions < 8: Check if string starts with another
    if (!function_exists('str_starts_with')) {
        function str_starts_with($haystack, $needle) {
            return substr($haystack, 0, strlen($needle)) === $needle;
        }
    }

    // Helper function for PHP versions < 8: Check if string ends with another
    if (!function_exists('str_ends_with')) {
        function str_ends_with($haystack, $needle) {
            return substr($haystack, -strlen($needle)) === $needle;
        }
    }
    ?>
</body>
</html>
