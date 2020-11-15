<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
include _ROOT_PATH.'/application/security/check.php';

// 1. pobranie parametrów
function getParams(&$loanValue,&$interestRate,&$numberOfMonths){
$loanValue = isset($_REQUEST ['loanValue'])?$_REQUEST['loanValue'] : null;
$interestRate = isset($_REQUEST ['interestRate'])?$_REQUEST['interestRate'] : null;
$numberOfMonths = isset($_REQUEST ['numberOfMonths'])?$_REQUEST['numberOfMonths'] : null;
}


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$loanValue,&$interestRate,&$numberOfMonths,&$messages){
// sprawdzenie, czy parametry zostały przekazane
    if ( ! (isset($loanValue) && isset($interestRate) && isset($numberOfMonths))) {
            //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
            return false;
    }
    // sprawdzenie, czy potrzebne wartości zostały przekazane
    if ( $loanValue == "") {
            $messages [] = 'Nie podano wartości kredytu!';
    }
    if ( $interestRate == "") {
            $messages [] = 'Nie podano oprocentowania!';
    }
    if ( $numberOfMonths == "") {
            $messages [] = 'Nie podano ilości miesięcy!';
    }
    //nie ma sensu walidować dalej gdy brak parametrów
    if (count( $messages )!= 0) { 
        return false;
        
    }
   
            // sprawdzenie, czy $loanValue i $interestRate są liczbami całkowitymi
            if ((! is_numeric( $loanValue ))||($loanValue <= 0)) {
                    $messages [] = 'Wprowadzono niepoprawną wartość kredytu!';
            }
            if ((! is_numeric( $interestRate )) || ($interestRate < 0)) {
                    $messages [] = 'Wprowadzono niepoprawne oprocentowanie!';
            }	
            if ( (! is_numeric( $numberOfMonths ))||($numberOfMonths <= 0)) {
                    $messages [] = 'Wprowadzono niepoprawną ilość miesięcy!';
            }
        if (count ( $messages ) != 0) {
            return false;
            
        }else{
            return true;
            
        }
    }


// 3. wykonaj zadanie jeśli wszystko w porządku

function process(&$loanValue,&$interestRate,&$numberOfMonths,&$messages,&$result){
       global $role;
    
    //konwersja parametrów na int i float
	$loanValue = intval($loanValue);
	$interestRate = floatval($interestRate);
	$numberOfMonths = intval($numberOfMonths);
        
        //wykonanie operacji
	switch ($loanValue) {
		case ($loanValue>99999):
			if ($role == 'admin'){
				$percentInterestRate = $interestRate/100;
                                $fullLoanValue = ($loanValue * $percentInterestRate) + $loanValue;
                                $result = $fullLoanValue/$numberOfMonths;
			} else {
				$messages [] = 'Tylko administrator może wykonać operacje na tak wysokiej kwocie !';
			}
			break;
		default :
			$percentInterestRate = $interestRate/100;
                        $fullLoanValue = ($loanValue * $percentInterestRate) + $loanValue;
                        $result = $fullLoanValue/$numberOfMonths;
			break;
	}
}
  //definicja zmiennych kontrolera
        $loanValue = null;
        $interestRate = null;
        $numberOfMonths = null;
        $result = null;
        $messages = array();
        
//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($loanValue,$interestRate,$numberOfMonths);
if ( validate($loanValue,$interestRate,$numberOfMonths,$messages) ) { // gdy brak błędów
	process($loanValue,$interestRate,$numberOfMonths,$messages,$result);
}


// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$loanValue,$interestRate,$numberOfMonths,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';