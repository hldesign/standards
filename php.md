# PHP

## Files

File names should be created with *CamelCase* (according to the class they contain).

Tabs is not allwed! `4 spaces` should be used.

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

**One tab** will be used for indentation. So, indentation should look like this:

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