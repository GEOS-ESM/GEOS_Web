#!/bin/csh -f

@ nyears = $#argv
if( $nyears == 0 ) then
    echo ''
    echo 'Usage: add_years year1 <year2 year3 ...>'
    echo ''
    exit
endif

@       k  = 1
while( $k <= $nyears )
set year = $argv[$k]

set   test  = `grep $year year.button | grep -v "//"`
if( $#test == 0 ) then

set DONE = FALSE
/bin/mv year.button year.button.tmp
touch   year.button

set num = `wc -l year.button.tmp | cut -d' ' -f 1`
      @ n  = 1
while( $n <= $num )

# Extract Line from File
# ----------------------
  set   text  = `awk -v ln=$n '{if (NR==ln) print $0}' year.button.tmp`

# Skip over Comment Lines
# -----------------------
  if( "$text" =~ *//* ) then
        echo "$text" >> year.button
  else
      # Find Line which adds year items
      # -------------------------------
        if( "$text" =~ *'echo $content;'* & $DONE == FALSE) then
              echo "Adding $year to year.button ..."
              echo "$text" >> year.button
              echo 'set_item ( $year,"'$year'","'$year'");' >> year.button
              set DONE = TRUE
        else
              echo "$text" >> year.button
        endif
  endif

    @ n = $n + 1
end
/bin/rm -f year.button.tmp

endif
@ k = $k + 1
end
exit
