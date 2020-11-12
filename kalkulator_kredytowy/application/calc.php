<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$loanValue = $_REQUEST ['loanValue'];
$interestRate = $_REQUEST ['interestRate'];
$numberOfMonths = $_REQUEST ['numberOfMonths'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($loanValue) && isset($interestRate) && isset($numberOfMonths))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
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
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if ((! is_numeric( $loanValue ))||($loanValue <= 0)) {
		$messages [] = 'Wprowadzono niepoprawną wartość kredytu!';
	}
	
	if ((! is_numeric( $interestRate )) || ($interestRate < 0)) {
		$messages [] = 'Wprowadzono niepoprawne oprocentowanie!';
	}	
		
	if ( (! is_numeric( $numberOfMonths ))||($numberOfMonths <= 0)) {
		$messages [] = 'Wprowadzono niepoprawną ilość miesięcy!';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int i float
	$loanValue = intval($loanValue);
	$interestRate = floatval($interestRate);
	$numberOfMonths = intval($numberOfMonths);

	$percentInterestRate = $interestRate/100;
	$fullLoanValue = ($loanValue * $percentInterestRate) + $loanValue;
	$result = $fullLoanValue/$numberOfMonths;
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';