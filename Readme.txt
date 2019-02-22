Börja med om ni inte redan gjort.
git config --global user.name <ditt namn>
git config --global user.mail <din epost>
Sedan:
git remote add origin https://github.com/AdamLundstrom/Hackathon.git
git pull
git checkout dev

Nu bör alla filer finnas i ditt repo
Du bör köra
git pull
hyffsat regelbundet
Varje gång du gör ändringar i någon fil gör du följande:
git add .
git commit -m "Beskriv ändringen"
git push
Nu har du lagt filerna i repot på github