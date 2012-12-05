<?php

$content['heading'] = "Welcome home friends";

ob_start();

?>

It's a BBS!
<hr /><a href='/imaginary'>An imaginary thread</a>
<br /><a href='/Wetfish'>A thread about wetfish</a>
<br /><a href='/butts'>Do you guys love butts as much as me?</a>
<hr /><a href='/?new'>Create a new thread?</a>

<?php

$content['body'] = ob_get_contents();
ob_end_clean();
