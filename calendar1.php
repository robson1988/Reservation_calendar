<?php

 function displayChoosenMonth() {
   if(isset($_POST['month'])){
    $mon = date("n",strtotime($_POST['month']));
    $yea = date("Y",strtotime($_POST['month']));

    //funkca sprawdza ile jest dni w podanym miesiacu
    function check_number_of_days($mon, $yea) {
      $number = cal_days_in_month(CAL_GREGORIAN, $mon, $yea);
      return $number;
    }
    //funcka sprawdza jakim dniem jest pierszy  dzien miesiaca 0-niedziela 6-sobota
    function check_first_month_day($mon, $yea) {
      $weekDay = date("w", mktime(0, 0, 0, $mon, 1, $yea));
      return $weekDay;
    }
    //puste miejsca, zaczecie odliczania od wlasciwego dnia tygodnia
   for($i=0; $i<check_first_month_day($mon, $yea); $i++) {
     echo '<td><input type="hidden"></input></td>';
   }
   // wyswietlenie dni miesiaca i podswietlenie na czerwono aktualnego dnia
  for ($i=1; $i<=check_number_of_days($mon, $yea); $i++) {
     echo "<td value='$i'>$i</td>";
    }
  }
 }
//funkcja pokazuje kolejny miesiac i rok do wyboru
 function monthYear() {
    $currentmonth = date("n");
    $currentyear= date("Y");
    $count = 12;

    $currentdate = date("F Y", strtotime($currentyear.'-'.$currentmonth));
    echo "<option value='$currentdate'>$currentdate</option>";

    for($i=1; $i<$count; $i++) {
      $currentmonth++;
      if($currentmonth>12) {
        $currentmonth =1 ;
        $currentyear++;
      }
      $selectdate = date("F Y", strtotime($currentyear."-".$currentmonth));

      echo "<option value='$selectdate'>$selectdate</option>";

    }
 }

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class="container">
  <form action="calendar1.php" method="post">
  <table class="table  table-hover-cells mb-1">
        <h4 class="d-block p-2 mb-0 bg-primary text-white text-center">Reservation Calendar</h4>
        <div class="month">
          <select class="custom-select custom-select-sm" name="month">
            <?php monthYear()?>
         </select>
         
        </div>
          </div>
    <tbody class="bg-light">
      <tr class="bg-secondary text-white">
        <th>SUN</th>
        <th>MON</th>
        <th>TUE</th>
        <th>WED</th>
        <th>THU</th>
        <th>FRI</th>
        <th>SAT</th>
      </tr>
      <tr>
       <?php displayChoosenMonth() ?>
      </tr>
    </tbody>
  </table>

    <div class="input-group">
      <input type="text" aria-label="Name" class="form-control" placeholder="Your name" name="name">
      <input type="text" aria-label="email" class="form-control" placeholder="E-mail adress" name="email">
    </div>

    <button type="submit" name="submit" class="btn btn-primary float-right mt-1">Submit</button>
  </form>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </body>
</html>
