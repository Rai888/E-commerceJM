<?php
if($_POST["password"] == $_POST["Cpassword"])
{
include("connection.php");
session_start();
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$user = $_POST['username'];
$pass = MD5($_POST['password']);
$pass = MD5($_POST['Cpassword']);
$codFisc = $_POST['codFiscale'];
?>

<?php

if(strlen($codFisc)!=16)
{
    echo"Codice fiscale non valido <br>";
    echo"<A href=\"javascript:history.back()\">Torna indietro</A><br>";
    die();
}
if(!mb_eregi("^[A-Z0-9]+$", $codFisc))
{
    echo"Hai inserito caratteri non validi per il codice fiscale<br>";
    echo"<A href=\"javascript:history.back()\">Torna indietro</A><br>";
    die();
}
$stringa=strtoupper($codFisc);
echo"$stringa<br>";
$stringamodificata="0$stringa"; //0 carattere fittizio di inizio stringa
for($i=0; $i<17; $i++)
    $carattere[$i]=substr($stringamodificata, $i, 1);
for($i=1; $i<16; $i++)
{    
    if ($i%2 == 0)
    {    
            switch($carattere[$i])
            {
            case '0': $valore[$i]='0'; break;
            case '1': $valore[$i]='1'; break;
            case '2': $valore[$i]='2'; break;
            case '3': $valore[$i]='3'; break;
            case '4': $valore[$i]='4'; break;
            case '5': $valore[$i]='5'; break;
            case '6': $valore[$i]='6'; break;
            case '7': $valore[$i]='7'; break;
            case '8': $valore[$i]='8'; break;
            case '9': $valore[$i]='9'; break;
            case 'A': $valore[$i]='0'; break;
            case 'B': $valore[$i]='1'; break;
            case 'C': $valore[$i]='2'; break;
            case 'D': $valore[$i]='3'; break;
            case 'E': $valore[$i]='4'; break;
            case 'F': $valore[$i]='5'; break;
            case 'G': $valore[$i]='6'; break;
            case 'H': $valore[$i]='7'; break;
            case 'I': $valore[$i]='8'; break;
            case 'J': $valore[$i]='9'; break;
            case 'K': $valore[$i]='10'; break;
            case 'L': $valore[$i]='11'; break;
            case 'M': $valore[$i]='12'; break;
            case 'N': $valore[$i]='13'; break;
            case 'O': $valore[$i]='14'; break;
            case 'P': $valore[$i]='15'; break;
            case 'Q': $valore[$i]='16'; break;
            case 'R': $valore[$i]='17'; break;
            case 'S': $valore[$i]='18'; break;
            case 'T': $valore[$i]='19'; break;
            case 'U': $valore[$i]='20'; break;
            case 'V': $valore[$i]='21'; break;
            case 'W': $valore[$i]='22'; break;
            case 'X': $valore[$i]='23'; break;
            case 'Y': $valore[$i]='24'; break;
            case 'Z': $valore[$i]='25'; break;
            }
    
    }    

    else
    {
        switch($carattere[$i])
        {
            case '0': $valore[$i]='1'; break;
            case '1': $valore[$i]='0'; break;
            case '2': $valore[$i]='5'; break;
            case '3': $valore[$i]='7'; break;
            case '4': $valore[$i]='9'; break;
            case '5': $valore[$i]='13'; break;
            case '6': $valore[$i]='15'; break;
            case '7': $valore[$i]='17'; break;
            case '8': $valore[$i]='19'; break;
            case '9': $valore[$i]='21'; break;
            case 'A': $valore[$i]='1'; break;
            case 'B': $valore[$i]='0'; break;
            case 'C': $valore[$i]='5'; break;
            case 'D': $valore[$i]='7'; break;
            case 'E': $valore[$i]='9'; break;
            case 'F': $valore[$i]='13'; break;
            case 'G': $valore[$i]='15'; break;
            case 'H': $valore[$i]='17'; break;
            case 'I': $valore[$i]='19'; break;
            case 'J': $valore[$i]='21'; break;
            case 'K': $valore[$i]='2'; break;
            case 'L': $valore[$i]='4'; break;
            case 'M': $valore[$i]='18'; break;
            case 'N': $valore[$i]='20'; break;
            case 'O': $valore[$i]='11'; break;
            case 'P': $valore[$i]='3'; break;
            case 'Q': $valore[$i]='6'; break;
            case 'R': $valore[$i]='8'; break;
            case 'S': $valore[$i]='12'; break;
            case 'T': $valore[$i]='14'; break;
            case 'U': $valore[$i]='16'; break;
            case 'V': $valore[$i]='10'; break;
            case 'W': $valore[$i]='22'; break;
            case 'X': $valore[$i]='25'; break;
            case 'Y': $valore[$i]='24'; break;
            case 'Z': $valore[$i]='23'; break;
        }
    }
}

for($i=1; $i<16; $i++)
    $somma+=$valore[$i];
$controllo=$somma%26;

switch($controllo)
{
    case '0': $letteracontrollo='A'; break;
    case '1': $letteracontrollo='B'; break;
    case '2': $letteracontrollo='C'; break;
    case '3': $letteracontrollo='D'; break;
    case '4': $letteracontrollo='E'; break;
    case '5': $letteracontrollo='F'; break;
    case '6': $letteracontrollo='G'; break;
    case '7': $letteracontrollo='H'; break;
    case '8': $letteracontrollo='I'; break;
    case '9': $letteracontrollo='J'; break;
    case '10': $letteracontrollo='K'; break;
    case '11': $letteracontrollo='L'; break;
    case '12': $letteracontrollo='M'; break;
    case '13': $letteracontrollo='N'; break;
    case '14': $letteracontrollo='O'; break;
    case '15': $letteracontrollo='P'; break;
    case '16': $letteracontrollo='Q'; break;
    case '17': $letteracontrollo='R'; break;
    case '18': $letteracontrollo='S'; break;
    case '19': $letteracontrollo='T'; break;
    case '20': $letteracontrollo='U'; break;
    case '21': $letteracontrollo='V'; break;
    case '22': $letteracontrollo='W'; break;
    case '23': $letteracontrollo='X'; break;
    case '24': $letteracontrollo='Y'; break;
    case '25': $letteracontrollo='Z'; break;
}
if($carattere[16]!=$letteracontrollo)
    echo"Il codice fiscale inserito non è valido"; 
?>








<?php
$sqlcont="SELECT * FROM utenti WHERE username = '$user' OR codFiscale = '$codFisc'";
$resultcont = $conn->query($sqlcont);
if($resultcont->num_rows == 0){



$sql = "INSERT INTO utenti (nome, cognome, username, password, codFiscale)
VALUES ('$nome', '$cognome', '$user', '$pass', '$codFisc')";

if ($conn->query($sql) === TRUE) {
    $_SESSION["username"] = $user;
$sqlq="SELECT * FROM utenti WHERE codFiscale = '$codFisc'";
$resultq=$conn->query($sqlq);
$rowq = $resultq->fetch_assoc();

    $_SESSION["id"] = $rowq["id"];
    header("location:index.php");
} else {
echo "Errore: " . $sql . "
" . $conn->error;
}
$conn->close();
}
else {
header("location:signup.php?msg=Username o codiceFiscale già utilizzato");
}
}else{
    header("location:signup.php?msg=Password non corrispondenti"); 
}
