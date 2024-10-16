### Esecuzione

```
git clone git@github.com:ocraton/test-dvtech.git
cd test-dvtech
docker compose up

```

Collegarsi al container per il frontend

```
docker exec -it nuxt-frontend sh

```

installare le dipendenze:

```
npm install

```

Eseguire il frontend

```
npm run dev

```