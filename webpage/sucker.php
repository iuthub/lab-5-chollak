<?php
$errors = false;
if (empty($_REQUEST["name"]) || empty($_REQUEST["section"]) || empty($_REQUEST["cardnumber"]) || empty($_REQUEST["cardtype"])) {
    $errors = true;
} else {

    if (isset($_REQUEST["submit"])) {
        $text = $_REQUEST["name"] . ";" . $_REQUEST["section"] . ";" . $_REQUEST["cardnumber"] . ";" . $_REQUEST["cardtype"] . "\n";
        file_put_contents("suckers.txt", $text, FILE_APPEND);
    }
    $file = trim(file_get_contents("suckers.txt"));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <?php if ($errors) : ?>
        <h2>Sorry</h2>
        <p>
            You didn't fill out the form completely. <a href="buyagrade.html">Try again ?</a>
        </p>
    <?php else : ?>
        <h2>Thanks, sucker!</h2>
        <p>
            Your information has been recorded.
        </p>
        <dl>
            <dt>Name</dt>
            <dd>
                <?= $_REQUEST["name"] ?>
            </dd>

            <dt>Section</dt>
            <dd>
                <?= $_REQUEST["section"] ?>
            </dd>

            <dt>Credit Card</dt>
            <dd>
                <?= $_REQUEST["cardnumber"] ?> <?= (isset($_REQUEST["cardtype"])) ? "(" . $_REQUEST["cardtype"] . ")-" : ""; ?>
            </dd>
        </dl>
        <p>
            Here are all the suckers who have submitted here:
        </p>
        <br>
        <pre>
        <?= $file ?>
    </pre>
    <?php endif; ?>
</body>

</html>