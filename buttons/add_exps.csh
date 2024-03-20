#!/bin/csh -f

@ nexps = $#argv
if( $nexps == 0 ) then
    echo ''
    echo 'Usage: add_exps expid1 <expid2 expid3 ...>'
    echo ''
    exit
endif

@       k  = 1
while( $k <= $nexps )
set exp = $argv[$k]

set   test  = `grep $exp set_exps.php | grep -v "//"`
if( $#test == 0 ) then

/bin/mv set_exps.php set_exps.tmp
touch   set_exps.php

set num = `wc -l set_exps.tmp | cut -d' ' -f 1`
      @ n  = 1
while( $n <= $num )

# Extract Line from File
# ----------------------
  set   text  = `awk -v ln=$n '{if (NR==ln) print $0}' set_exps.tmp`

# Skip over Comment Lines
# -----------------------
  if( "$text" =~ *//* ) then
        echo "$text" >> set_exps.php
  else
      # Find Line which sets array for CMPEXPs
      # --------------------------------------
        if( "$text" =~ *"array"* ) then
              echo "Adding $exp to Line: $text"
              echo "$text" | sed -e 's/);/,\"'$exp'\" );/' | sed -e 's/ //g' >> set_exps.php
        else
              echo "$text" >> set_exps.php
        endif
  endif

    @ n = $n + 1
end
/bin/rm -f set_exps.tmp

endif
@ k = $k + 1
end
exit
