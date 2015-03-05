<?php

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

		$input = $this->formatInput($input);
		
		$this->solveEquation($input);
	}

	/**
	* Remove the white space from the input
	*
	* @param string $input input string
	* @return string formatted string with whitespace removed
	*/
	private function formatInput($input)
	{
		return str_replace(' ', '', $input);
	}

	private function solveEquation($equation)
	{
		if (preg_match('/(.+)\s(([0-9]+)\s[*]\s([0-9]+))\s(.+)/', $equation, $matches)) {
			$multiply = $this->multiply($matches[3], $matches[4]);
		}
	}
}

$calculator = new Calculator("1 + 1 * 3 + 3");
