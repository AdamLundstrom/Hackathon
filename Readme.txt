B�rja med om ni inte redan gjort.
git config --global user.name <ditt namn>
git config --global user.mail <din epost>
Sedan:
git remote add origin https://github.com/AdamLundstrom/Hackathon.git
git pull
git checkout dev

Nu b�r alla filer finnas i ditt repo
Du b�r k�ra
git pull
hyffsat regelbundet
Varje g�ng du g�r �ndringar i n�gon fil g�r du f�ljande:
git add .
git commit -m "Beskriv �ndringen"
git push
Nu har du lagt filerna i repot p� github