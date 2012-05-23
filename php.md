# PHP

## Files

File names should be created with *CamelCase* (according to the class they contain).

### Lines

Lines must not exceed a limit of **100 characters**.<sup>?</sup> The soft limit is 80 characters. Lines should not have any trailing whitespace characters.<sup>?</sup>

### PHP tags

Always use long open tags:

    <?php

Never use short open tags:

    <?

Well, unless you are in a view and want the variable data to be automatically printed.

    <?=$post->title;?>
    
## Indentation

**One tab** (`4 spaces`) will be used for indentation. So, indentation should look like this:

    <?php
	// Base level
		// Level 1
			// Level 2
		// Level 1
	// Base level

Indentation is **always symmetrical**. Any opening syntax construct that begins on a new line should be matched with a closing construct (that also begins on a new line) indented at the same level.  Any lines enclosed by a beginning and ending construct should be indented exactly one tab in from the enclosing lines. If the contents of an enclosure are broken out over multiple lines, then no enclosed elements should be on the same line as the enclosing structures.

	// Bad.
	// (1) Array elements are indented too far.
	// (2) Closing parenthesis aren't on their own line.
	// (3) The first array element doesn't break to its own line.
	// (4) Either no space or too many spaces between key name and arrows.
	$params = array_merge($params, array('controller'=> $params['plugin'],
				'action'=> $params['controller'],
				'pass'   => array_merge($pass, $params['pass']),
				'named'=> array_merge($named, $params['named'])));

	// Good.
	$params = array_merge($params, array(
		'controller' => $params['plugin'],
		'action' => $params['controller'],
		'pass' => array_merge($pass, $params['pass']),
		'named' => array_merge($named, $params['named'])
	));

	// Bad (if any array elements have their own line, all should).
	$params = array('controller'=> $params['plugin'],
		'action'=> $params['controller'],
		'pass' => $params['pass']
	);

	// Good.
	$params = array(
		'controller' => $params['plugin'],
		'action' => $params['controller'],
		'pass' => $params['pass']
	);

	// Also okay, since the whole structure is defined on one line.
	$params = array('controller' => $params['plugin'], 'action' => $params['controller'], 'pass' => $params['pass']);
	
## Operators

