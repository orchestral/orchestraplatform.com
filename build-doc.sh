#!/bin/sh

VERSIONS=("2.0" "2.1" "2.2" "3.0" "3.1" "3.2");

cd docs;

for DIR in "${VERSIONS[@]}"
do
    cd $DIR;
    pwd;
    git checkout $DIR;
    cd ../;
done

# Update master branch
cd 3.3;
git checkout master;
cd ../;

cd ../;
git submodule foreach git pull;
