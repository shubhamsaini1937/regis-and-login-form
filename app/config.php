<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "pwrfitness";

$con = mysqli_connect($server, $user, $password, $db);

if($con)
{
?>
<script>
    alert ("connection successfully");
</script>
<?php

}
else{
    ?>
<script>
    alert ("connection failed");
</script>
<?php
}

?>