max=1000
for (( i=1; i <= $max; ++i ))
do
    curl https://picsum.photos/id/$i/300/300 --output img_$i.jpg
done
#curl https://picsum.photos/id/${i}/300/300 --output img_${i}.jpg

