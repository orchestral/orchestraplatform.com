#!/bin/sh

VERSIONS[0]="2.0";
VERSIONS[1]="2.1";
VERSIONS[2]="2.2";
VERSIONS[3]="3.0";

cd docs;

for DIR in "${VERSIONS[@]}"
do
    cd $DIR;
    pwd;
    git checkout $DIR;
    cd ../;
done

# Update master branch
cd 3.1;
git checkout master;

cd ../..;
git submodule foreach git pull;
