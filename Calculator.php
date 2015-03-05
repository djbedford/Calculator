<?php

require_once('Operations.php');

/**
* Simple calculator class
*/

class Calculator extends Operations {
	private $input;

	/**
	* Constructor method for Calculator
	*
	* @param string $input equation to solve
	*/
	public function __construct($input)
	{
		$this->input = $input;
		
		$result = $this->solveEquation($input);

		$this->displayOutput($result);
	}

	/**
	* Solves the given equation
	*
	* @param string $equation the equation to solve
	* /
	private function solveEquation($equation)
	{
		if (strpos($equation, array('+', '-', '*', '/')) === false) {
			return;
		}

		if (preg_match('/([0-9.*-/+\s]*)(([0-9]+)\s[*]\s([0-9]+))([0-9.*-/+\s]*)/', $equation, $matches)) {
			$multiply = $this->multiply($matches[3], $matches[4]);
			$equation = $matches[1] . ' ' . $multiply . ' ' . $matches[5];
		} elseif (preg_match('/([0-9.*-/+\s]*)(([0-9]+)\s[/]\s([0-9]+))([0-9.*-/+\s]*)/', $equation, $matches)) {
			$division = $this->divide($matches[3], $matches[4]);
			$equation = $matches[1] . ' ' . $division . ' ' . $matches[5];
		} elseif (preg_match('/([0-9.*-/+\s]*)(([0-9]+)\s[+]\s([0-9]+))([0-9.*-/+\s]*)/', $equation, $matches)) {
			$addition = $this->add($matches[3], $matches[4]);
			$equation = $matches[1] . ' ' . $addition . ' ' . $matches[5];
		} elseif (preg_match('/([0-9.*-/+\s]*)(([0-9]+)\s[-]\s([0-9]+))([0-9.*-/+\s]*)/', $equation, $matches)) {
			$subtraction = $this->subtract($matches[3], $matches[4]);
			$equation = $matches[1] . ' ' . $subtraction . ' ' . $matches[5];
		}

		return $this->solveEquation($equation);
	}

	/**
	* Displays the result of the equation
	*
	* @param string $output output to be displayed
	*/
	private function displayOutput($output)
	{
		echo $output;
	}
}

$calculator = new Calculator("1 + 1 * 3 + 3");
