import fileinput
import sys

for line in fileinput.input(['./abc.txt'], inplace=True):
    sys.stdout.write('$message .= \' {l}\';'.format(l=line))
