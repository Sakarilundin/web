<?php

function etunimi_tyhja($usr) {
  if (!empty($usr)) {
    if (preg_match('/^[a-öA-Ö]*$/',$usr)) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function sukunimi($suku) {
  if (!empty($suku)) {
    if (preg_match('/^[a-öA-Ö]*$/',$suku)) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function sahkoposti_tyhja($email) {
  if (!empty($email)) {
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function viesti_tyhja($message) {
  if (!empty($message)) {
    return true;
  } else {
    return false;
  }
}

function yhteys() {
  $server=parse_ini_file("huskies.ini");
  $connect=mysqli_connect($server["server"],$server["user"],
          $server["passwd"],$server["db"]);

  if (mysqli_connect_errno()) {
    return false;
  } else {
    return $connect;
  }
}

function valmistele_tiedot($conn) {
  $query="INSERT INTO husky_test (etunimi,sukunimi,sahkoposti,viesti)
          VALUES (?,?,?,?)";
  $prep_info=mysqli_prepare($conn,$query);

  if($prep_info!=false) {
    return $prep_info;
  } else {
    return false;
  }
}

function lisaa_tiedot($prepd,$conn,$fname,$lname,$mail,$mesg) {

  mysqli_stmt_bind_param($prepd,'ssss',$fn,$ln,$email,$msg);

  $fn=mysqli_real_escape_string($conn,$fname);
  $ln=mysqli_real_escape_string($conn,$lname);
  $email=mysqli_real_escape_string($conn,$mail);
  $msg=mysqli_real_escape_string($conn,$mesg);

  if (mysqli_stmt_execute($prepd)==true) {
    mysqli_stmt_close($prepd);
    return true;
  } else {
    mysqli_stmt_close($prepd);
    return false;
  }
}

?>
