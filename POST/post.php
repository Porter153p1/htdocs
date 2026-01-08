<html>
<body>

<form method="POST" action="demo_request.php">
  Name: <input type="text" name="fname">
  <input type="hidden" id="custid" name="custid" value="<?php echo '12345';>">
  <input type="submit">
</form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['fname']);
    if (empty($name)) {
        echo "Algo ha salido mal";
    } else {
        echo $name;
    }
}