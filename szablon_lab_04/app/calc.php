<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['loanValue'] = isset($_REQUEST['loanValue']) ? $_REQUEST['loanValue'] : null;
	$form['numberOfMonths'] = isset($_REQUEST['numberOfMonths']) ? $_REQUEST['numberOfMonths'] : null;
	$form['interestRate'] = isset($_REQUEST['interestRate']) ? $_REQUEST['interestRate'] : null;
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['loanValue']) && isset($form['numberOfMonths']) && isset($form['interestRate']) ))	return false;
	
	//parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['loanValue'] == "") $msgs [] = 'Nie podano wartości kredytu!';
    if ( $form['interestRate'] == "") $msgs [] = 'Nie podano oprocentowania!';
    if ( $form['numberOfMonths'] == "") $msgs [] = 'Nie podano ilości miesięcy!';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if ((! is_numeric( $form['loanValue'] ))||($form['loanValue'] <= 0)) $msgs [] = 'Wprowadzono niepoprawną wartość kredytu!';
		if ((! is_numeric( $form['interestRate'] ))||($form['interestRate'] < 0)) $msgs [] = 'Wprowadzono niepoprawne oprocentowanie!';
        if ((! is_numeric( $form['numberOfMonths'] ))||($form['numberOfMonths'] <= 0)) $msgs [] = 'Wprowadzono niepoprawną ilość miesięcy!';
    }
	
	if (count($msgs)>0) return false;
	else return true;
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
    global $role;

    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['loanValue'] = floatval($form['loanValue']);
	$form['interestRate'] = floatval($form['interestRate']);
    $form['numberOfMonths'] = intval($form['numberOfMonths']);

    //wykonanie operacji
	switch ($form['loanValue']) {
        case ($form['loanValue']>99999):
            if ($role == 'admin') {
                $percentInterestRate = ($form['interestRate'])/100;
                $fullLoanValue = (($form['loanValue']) * $percentInterestRate) + ($form['loanValue']);
                $result = $fullLoanValue/($form['numberOfMonths']);
            }else{
                $msgs[] = 'Tylko administrator może wykonać operacje na tak wysokiej kwocie !';
            }
            break;
        default :
            $percentInterestRate = ($form['interestRate'])/100;
            $fullLoanValue = (($form['loanValue']) * $percentInterestRate) + ($form['loanValue']);
            $result = $fullLoanValue/($form['numberOfMonths']);
            break;
	}
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Zadanie 3');
$smarty->assign('page_description','Zastosowanie szablonowania Smarty');
$smarty->assign('page_header','Kalkulator kredytowy');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.tpl');