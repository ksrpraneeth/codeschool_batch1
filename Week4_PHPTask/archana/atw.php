<?php
function convert_to_words($num)
{
	$len = strlen($num);
	if ($len == 0)
	{
		echo "empty string\n";
		return;
	}
	if ($len > 4)
	{
		echo "Length more than 4 " .
			"is not supported\n";
		return;
	}
	$single_digits = array("zero", "one", "two","three", "four", "five","six", "seven", "eight","nine");
	$two_digits = array("", "ten", "eleven", "twelve","thirteen", "fourteen", "fifteen","sixteen", "seventeen", "eighteen","nineteen");
    $tens_multiple = array("", "", "twenty", "thirty","forty", "fifty", "sixty","seventy", "eighty", "ninety");
    $tens_power = array("hundred", "thousand");
	echo $num.": ";
	if ($len == 1)
	{
		echo $single_digits[$num[0] - '0'] . " \n";
		return;
	}
	$x = 0;
	while ($x < strlen($num))
	{
		if ($len >= 3)
		{
			if ($num[$x]-'0' != 0)
			{
				echo $single_digits[$num[$x] - '0'] . " ";
				echo $tens_power[$len - 3] . " ";
			}
			--$len;
		}
		else
		{
			if ($num[$x] - '0' == 1)
			{
				$sum = $num[$x] - '0' +$num[$x] - '0';
				echo $two_digits[$sum] . " \n";
				return;
			}
			else if ($num[$x] - '0' == 2 && $num[$x + 1] - '0' == 0)
			{
				echo "twenty\n";
				return;
			}
			else
			{
				$i = $num[$x] - '0';
				if($i > 0)
				echo $tens_multiple[$i] . " ";
				else
				echo "";
				++$x;
				if ($num[$x] - '0' != 0)
					echo $single_digits[$num[$x] -'0'] . " \n";
			}
		}
		++$x;
	}
}
?>

