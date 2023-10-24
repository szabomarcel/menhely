<h1>Az örökbefogadás kezdete</h1>

<?php
var_dump($_SESSION);
$userid = $_SESSION['user']['userid'];
$allatid = filter_input(INPUT_GET, "allatid");
$allat = $db->getKivalasztottAllat($allatid);

if (filter_input(INPUT_POST, "orokbefogadas", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $allatid = filter_input(INPUT_POST, "allatid", FILTER_VALIDATE_INT);
    $userid = $_SESSION['user']['userid'];
    echo 'rögzités';
    if ($db->setOrokbefogadas($allatid, $userid)) {
        header("Location: index.php?menu=home");
    } else {
        echo 'Sikertelen rögzítés!';
    }
}
var_dump($allat);
echo '<p>Valóban szeretné a ' . $allat['allat_neve'] . ' nevű állatunkat?</p>';
//INSERT INTO `orokbefogadas` (`allatid`, `userid`) VALUES ('3', '1');
?>
<form method="POST" action="">
    <input type="hidden" name="userid" value="<?php echo $_SESSION['user']['userid']; ?>">
    <input type="hidden" name="allatid" value="<?php echo $allatid; ?>">
    <button type="submit" class="btn btn-danger" name="orokbefogadas" value="1">Igen</button>
    <a href="index.php" class="btn btn-light">Mégse</a>
</form>
