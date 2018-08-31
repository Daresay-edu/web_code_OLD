#!/bin/sh
# multiple audio in one page
subject=$1 
unit=$2
from=$3
end=$4
i=$from
function download_la()
{
    basesrc="https://www-k6.thinkcentral.com/content/hsp/reading/journeys2014/na/gr3/ese_9780547894515_/vol2/OPS/audio/jy14_na_ese_g3_"
    echo "--------------la------------"
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
    	#str=$unit"_p"$j
    	str=$unit"_p"$j
        x=1
        while [ 1 ]
        do 
            tmpstr=$str
    	    if [ $x -lt 10 ];then
    	    	x="0"$x
    	    fi
            tmpstr=$tmpstr"_a"$x
    	    tmpsrc=$basesrc$tmpstr".mp3"
    	    wget $tmpsrc 
    	    if [ $? -ne 0 ];then
    	    	rm -f $tmpsrc
    	    	echo $tmpsrc >> log
                break
    	    fi
    	    x=`expr $x + 1`
    	    echo $i
    	    echo $x
    	    echo $unit
        done
    	i=`expr $i + 1`
    	if [ $i -gt $end ];then
    		exit	
    	fi
    done
}
function download_hsp()
{
    basesrc="https://www-k6.thinkcentral.com/content/hsp/science/fusion/na/gr03/ese_9780547692128_/OPS/audio/NTSCI_Eng_G3_"
    echo "--------------hsp------------"
    while [ 1 ]
    do	
        if [ $fail -eq 1 ];then
    	    u=`expr $u + 1`
        fi
    	if [ $i -lt 10 ];then
    		j="00"$i
    	elif [ $i -gt 9 ] && [ $i -lt 100 ];then
    		j="0"$i
    	else 
    		j=$i
    	fi
    	#str=$unit"_p"$j
    	src=$basesrc$unit"_"$j".mp3"
    	echo $str
    	
    	#wget -O $i.mp3 $src 
    	wget $src 
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
}
la="la"
hsp="hsp"
if [ "$subject" == "$la" ];then
    echo "la"
    download_la
else
    download_hsp
fi
