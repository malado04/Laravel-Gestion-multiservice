…or create a new repository on the command line---------------------------------------------------

echo "# Laravel-8-AdminLTE3-Gestion-RH-Mairie" >> README.md
  git init
  git add README.md
  git commit -m "first commit"
  git branch -M main
  git remote add origin https://github.com/malado04/Laravel-Gestion-multiservice
  git push -u origin main


  …or push an existing repository from the command line---------------------------------------------------

git remote set-url origin https://github.com/malado04/Laravel-Gestion-multiservice
  git branch -M master
  git push -u origin master