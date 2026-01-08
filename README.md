
Volg deze stappen om het project op je lokale machine uit te voeren:

1.  **Project clonen:**
    git clone https://github.com/KingTensai/raspberrypi_forum
    cd <project-map>


2.  **Dependencies installeren:**
    composer install
    npm install && npm run build

3.  **Configuratie:**
     env. file in de correcte directory zetten 

4.  **Database inrichten:**
    php artisan migrate:fresh --seed
            ADMIN LOGIN na seeding
    'email => 'admin@ehb.be',
    password => 'Admin123!',

5.  **Bestandsopslag koppelen:**
    php artisan storage:link

6.  **Server starten:**
    php artisan serve
    (Laravel doet dit automatisch)    


## 📚 Bronvermeldingen

Dit project is tot stand gekomen met behulp van de volgende bronnen:
* **Canvas cursus** Voor de basisstructuur
* **Laravel Documentatie:** (https://laravel.com/docs).
* **Tailwind CSS:** Gebruikt voor de styling en responsive vormgeving van de profielpagina.
* **Gemini AI (Google):** Gebruikt als ondersteuning bij het debuggen van problemen die ik niet opgelost kreeg.

