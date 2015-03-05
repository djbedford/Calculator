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
	}	
}

$calculator = new Calculator("1 + 1 * 3 + 3");
