<?php
/**
*
* @package testing
* @copyright (c) 2008 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

require_once __DIR__ . '/../../phpBB/includes/utf/utf_tools.php';

class phpbb_utf_utf8_clean_string_test extends phpbb_test_case
{
	public static function cleanable_strings()
	{
		return array(
			array('MiXed CaSe', 'mixed case', 'Checking case folding'),
			array('  many   spaces   ', 'many spaces', 'Checking whitespace reduction'),
			array("we\xC2\xA1rd\xE1\x9A\x80ch\xCE\xB1r\xC2\xADacters", 'weird characters', 'Checking confusables replacement'),
		);
	}

	/**
	* @dataProvider cleanable_strings
	*/
	public function test_utf8_clean_string($input, $output, $label)
	{
		$this->assertEquals($output, utf8_clean_string($input), $label);
	}
}

