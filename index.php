<?php
session_start();
if((!empty($_POST['submit'])) || (!empty($_POST['continue']))){
    $total_amount = $_SESSION['total_amount'];
}
elseif(!empty($_POST['reset'])){
    $total_amount = 100;
    $_SESSION['total_amount'] = $total_amount;
}
else{
    $total_amount = 100;
    $_SESSION['total_amount'] = $total_amount;
}

$dice1 = rand(1,6);
$dice2 = rand(1,6);
$option_selected = "";
?>
<p>Welcome to Lucky 7 Game</p>
<p>Place your bet (Rs. 10):</p>

<?php
if($total_amount > 0){
?>
<!-- <p>Your current Balance : <?php echo $total_amount;?></p> -->
<form name="f1" method="POST" id="f1">
<p>Below 7: <input type="radio" id="option_1" value="b_7" name="option"> &nbsp;&nbsp;
Lucky 7: <input type="radio" id="option_2" value="l_7" name="option"> &nbsp;&nbsp;
Above 7: <input type="radio" id="option_3" value="a_7" name="option"> &nbsp;&nbsp;</p>
<?php if(empty($_POST['option'])){?>
<input type="submit" id="submit" value="Play" name="submit">
<?php }?>
</form>
<?php
}
?>
<?php
if(!empty($_POST['option'])){
    $total_amount = $total_amount - 10;
    $_SESSION['total_amount'] = $total_amount;
?>
<p>Dice 1 : <?php echo $dice1;?></p>
<p>Dice 2 : <?php echo $dice2;?></p>
<p>Total : <?php echo $dice1+$dice2;?></p>
<?php
if(($_POST['option'] == "l_7") && (($dice1+$dice2) == 7)){
    echo "Congratulations! You win! Your Balance is now ".($_SESSION['total_amount']+30);
    $_SESSION['total_amount'] = $_SESSION['total_amount']+30;
}
elseif((($_POST['option'] == "a_7") && (($dice1+$dice2) > 7)) || (($_POST['option'] == "b_7") && (($dice1+$dice2) < 7))){
    echo "Congratulations! You win! Your Balance is now ".($_SESSION['total_amount']+20);
    $_SESSION['total_amount'] = $_SESSION['total_amount']+20;
}
else{
    echo "Sorry! You lose! Your current balance is ".($_SESSION['total_amount']);
}
?>
<p>
<form name="f2" method="POST" id="f2">    
    <input type="submit" id="reset" value="reset and play again" name="reset">
</form>
<form name="f3" method="POST" id="f3">   
    <input type="submit" id="continue" value="continue playing" name="continue">
</form>
</p>
<?php
}
?>
