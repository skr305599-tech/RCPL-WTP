<!-- Assignment no- 13 -->
<?php
session_start();

/* ---------- QUESTIONS ---------- */
$questions = [
    [
        "question" => "PHP ka full form kya hai?",
        "options" => ["Personal Home Page", "Private Home Page", "PHP Hypertext Preprocessor", "Pre Hyper Processor"],
        "answer" => 2
    ],
    [
        "question" => "PHP ka symbol kya hota hai?",
        "options" => ["<?php ?>", "<php>", "<? ?>", "<script>"],
        "answer" => 0
    ],
    [
        "question" => "PHP kis type ki language hai?",
        "options" => ["Client side", "Server side", "Both", "None"],
        "answer" => 1
    ],
    [
        "question" => "PHP me variable ka sign kya hota hai?",
        "options" => ["#", "$", "@", "&"],
        "answer" => 1
    ],
    [
        "question" => "PHP me session start karne ka function?",
        "options" => ["session_begin()", "session_start()", "start_session()", "begin_session()"],
        "answer" => 1
    ],
    [
        "question" => "PHP me array banane ka function?",
        "options" => ["makeArray()", "array()", "createArray()", "newArray()"],
        "answer" => 1
    ],
    [
        "question" => "PHP file ka extension kya hota hai?",
        "options" => [".html", ".js", ".php", ".css"],
        "answer" => 2
    ],
    [
        "question" => "PHP me echo ka use kis liye hota hai?",
        "options" => ["Input", "Output", "Loop", "Condition"],
        "answer" => 1
    ],
    [
        "question" => "PHP kis database ke sath commonly use hota hai?",
        "options" => ["MongoDB", "MySQL", "Oracle", "Firebase"],
        "answer" => 1
    ],
    [
        "question" => "PHP open source hai ya nahi?",
        "options" => ["Yes", "No", "Paid", "Trial"],
        "answer" => 0
    ]
];

/* ---------- INITIALIZE SESSION ONCE ---------- */
if (!isset($_SESSION['started'])) {
    $_SESSION['started'] = true;
    $_SESSION['index'] = 0;
    $_SESSION['score'] = 0;
    $_SESSION['questions'] = $questions;
}

/* ---------- NEXT BUTTON ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $i = $_SESSION['index'];

    if (isset($_POST['option']) && $_POST['option'] == $_SESSION['questions'][$i]['answer']) {
        $_SESSION['score']++;
    }

    $_SESSION['index']++;
}

/* ---------- RESULT ---------- */
if ($_SESSION['index'] >= count($_SESSION['questions'])) {
    echo "<h2>Quiz Finished 🎉</h2>";
    echo "<h3>Score: {$_SESSION['score']} / " . count($_SESSION['questions']) . "</h3>";
    session_destroy();
    exit;
}

/* ---------- CURRENT QUESTION ---------- */
$q = $_SESSION['questions'][$_SESSION['index']];
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Quiz</title>
</head>
<body>

<h3>Question <?php echo $_SESSION['index'] + 1; ?></h3>

<form method="post">
    <p><?php echo $q['question']; ?></p>

    <?php foreach ($q['options'] as $key => $opt): ?>
        <label>
            <input type="radio" name="option" value="<?php echo $key; ?>" required>
            <?php echo htmlspecialchars($opt); ?>
        </label><br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Next</button>
</form>

</body>
</html>
