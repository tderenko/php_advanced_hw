<?php

use homework\hw_20\StringParser;

d(StringParser::rmLastWord('The quick brown fox'));
d(StringParser::rmSpaces('The quick brown fox'));
d(StringParser::rmNonNumeric('$123,34.00A'));
d(StringParser::grepFromBracket('The quick [step] brown [fox][rabbit]'));
d(StringParser::rmAddSymbols('abcde$ddfd @abcd )der]'));
