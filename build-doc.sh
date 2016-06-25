#!/bin/sh

VERSIONS=("3.1" "3.2" "3.3");

cd docs;

for DIR in "${VERSIONS[@]}"
do
    cd $DIR;
    pwd;
    git checkout $DIR;
    cd ../;
done

# Update master branch
cd 3.4;
git checkout master;
cd ../;

cd ../;
git submodule foreach git pull;
