## Test DVTetch

Questo progetto di test è un progetto che ha una parte backend e una di frontend dentro allo stesso repository. Sono state fatte delle semplificazioni a livello strutturale per andare incontro alla semplicità di realizzazione. 

#####Backend
La parte backend è un progetto Laravel classico che fa da API sfruttando Sanctum. I controller sono all'interno di `app/Http/Controllers/Api` e le relativa resources in `app/Http/Resources`.

L'api espone i seguenti endpoint:

GET breweries list
http://localhost/api/breweries

POST login
http://localhost/api/login

POST logout
http://localhost/api/logout

Per dare uniformità alle response è stato creato un controller apposito:  `BaseResponseController` da cui i controller dell'Api estendono.

Inoltre al fine di rendere più agevole la funzionalità di proxy del metodo di listing delle breweries è stato organizzato un service `Services\BreweryService.php` in modo da rendere isolare le responsabilità tra controller e logica.

C'è una piccola parte dedicata ai test con Pest: è stato testato il solo metodo di Login all'interno di `tests/Feature/LoginTest.php`

#####Frontend
Per il frontend è stato organizzato un piccolo progetto in Nuxt all'interno della cartella `./frontend`.

Per eseguirlo in locale è stato aggiunto al `docker-compose.yml` un container a parte per la sua esecuzione che sfrutta un `Dockerfile` appositamente creato sempre dentro la cartella `./frontend` che espone sulla porta 3000.

Con questa impostazione si ha:

- Backend: http://localhost
- Frontend: http://localhost:3000

Il frontend è organizzato a componenti molto semplici sfruttando un pò di logica per con `useState()` per gestire lo stato dello user loggato. 
I componenti sono stati presi da https://tailwindui.com/ per semplificare senza badare alle logiche di responsività.

Quindi c'è una home, c'è la possibilità di fare login e andare nella dashboard che mostra la lista paginata delle breweries e la funzionalità di logout. 
Per la gestione del token è stato usato lo storage locale attraverso `useCookie('auth_token')` e per le rotte protette è stato usato un middleware. 

La paginazione è stata gestita volutamente in maniera semplice con i pulsanti avanti e indietro all'interno del componente `Paginator` dedicato


### Esecuzione in locale

Scaricare il repo, crea e avvia i container
```
git clone git@github.com:ocraton/test-dvtech.git
cd test-dvtech
docker compose up
```

Accedere al container del backend
```
docker exec -it laravel.test sh

```

All'interno del container backend installare le dipendenze:

```
composer install

```

Accedere al container per il frontend

```
docker exec -it nuxt-frontend sh

```

All'interno del container frontend installare le dipendenze:

```
npm install

```

ed eseguire in locale sulla porta 3000

```
npm run dev

```