All [operators ](http://php.net/manual/en/language.operators.php) must be surrounded by spaces<sup>?</sup>.

	$x = $y;
	'x' . 'y';
	$x || $y;
	$x ?: $y;
	$x ? $x : $y;
	$x += $y;
	$x - $y;
	$x - 23;
	function($x, $y = null) {};

However there are a few exceptions to the spacing rule<sup>?</sup>:

1. Increment and decrement operators must be directly followed by or following the variable.

2. The exclamation mark must be directly followed by the variable.

3. Colons appearing as part of a case condition must have no spaces surrounding them.

4. Labels must have no spaces surrounding them.

5. Negative **literal** integers or floats must have the minus sign directly attached.

6. Minus signs involved in negations of i.e. variables can be spaced or directly attached.
```
$x--;
$x++;
!$x;
-23;
- $x;
-$x;
case 'x':
:x
```
In order to increase readability of the code it is allowed to use spaces **or** tabs before operators in certain cases.

1. Multiple function calls.
2. Concatenating a long message.
```
$those    = examples($are);
$the      = best($ones);
$message  = 'this message is spread over ';
$message .= 'multiple lines.';
```

## Control Structures
Control structures are for example `if`, `for`, `foreach`, `while`, `switch` etc. Below, an example with `if`:
```
if (($a == $b) || ($a == c)) {
	// Action 1.
} elseif (!($c == $d) && ($a == $b)) {
	// Action 2.
} else {
	// Default action.
}
```

In the control structures there should be **1 (one) space before** the first parenthesis and **1 (one) space between** the last parenthesis and the opening bracket.

**Always use curly brackets** in control structures, even if they are not needed. They increase the readability of the code, and they give you fewer logical errors.<sup>?</sup>

Opening curly brackets should be placed on the same line as the control structure.<sup>?</sup>  Closing curly brackets should be placed on new lines, and they should have same indentation level as the control structure.<sup>?</sup> The statement included in curly brackets should begin on a new line, and code contained within it should gain a new level of indentation.
```
// Bad - no brackets, badly placed statement.
if ($foo == $bar) $foo++;

// Bad - no brackets.
if ($foo == $bar)
	$foo++;

// Good.
if ($foo == $bar) {
	$foo++;
}
```

Instead of complex `elseif` constructs consider using stacked `if`s.
```
if ($foo == $bar) {
	// Action 1.
}
if ($foo == 'bar') {
	// Action 2.
}
```
### Switch Statements

The control portions of switch blocks should follow a consistent indent pattern, such that the closing `break` statement should be indented to the **same level** as the corresponding opening `case` statement.
```
switch ($foo) {
	case "first":
		// Do something.
	break;
	case "second":
		// Do something.
	break;
	case "third":
	case "fourth":
		// Do another thing.
		return $bar;
}
```

Return statements should always be indented one level greater than their corresponding `case` statements, even if the `return` is the last statement in the block.

### Ternary Operator

Ternary operators (`?:`) should only be used to set default values for variables or array keys which may be undefined or empty, or for simple true/false comparisons, and must fit on one line of code.  if a ternary exceeds these constraints, it should be broken out into a full `if` block.

Parentheses _may_ be added to the conditional expression or entire ternary statement for clarity.

## Variables

Variable names should be as descriptive as possible, but also as short as possible. Normal variables should start with a lowercase letter, and should be written in [wiki:CamelBack camelBack] in case of multiple words. Note that even variables containing objects must **not** start with a capital letter.
```
	$user = 'John';
	$users = array('John', 'Hans', 'Arne');

	$dispatcher = new Dispatcher();
```

Array keys used in `$options`/results arrays should be formatted according to the same rules as properties/variables.

## Constants

Constants should be defined in capital letters<sup>?</sup>. If a constant name consists of multiple words, they should be separated by an underscore character.

	define('FOO', 1);
	define('FOO_BAR_BAZ', 2);

## Casts

Casts must not have any whitespace inside the cast, must only use long type names and be **separated by one space** from the following variable or value.<sup>?</sup>

	// Bad.
	(bool) $result;
	( boolean ) $result;
	(boolean)$result;
	(boolean)  $result;

	// Good.
	(boolean) $result;
	(integer) $value;

## Functions

Function names should be written in _camelBack_.

	function longFunctionName() {
	  // ...
	}

Functions should be called **without space** between function's name and starting bracket. There should be **one space** between every parameter of a function call.

	$var = foo($bar, $bar2, $bar3);

Example of a function definition:

	function someFunction($arg1, $arg2 = '') {
		if ($foo == $bar) {
			$foo++;
		}
		return $bar;
	}

Parameters with a default value, should be placed last in function definition. Try to **make your functions return something**, at least `true` or `false` - so it can be determined whether the function call was successful.

	function connection(&$dsn, $persistent = false) {
		if (is_array($dns)) {
			$dnsInfo = &$dns;
		} else {
			$dnsInfo = BD::parseDNS(dns);
		}

		if (!($dnsInfo) || !($dnsInfo['phpType'])) {
			return $this->addError();
		}
		return true;
	}

Functions without body content should be written like so.

	function connection(&$dsn, $persistent = false) {}

## Namespaces

The namespace  declaration must appear directly after the opening php tag, separated by an empty line.<sup>?</sup> Any static dependencies **appear as one block** after the namespace declaration, separated by an empty line.

	<?php

	namespace lithium\util;

	use Exception;
	use lithium\util\Inflector;

### Singularity

Namespaces should be written in lowercase singular form, example:

	// Bad.
	namespace lithium\data\sources;

	// Good.
	namespace lithium\data\source;