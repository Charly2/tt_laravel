max=300
for (( i=200; i <= $max; ++i ))
do
    curl http://localhost:8000/genera/$i
done

