cd docs/2.0;
git checkout 2.0;
cd ../2.1;
git checkout 2.1;
cd ../2.2
git checkout 2.2;
cd ../3.0
git checkout master;
cd ../..;
git submodule foreach git pull;
