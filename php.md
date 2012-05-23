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