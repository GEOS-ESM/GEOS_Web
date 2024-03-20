<?php
function set_item ($case,$target,$name) {
if ( $case == $target ) { $selected = "selected"; }
else                    { $selected = ""; }
$content = <<<EOF
<option $selected value=$target > $name </option>
EOF;
echo $content;
return; }
?>
