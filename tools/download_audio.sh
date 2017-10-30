#!/bin/sh
unit=$1
from=$2
end=$3
i=$from
echo $unit
echo $from
echo $end
while [ 1 ]
do	
	if [ $i -lt 10 ];then
		j="00"$i
	elif [ $i -gt 9 ] && [ $i -lt 100 ];then
		j="0"$i
	else 
		j=$i
	fi
	str=$unit"_"$j
	echo $str
	src="https://www-k6.thinkcentral.com/content/hsp/science/fusion/na/gr01/ese_9780547692104_/OPS/audio/NTSCI_Eng_G1_"$str".mp3"
	
	wget -O $i.mp3 $src 
	if [ $? -ne 0 ];then
		rm -f $i.mp3
		echo $src >> log
	fi
	echo $i
	echo $unit
	i=`expr $i + 1`
	if [ $i -gt $end ];then
		exit	
	fi
done
